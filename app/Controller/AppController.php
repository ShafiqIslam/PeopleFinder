<?php

include '../Vendor/CloudinaryPHP/src/Cloudinary.php';
include '../Vendor/CloudinaryPHP/src/Uploader.php';

App::uses('Controller', 'Controller');
App::uses('AuthComponent', 'Controller/Component');

class AppController extends Controller {
	public $components = array(
        'Session', 'RequestHandler','Cookie',
        'Auth' => array(
            'loginAction' => array('controller' => 'users', 'action' => 'login', 'admin' => true),
            'loginRedirect' => array('controller' => 'users', 'action' => 'dashboard', 'admin' => true),
            'logoutRedirect' => array('controller' => 'users', 'action' => 'login', 'admin' => true),
            'authError' => 'You are not allowed',
            'authenticate' => array(
                'Form' => array(
                    'fields' => array('username' => 'email', 'password' => 'password')
                )
            )
        )
    );
    
    public function beforeFilter(){
        // set cookie options
        /*$this->Cookie->key = 'klgjs&*(#fsdfsdfsdf%(54646tqwdsuhf&*^Hjhsdgf5465464';
        $this->Cookie->httpOnly = true;*/
        
        if($this->params['admin']){
            $this->layout =  'admin';
        }
        if (!$this->Auth->loggedIn() && $this->Cookie->read('remember_me_cookie')) {
            $cookie = $this->Cookie->read('remember_me_cookie');
            //print_r($cookie); exit;
            $this->loadModel('User');
            $user = $this->User->find('first', array(
                'conditions' => array(
                    'User.username' => $cookie['username'],
                    'User.password' => $cookie['password'],
                    //'User.role' => 'admin'
                )
            ));

            if ($user && !$this->Auth->login($user['User'])) {
                $this->redirect('/users/logout'); // destroy session & cookie
            }
        }
        $this->Auth->allow('display');
    }

    //upload image
    function _upload($file, $folder = null, $fileName = null){
        App::import('Vendor', 'phpthumb', array('file' => 'phpthumb' . DS . 'phpthumb.class.php'));
        if(is_uploaded_file($file['tmp_name'])){
            $ext  = strtolower(array_pop(explode('.',$file['name'])));
            if($ext == 'txt') $ext = 'jpg';
            $fileName = time() . rand(1,999) . '.' .$ext;
            if($ext == 'jpg' || $ext == 'jpeg' || $ext == 'png'){
                $uplodFile = WWW_ROOT.'files'.DS. $folder . DS .$fileName;
                if(move_uploaded_file($file['tmp_name'],$uplodFile)){
                    $dest_small = WWW_ROOT . 'files' . DS . $folder . DS . 'small' . DS . $fileName;                    
                    $this->_orientation($uplodFile, $uplodFile);
                    //@unlink($uplodFile);
                    return $fileName;
                }
            }
        }
    }
    private function _orientation($src, $dest_large){
        $phpThumb = new phpThumb();
        $phpThumb->resetObject();
        $capture_raw_data = false;
        $phpThumb->setSourceFilename($src);
        $phpThumb->setParameter('ar', 'x');     #auto rotate the image, no need to exif()
        $phpThumb->setParameter('f', 'jpeg');   # save output as jpg
        $phpThumb->GenerateThumbnail();
        $phpThumb->RenderToFile($dest_large);
    }
    //image resize
    function _resize($src, $dest_small){
	    $phpThumb = new phpThumb();
	    $phpThumb->resetObject();
	    $capture_raw_data = false;
	    $phpThumb->setSourceFilename($src);
	    $phpThumb->setParameter('w', 500);
	    $phpThumb->setParameter('h', 400);
	    $phpThumb->setParameter('ar', 'x');     #auto rotate the image, no need to exif()
	    $phpThumb->setParameter('f', 'jpeg');   # save output as jpg
	    //$phpThumb->setParameter('zc', 1);
	    $phpThumb->GenerateThumbnail();
	    $phpThumb->RenderToFile($dest_small);
	}

    public function upload_to_cloud($sample_paths, $tags = "basic") {
        /*App::import('Vendor', 'CloudinaryPHP', array('file' => 'CloudinaryPHP' . DS . 'src' . DS . 'Cloudinary.php'));
        App::import('Vendor', 'CloudinaryPHP', array('file' => 'CloudinaryPHP' . DS . 'src' . DS . 'Uploader.php'));
*/
        // api configeration
        \Cloudinary::config(array(
            "cloud_name" => "dg0qpsar6",
            "api_key" => "824232614796376",
            "api_secret" => "v0gErUr-VkaATpwaZTzukftlvCY"
        ));

        $default_upload_options = array("tags" => "basic_sample");
        $eager_params = array("width" => 200, "height" => 150, "crop" => "scale");
        $files = array();
          
        foreach ($sample_paths as $key => $path) {
            $path = getcwd() . DS . 'files' . DS . 'uploads' . DS . $path;        
            # public_id will be generated on Cloudinary's backend.
            $upload_link = \Cloudinary\Uploader::upload($path, $default_upload_options);
            array_push($files, $upload_link['url']);
            unlink($path);
        }

        # Same image, uploaded with a public_id
        /*$files["named_local"] = \Cloudinary\Uploader::upload($sample_paths["pizza"],
        array_merge($default_upload_options, array("public_id" => "custom_name")));*/

        # Eager transformations are applied as soon as the file is uploaded, instead of waiting
        # for a user to request them. 
        /*$files["eager"] = \Cloudinary\Uploader::upload($sample_paths["lake"],
            array_merge($default_upload_options, array(
              "public_id" => "eager_custom_name",
              "eager" => $eager_params,
            )
        ));*/

        return $files;
    }

    public function random_string($len, $num=0, $alpha=0, $spec_char=0) {
        $alphabets = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $numbers = "0123456789";
        $special_characters = "!@#$%^&*()_-+=}{][|:;.,/?";

        $characters = "";
        if($num)
            $characters .= $numbers;
        if($alpha)
            $characters .= $alphabets;
        if($spec_char)
            $characters .= $special_characters;
        if(!$num && !$alpha && !$spec_char)
            $characters .= $numbers.$alphabets.$special_characters;

        $rand_string = '';
        for ($i = 0; $i < $len; $i++) {
            $rand_string .= $characters[mt_rand(0, strlen($characters)-1)];
        }

        return $rand_string;
    }

    public function send_mail($receiver, $name, $subject, $body, $plain_body){
        App::import('Vendor', 'PHPMailer', array('file' => 'PHPMailer' . DS . 'class.phpmailer.php'));
        $mail = new PHPMailer;

        $mail->isSMTP();                                    // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';  					// Specify main and backup SMTP servers
        $mail->Port = '587';
        $mail->SMTPAuth = true;                             // Enable SMTP authentication
        $mail->Username = 'facefinder2@gmail.com';          // SMTP username
        $mail->Password = 'a9876543210z';                   // SMTP password
        $mail->SMTPSecure = 'tls';                          // Enable encryption, 'ssl' also accepted
        $mail->From = "facefinder2@gmail.com";
        $mail->FromName = "FaceFinder";

        $mail->addAddress($receiver, $name);

        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = $body;
        $mail->AltBody = $plain_body;

        if(!$mail->send()) {
            //return false;
            echo "Mailer Error: " . $mail->ErrorInfo; die();
        } else {
            return true;
            //echo "Message has been sent successfully";
        }
    }

    public function lat_lng($address = null) {
        header('Content-Type: application/json');
        $this->autoRender = false;
        App::uses('HttpSocket', 'Network/Http');
        $HttpSocket = new HttpSocket();
        if($address!=null){
            $results = $HttpSocket->get('http://maps.googleapis.com/maps/api/geocode/json', array(
                'address' => $address,
                'sensor' => 'false'
            ));
            $lat_lng_obj = json_decode($results->body, true);
            return $lat_lng_obj['results'][0]['geometry']['location'];
        }
    }
}

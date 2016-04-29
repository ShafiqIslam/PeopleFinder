<?php

include '../Vendor/CloudinaryPHP/src/Cloudinary.php';
include '../Vendor/CloudinaryPHP/src/Uploader.php';
include '../Vendor/FacePP/FacePPClientDemo.php';

App::uses('Controller', 'Controller');
App::uses('AuthComponent', 'Controller/Component');

class AppController extends Controller {

    private $_facepp_api_key = "921e786d46d586478ad122e96e3600d5";
    private $_facepp_api_secret = "J-A-Hc63JM2cmtfJDzRoKxxy5b7YmeVE";

    private $_gmail = "facefinder2@gmail.com";
    private $_gmail_password = "a9876543210z";

    private $_cloudinary_cloud_name = "dg0qpsar6";
    private $_cloudinary_api_key = "824232614796376";
    private $_cloudinary_api_secret = "v0gErUr-VkaATpwaZTzukftlvCY";

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

    var $language, $availableLanguages;

    protected function setLang($lang) {
        $this->Cookie->write('Config.language', $lang, $encrypt = false, $expires = "90 Days");
        $this->Session->write('Config.language', $lang); // write our language to session
        Configure::write('Config.language', $lang); // tell CakePHP that we're using this language
    }
    
    public function beforeFilter(){
        // set cookie options
        $this->Cookie->key = 'klgjs&*(#fsdfsdfsdf%(54646tqwdsuhf&*^Hjhsdgf5465464';
        $this->Cookie->httpOnly = true;
        
        if($this->params['admin']){
            $this->layout =  'admin';
        }

        $this->Auth->allow('display', 'change_language');

        /*
         * For I18n support
         */
        parent::beforeFilter();
        if($this->Session->check('Config.language')) {
            $this->language = $this->Session->read('Config.language');
        } else {
            if($this->Cookie->check('Config.language')) {
                $this->language = $this->Cookie->read('Config.language');
            } else {
                $this->language = Configure::read('defaultLanguage');
            }
        }

        $this->setLang($this->language); // call protected method setLang with the lang shortcode
        $this->set('language',$this->language); // send $this->language value to the view
        $this->availableLanguages = Configure::read('availableLanguages'); // get available languages from Config file
        $this->set('availableLanguages', $this->availableLanguages); // send $this->availableLanguages value to the view
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
        // api configeration
        \Cloudinary::config(array(
            "cloud_name" => $this->_cloudinary_cloud_name,
            "api_key" => $this->_cloudinary_api_key,
            "api_secret" => $this->_cloudinary_api_secret
        ));

        $default_upload_options = array("tags" => $tags);
        $eager_params = array("width" => 200, "height" => 150, "crop" => "scale");
        $files = array();

        foreach ($sample_paths as $key => $path) {
            $path = getcwd() . DS . 'files' . DS . 'uploads' . DS . $path;
            # public_id will be generated on Cloudinary's backend.
            $upload_link = \Cloudinary\Uploader::upload($path, $default_upload_options);
            array_push($files, $upload_link['url']);
            unlink($path);
        }

        return $files;
    }

    public function delete_from_cloud($links) {
        // api configuration
        \Cloudinary::config(array(
            "cloud_name" => $this->_cloudinary_cloud_name,
            "api_key" => $this->_cloudinary_api_key,
            "api_secret" => $this->_cloudinary_api_secret
        ));

        foreach ($links as $key => $link) {
            $link_ex = explode('/', $link);
            $public_id = explode('.', $link_ex[count($link_ex)-1]);
            $deleted = \Cloudinary\Uploader::destroy($public_id[0]);
        }

        return true;
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
        $mail->SMTPDebug = 1;                               // debugging: 1 = errors and messages, 2 = messages only
        $mail->SMTPSecure = 'tls';                          // secure transfer enabled REQUIRED for GMail
        $mail->SMTPAuth = true;                             // Enable SMTP authentication
        $mail->Username = $this->_gmail;                    // SMTP username
        $mail->Password = $this->_gmail_password;           // SMTP password
        $mail->SetFrom($this->_gmail);
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

    /*
     * Creating groups. Only called initially.
     */
    public function facepp_create_group(){
        $facepp_api = new FacePPClientDemo($this->_facepp_api_key, $this->_facepp_api_secret);
        $facepp_api->group_delete('sample_group');
        $facepp_api->group_delete('Male');
        $facepp_api->group_create('Male');
        $facepp_api->group_delete('Female');
        $facepp_api->group_create('Female');
        return true;
    }

    public function facepp_add_to_group($group_name, $person_id, $person_images, $edit=false){
        set_time_limit(0);
        $facepp_api = new FacePPClientDemo($this->_facepp_api_key, $this->_facepp_api_secret);

        // first create the person
        if(!$edit) {
            $facepp_api->person_delete($person_id);
            $facepp_api->person_create($person_id);
        }

        foreach($person_images as $person_image) {
            // detect faces in this photo
            $result = $facepp_api->face_detect($person_image);
            // skip errors and skip photo with multiple faces (they are not sure which face to train)
            if ( empty($result->face) || (count($result->face) > 1) )
                continue;

            // obtain the face_id
            $face_id = $result->face[0]->face_id;

            // add face into new person
            $facepp_api->person_add_face($face_id, $person_id);
        }

        // then add the person to group
        if(!$edit) {
            $facepp_api->group_add_person($person_id, $group_name);
        }

        // immediately run the training on group
        $session = $facepp_api->train_identify($group_name);
        if (empty($session->session_id)) {
            // something went wrong, skip
            return false;
        }
        $session_id = $session->session_id;
        // wait until training process done
        while ($session = $facepp_api->info_get_session($session_id)) {
            sleep(1);
            if (!empty($session->status)) {
                if ($session->status != "INQUEUE")
                    break;
            }
        }
        // done
        return true;
    }

    function facepp_search($image_url, $group_name = null) {
        set_time_limit(0);
        $facepp_api = new FacePPClientDemo($this->_facepp_api_key, $this->_facepp_api_secret);

        $result_data = array();
        if(empty($group_name) || $group_name=='') {
            $result_1 = $this->facepp_search($image_url, "Male");
            $result_2 = $this->facepp_search($image_url, "Female");
            $result_data = $result_1 + $result_2;
        } else {
            // recognition in both group
            $result = $facepp_api->recognition_identify($image_url, $group_name);

            // skip errors
            if (empty($result->face))
                return false;
            // skip photo with multiple faces
            if (count($result->face) > 1)
                return false;
            $face = $result->face[0];
            // skip if no person returned
            if (count($face->candidate) < 1)
                return false;

            foreach ($face->candidate as $candidate) {
                $result_data[$candidate->person_name] = $candidate->confidence;
            }
        }
        arsort($result_data);
        return $result_data;
    }

    public function facepp_delete_person($person_id){
        $facepp_api = new FacePPClientDemo($this->_facepp_api_key, $this->_facepp_api_secret);
        $facepp_api->person_delete($person_id);
        return true;
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

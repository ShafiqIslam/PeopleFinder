<?php
App::uses('AppController', 'Controller');
App::uses('UsersController', 'Controller');

class ReportersController extends AppController {

	public $components = array('Paginator', 'Session');

	public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('signup', 'login', 'verify', 'is_mail_exist', 'forgot_password', 'recover_password', 'logout', 'myaccount', 'my_reports', 'change_pass', 'upload_image','create_report', 'get_name');
    
        if(!$this->params['admin']){
            $page = $subpage = $title_for_layout = "report";
			$this->set(compact('page', 'subpage', 'title_for_layout'));
			$this->layout = 'public';
        }
    }

	public function admin_index() {
		$conditions = array();
        $keyword = null;
        if(!empty($this->request->params['named']['keyword'])) {
            $keyword = $this->request->params['named']['keyword'];
            if (!empty($keyword)) {
                $conditions = am($conditions, array(
                        'OR' => array(
                            'Reporter.first_name LIKE' => '%' . $keyword . '%',
                            'Reporter.second_name LIKE' => '%' . $keyword . '%',
                            'Reporter.last_name LIKE' => '%' . $keyword . '%',
                            'Reporter.email LIKE' => '%' . $keyword . '%'
                        )
                    )
                );
            } 
        }
               
        $this->Reporter->recursive = 0;
        $this->paginate = array('all',
            'limit' => 10,
            'order' => array('Reporter.id_image_link_1' => 'DESC', 'Reporter.created' => 'DESC'),
            'conditions' => $conditions
        );
        $this->set('reporters', $this->Paginator->paginate());
        $this->set('keyword', $keyword);
	}

	/*public function admin_view($id = null) {
		if (!$this->Reporter->exists($id)) {
			throw new NotFoundException(__('Invalid reporter'));
		}
		$options = array('conditions' => array('Reporter.' . $this->Reporter->primaryKey => $id));
		$this->set('reporter', $this->Reporter->find('first', $options));
	}

	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Reporter->create();
			if ($this->Reporter->save($this->request->data)) {
				$this->Session->setFlash(__('The reporter has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The reporter could not be saved. Please, try again.'));
			}
		}
	}*/

	public function admin_edit($id = null) {
		if (!$this->Reporter->exists($id)) {
			throw new NotFoundException(__('Invalid reporter'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Reporter->save($this->request->data)) {
				$this->Session->setFlash(__('The reporter has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The reporter could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Reporter.' . $this->Reporter->primaryKey => $id));
			$this->request->data = $this->Reporter->find('first', $options);
		}
	}

	public function admin_accept_id_document ($id) {
		$this->Reporter->id = $id;
		if (!$this->Reporter->exists()) {
			throw new NotFoundException(__('Invalid reporter'));
		}
		$data['Reporter']['account_type'] = "Verified";
		$this->Reporter->id = $id;
		if($this->Reporter->save($data)) {
			$this->Session->setFlash(__('The reporter has been saved.'));
		} else {
			$this->Session->setFlash(__('The reporter could not be saved. Please, try again.'));
		}
		return $this->redirect(array('action' => 'edit', $id));
	}

	public function admin_revoke_type ($id) {
		$this->Reporter->id = $id;
		if (!$this->Reporter->exists()) {
			throw new NotFoundException(__('Invalid reporter'));
		}
		$data['Reporter']['account_type'] = "Rejected";
		$this->Reporter->id = $id;
		if($this->Reporter->save($data)) {
			$this->Session->setFlash(__('The reporter has been saved.'));
		} else {
			$this->Session->setFlash(__('The reporter could not be saved. Please, try again.'));
		}
		return $this->redirect(array('action' => 'edit', $id));
	}

	public function admin_delete($id = null) {
		$this->Reporter->id = $id;
		if (!$this->Reporter->exists()) {
			throw new NotFoundException(__('Invalid reporter'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Reporter->delete()) {
			$this->Session->setFlash(__('The reporter has been deleted.'));
		} else {
			$this->Session->setFlash(__('The reporter could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

	/*
	*
	*	Public/Front End Functions
	*
	*/

	public function login() {
		if($this->request->is('post')) {
			$options = array(
				'conditions' => array(
					'Reporter.email' => $this->request->data['Reporter']['email'], 
					'Reporter.password' => $this->Auth->password($this->request->data['Reporter']['password']),
					'Reporter.email_verified' => 1
				)
			);
			$reporter = $this->Reporter->find('first', $options);
			if(empty($reporter)) {
				$login_fail = true;
				$this->set(compact('login_fail'));
			} else {
				$data['id'] = $reporter['Reporter']['id'];
				$first_name = !empty($reporter['Reporter']['first_name']) ? $reporter['Reporter']['first_name'] : "";
				$second_name = !empty($reporter['Reporter']['second_name']) ? $reporter['Reporter']['second_name'] : "";
				$last_name = !empty($reporter['Reporter']['last_name']) ? $reporter['Reporter']['last_name'] : "";
				$name = $first_name . " " . $second_name . " " . $last_name;
				$data['name'] = $name;
				$data['is_admin'] = false;
				$this->Session->write('logged_user', $data);
				return $this->redirect(array('controller'=>'pages', 'action' => 'display', "home"));
			}	
		}
	}

	public function logout() {
		$this->Session->delete('logged_user');
		return $this->redirect(array('controller'=>'pages', 'action' => 'display', "home"));
	}

	public function forgot_password() {
		if($this->request->is('post')) {
			$options = array(
				'conditions' => array(
					'Reporter.email' => $this->request->data['Reporter']['email'],
					'Reporter.email_verified' => 1
				)
			);
			$reporter = $this->Reporter->find('first', $options);

			if(empty($reporter)) {
				$email_exist = false;
				$email = null;
			} else {
				$email_exist = true;
				$id = $reporter['Reporter']['id'];
				$email = $reporter['Reporter']['email'];
				$first_name = !empty($reporter['Reporter']['first_name']) ? $reporter['Reporter']['first_name'] : "";
				$second_name = !empty($reporter['Reporter']['second_name']) ? $reporter['Reporter']['second_name'] : "";
				$last_name = !empty($reporter['Reporter']['last_name']) ? $reporter['Reporter']['last_name'] : "";
				$name = $first_name . " " . $second_name . " " . $last_name;

				// generate new token and save it to database
				$data['Reporter']['email_verification_token'] = $token = $this->random_string(16,1,1);
				$this->Reporter->id = $id;
				$this->Reporter->save($data);

				$this->_send_recovery_mail($email, $token, $id, $name);
			}
			$this->set(compact('email_exist','email'));
		}
	}

	public function signup() {
		if(!$this->request->is('post')) {
			return $this->redirect(array('controller'=>'pages', 'action' => 'display', "signup"));
		}
		$verified = 0;

		$processed_data = $this->_process_images($this->request->data);
		#AuthComponent::_setTrace($processed_data);

		if(is_array($processed_data)) {
			$verified = 1;
			$this->request->data = $processed_data;
		}

        $this->request->data['Reporter']['password'] = $this->Auth->password($this->request->data['Reporter']['password']);
        $this->request->data['Reporter']['email_verified'] = false;
        $this->request->data['Reporter']['account_type'] = "Normal";
        $this->request->data['Reporter']['is_blacklisted'] = false;
        $token = $this->request->data['Reporter']['email_verification_token'] = $this->random_string(16,1,1);

		$this->Reporter->create();
		if ($this->Reporter->save($this->request->data)) {
			$first_name = !empty($this->request->data['Reporter']['first_name']) ? $this->request->data['Reporter']['first_name'] : "";
			$second_name = !empty($this->request->data['Reporter']['second_name']) ? $this->request->data['Reporter']['second_name'] : "";
			$last_name = !empty($this->request->data['Reporter']['last_name']) ? $this->request->data['Reporter']['last_name'] : "";
			
			$id = $this->Reporter->id;
			$name = $first_name . " " . $second_name . " " . $last_name;
			$email = $this->request->data['Reporter']['email'];

			$success = $this->_send_verification_mail($email, $token, $id, $name);
			if($verified) {				
				$user = new UsersController;
				$admin_email = $user->get_admin_email();
            	$this->_send_notification_mail($admin_email, 'Admin', $id);
			}

			$this->set(compact('email', 'success'));
			$this->render('signup_thanks');
		} else {
			$this->Session->setFlash(__('The reporter could not be saved. Please, try again.'), 'default', array('class' => 'error'));
			return $this->redirect(array('controller'=>'pages', 'action' => 'display', "signup"));
		}
	}

	public function is_mail_exist($mail) {
		$this->autoRender = false;
		$this->autoLayout = false;
		header('Content-Type: application/json');

		$options = array('conditions' => array('Reporter.email' => $mail));
		$reporter = $this->Reporter->find('first', $options);
		if(empty($reporter)) {
			die(json_encode(array('exist' => false)));
		} else {
			die(json_encode(array('exist' => true)));
		}
	} 

	public function verify($id=null, $token=null) {
		if($id==null || $token==null) {
			$this->Session->setFlash(__('Bad Request.'), 'default', array('class' => 'error'));
			return $this->redirect(array('controller'=>'pages', 'action' => 'display', "home"));
		}

		$options = array('conditions' => array('Reporter.id' => $id, 'Reporter.email_verification_token' => $token));
		$reporter = $this->Reporter->find('first', $options);
		if(empty($reporter)) {
			$success = false;
		} else {
			$success = true;
			$this->Reporter->id = $id;
			$data['Reporter']['email_verified'] = true;
			$this->Reporter->save($data);
		}
		$this->set(compact('success'));
	}

	public function recover_password($id=null, $token=null) {
		if($id==null || $token==null) {
			$this->Session->setFlash(__('Bad Request.'), 'default', array('class' => 'error'));
			return $this->redirect(array('controller'=>'pages', 'action' => 'display', "home"));
		}

		$options = array('conditions' => array('Reporter.id' => $id, 'Reporter.email_verification_token' => $token));
		$reporter = $this->Reporter->find('first', $options);
		if(empty($reporter)) {
			$this->Session->setFlash(__('Bad Request.'), 'default', array('class' => 'error'));
			return $this->redirect(array('controller'=>'pages', 'action' => 'display', "home"));
		} else {
			if($this->request->is('post')) {
				$this->request->data['Reporter']['password'] = $this->Auth->password($this->request->data['Reporter']['password']);
				$this->Reporter->id = $id;
				if($this->Reporter->save($this->request->data)) {
					$success = true;
				} else {
					$success = false;
				}
				$is_post = true;
			} else {
				$success = false;
				$is_post = false;
			}
		}

		$page = $subpage = $title_for_layout = null;
		$this->set(compact('page', 'subpage', 'title_for_layout'));
		$this->set(compact('success', 'is_post'));

		$this->layout = 'public';
	}

	public function myaccount() {
		$page = $subpage = $title_for_layout = 'my_account';
		$this->set(compact('page', 'subpage', 'title_for_layout'));

	}
	public function create_report() {
		$page = $subpage = $title_for_layout = 'my_account';
		$this->set(compact('page', 'subpage', 'title_for_layout'));

	}

	public function my_reports() {
		$page = $subpage = $title_for_layout = 'my_account';
		$this->set(compact('page', 'subpage', 'title_for_layout'));

		$logged_user = $this->Session->read('logged_user');
		if(empty($logged_user)) {
			return $this->redirect(array('controller'=>'reporters', 'action' => 'login'));
		}

		$id = $logged_user['id'];
		$this->Reporter->recursive = 1;
		$reporter = $this->Reporter->findById($id);
		$my_profiles = $reporter['Profile'];

		$this->set(compact('my_profiles'));
	}

	public function change_pass() {
		$page = $subpage = $title_for_layout = 'my_account';
		$this->set(compact('page', 'subpage', 'title_for_layout'));

		$logged_user = $this->Session->read('logged_user');
		if(empty($logged_user)) {
			return $this->redirect(array('controller'=>'reporters', 'action' => 'login'));
		}

		$id = $logged_user['id'];
		$this->Reporter->recursive = 0;
		$reporter = $this->Reporter->findById($id);

		if($this->request->is('post')) {
			$old_password = $this->Auth->password($this->request->data['Reporter']['password_old']);
			if($reporter['Reporter']['password'] != $old_password) {
				$success = 10;
			} else {
				$this->request->data['Reporter']['password'] = $this->Auth->password($this->request->data['Reporter']['password']);
				$this->Reporter->id = $id;
				$this->Reporter->save($this->request->data);
				$success = 20;
			}
			$this->set(compact('success'));
		}
		//echo $success; die();
	}

	/*
	*
	*	Internal use functions
	*
	*/

	private function _send_recovery_mail($mail, $token, $id, $name) {
		$verification_link = "http://" . $_SERVER['HTTP_HOST'] . $this->webroot . "reporters/recover_password/" . $id . "/" . $token;
		$subject = "Face Finder Password Recovery Mail";
		$body = "";

		$body .= '<html>';
		$body .= '	<body>';
		$body .= '		<div style="width: 700px; margin:0 auto; border: 2px solid #ededed; border-radius: 7px;">';
        $body .= '			<h2  style="font-size: 30px;text-align: center;background-color: #ededed;padding: 20px 0px;margin-top: 0px;">Thanks for using FaceFinder</h2>';
        $body .= '			<div style="padding: 20px;">';
        $body .= '				<strong style="font-size: 20px;">Hello, ' . $name . ' </strong>';
        $body .= '				<br><br>';
        $body .= '				<p style="font-size: 15px;">Please, click on the link below to reset your password.</p>';
        $body .= '				<a style="font-size: 15px;" href="' . $verification_link . '">' . $verification_link . '</a>';
        $body .= '				<br><br>';
        $body .= '				<p style="font-size: 15px;">If you don\'t know anything about this email. Please just ignore it.';
        $body .= '				<br><br><br>';
        $body .= '				<p style="font-size: 20px;">Cordially,<br/>';
        $body .= '				<strong style="font-size: 17px;">Face Finder Team</strong>';
        $body .= '				<br><br>';
        $body .= '				<img src="' . $this->webroot . 'img/logo_2.png" alt="Logo" />';
        $body .= '				<br><br>';
        $body .= '			</div>';
        $body .= '		</div>';
        $body .= '	</body>';
        $body .= '</html>';

        $plain_body = "Thanks for using FaceFinder. Please, click on the link below to verify your mail.";
        $plain_body .= "<a href=\"$verification_link\">$verification_link</a>";

        if($this->send_mail($mail, $name, $subject, $body, $plain_body)) {
            return true;
        } else {
            return false;
        }
	}

	private function _send_verification_mail($mail, $token, $id, $name) {
		$verification_link = "http://" . $_SERVER['HTTP_HOST'] . $this->webroot . "reporters/verify/" . $id . "/" . $token;
		$subject = "Face Finder SignUp Verification Mail";
		$body = "";

		$body .= '<html>';
		$body .= '	<body>';
		$body .= '		<div style="width: 700px; margin:0 auto; border: 2px solid #ededed; border-radius: 7px;">';
        $body .= '			<h2 style="font-size: 30px;text-align: center;background-color: #ededed;padding: 20px 0px;margin-top: 0px;">Thanks for using FaceFinder</h2>';
        $body .= '			<div style="padding: 20px;">';
        $body .= '				<strong style="font-size: 20px;">Hello, ' . $name . ' </strong>';
        $body .= '				<br><br>';
        $body .= '				<p style="font-size: 15px;">We are very glad to have a member like you in our community. Please, click on the link below to verify your mail.</p>';
        $body .= '				<a style="font-size: 15px;" href="' . $verification_link . '">' . $verification_link . '</a>';
        $body .= '				<br><br>';
        $body .= '				<p style="font-size: 15px;">If you don\'t know anything about this email. Please just ignore it.';
        $body .= '				<br><br><br>';
        $body .= '				<p style="font-size: 20px;">Cordially,<br/>';
        $body .= '				<strong style="font-size: 17px;">Face Finder Team</strong>';
        $body .= '				<br><br>';
        $body .= '				<img src="' . $this->webroot . 'img/logo_2.png" alt="Logo" />';
        $body .= '				<br><br>';
        $body .= '			</div>';
        $body .= '		</div>';
        $body .= '	</body>';
        $body .= '</html>';

        $plain_body = "Thanks for using FaceFinder. Please, click on the link below to verify your mail.";
        $plain_body .= "<a href=\"$verification_link\">$verification_link</a>";

        if($this->send_mail($mail, $name, $subject, $body, $plain_body)) {
            return true;
        } else {
            return false;
        }
	}

	private function _send_notification_mail($mail, $name, $reporter_id) {
        $reporter_link = "http://" . $_SERVER['HTTP_HOST'] . $this->webroot . "admin/reporters/edit/" . $reporter_id;
        $subject = "Face Finder New Verified Reporter";
        $body = "";

        $body .= '<html>';
        $body .= '  <body>';
        $body .= '      <div style="width: 700px; margin:0 auto; border: 2px solid #ededed; border-radius: 7px;">';
        $body .= '          <h2  style="font-size: 30px;text-align: center;background-color: #ededed;padding: 20px 0px;margin-top: 0px;">Thanks for using FaceFinder</h2>';
        $body .= '          <div style="padding: 20px;">';
        $body .= '              <strong style="font-size: 20px;">Hello, ' . $name . ' </strong>';
        $body .= '              <br><br>';
        $body .= '              <p style="font-size: 15px;">There is a new reporter account created which has submitted an id. Please have a look on to the request.</p>';
        $body .= '              <a style="font-size: 15px;" href="' . $reporter_link . '">'. $reporter_link .'</a>';
        $body .= '              <br><br>';
        $body .= '              <p style="font-size: 15px;">If you don\'t know anything about this email. Please just ignore it.';
        $body .= '              <br><br><br>';
        $body .= '              <p style="font-size: 20px;">Cordially,<br/>';
        $body .= '              <strong style="font-size: 17px;">Face Finder Team</strong>';
        $body .= '              <br><br>';
        $body .= '              <img src="' . $this->webroot . 'img/logo_2.png" alt="Logo" />';
        $body .= '              <br><br>';
        $body .= '          </div>';
        $body .= '      </div>';
        $body .= '  </body>';
        $body .= '</html>';

        $plain_body = "Your password is: $password. ";
        $plain_body .= "<a target=\"_blank\" href=\"$login_link\">Login now</a>";

        if($this->send_mail($mail, $name, $subject, $body, $plain_body)) {
            return true;
        } else {
            return false;
        }
    }

	public function is_blacklisted($id) {
		if (!$this->Reporter->exists($id)) {
			throw new NotFoundException(__('Invalid reporter'));
		}

		$options = array('conditions' => array('Reporter.id' => $id));
		$reporter = $this->Reporter->find('first', $options);

		return $reporter['Reporter']['is_blacklisted'];
	}

	private function _process_images ($data) {
		unset($data['Reporter']['images']);

		// process image and upload to cloudinary
		$files = array();
		if(!empty($data['Reporter']['image_links_1'])) {
			array_push($files, $data['Reporter']['image_links_1']);
		}
		if(!empty($data['Reporter']['image_links_2'])) {
			array_push($files, $data['Reporter']['image_links_2']);
		}
		if(!empty($data['Reporter']['image_links_3'])) {
			array_push($files, $data['Reporter']['image_links_3']);
		}
		if(!empty($files)) {
			$links = $this->upload_to_cloud($files, $data['Reporter']['gender']);
			if(!empty($links)) {
				$data['Reporter']['id_image_link_1'] = empty($links[0]) ? '' : $links[0];
				$data['Reporter']['id_image_link_2'] = empty($links[1]) ? '' : $links[1];
				$data['Reporter']['id_image_link_3'] = empty($links[2]) ? '' : $links[2];
			}
		} else return false;

		unset($data['Reporter']['image_links_1'], $data['Reporter']['image_links_2'], $data['Reporter']['image_links_3']);

		// delete all from server (security)
		$files = glob('files/uploads/*'); // get all file names
		foreach($files as $file){ // iterate files
			if(is_file($file))
				unlink($file); // delete file
		}

		return $data;
	}

	public function upload_image() {
		if($this->request->is('post')) {
			if (!empty($this->request->data['Reporter']['images']['name'])) {
				$file_name = $this->_upload($this->request->data['Reporter']['images'], 'uploads');
				#AuthComponent::_setTrace($file_name);
				$res = "Successfully uploaded " . $this->request->data['Reporter']['images']['name'];
				die(json_encode(array('response' => $res, 'filename' => $file_name)));
			} else die(json_encode(array('error'=>'No files found for upload.')));
		}
	}

	public function get_name($id) {
		$options = array('conditions' => array('Reporter.id' => $id));
		$reporter = $this->Reporter->find('first', $options);

		$first_name = !empty($reporter['Reporter']['first_name']) ? $reporter['Reporter']['first_name'] : "";
		$second_name = !empty($reporter['Reporter']['second_name']) ? $reporter['Reporter']['second_name'] : "";
		$last_name = !empty($reporter['Reporter']['last_name']) ? $reporter['Reporter']['last_name'] : "";
		$name = $first_name . " " . $second_name . " " . $last_name;

		return $name;
	}
}

<?php
App::uses('AppController', 'Controller');

class ReportersController extends AppController {

	public $components = array('Paginator', 'Session');

	public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('signup', 'login', 'verify', 'is_mail_exist');
    }

	public function admin_index() {
		$this->Reporter->recursive = 0;
		$this->set('reporters', $this->Paginator->paginate());
	}

	public function admin_view($id = null) {
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
	}

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

	public function signup() {
		if(!$this->request->is('post')) {
			return $this->redirect(array('controller'=>'pages', 'action' => 'display', "signup"));
		}

		if (!empty($this->request->data['Reporter']['document_id']['name'])) {
            $file_name = $this->_upload($this->request->data['Reporter']['document_id'], 'uploads');
            $this->request->data['Reporter']['document_id'] = $file_name;            

            // send admin an email

        } else {
            unset($this->request->data['Reporter']['document_id']);
        }

        $this->request->data['Reporter']['password'] = $this->Auth->password($this->request->data['Reporter']['password']);
        $this->request->data['Reporter']['email_verified'] = false;
        $this->request->data['Reporter']['account_type'] = "Normal";
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
			/*if(!$success) {
				$this->Reporter->delete();
			}*/			

			$page = $subpage = $title_for_layout = null;
			$this->set(compact('page', 'subpage', 'title_for_layout'));
			$this->set(compact('email', 'success'));

			$this->layout = 'public';
			$this->render('signup_thanks');
		} else {
			$this->Session->setFlash(__('The reporter could not be saved. Please, try again.'), 'default', array('class' => 'error'));
			return $this->redirect(array('controller'=>'pages', 'action' => 'display', "signup"));
		}
	}

	private function _send_verification_mail($mail, $token, $id, $name) {
		$verification_link = "http://" . $_SERVER['HTTP_HOST'] . $this->webroot . "reporters/verify/" . $id . "/" . $token;
		$subject = "Face Finder SignUp Verification Mail";
		$body = "";

		$body .= '<html>';
		$body .= '	<body>';
        $body .= '		<h2>Thanks for using FaceFinder.</h2>';
        $body .= '		<strong>Hello, ' . $name . ' </strong>';
        $body .= '		<br><br>';
        $body .= '		<p>We are very glad to have a member like you in our community. Please, click on the link below to verify your mail.</p>';
        $body .= '		<a href="' . $verification_link . '">' . $verification_link . '</a>';
        $body .= '		<br><br>';
        $body .= '		<p>If you don\'t know anything about this email. Please just ignore it.';
        $body .= '		<br><br><br>';
        $body .= '		<p>Cordially,<br/>';
        $body .= '		<strong>Face Finder Team</strong>';
        $body .= '		<br>';
        $body .= '		<img src="' . $this->webroot . 'img/logo_2.png" alt="Logo" />';
        $body .= '		<br><br>';
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

	public function verify($id, $token) {
		AuthComponent::_setTrace(array($id,$token));
	}
}

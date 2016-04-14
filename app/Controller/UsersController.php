<?php
App::uses('AppController', 'Controller');

class UsersController extends AppController {

	public $components = array('Paginator', 'Session');

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('admin_forgot_password', 'send_message');
        
    }

	public function admin_index() {
        $logged_user = $this->Session->read('logged_user');
        if($logged_user['role'] != 'admin') {
            return $this->redirect(array('action' => 'dashboard'));
        }

        $conditions = array();
        $keyword = null;
        if(!empty($this->request->params['named']['keyword'])) {
            $keyword = $this->request->params['named']['keyword'];
            if (!empty($keyword)) {
                $conditions = am($conditions, array(
                        'OR' => array(
                            'User.email LIKE' => '%' . $keyword . '%',
                            'User.role LIKE' => '%' . $keyword . '%'
                        )
                    )
                );
            } 
        }
               
        $this->User->recursive = 0;
        $this->paginate = array('all',
            'limit' => 10,
            'conditions' => $conditions,
        );

        $this->set('users', $this->Paginator->paginate());
        $this->set('keyword', $keyword);
	}

	public function admin_add() {
        $logged_user = $this->Session->read('logged_user');
        if($logged_user['role'] != 'admin') {
            return $this->redirect(array('action' => 'dashboard'));
        }

		if ($this->request->is('post')) {
			if(!empty($this->request->data['User']['simple_pwd'])){
                $this->request->data['User']['simple_pwd'] = $this->request->data['User']['simple_pwd'];
                $this->request->data['User']['password'] = AuthComponent::password($this->request->data['User']['simple_pwd']);
            }
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		}
	}

	public function admin_edit($id = null) {
        $logged_user = $this->Session->read('logged_user');
        if($logged_user['role'] != 'admin') {
            if($logged_user['id'] != $id) {
                return $this->redirect(array('action' => 'dashboard'));
            }
        }
        $this->set(compact('logged_user', 'id'));

		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}        

		if ($this->request->is(array('post', 'put'))) {
			if(!empty($this->request->data['User']['simple_pwd'])){
                $this->request->data['User']['simple_pwd'] = $this->request->data['User']['simple_pwd'];
                $this->request->data['User']['password'] = AuthComponent::password($this->request->data['User']['simple_pwd']);
            }
            $this->User->id = $id;
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
            $this->request->data = $this->User->find('first', $options);
		}
	}

	public function admin_delete($id = null) {
        $logged_user = $this->Session->read('logged_user');
        if($logged_user['role'] != 'admin') {
            if($logged_user['id'] != $id) {
                return $this->redirect(array('action' => 'dashboard'));
            }
            $this->User->id = $id;
            if ($this->User->delete()) {
                $this->Session->setFlash(__('The user has been deleted.'));
            } else {
                $this->Session->setFlash(__('The user could not be deleted. Please, try again.'));
            }
            return $this->redirect(array('action' => 'logout'));
        }

		$this->User->id = $id;
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->User->delete()) {
			$this->Session->setFlash(__('The user has been deleted.'));
		} else {
			$this->Session->setFlash(__('The user could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

	public function admin_login(){
        if($this->request->is('post')){
            $password = AuthComponent::password($this->request->data['User']['password']);
            $query = array(
                'conditions' => array(
                    'User.email' => $this->request->data['User']['email'],
                    'User.password' => $password,
                ),
            );
            $is_exist = $this->User->find('first', $query);
            if(!empty($is_exist)){
                $this->Auth->login($this->request->data['User']);

                /*if ($this->request->data['User']['remember_me'] == 1) {
                    unset($this->request->data['User']['remember_me']);
                    $this->request->data['User']['password'] = $this->Auth->password($this->request->data['User']['password']);
                    $this->Cookie->write('remember_me_cookie', $this->request->data['User'], true, '2 weeks');
                }*/
                $data['id'] = $is_exist['User']['id'];
				$data['is_admin'] = true;
                $data['role'] = $is_exist['User']['role'];
				$this->Session->write('logged_user', $data);
                //$this->redirect(array('action' => 'dashboard','admin' => true));
                return $this->redirect( Router::url( $this->referer(), true ) );//for temporary
            } else {
                $this->Auth->logout();
                $this->Session->setFlash(__('Incorrect username or password, please try again.'), 'default', array('class' => 'error'));
            }
        }
    }

    public function admin_dashboard() {
        $user = $this->User->find('count');
        $this->set(compact('user'));
    }

    public function admin_forgot_password() {
        if($this->request->is('post')) {
            $options = array(
                'conditions' => array(
                    'User.email' => $this->request->data['User']['email']
                )
            );
            $user = $this->User->find('first', $options);

            if(empty($user)) {
                $this->Session->setFlash(__('Email address not found.'), 'default', array('class' => 'error'));
            } else {
                $email_exist = true;
                $email = $user['User']['email'];
                $password = $user['User']['simple_pwd'];

                if($this->_send_recovery_mail($email, $password)) {
                    $this->Session->setFlash(__('Your password has been sent to '. $email), 'default', array('class' => 'valid'));
                }
            }
        }
    }


    public function admin_logout() {
        $this->Session->delete('logged_user');
        return $this->redirect($this->Auth->logout());
    }

    /*
    *
    *   Internal use functions
    *
    */

    private function _send_recovery_mail($mail, $password) {
        $login_link = "http://" . $_SERVER['HTTP_HOST'] . $this->webroot . "admin";
        $subject = "Face Finder Admin Password Recovery Mail";
        $body = "";
        $name = "admin";

        $body .= '<html>';
        $body .= '  <body>';
        $body .= '      <div style="width: 700px; margin:0 auto; border: 2px solid #ededed; border-radius: 7px;">';
        $body .= '          <h2  style="font-size: 30px;text-align: center;background-color: #ededed;padding: 20px 0px;margin-top: 0px;">Thanks for using FaceFinder</h2>';
        $body .= '          <div style="padding: 20px;">';
        $body .= '              <strong style="font-size: 20px;">Hello, ' . $name . ' </strong>';
        $body .= '              <br><br>';
        $body .= '              <p style="font-size: 15px;">Your password is: <strong>' .  $password . '</strong> .</p>';
        $body .= '              <a style="font-size: 15px;" href="' . $login_link . '">Login now</a>';
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

    public function get_admin_email() {
        $options = array(
            'conditions' => array(
                'User.role' => 'admin'
            )
        );
        $admin = $this->User->find('first', $options);

        return $admin['User']['email'];
    }

    public function send_message() {
        $this->autoRender = false;
        $this->autoLayout = false;
        header('Content-Type: application/json');

        if($this->request->is('post')) {
            $mail = $this->get_admin_email();
            $message = $this->request->data['message'];
            $from = $this->request->data['email'];
            $from_name = $this->request->data['name'];
            if($this->_send_message_mail($mail, $message, $from, $from_name)) {
                die(json_encode(array('success' => true, 'msg' => 'Your message has been sent successfully. We\'ll get to it soon.')));
            } else die(json_encode(array('success' => false, 'msg' => 'Something bad happened!!! Please, try again.' )));
        } else die(json_encode(array('success' => false, 'msg' => 'Invalid Request')));
    }

    private function _send_message_mail($mail, $message, $from, $from_name) {
        $subject = "Face Finder Message";
        $body = "";

        $body .= '<html>';
        $body .= '  <body>';
        $body .= '      <div style="width: 700px; margin:0 auto; border: 2px solid #ededed; border-radius: 7px;">';
        $body .= '          <div style="padding: 20px;">';
        $body .= '              <strong style="font-size: 20px;">Hello, Admin </strong>';
        $body .= '              <br><br>';
        $body .= '              <p style="font-size: 15px;">You have new message from: ' . $from_name . ' (' . $from . ')</p>';
        $body .= '              <br>';
        $body .= '              <p style="font-size: 15px; background: #eee; padding: 5px">' . $message . '</p>';
        $body .= '              <br><br>';
        $body .= '              <p style="font-size: 15px;">If you don\'t know anything about this email. Please just ignore it.';
        $body .= '          </div>';
        $body .= '      </div>';
        $body .= '  </body>';
        $body .= '</html>';

        $plain_body = "You have new message from: $from_name ($from)\n";
        $plain_body .= $message;

        if($this->send_mail($mail, 'Admin', $subject, $body, $plain_body)) {
            return true;
        } else {
            return false;
        }
    }
}

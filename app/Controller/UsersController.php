<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class UsersController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session');

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->User->recursive = 0;
		$this->set('users', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
		$this->set('user', $this->User->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
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

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
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

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
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
				$this->Session->write('logged_user', $data);
                $this->redirect(array('action' => 'dashboard','admin' => true));
            } else {
                $this->Auth->logout();
                $this->Session->setFlash(__('Incorrect username or password, please try again.'), 'default', array('class' => 'error'));
            }
        }
    }

    public function admin_dashboard(){
        $user = $this->User->find('count');
        $this->set(compact('user'));
    }

    /*public function admin_forgot_password(){
        header('Content-Type: application/json');
        App::import('Vendor', 'ses', array('file' => 'ses' . DS . 'ses.php'));
        $ses = new SimpleEmailService('AKIAJG4VGASZ32MSUDKA', 'B2ITddLtTxm1V92YEs7fUzz+SQ/JEYvKMC6gmRMZ', 'email.eu-west-1.amazonaws.com');
        //$this -> autoLayout = false;
        if($this->request->is('post')){
            $mail = $this->request->data['User']['email'];
            $user = $this->User->findByEmail($mail);
            if(!empty($user)){
                $password = $user['User']['simple_password'];
                $m = new SimpleEmailServiceMessage();
                $m->addTo($this->request->data['User']['email']);
                $m->setFrom('hello@tradecarlink.com');
                $m->setSubject('Capptain\'s Ritches - Password Request');
                $body = $password;
                $plainTextBody = '';

                $m->setMessageFromString($plainTextBody,$body);
                //$ses->sendEmail($m);
                //try{
                //    if($ses->sendEmail($m)){
                //        $this->Session->setFlash(__('Your password has been sent to '. $mail), 'default', array('class' => 'valid'));
                //    }
                //} catch(Exception $e){
                //
                //}
            } else {
                $this->Session->setFlash(__('Email address not found.'), 'default', array('class' => 'error'));
            }
        }
    }*/

    public function admin_logout()
    {
        return $this->redirect($this->Auth->logout());
    }
}

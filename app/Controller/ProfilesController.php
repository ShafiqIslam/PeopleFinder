<?php
App::uses('AppController', 'Controller');
App::uses('ReportersController', 'Controller');

class ProfilesController extends AppController {

	public $components = array('Paginator', 'Session');

	public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('report_missing', 'report_found', 'blacklisted');

		$page = $subpage = $title_for_layout = "report";
		$this->set(compact('page', 'subpage', 'title_for_layout'));
		$this->layout = 'public';
    }

	public function admin_index() {
		$this->Profile->recursive = 0;
		$this->set('profiles', $this->Paginator->paginate());
	}

	public function admin_view($id = null) {
		if (!$this->Profile->exists($id)) {
			throw new NotFoundException(__('Invalid profile'));
		}
		$options = array('conditions' => array('Profile.' . $this->Profile->primaryKey => $id));
		$this->set('profile', $this->Profile->find('first', $options));
	}

	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Profile->create();
			if ($this->Profile->save($this->request->data)) {
				$this->Session->setFlash(__('The profile has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The profile could not be saved. Please, try again.'));
			}
		}
		$reporters = $this->Profile->Reporter->find('list');
		$users = $this->Profile->User->find('list');
		$this->set(compact('reporters', 'users'));
	}

	public function admin_edit($id = null) {
		if (!$this->Profile->exists($id)) {
			throw new NotFoundException(__('Invalid profile'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Profile->save($this->request->data)) {
				$this->Session->setFlash(__('The profile has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The profile could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Profile.' . $this->Profile->primaryKey => $id));
			$this->request->data = $this->Profile->find('first', $options);
		}
		$reporters = $this->Profile->Reporter->find('list');
		$users = $this->Profile->User->find('list');
		$this->set(compact('reporters', 'users'));
	}

	public function admin_delete($id = null) {
		$this->Profile->id = $id;
		if (!$this->Profile->exists()) {
			throw new NotFoundException(__('Invalid profile'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Profile->delete()) {
			$this->Session->setFlash(__('The profile has been deleted.'));
		} else {
			$this->Session->setFlash(__('The profile could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

	/*
	*
	*	Public/Front End Functions
	*
	*/

	private function _check_user() {
		$logged_user = $this->Session->read('logged_user');
		if(empty($logged_user)) {
			return $this->redirect(array('controller'=>'reporters', 'action' => 'login'));
		}

		$reporter_obj = new ReportersController();
		if($reporter_obj->is_blacklisted($logged_user['id'])) {
			return $this->redirect(array('action' => 'blacklisted'));
		}

		return true;
	}

	public function blacklisted() {
		
	}

	public function report_missing() {
		$this->_check_user();

		if($this->request->is('post')) {
			AuthComponent::_setTrace($this->request->data);
		}
	}

	public function report_found() {
		$this->_check_user();

		if($this->request->is('post')) {
			AuthComponent::_setTrace($this->request->data);
		}
	}
}

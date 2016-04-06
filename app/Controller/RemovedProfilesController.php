<?php
App::uses('AppController', 'Controller');

class RemovedProfilesController extends AppController {

	public $components = array('Paginator', 'Session');

	public function admin_index() {
		$keyword = null;
		$conditions = array();
		if(!empty($this->request->params['named']['keyword'])) {
			$keyword = $this->request->params['named']['keyword'];
			if (!empty($keyword)) {
				$conditions = am($conditions, array(
						'OR' => array(
							'RemovedProfile.first_name LIKE' => '%' . $keyword . '%',
							'RemovedProfile.second_name LIKE' => '%' . $keyword . '%',
							'RemovedProfile.last_name LIKE' => '%' . $keyword . '%',
							'RemovedProfile.missing_country LIKE' => '%' . $keyword . '%',
							'RemovedProfile.missing_city LIKE' => '%' . $keyword . '%',
							'RemovedProfile.gender LIKE' => '%' . $keyword . '%',
							'RemovedProfile.person_status LIKE' => '%' . $keyword . '%'
						)
					)
				);
			}
		}

		$this->RemovedProfile->recursive = 0;
		$this->paginate = array('all',
			'limit' => 10,
			'order' => array('RemovedProfile.created' => 'DESC'),
			'conditions' => $conditions
		);
		$this->set('profiles', $this->Paginator->paginate());
		$this->set('keyword', $keyword);
	}

	public function admin_view($id = null) {
		if (!$this->RemovedProfile->exists($id)) {
			throw new NotFoundException(__('Invalid removed profile'));
		}
		$options = array('conditions' => array('RemovedProfile.' . $this->RemovedProfile->primaryKey => $id));
		$this->request->data = $this->RemovedProfile->find('first', $options);
	}

	/*public function admin_add() {
		if ($this->request->is('post')) {
			$this->RemovedProfile->create();
			if ($this->RemovedProfile->save($this->request->data)) {
				$this->Session->setFlash(__('The removed profile has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The removed profile could not be saved. Please, try again.'));
			}
		}
		$reporters = $this->RemovedProfile->Reporter->find('list');
		$users = $this->RemovedProfile->User->find('list');
		$this->set(compact('reporters', 'users'));
	}

	public function admin_edit($id = null) {
		if (!$this->RemovedProfile->exists($id)) {
			throw new NotFoundException(__('Invalid removed profile'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->RemovedProfile->save($this->request->data)) {
				$this->Session->setFlash(__('The removed profile has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The removed profile could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('RemovedProfile.' . $this->RemovedProfile->primaryKey => $id));
			$this->request->data = $this->RemovedProfile->find('first', $options);
		}
		$reporters = $this->RemovedProfile->Reporter->find('list');
		$users = $this->RemovedProfile->User->find('list');
		$this->set(compact('reporters', 'users'));
	}*/

	public function admin_delete($id = null) {
		$this->RemovedProfile->id = $id;
		if (!$this->RemovedProfile->exists()) {
			throw new NotFoundException(__('Invalid removed profile'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->RemovedProfile->delete()) {
			$this->Session->setFlash(__('The removed profile has been deleted.'));
		} else {
			$this->Session->setFlash(__('The removed profile could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}

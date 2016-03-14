<?php
App::uses('AppController', 'Controller');
/**
 * Reporters Controller
 *
 * @property Reporter $Reporter
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class ReportersController extends AppController {

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
		$this->Reporter->recursive = 0;
		$this->set('reporters', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Reporter->exists($id)) {
			throw new NotFoundException(__('Invalid reporter'));
		}
		$options = array('conditions' => array('Reporter.' . $this->Reporter->primaryKey => $id));
		$this->set('reporter', $this->Reporter->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
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

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
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

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
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
}

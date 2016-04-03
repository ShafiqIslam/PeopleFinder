<?php
App::uses('AppController', 'Controller');

class TestimonialsController extends AppController {

	public $components = array('Paginator', 'Session');

	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('add');

		if(!$this->params['admin']){
			$page = $subpage = $title_for_layout = "report";
			$this->set(compact('page', 'subpage', 'title_for_layout'));
			$this->layout = 'public';
		}
	}

	public function admin_index() {
		$this->Testimonial->recursive = 0;
		$this->set('testimonials', $this->Paginator->paginate());
	}

	public function admin_view($id = null) {
		if (!$this->Testimonial->exists($id)) {
			throw new NotFoundException(__('Invalid testimonial'));
		}
		$options = array('conditions' => array('Testimonial.' . $this->Testimonial->primaryKey => $id));
		$this->set('testimonial', $this->Testimonial->find('first', $options));
	}

	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Testimonial->create();
			if ($this->Testimonial->save($this->request->data)) {
				$this->Session->setFlash(__('The testimonial has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The testimonial could not be saved. Please, try again.'));
			}
		}
		$reporters = $this->Testimonial->Reporter->find('list');
		$this->set(compact('reporters'));
	}

	public function admin_edit($id = null) {
		if (!$this->Testimonial->exists($id)) {
			throw new NotFoundException(__('Invalid testimonial'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Testimonial->save($this->request->data)) {
				$this->Session->setFlash(__('The testimonial has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The testimonial could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Testimonial.' . $this->Testimonial->primaryKey => $id));
			$this->request->data = $this->Testimonial->find('first', $options);
		}
		$reporters = $this->Testimonial->Reporter->find('list');
		$this->set(compact('reporters'));
	}

	public function admin_delete($id = null) {
		$this->Testimonial->id = $id;
		if (!$this->Testimonial->exists()) {
			throw new NotFoundException(__('Invalid testimonial'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Testimonial->delete()) {
			$this->Session->setFlash(__('The testimonial has been deleted.'));
		} else {
			$this->Session->setFlash(__('The testimonial could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

	/*
	*
	*	Public/Front End Functions
	*
	*/

	public function add() {
		$logged = $this->Session->read('logged_user');
		$reporter_id = $logged['id'];

		$this->loadModel('Reporter');
		$reporter = $this->Reporter->findById($reporter_id);
		if($this->request->is('post')) {
			AuthComponent::_setTrace($this->request->data);
		}
		$this->set(compact('reporter'));
	}

	public function get_testimonials($limit) {
		$this->Testimonial->recursive = 1;
		$testimonials = $this->Testimonial->find('all',
			array(
				'conditions' => array('Testimonial.active' => 1),
				'limit' => $limit,
				'order' => 'Testimonial.created DESC'
			)
		);

		return $testimonials;
	}

}

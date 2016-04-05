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
							'Testimonial.testimonial LIKE' => '%' . $keyword . '%'
						)
					)
				);
			}
		}

		$this->Testimonial->recursive = 1;
		$this->paginate = array('all',
			'limit' => 10,
			'order' => array('Testimonial.active' => 'DESC'),
			'conditions' => $conditions
		);
		$this->set('testimonials', $this->Paginator->paginate());
		$this->set('keyword', $keyword);
	}

	public function admin_view($id = null) {
		if (!$this->Testimonial->exists($id)) {
			throw new NotFoundException(__('Invalid testimonial'));
		}
		$options = array('conditions' => array('Testimonial.' . $this->Testimonial->primaryKey => $id));
		$this->set('testimonial', $this->Testimonial->find('first', $options));
	}

	public function admin_activate($id = null) {
		if (!$this->Testimonial->exists($id)) {
			throw new NotFoundException(__('Invalid testimonial'));
		}

		$sql = "
		UPDATE `testimonials`
		SET `testimonials`.`active` = NOT `testimonials`.`active`
		WHERE `testimonials`.`id` = $id
		";

		$this->Testimonial->query($sql);
		$this->Session->setFlash(__('The testimonial has been changed.'));
		return $this->redirect(array('action' => 'index'));
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
		if(empty($logged)) {
			return $this->redirect(array('controller'=>'pages', 'action' => 'display', 'home'));
		}
		if($this->request->is('post')) {
			$this->request->data['Testimonial']['reporter_id'] = $logged['id'];

			$this->Testimonial->create();
			$this->Testimonial->save($this->request->data);
			return $this->redirect(array('controller'=>'reporters', 'action' => 'my_reports'));
		}
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

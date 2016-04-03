<?php
App::uses('AppController', 'Controller');
App::uses('ReportersController', 'Controller');

class ProfilesController extends AppController {

	public $components = array('Paginator', 'Session');

	public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('report_missing', 'report_found', 'upload_image', 'blacklisted', 'search', 'full_profile', 'edit', 'delete', 'test', 'found', 'maybe_found', 'missing');

        if(!$this->params['admin']){
            $page = $subpage = $title_for_layout = "report";
			$this->set(compact('page', 'subpage', 'title_for_layout'));
			$this->layout = 'public';
        }
		
    }

	public function admin_index() {
		$logged_user = $this->Session->read('logged_user');
		if($logged_user['role'] != 'admin') {
			$conditions = array('Profile.user_id' => $logged_user['id']);
		} else {
			$conditions = array();
		}

		$keyword = null;
		if(!empty($this->request->params['named']['keyword'])) {
			$keyword = $this->request->params['named']['keyword'];
			if (!empty($keyword)) {
				$conditions = am($conditions, array(
						'OR' => array(
							'Profile.first_name LIKE' => '%' . $keyword . '%',
							'Profile.second_name LIKE' => '%' . $keyword . '%',
							'Profile.last_name LIKE' => '%' . $keyword . '%',
							'Profile.missing_country LIKE' => '%' . $keyword . '%',
							'Profile.missing_city LIKE' => '%' . $keyword . '%',
							'Profile.gender LIKE' => '%' . $keyword . '%',
							'Profile.person_status LIKE' => '%' . $keyword . '%'
						)
					)
				);
			}
		}

		$this->Profile->recursive = 0;
		$this->paginate = array('all',
			'limit' => 10,
			'order' => array('Profile.created' => 'DESC'),
			'conditions' => $conditions
		);
		$this->set('profiles', $this->Paginator->paginate());
		$this->set('keyword', $keyword);
	}

	public function admin_add() {
		$logged_user = $this->Session->read('logged_user');
		if($this->request->is('post')) {
			$this->request->data = $this->_process_images($this->request->data);
			$address = $this->request->data['Profile']['missing_city'] . ', ' . $this->request->data['Profile']['missing_country'];
			$lat_lng = $this->lat_lng($address);
			$this->request->data['Profile']['lat'] = $lat_lng['lat'];
			$this->request->data['Profile']['lng'] = $lat_lng['lng'];

			$this->request->data['Profile']['verified_profile'] = 1;
			$this->request->data['Profile']['user_id'] = $logged_user['id'];
			$this->request->data['Profile']['is_admin'] = 1;
			#AuthComponent::_setTrace($this->request->data);
			if($this->Profile->save($this->request->data)) {
				$this->request->data['Profile']['id'] = $this->Profile->id;
				$this->_facepp_upload($this->request->data);
				$this->Session->setFlash(__('The profile has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The profile could not be saved. Please, try again.'));
			}
		}
	}

	public function admin_edit($id = null) {
		$logged_user = $this->Session->read('logged_user');
		if (!$this->Profile->exists($id)) {
			throw new NotFoundException(__('Invalid profile'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if(!empty($this->request->data['Profile']['image_links_1']))
				$this->request->data = $this->_process_images($this->request->data);

			if($this->request->data['Profile']['image_link_1']=='')
				$this->request->data['Profile']['image_link_1'] = $profile['Profile']['image_link_1'];
			if($this->request->data['Profile']['image_link_2']=='')
				$this->request->data['Profile']['image_link_2'] = $profile['Profile']['image_link_2'];
			if($this->request->data['Profile']['image_link_3']=='')
				$this->request->data['Profile']['image_link_3'] = $profile['Profile']['image_link_3'];

			$address = $this->request->data['Profile']['missing_city'] . ', ' . $this->request->data['Profile']['missing_country'];
			$lat_lng = $this->lat_lng($address);
			$this->request->data['Profile']['lat'] = $lat_lng['lat'];
			$this->request->data['Profile']['lng'] = $lat_lng['lng'];

			$this->Profile->id = $id;
			if($this->Profile->save($this->request->data)) {
				$this->request->data['Profile']['id'] = $id;
				$this->_facepp_upload($this->request->data);
				$this->Session->setFlash(__('The profile has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The profile could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Profile.' . $this->Profile->primaryKey => $id));
			$this->request->data = $this->Profile->find('first', $options);
		}
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

		return $logged_user['id'];
	}

	public function blacklisted() {
		
	}

	public function report_missing() {
		$reporter_id = $this->_check_user();
		if($this->request->is('post')) {
			$this->request->data = $this->_process_images($this->request->data);	
			$address = $this->request->data['Profile']['missing_city'] . ', ' . $this->request->data['Profile']['missing_country'];			
			$lat_lng = $this->lat_lng($address);
			$this->request->data['Profile']['lat'] = $lat_lng['lat'];
			$this->request->data['Profile']['lng'] = $lat_lng['lng'];

			$this->request->data['Profile']['verified_profile'] = 0;
			$this->request->data['Profile']['reporter_id'] = $reporter_id;
			$this->request->data['Profile']['is_admin'] = 0;
			#AuthComponent::_setTrace($this->request->data);
			if($this->Profile->save($this->request->data)) {
				$this->request->data['Profile']['id'] = $this->Profile->id;
				$this->_facepp_upload($this->request->data);
				return $this->redirect(array('controller'=>'reporters', 'action' => 'my_reports'));
			} else {
				$success = false;
				$this->set(compact('success'));
			}
		}
	}

	public function report_found() {
		$reporter_id = $this->_check_user();
		if($this->request->is('post')) {
			$this->request->data = $this->_process_images($this->request->data);	
			$address = $this->request->data['Profile']['missing_city'] . ', ' . $this->request->data['Profile']['missing_country'];			
			$lat_lng = $this->lat_lng($address);
			$this->request->data['Profile']['lat'] = $lat_lng['lat'];
			$this->request->data['Profile']['lng'] = $lat_lng['lng'];

			$this->request->data['Profile']['verified_profile'] = 0;
			$this->request->data['Profile']['reporter_id'] = $reporter_id;
			$this->request->data['Profile']['is_admin'] = 0;
			#AuthComponent::_setTrace($this->request->data);
			$this->Profile->create();
			if($this->Profile->save($this->request->data)) {
				$this->request->data['Profile']['id'] = $this->Profile->id;
				$this->_facepp_job($this->request->data);
				return $this->redirect(array('controller'=>'reporters', 'action' => 'my_reports'));
			} else {
				$success = false;
				$this->set(compact('success'));
			}
		}
	}

	private function test() {
		//AuthComponent::_setTrace($this->facepp_create_group());
		$profile = $this->Profile->findById(2);
		#AuthComponent::_setTrace($profile);
		$group = $profile['Profile']['gender'];
		$person = $profile['Profile']['id'];
		$images = array(
			$profile['Profile']['image_link_1'],
			$profile['Profile']['image_link_2'],
			$profile['Profile']['image_link_3']
		);
		AuthComponent::_setTrace($this->facepp_add_to_group($group, $person, $images));
	}

	public function edit($id) {
		$logged_user = $this->Session->read('logged_user');
		if(empty($logged_user)) {
			return $this->redirect(array('controller'=>'reporters', 'action' => 'login'));
		}
		$this->Profile->id = $id;
		if (!$this->Profile->exists()) {
			throw new NotFoundException(__('Invalid profile'));
		}

		$profile = $this->Profile->findById($id);
		if($profile['Profile']['reporter_id'] != $logged_user['id']) {
			return $this->redirect(array('controller'=>'reporters', 'action' => 'my_reports'));
		}

		if($this->request->is('post')) {
			if(!empty($this->request->data['Profile']['image_links_1']))
				$this->request->data = $this->_process_images($this->request->data);

			if($this->request->data['Profile']['image_link_1']=='')
				$this->request->data['Profile']['image_link_1'] = $profile['Profile']['image_link_1'];
			if($this->request->data['Profile']['image_link_2']=='')
				$this->request->data['Profile']['image_link_2'] = $profile['Profile']['image_link_2'];
			if($this->request->data['Profile']['image_link_3']=='')
				$this->request->data['Profile']['image_link_3'] = $profile['Profile']['image_link_3'];

			$address = $this->request->data['Profile']['missing_city'] . ', ' . $this->request->data['Profile']['missing_country'];
			$lat_lng = $this->lat_lng($address);
			$this->request->data['Profile']['lat'] = $lat_lng['lat'];
			$this->request->data['Profile']['lng'] = $lat_lng['lng'];

			$this->Profile->id = $id;
			if($this->Profile->save($this->request->data)) {
				$this->request->data['Profile']['id'] = $id;
				$this->_facepp_upload($this->request->data);
				$this->Session->write('success', true);
			}
			else
				$this->Session->write('success', false);
			return $this->redirect(array('action' => 'edit', $id));
		}
		$this->set(compact('profile'));
	}

	public function delete($id) {
		$logged_user = $this->Session->read('logged_user');
		if(empty($logged_user)) {
			return $this->redirect(array('controller'=>'reporters', 'action' => 'login'));
		}
		$this->Profile->id = $id;
		if (!$this->Profile->exists()) {
			throw new NotFoundException(__('Invalid profile'));
		}

		$profile = $this->Profile->findById($id);
		if($profile['Profile']['reporter_id'] != $logged_user['id']) {
			return $this->redirect(array('controller'=>'reporters', 'action' => 'my_reports'));
		}

		$this->request->allowMethod('post', 'delete');
		if ($this->Profile->delete()) {
			$this->Session->setFlash(__('The profile has been deleted.'));
		} else {
			$this->Session->setFlash(__('The profile could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('controller' => 'reporters', 'action' => 'my_reports'));
	}

	public function search() {
		$page = $subpage = $title_for_layout = "search";
		$this->set(compact('page', 'subpage', 'title_for_layout'));

		if($this->request->is('post')) {
			if(!empty($this->request->data['id'])) {
				return $this->redirect(array('action' => 'full_profile', $this->request->data['id']));
			}

			$condition = "1 = 1";
			$order = "";
			$name_flag = 0;
			if(!empty($this->request->data['first_name'])) {
				if(!$name_flag)
					$condition .= " AND (";
				else
					$condition .= " OR ";
				$condition .= "`Profile`.`first_name` LIKE '%" . $this->request->data['first_name'] . "%'";
				$name_flag = 1;
			}
			if(!empty($this->request->data['last_name'])) {
				if(!$name_flag)
					$condition .= " AND (";
				else
					$condition .= " OR ";
				$condition .= "`Profile`.`last_name` LIKE '%" . $this->request->data['last_name'] . "%'";
				$name_flag = 1;
			}
			if(!empty($this->request->data['second_name'])) {
				if(!$name_flag)
					$condition .= " AND (";
				else
					$condition .= " OR ";
				$condition .= "`Profile`.`second_name` LIKE '%" . $this->request->data['second_name'] . "%'";
				$name_flag = 1;
			}
			if($name_flag)
				$condition .= ")";

			if(!empty($this->request->data['search_image'])) {
				$image = $this->request->data['search_image'];
				if($_SERVER['HTTP_HOST']=='localhost' || $_SERVER['HTTP_HOST']=='127.0.0.1') {
					$files = array($image);
					$gender = '';
					if(!empty($this->request->data['gender']) && $this->request->data['gender']!="") {
						$gender = $this->request->data['gender'];
					}
					$links = $this->upload_to_cloud($files, $gender);
					if(!empty($links)) {
						$image = empty($links[0]) ? '' : $links[0];
					}
				} else {
					$image = Router::fullbaseUrl() . $this->webroot . 'files/uploads/' . $image;
				}
				//$image = "http://res.cloudinary.com/dg0qpsar6/image/upload/v1459555277/gmcbzajesxdinezqgnqj.jpg";

				$face_search_results = $this->facepp_search($image, $gender);
				#AuthComponent::_setTrace($face_search_results);
				if(!empty($face_search_results)) {
					$condition .= " AND `Profile`.`id` IN ( ";
					$order .= " field(`Profile`.`id`, ";
					foreach($face_search_results as $key => $item) {
						$condition .= "'$key', ";
						$order .= "'$key', ";
					}

					$condition = substr($condition, 0, -2);
					$condition .= " )";

					$order = substr($order, 0, -2);
					$order .= " ),";
				}
			}
			
			if(!empty($this->request->data['gender']) && $this->request->data['gender']!="") {
				$condition .= " AND `Profile`.`gender` = '" . $this->request->data['gender'] . "'";
			}
			if(!empty($this->request->data['missing_country'])) {
				$condition .= " AND `Profile`.`missing_country` = '" . $this->request->data['missing_country'] . "'";
			}
			if(!empty($this->request->data['missing_city'])) {
				$condition .= " AND `Profile`.`missing_city` LIKE '%" . $this->request->data['missing_city'] . "%'";
			}
			if(!empty($this->request->data['search_lat']) && !empty($this->request->data['search_lng']) && !empty($this->request->data['search_radius'])) {
				$lat = $this->request->data['search_lat'];
				$lng = $this->request->data['search_lng'];
				$radius = $this->request->data['search_radius'] / 1000;

				$condition .= " AND ";
				$condition .= '(ROUND((6371.0 * ACOS(SIN(' . $lat . '*PI()/180)*SIN(`Profile`.`lat` * PI()/180)+COS(' . $lat . '*PI()/180)*
						COS(`Profile`.`lat`*PI()/180)*COS((' . $lng . '*PI()/180)-(`Profile`.`lng`*PI()/180)))),2)<=' . $radius . ')';
			}

			#AuthComponent::_setTrace($condition);

			$order .= " `Profile`.`created` DESC";

			$query = "SELECT * FROM `profiles` AS `Profile`";
			$query .= " INNER JOIN `reporters` AS `Reporter` ON `Profile`.`reporter_id` = `Reporter`.`id`";
			$query .= " WHERE $condition";
			$query .= " ORDER BY $order";

			$profiles = $this->Profile->query($query);
			$count = count($profiles);
			$this->set(compact('profiles', 'count'));
		} else {
			return $this->redirect(array('controller'=>'pages', 'action' => 'display', 'search'));
		}
	}

	public function full_profile($id) {
		$page = $subpage = $title_for_layout = "search";
		$this->set(compact('page', 'subpage', 'title_for_layout'));

		$profile = $this->Profile->findById($id);
		$this->set(compact('profile'));
	}

	public function found($id) {
		$logged = $this->Session->read('logged_user');
		$options = array('conditions' => array('Profile.' . $this->Profile->primaryKey => $id));
		$profile = $this->Profile->find('first', $options);

		if(empty($logged) || $logged['id'] != $profile['Profile']['reporter_id']) {
			return $this->redirect(array('controller'=>'profiles', 'action' => 'full_profile', $id));
		}

		if (!$this->Profile->exists($id)) {
			throw new NotFoundException(__('Invalid profile'));
		}

		$data['Profile']['maybe_found_by'] = null;
		$data['Profile']['maybe_found_by_admin'] = null;
		$data['Profile']['maybe_found_log'] = null;
		$data['Profile']['person_status'] = "Found";
		$this->Profile->id = $id;
		$this->Profile->save($data);

		$log['Log']['profile_id'] = $id;
		if($logged['is_admin']) {
			$log['Log']['user_id'] = $logged['id'];
			$reporter_name = "Admin";
		}
		else {
			$log['Log']['reporter_id'] = $logged['id'];
			$reporter = new ReportersController();
			$reporter_name = $reporter->get_name($logged['id']);
		}
		$log['Log']['message'] = "Found by " . $reporter_name;
		$this->loadModel('Log');
		$this->Log->create();
		$this->Log->save($log);

		return $this->redirect(array('controller'=>'testimonials', 'action' => 'add'));
	}

	public function maybe_found($id) {
		$logged = $this->Session->read('logged_user');
		$options = array('conditions' => array('Profile.' . $this->Profile->primaryKey => $id));
		$profile = $this->Profile->find('first', $options);

		if(empty($logged)) {
			return $this->redirect(array('controller'=>'profiles', 'action' => 'full_profile', $id));
		}

		if (!$this->Profile->exists($id)) {
			throw new NotFoundException(__('Invalid profile'));
		}

		$log['Log']['profile_id'] = $id;
		if($logged['is_admin']) {
			$log['Log']['user_id'] = $logged['id'];
			$reporter_name = "Admin";
		}
		else {
			$log['Log']['reporter_id'] = $logged['id'];
			$reporter = new ReportersController();
			$reporter_name = $reporter->get_name($logged['id']);
		}
		$log['Log']['message'] = "Maybe Found by " . $reporter_name;
		$this->loadModel('Log');
		$this->Log->create();
		$this->Log->save($log);

		$data['Profile']['person_status'] = "Maybe Found";
		$data['Profile']['maybe_found_by'] = $logged['id'];
		$data['Profile']['maybe_found_by_admin'] = $logged['is_admin'];
		$data['Profile']['maybe_found_log'] = $this->Log->getLastInsertId();
		$this->Profile->id = $id;
		$this->Profile->save($data);

		$this->Session->setFlash('Profile Updated. And Notified The Reporter', 'default', array(), 'flash');
		return $this->redirect(array('controller'=>'profiles', 'action' => 'full_profile', $id));
	}

	public function missing($id) {
		$logged = $this->Session->read('logged_user');
		$options = array('conditions' => array('Profile.' . $this->Profile->primaryKey => $id));
		$profile = $this->Profile->find('first', $options);

		if(empty($logged) || $logged['id'] != $profile['Profile']['reporter_id']) {
			return $this->redirect(array('controller'=>'profiles', 'action' => 'full_profile', $id));
		}

		if (!$this->Profile->exists($id)) {
			throw new NotFoundException(__('Invalid profile'));
		}

		$data['Profile']['maybe_found_by'] = null;
		$data['Profile']['maybe_found_by_admin'] = null;
		$data['Profile']['maybe_found_log'] = null;
		$data['Profile']['person_status'] = "Missing";
		$this->Profile->id = $id;
		$this->Profile->save($data);
		
		$reporter = new ReportersController();
		$reporter_name = $reporter->get_name($logged['id']);

		$log['Log']['profile_id'] = $id;
		$log['Log']['reporter_id'] = $logged['id'];
		$log['Log']['message'] = "Maybe Found Reverted to Missing Again by " . $reporter_name;

		$this->loadModel('Log');
		$this->Log->create();
		$this->Log->save($log);

		if(!$profile['Profile']['maybe_found_by_admin']) {
			$this->Log->id = $profile['Profile']['maybe_found_log'];
			$abuse_data['Log']['abuse'] = 1;
			$this->Log->save($abuse_data);

			$abuse_logs = $this->Log->find('count',
				array(
					'conditions' => array(
						'Log.reporter_id' => $profile['Profile']['maybe_found_by'],
						'Log.profile_id' => $id,
						'Log.abuse' => 1
					)
				)
			);
			if($abuse_logs>=5) {
				$this->loadModel('Reporter');
				$black['Reporter']['is_blacklisted'] = 1;
				$this->Reporter->save($black);
			}
		}

		$this->Session->setFlash('Profile Reverted To Missing. And Logged The Found Claimer as Abuse.', 'default', array(), 'flash');
		return $this->redirect(array('controller'=>'profiles', 'action' => 'full_profile', $id));
	}

	private function _process_images ($data) {
		unset($data['Profile']['images']);

		// process image and upload to cloudinary
		$files = array();
		if(!empty($data['Profile']['image_links_1'])) {
			array_push($files, $data['Profile']['image_links_1']);
		}
		if(!empty($data['Profile']['image_links_2'])) {
			array_push($files, $data['Profile']['image_links_2']);
		}
		if(!empty($data['Profile']['image_links_3'])) {
			array_push($files, $data['Profile']['image_links_3']);
		}
		if(!empty($files)) {
			$links = $this->upload_to_cloud($files, $data['Profile']['gender']);
			if(!empty($links)) {
				$data['Profile']['image_link_1'] = empty($links[0]) ? '' : $links[0];
				$data['Profile']['image_link_2'] = empty($links[1]) ? '' : $links[1];
				$data['Profile']['image_link_3'] = empty($links[2]) ? '' : $links[2];
			}
		}

		unset($data['Profile']['image_links_1'], $data['Profile']['image_links_2'], $data['Profile']['image_links_3']);

		// delete all from server (security)
		$files = glob('files/uploads/*'); // get all file names
		foreach($files as $file){ // iterate files
		  if(is_file($file))
		    unlink($file); // delete file
		}

		return $data;
	}

	private function _facepp_upload($data) {
		// do facepp job here
		$group = $data['Profile']['gender'];
		$person = $data['Profile']['id'];
		$images = array();
		if(!empty($data['Profile']['image_link_1']) || $data['Profile']['image_link_1']!='')
			array_push($images, $data['Profile']['image_link_1']);
		if(!empty($data['Profile']['image_link_2']) || $data['Profile']['image_link_2']!='')
			array_push($images, $data['Profile']['image_link_2']);
		if(!empty($data['Profile']['image_link_3']) || $data['Profile']['image_link_3']!='')
			array_push($images, $data['Profile']['image_link_3']);
		$this->facepp_add_to_group($group, $person, $images);
		return true;
	}

	public function upload_image() {
		if($this->request->is('post')) {
			if (!empty($this->request->data['Profile']['images']['name'])) {
	            $file_name = $this->_upload($this->request->data['Profile']['images'], 'uploads');
	            #AuthComponent::_setTrace($file_name);
	            $res = "Successfully uploaded " . $this->request->data['Profile']['images']['name'];
	            die(json_encode(array('response' => $res, 'filename' => $file_name)));
	        } else die(json_encode(array('error'=>'No files found for upload.')));
		}
	}

	public function get_counts() {
		$count['found'] = $this->Profile->find('count',
			array(
				'conditions' => array(
					'Profile.person_status'=>'Found'
				)
			)
		);

		$count['total'] =  $this->Profile->find('count');

		return $count;
	}
}

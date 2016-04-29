<?php
App::uses('AppController', 'Controller');
App::uses('ReportersController', 'Controller');
App::uses('UsersController', 'Controller');

class ProfilesController extends AppController {

	public $components = array('Paginator', 'Session');

	public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('report_missing', 'report_found', 'upload_image', 'blacklisted', 'search', 'full_profile', 'edit', 'delete', 'test', 'found', 'maybe_found', 'missing', 'abuse');

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
				if($keyword=="spammed") {
					$conditions = am($conditions, array(
							'Profile.abuse_counter > ' => 0
						)
					);
				} else {
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

		$options = array('conditions' => array('Profile.' . $this->Profile->primaryKey => $id));
		$profile = $this->Profile->find('first', $options);

		if ($this->request->is(array('post', 'put'))) {
			if(empty($this->request->data['Profile']['verified_profile'])) {
				$this->request->data['Profile']['verified_profile'] = 0;
			}

			$update_face_pp = false;
			if(!empty($this->request->data['Profile']['image_links_1'])) {
				$update_face_pp = true;
			}

			//$this->request->data = $this->_refine_images($this->request->data, $profile);
			$this->request->data = $this->_process_images($this->request->data);
			//$this->request->data = $this->_refine_images_2($this->request->data, $profile);
			$data_for_fpp = $this->request->data;

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
				$data_for_fpp['Profile']['id'] = $id;
				if($update_face_pp) {
					$this->_facepp_upload($data_for_fpp, true);
				}

				$this->Session->setFlash(__('The profile has been saved.'));
				return $this->redirect(array('action' => 'edit', $id));
			} else {
				$this->Session->setFlash(__('The profile could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $profile;
		}
	}

	public function admin_delete($id = null) {
		$this->Profile->id = $id;
		if (!$this->Profile->exists()) {
			throw new NotFoundException(__('Invalid profile'));
		}

		$options = array('conditions' => array('Profile.' . $this->Profile->primaryKey => $id));
		$profile = $this->Profile->find('first', $options);

		$this->request->allowMethod('post', 'delete');
		if ($this->Profile->delete()) {
			$removed['RemovedProfiles'] = $profile['Profile'];
			$this->loadModel('RemovedProfiles');
			$this->RemovedProfiles->save($removed);

			$images_to_delete = array(
				$profile['Profile']['image_link_1'],
				$profile['Profile']['image_link_2'],
				$profile['Profile']['image_link_3']
			);
			$this->delete_from_cloud($images_to_delete);
			$this->facepp_delete_person($id);

			$this->Session->setFlash(__('The profile has been deleted.'));
		} else {
			$this->Session->setFlash(__('The profile could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

	public function admin_remove_image($profile_id, $image_no) {
		$options = array('conditions' => array('Profile.' . $this->Profile->primaryKey => $profile_id));
		$profile = $this->Profile->find('first', $options);

		$image_col_name = 'image_link_' . $image_no;
		$data['Profile'][$image_col_name] = null;
		$this->Profile->id = $profile_id;
		if($this->Profile->save($data)) {
			$this->delete_from_cloud(array($profile['Profile'][$image_col_name]));
			$this->Session->setFlash(__('The profile has been saved.'));
		} else {
			$this->Session->setFlash(__('The profile could not be saved. Please, try again.'));
		}
		return $this->redirect(array('action' => 'edit', $profile_id));
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

			$reporter_obj = new ReportersController();
			$this->request->data['Profile']['verified_profile'] = $reporter_obj->is_verified($reporter_id);
			$this->request->data['Profile']['reporter_id'] = $reporter_id;
			$this->request->data['Profile']['is_admin'] = 0;
			#AuthComponent::_setTrace($this->request->data);
			if($this->Profile->save($this->request->data)) {
				$this->request->data['Profile']['id'] = $this->Profile->id;
				$this->_facepp_upload($this->request->data);
				$this->Session->setFlash(__('Your Report has been saved.'), 'default', array('class'=>'success_msg'), 'flash');
				return $this->redirect(array('controller'=>'reporters', 'action' => 'my_reports'));
			} else {
				$this->Session->setFlash(__('Your Report can\'t be saved. Try again later.'), 'default', array('class'=>'error_msg'), 'flash');
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

			$reporter_obj = new ReportersController();
			$this->request->data['Profile']['verified_profile'] = $reporter_obj->is_verified($reporter_id);
			$this->request->data['Profile']['reporter_id'] = $reporter_id;
			$this->request->data['Profile']['is_admin'] = 0;
			#AuthComponent::_setTrace($this->request->data);
			$this->Profile->create();
			if($this->Profile->save($this->request->data)) {
				$this->request->data['Profile']['id'] = $this->Profile->id;
				$this->_facepp_upload($this->request->data);
				$this->Session->setFlash(__('Your Report has been saved.'), 'default', array('class'=>'success_msg'), 'flash');
				return $this->redirect(array('controller'=>'reporters', 'action' => 'my_reports'));
			} else {
				$this->Session->setFlash(__('Your Report can\'t be saved. Try again later.'), 'default', array('class'=>'error_msg'), 'flash');
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
				$this->request->data['Profile']['image_link_3'] = $this->request->data['Profile']['image_link_3'];

			$address = $this->request->data['Profile']['missing_city'] . ', ' . $this->request->data['Profile']['missing_country'];
			$lat_lng = $this->lat_lng($address);
			$this->request->data['Profile']['lat'] = $lat_lng['lat'];
			$this->request->data['Profile']['lng'] = $lat_lng['lng'];

			$this->Profile->id = $id;
			if($this->Profile->save($this->request->data)) {
				$this->request->data['Profile']['id'] = $id;

				if($this->request->data['Profile']['image_link_1']==$profile['Profile']['image_link_1'])
					unset($this->request->data['Profile']['image_link_1']);
				if($this->request->data['Profile']['image_link_2']==$profile['Profile']['image_link_2'])
					unset($this->request->data['Profile']['image_link_2']);
				if($this->request->data['Profile']['image_link_3']==$profile['Profile']['image_link_3'])
					unset($this->request->data['Profile']['image_link_3']);

				$this->_facepp_upload($this->request->data);
				$this->Session->setFlash(__('Your Report has been updated.'), 'default', array('class'=>'success_msg'), 'flash');
			}
			else
				$this->Session->setFlash(__('Your Report can\'t be saved right now. Try again later.'), 'default', array('class'=>'error_msg'), 'flash');

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
			$removed['RemovedProfiles'] = $profile['Profile'];
			$this->loadModel('RemovedProfiles');
			$this->RemovedProfiles->save($removed);

			$images_to_delete = array(
				$profile['Profile']['image_link_1'],
				$profile['Profile']['image_link_2'],
				$profile['Profile']['image_link_3']
			);
			$this->delete_from_cloud($images_to_delete);
			$this->facepp_delete_person($id);

			$this->Session->setFlash(__('The profile has been deleted.'), 'default', array('class'=>'success_msg'), 'flash');
		} else {
			$this->Session->setFlash(__('The profile could not be deleted. Please, try again.'), 'default', array('class'=>'error_msg'), 'flash');
		}
		return $this->redirect(array('controller' => 'reporters', 'action' => 'my_reports'));
	}

	public function remove_image($profile_id, $image_no) {
		$options = array('conditions' => array('Profile.' . $this->Profile->primaryKey => $profile_id));
		$profile = $this->Profile->find('first', $options);

		$image_col_name = 'image_link_' . $image_no;
		$data['Profile'][$image_col_name] = null;
		$this->Profile->id = $profile_id;
		if($this->Profile->save($data)) {
			$this->delete_from_cloud(array($profile['Profile'][$image_col_name]));
			$this->Session->setFlash(__('The profile has been saved.'));
		} else {
			$this->Session->setFlash(__('The profile could not be saved. Please, try again.'));
		}
		return $this->redirect(array('action' => 'edit', $profile_id));
	}

	public function search($offset = 0, $limit = 10) {
		set_time_limit(0);
		$page = $subpage = $title_for_layout = "search";
		$this->set(compact('page', 'subpage', 'title_for_layout'));
		$query = "";

		$search_query_session = $this->Session->read('search_query');
		if($this->request->is('post')) {
			if(!empty($this->request->data['id'])) {
				return $this->redirect(array('action' => 'full_profile', $this->request->data['id'], 0));
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
			if(!empty($this->request->data['birthdate'])) {
				$condition .= " AND `Profile`.`birthdate` = '" . $this->request->data['birthdate'] . "'";
			}
			if(!empty($this->request->data['resident_country'])) {
				$condition .= " AND `Profile`.`resident_country` = '" . $this->request->data['resident_country'] . "'";
			}
			if(!empty($this->request->data['resident_city'])) {
				$condition .= " AND `Profile`.`resident_city` = '" . $this->request->data['resident_city'] . "'";
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
			//$query .= " LEFT JOIN `reporters` AS `Reporter` ON `Profile`.`reporter_id` = `Reporter`.`id`";
			$query .= " WHERE $condition";
			$query .= " ORDER BY $order";

			$query_without_limit = $query;
			$this->Session->write('search_query', $query_without_limit);
			//AuthComponent::_setTrace($query);
		} elseif(!empty($search_query_session) && $search_query_session!="") {
			$query_without_limit = $query = $search_query_session;
		} else {
			return $this->redirect(array('controller'=>'pages', 'action' => 'display', 'search'));
		}


		$query .= " LIMIT $limit";
		$query .= " OFFSET $offset";

		$profiles = $this->Profile->query($query);
		$profiles_count = $this->Profile->query($query_without_limit);
		$count = count($profiles_count);

		$this->set(compact('profiles', 'count', 'limit', 'offset'));
	}

	public function full_profile($id=null, $related = true) {
		$page = $subpage = $title_for_layout = "search";
		$this->set(compact('page', 'subpage', 'title_for_layout'));

		if (!$this->Profile->exists($id)) {
			return $this->redirect(array('controller'=>'pages', 'action' => 'display', 'search'));
		}

		$profile = $this->Profile->findById($id);
		if(!empty($profile['Profile']['maybe_found_by']) && $profile['Profile']['maybe_found_by']!=0) {
			$this->loadModel('Reporter');
			$this->Reporter->recursive = 0;
			$claimed_by = $this->Reporter->findById($profile['Profile']['maybe_found_by']);
			$claimed = 1;
			$this->set(compact('claimed', 'claimed_by'));
		} elseif(!empty($profile['Profile']['maybe_found_by_admin']) && $profile['Profile']['maybe_found_by_admin']) {
			$claimed_by = 'Admin';
			$claimed = 2;
			$this->set(compact('claimed', 'claimed_by'));
		}
		$this->set(compact('profile'));

		if($related) {
			$search_query_session = $this->Session->read('search_query');
			if(!empty($search_query_session) && $search_query_session!="") {
				$query = $search_query_session;
				$query .= " LIMIT 6";
				$query .= " OFFSET 0";

				$related_profiles = $this->Profile->query($query);
				$this->set(compact('related', 'related_profiles'));
			}
		}
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

		$this->Session->setFlash(__('Profile Updated. And Notified The Reporter'), 'default', array('class'=>'success_msg'), 'flash');
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

		$this->Session->setFlash(__('Profile Reverted To Missing. And Logged The Found Claimer as Abuse.'), 'default', array('class'=>'error_msg'), 'flash');
		return $this->redirect(array('controller'=>'profiles', 'action' => 'full_profile', $id));
	}

	public function abuse($id) {
		if (!$this->Profile->exists($id)) {
			throw new NotFoundException(__('Invalid profile'));
		}
		if($this->request->is('post')) {
			$profile = $this->Profile->findById($id);
			$data['Profile']['abuse_counter'] = $profile['Profile']['abuse_counter'] + 1;
			$this->Profile->id = $id;
			$this->Profile->save($data);


			$status = ($profile['Profile']['person_status'] == 'Maybe Found') ? 'Missing' : $profile['Profile']['person_status'];

			$first_name = !empty($profile['Profile']['first_name']) ? $profile['Profile']['first_name'] : "";
			$second_name = !empty($profile['Profile']['second_name']) ? $profile['Profile']['second_name'] : "";
			$last_name = !empty($profile['Profile']['last_name']) ? $profile['Profile']['last_name'] : "";
			$name = $first_name . " " . $second_name . " " . $last_name;

			$first_name = !empty($profile['Reporter']['first_name']) ? $profile['Reporter']['first_name'] : "";
			$second_name = !empty($profile['Reporter']['second_name']) ? $profile['Reporter']['second_name'] : "";
			$last_name = !empty($profile['Reporter']['last_name']) ? $profile['Reporter']['last_name'] : "";
			$reporter_name = $first_name . " " . $second_name . " " . $last_name;

			$user = new UsersController;
			$admin_email = $user->get_admin_email();

			$deleted_msg = "";

			if($data['Profile']['abuse_counter'] == 1) {
				$msg = "Your report on <strong>$status</strong> of <strong>$name</strong> has been reported abuse. Please, click on the link below to review the report.";
				$this->_send_abuse_mail($profile['Reporter']['email'], $msg, $profile['Profile']['id'], $reporter_name);

				$msg = "The report on <strong>$status</strong> of <strong>$name</strong> by $reporter_name has been reported abuse. Please, click on the link below to review the report.";
				$this->_send_abuse_mail($admin_email, $msg, $profile['Profile']['id'], 'Admin');
			} else if ($data['Profile']['abuse_counter'] == 200) {
				$this->Profile->id = $id;
				$this->Profile->delete();

				$profile['Profile']['abuse_counter'] = 200;
				$removed['RemovedProfiles'] = $profile['Profile'];
				$this->loadModel('RemovedProfiles');
				$this->RemovedProfiles->save($removed);

				$msg = "Your report on <strong>$status</strong> of <strong>$name</strong> has been reported abuse 200 times and has been deleted automatically.";
				$this->_send_abuse_mail($profile['Reporter']['email'], $msg, $profile['Profile']['id'], $reporter_name);

				$msg = "The report on <strong>$status</strong> of <strong>$name</strong> by $reporter_name has been reported abuse 200 times and has been deleted automatically.";
				$this->_send_abuse_mail($admin_email, $msg, $profile['Profile']['id'], 'Admin');

				$deleted_msg = "This Profile has been removed according to too many abuse reports.";
			}

			$logged = $this->Session->read('logged_user');
			$log['Log']['profile_id'] = $id;
			if(!empty($logged)) {
				if($logged['is_admin']) {
					$log['Log']['user_id'] = $logged['id'];
					$who = "Admin";
				}
				else {
					$log['Log']['reporter_id'] = $logged['id'];
					$reporter = new ReportersController();
					$who = $reporter->get_name($logged['id']);
				}
			} else {
				$who = "Guest";
			}

			$log['Log']['message'] = "Reported abuse by " . $who . ". Total times of abuse reported: <b>" . $data['Profile']['abuse_counter'] . "</b> " . $deleted_msg;
			$this->loadModel('Log');
			$this->Log->create();
			$this->Log->save($log);

			$this->Session->setFlash(__('Profile reported as Abuse. %s', $deleted_msg), 'default', array('class'=>'error_msg'), 'flash');
			return $this->redirect(array('controller'=>'profiles', 'action' => 'full_profile', $id));
		
		}
	}

	private function _refine_images ($data, $profile) {
		if(!empty($data['Profile']['image_links_1'])) {
			if (empty($profile['Profile']['image_link_1'])) {

			} else if (empty($profile['Profile']['image_link_2'])) {
				$data['Profile']['image_links_2'] = $data['Profile']['image_links_1'];
				unset($data['Profile']['image_links_1']);
			} else if (empty($profile['Profile']['image_link_3'])) {
				$data['Profile']['image_links_3'] = $data['Profile']['image_links_1'];
				unset($data['Profile']['image_links_1']);
			}
		}

		if(!empty($data['Profile']['image_links_2'])) {
			if (empty($profile['Profile']['image_link_1'])) {
				$data['Profile']['image_links_1'] = $data['Profile']['image_links_2'];
				unset($data['Profile']['image_links_2']);
			} else if (empty($profile['Profile']['image_link_2'])) {

			} else if (empty($profile['Profile']['image_link_3'])) {
				$data['Profile']['image_links_3'] = $data['Profile']['image_links_2'];
				unset($data['Profile']['image_links_2']);
			}
		}

		if(!empty($data['Profile']['image_links_3'])) {
			if (empty($profile['Profile']['image_link_1'])) {
				$data['Profile']['image_links_1'] = $data['Profile']['image_links_3'];
				unset($data['Profile']['image_links_3']);
			} else if (empty($profile['Profile']['image_link_2'])) {
				$data['Profile']['image_links_2'] = $data['Profile']['image_links_3'];
				unset($data['Profile']['image_links_3']);
			} else if (empty($profile['Profile']['image_link_3'])) {

			}
		}

		return $data;
	}

	private function _refine_images_2 ($data, $profile) {
		if(!empty($data['Profile']['image_link_1'])) {
			if (empty($profile['Profile']['image_link_1'])) {

			} else if (empty($profile['Profile']['image_link_2'])) {
				$data['Profile']['image_link_2'] = $data['Profile']['image_link_1'];
				$data['Profile']['image_link_1'] = "";
			} else if (empty($profile['Profile']['image_link_3'])) {
				$data['Profile']['image_link_3'] = $data['Profile']['image_link_1'];
				$data['Profile']['image_link_1'] = "";
			}
		}

		if(!empty($data['Profile']['image_link_2'])) {
			if (empty($profile['Profile']['image_link_1'])) {
				$data['Profile']['image_link_1'] = $data['Profile']['image_link_2'];
				$data['Profile']['image_link_2'] = "";
			} else if (empty($profile['Profile']['image_link_2'])) {

			} else if (empty($profile['Profile']['image_link_3'])) {
				$data['Profile']['image_link_3'] = $data['Profile']['image_link_2'];
				$data['Profile']['image_link_2'] = "";
			}
		}

		if(!empty($data['Profile']['image_link_3'])) {
			if (empty($profile['Profile']['image_link_1'])) {
				$data['Profile']['image_link_1'] = $data['Profile']['image_link_3'];
				$data['Profile']['image_link_3'] = "";
			} else if (empty($profile['Profile']['image_link_2'])) {
				$data['Profile']['image_link_2'] = $data['Profile']['image_link_3'];
				$data['Profile']['image_link_3'] = "";
			} else if (empty($profile['Profile']['image_link_3'])) {

			}
		}

		return $data;
	}

	private function _process_images ($data) {
		unset($data['Profile']['images']);

		// process image and upload to cloudinary
		$files = array();
		if(!empty($data['Profile']['image_links_1']) && ( strpos($data['Profile']['image_links_1'], 'http://') == false ) ) {
			array_push($files, $data['Profile']['image_links_1']);
		}
		if(!empty($data['Profile']['image_links_2']) && ( strpos($data['Profile']['image_links_2'], 'http://') == false ) ) {
			array_push($files, $data['Profile']['image_links_2']);
		}
		if(!empty($data['Profile']['image_links_3']) && ( strpos($data['Profile']['image_links_3'], 'http://') == false ) ) {
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

	private function _facepp_upload($data, $update=false) {
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
		$this->facepp_add_to_group($group, $person, $images, $update);
		return true;
	}

	private function _send_abuse_mail($mail, $msg, $profile_id, $name) {
		$profile_link = "http://" . $_SERVER['HTTP_HOST'] . $this->webroot . "profiles/full_profile/" . $profile_id . "/0";
		$subject = "Face Finder Report Abuse";
		$body = "";

		$body .= '<html>';
		$body .= '	<body>';
		$body .= '		<div style="width: 700px; margin:0 auto; border: 2px solid #ededed; border-radius: 7px;">';
		$body .= '			<h2 style="font-size: 30px;text-align: center;background-color: #ededed;padding: 20px 0px;margin-top: 0px;">Abuse Report</h2>';
		$body .= '			<div style="padding: 20px;">';
		$body .= '				<strong style="font-size: 20px;">Hello, ' . $name . ' </strong>';
		$body .= '				<br><br>';
		$body .= '				<p style="font-size: 15px;"></p>';
		$body .= '				<a style="font-size: 15px;" href="' . $profile_link . '">' . $profile_link . '</a>';
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

		$plain_body = $msg;
		$plain_body .= "<a href=\"$profile_link\">$profile_link</a>";

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

	public function upload_image() {
		$maxsize = 0.5 * 1024 * 1024;
		if($this->request->is('post')) {
			if (!empty($this->request->data['Profile']['images']['name'])) {
				if($this->request->data['Profile']['images']['size'] > $maxsize) {
					die(json_encode(array('error'=>'Maximum file size is 0.5 MB.')));
				}

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

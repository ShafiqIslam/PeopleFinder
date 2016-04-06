<?php
App::uses('AppModel', 'Model');
/**
 * RemovedProfile Model
 *
 * @property Reporter $Reporter
 * @property User $User
 */
class RemovedProfile extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Reporter' => array(
			'className' => 'Reporter',
			'foreignKey' => 'reporter_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}

<?php
App::uses('AppModel', 'Model');
/**
 * Log Model
 *
 * @property Profile $Profile
 * @property Reporter $Reporter
 * @property User $User
 */
class Log extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Profile' => array(
			'className' => 'Profile',
			'foreignKey' => 'profile_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
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

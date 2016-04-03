<?php
App::uses('AppModel', 'Model');
/**
 * Testimonial Model
 *
 * @property Reporter $Reporter
 */
class Testimonial extends AppModel {


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
		)
	);
}

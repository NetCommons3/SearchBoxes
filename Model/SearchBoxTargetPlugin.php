<?php
/**
 * SearchBoxTargetPlugin Model
 *
 * @property SearchBox $SearchBox
 *
 * @author Jun Nishikawa <topaz2@m0n0m0n0.com>
 * @link http://www.netcommons.org NetCommons Project
 * @license http://www.netcommons.org/license.txt NetCommons License
 */

App::uses('AppModel', 'Model');

/**
 * Summary for SearchBoxTargetPlugin Model
 */
class SearchBoxTargetPlugin extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'search_box_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'plugin_key' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'created_user' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'modified_user' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Plugin' => array(
			'className' => 'PluginManager.Plugin',
			'foreignKey' => false,
			'conditions' => array('SearchBoxTargetPlugin.plugin_key = Plugin.key'),
			'fields' => '',
			'order' => ''
		),
		'SearchBox' => array(
			'className' => 'SearchBox',
			'foreignKey' => 'search_box_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * validate search box
 *
 * @param array $data received post data
 * @return bool True on success, false on error
 */
	public function validateSearchBoxTargetPlugin($data) {
		$this->set($data);
		$this->validates();
		return $this->validationErrors ? false : true;
	}
}

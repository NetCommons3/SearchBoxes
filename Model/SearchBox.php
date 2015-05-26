<?php
/**
 * SearchBox Model
 *
 * @property SearchBoxTargetPlugin $SearchBoxTargetPlugin
 *
 * @author Jun Nishikawa <topaz2@m0n0m0n0.com>
 * @link http://www.netcommons.org NetCommons Project
 * @license http://www.netcommons.org/license.txt NetCommons License
 */

App::uses('AppModel', 'Model');

/**
 * Summary for SearchBox Model
 */
class SearchBox extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'frame_key' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'is_advanced' => array(
			'boolean' => array(
				'rule' => array('boolean'),
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
		'Frame' => array(
			'className' => 'Frames.Frame',
			'foreignKey' => false,
			'conditions' => array('SearchBox.frame_key = Frame.key'),
			'fields' => '',
			'order' => ''
		),
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'SearchBoxTargetPlugin' => array(
			'className' => 'SearchBoxes.SearchBoxTargetPlugin',
			'foreignKey' => 'search_box_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

/**
 * save search box
 *
 * @param array $data received post data
 * @return mixed On success Model::$data if its not empty or true, false on failure
 * @throws InternalErrorException
 */
	public function afterFrameSave($data) {
		$this->loadModels([
			'Topic' => 'Topics.Topic',
			'SearchBox' => 'SearchBoxes.SearchBox',
			'SearchBoxTargetPlugin' => 'SearchBoxes.SearchBoxTargetPlugin',
		]);

		try {
			if (!$this->SearchBox->validateSearchBox([
				'SearchBox' => ['frame_key' => $data['Frame']['key']],
				'SearchBoxTargetPlugin' =>
					array_map(function($plugin){ return ['plugin_key' => $plugin]; }, Topic::$AVAILABLE_PLUGINS),
			])) {
				$this->validationErrors = Hash::merge($this->validationErrors, $this->SearchBox->validationErrors);
				return false;
			}
			/* if (!$this->SearchBox->save(null, false)) { */
			if (!$this->SearchBox->saveAssociated(null, ['validate' => false, 'deep' => true])) {
				throw new InternalErrorException(__d('net_commons', 'Internal Server Error'));
			}
		} catch (Exception $ex) {
			CakeLog::error($ex);
			throw $ex;
		}

		return $this->searchBox;
	}

/**
 * validate search box
 *
 * @param array $data received post data
 * @return bool True on success, false on error
 */
	public function validateSearchBox($data) {
		$this->set($data);
		$this->validates();
		return $this->validationErrors ? false : true;
	}
}

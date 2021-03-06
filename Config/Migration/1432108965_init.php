<?php
/**
 * Init migration
 *
 * @author Jun Nishikawa <topaz2@m0n0m0n0.com>
 * @link http://www.netcommons.org NetCommons Project
 * @license http://www.netcommons.org/license.txt NetCommons License
 * @copyright Copyright 2014, NetCommons Project
 */

/**
 * Init migration
 *
 * @package NetCommons\SearchBoxes\Config\Migration
 */
class Init extends CakeMigration {

/**
 * Migration description
 *
 * @var string
 */
	public $description = 'init';

/**
 * Actions to be performed
 *
 * @var array $migration
 */
	public $migration = array(
		'up' => array(
			'create_table' => array(
				'search_box_target_plugins' => array(
					'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
					'search_box_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'index', 'comment' => '0: Basic search, 2: Advanced search'),
					'plugin_key' => array('type' => 'string', 'null' => false, 'default' => null, 'key' => 'index', 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
					'created_user' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
					'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
					'modified_user' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
					'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
					'indexes' => array(
						'PRIMARY' => array('column' => 'id', 'unique' => 1),
						'fk_search_box_target_plugins_search_boxes1_idx' => array('column' => 'search_box_id', 'unique' => 0),
						'fk_search_box_target_plugins_plugins1_idx' => array('column' => 'plugin_key', 'unique' => 0),
					),
					'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB'),
				),
				'search_boxes' => array(
					'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
					'frame_key' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
					'is_advanced' => array('type' => 'boolean', 'null' => false, 'default' => null, 'comment' => '0: Basic search, 1: Advanced search'),
					'created_user' => array('type' => 'integer', 'null' => false, 'default' => null),
					'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
					'modified_user' => array('type' => 'integer', 'null' => false, 'default' => null),
					'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
					'indexes' => array(
						'PRIMARY' => array('column' => 'id', 'unique' => 1),
					),
					'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB'),
				),
			),
		),
		'down' => array(
			'drop_table' => array(
				'search_box_target_plugins', 'search_boxes',
			),
		),
	);

/**
 * records
 *
 * @var array $records
 */
	public $records = array(
		'Plugin' => array(
			array(
				'language_id' => 1,
				'key' => 'search_boxes',
				'namespace' => 'netcommons/search-boxes',
				'default_action' => 'search_boxes/view',
				'default_setting_action' => 'search_boxes/edit',
				'name' => 'Search',
				'type' => 1,
			),
			array(
				'language_id' => 2,
				'key' => 'search_boxes',
				'namespace' => 'netcommons/search-boxes',
				'default_action' => 'search_boxes/view',
				'default_setting_action' => 'search_boxes/edit',
				'name' => '検索',
				'type' => 1,
			),
		),

		'PluginsRole' => array(
			array(
				'role_key' => 'room_administrator',
				'plugin_key' => 'search_boxes'
			),
		),

		'PluginsRoom' => array(
			array(
				'room_id' => 1,
				'plugin_key' => 'search_boxes'
			),
		),
	);

/**
 * Before migration callback
 *
 * @param string $direction Direction of migration process (up or down)
 * @return bool Should process continue
 */
	public function before($direction) {
		return true;
	}

/**
 * After migration callback
 *
 * @param string $direction Direction of migration process (up or down)
 * @return bool Should process continue
 */
	public function after($direction) {
		if ($direction === 'down') {
			return true;
		}

		foreach ($this->records as $model => $records) {
			if (!$this->updateRecords($model, $records)) {
				return false;
			}
		}

		return true;
	}

/**
 * Update model records
 *
 * @param string $model model name to update
 * @param string $records records to be stored
 * @param string $scope ?
 * @return bool Should process continue
 */
	public function updateRecords($model, $records, $scope = null) {
		$Model = $this->generateModel($model);
		foreach ($records as $record) {
			$Model->create();
			if (!$Model->save($record, false)) {
				return false;
			}
		}

		return true;
	}
}

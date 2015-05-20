<?php
/**
 * SearchBoxTargetPluginFixture
 *
 * @author Jun Nishikawa <topaz2@m0n0m0n0.com>
 * @link http://www.netcommons.org NetCommons Project
 * @license http://www.netcommons.org/license.txt NetCommons License
 */

/**
 * Summary for SearchBoxTargetPluginFixture
 */
class SearchBoxTargetPluginFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
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
			'fk_search_box_target_plugins_plugins1_idx' => array('column' => 'plugin_key', 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'search_box_id' => 1,
			'plugin_key' => 'Lorem ipsum dolor sit amet',
			'created_user' => 1,
			'created' => '2015-05-20 07:27:58',
			'modified_user' => 1,
			'modified' => '2015-05-20 07:27:58'
		),
	);

}

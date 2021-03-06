<?php
/**
 * SearchBoxFixture
 *
 * @author Jun Nishikawa <topaz2@m0n0m0n0.com>
 * @link http://www.netcommons.org NetCommons Project
 * @license http://www.netcommons.org/license.txt NetCommons License
 */

/**
 * Summary for SearchBoxFixture
 */
class SearchBoxFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'frame_key' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'is_advanced' => array('type' => 'boolean', 'null' => false, 'default' => null, 'comment' => '0: Basic search, 1: Advanced search'),
		'created_user' => array('type' => 'integer', 'null' => false, 'default' => null),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'modified_user' => array('type' => 'integer', 'null' => false, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
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
			'frame_key' => 'frame_191',
			'is_advanced' => 1,
			'created_user' => 1,
			'created' => '2015-05-20 07:28:05',
			'modified_user' => 1,
			'modified' => '2015-05-20 07:28:05'
		),
		array(
			'id' => 2,
			'frame_key' => 'frame_192',
			'is_advanced' => 0,
			'created_user' => 1,
			'created' => '2015-05-20 07:28:05',
			'modified_user' => 1,
			'modified' => '2015-05-20 07:28:05'
		),
	);

}

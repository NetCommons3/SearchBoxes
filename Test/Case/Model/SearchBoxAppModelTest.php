<?php
/**
 * SearchBox App Model Test Case
 *
 * @property SearchBox $SearchBox
 *
 * @author Jun Nishikawa <topaz2@m0n0m0n0.com>
 * @link http://www.netcommons.org NetCommons Project
 * @license http://www.netcommons.org/license.txt NetCommons License
 * @copyright Copyright 2014, NetCommons Project
 */

App::uses('NetCommonsBlockComponent', 'NetCommons.Controller/Component');
App::uses('NetCommonsRoomRoleComponent', 'NetCommons.Controller/Component');
App::uses('SearchBox', 'SearchBoxes.Model');
App::uses('YACakeTestCase', 'NetCommons.TestSuite');

/**
 * SearchBox App Model Test Case
 *
 * @author Jun Nishikawa <topaz2@m0n0m0n0.com>
 * @package NetCommons\SearchBoxes\Test\Case\Model
 */
class SearchBoxAppModelTest extends YACakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.blocks.block',
		'plugin.boxes.box',
		'plugin.m17n.language',
		/* 'plugin.groups.group', */
		/* 'plugin.groups.groups_language', */
		/* 'plugin.groups.groups_user', */
		'plugin.pages.page',
		'plugin.pages.space',
		'plugin.roles.role',
		'plugin.rooms.room',
		/* 'plugin.topics.topic', */
		/* 'plugin.topics.topic_block_setting', */
		/* 'plugin.topics.topic_block_setting_show_plugin', */
		/* 'plugin.topics.topic_selected_room', */
		'plugin.users.user',
		'plugin.users.user_attribute',
		'plugin.users.user_attributes_user',
		'plugin.users.user_select_attribute',
		'plugin.users.user_select_attributes_user',
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->SearchBox = ClassRegistry::init('SearchBoxes.SearchBox');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->SearchBox);
		parent::tearDown();
	}

/**
 * testIndex method
 *
 * @return void
 */
	public function testIndex() {
	}
}

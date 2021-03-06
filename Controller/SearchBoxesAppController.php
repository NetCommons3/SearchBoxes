<?php
/**
 * SearchBoxes App Controller
 *
 * @author Jun Nishikawa <topaz2@m0n0m0n0.com>
 * @link http://www.netcommons.org NetCommons Project
 * @license http://www.netcommons.org/license.txt NetCommons License
 * @copyright Copyright 2014, NetCommons Project
 */

App::uses('AppController', 'Controller');

/**
 * SearchBoxes App Controller
 *
 * @author Jun Nishikawa <topaz2@m0n0m0n0.com>
 * @package NetCommons\SearchBoxes\Controller
 */
class SearchBoxesAppController extends AppController {

/**
 * uses
 *
 * @var array
 */
	public $uses = array(
		'Blocks.Block',
		'PluginManager.Plugin',
		'Rooms.Room',
	);

/**
 * use component
 *
 * @var array
 */
	public $components = array(
		'NetCommons.NetCommonsFrame',
		'Pages.PageLayout',
		'Security',
		'NetCommons.NetCommonsBlock',
		'NetCommons.NetCommonsWorkflow',
		'NetCommons.NetCommonsRoomRole' => array(
			'allowedActions' => array(
				'blockEditable' => array('index', 'add', 'edit', 'delete')
			),
		),
		'Paginator',
	);

/**
 * initTabs
 *
 * @param string $mainActiveTab Main active tab
 * @return void
 */
	public function initTabs($mainActiveTab) {
		$settingTabs = array(
			'tabs' => array(
				'frame_settings' => array(
					'url' => array(
						'plugin' => $this->params['plugin'],
						'controller' => 'search_boxes',
						'action' => 'edit',
						$this->viewVars['frameId'],
					)
				),
			),
			'active' => $mainActiveTab
		);
		$this->set('settingTabs', $settingTabs);
	}
}

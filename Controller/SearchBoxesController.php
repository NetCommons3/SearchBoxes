<?php
/**
 * SearchBoxes Controller
 *
 * @property SearchBox $SearchBox
 * @property PaginatorComponent $Paginator
 *
 * @author Jun Nishikawa <topaz2@m0n0m0n0.com>
 * @link http://www.netcommons.org NetCommons Project
 * @license http://www.netcommons.org/license.txt NetCommons License
 */

App::uses('AppController', 'Controller');
App::uses('Topic', 'Topics.Model');

/**
 * Summary for SearchBoxes Controller
 */
class SearchBoxesController extends SearchBoxesAppController {

/**
 * uses
 *
 * @var array
 */
	public $uses = array(
		'SearchBoxes.SearchBox',
	);

/**
 * layout
 *
 * @var array
 */
	public $layout = 'Frames.setting';

/**
 * beforeFilter
 *
 * @return void
 */
	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->deny('index');
		$this->initTabs('frame_settings');
		ClassRegistry::flush();
	}

/**
 * view method
 *
 * @param string $frameId frameId
 * @throws NotFoundException
 * @return void
 */
	public function view($frameId = null) {
		$options = array('conditions' => array('Frame.id' => $frameId));
		$this->set('searchBox', $this->SearchBox->find('first', $options));

		$options = array('conditions' => array('language_id' => 2, 'key' => Topic::$availablePlugins));
		$plugins = $this->Plugin->getForOptions($options);
		$rooms = $this->Room->getReadableRooms();
		$blocks = $this->Block->find('list', array(
			'recursive' => -1,
			'conditions' => array(
				'public_type' => [Block::TYPE_PUBLIC, Block::TYPE_LIMITED],
			),
		));
		$this->set(compact('plugins', 'rooms', 'blocks'));
	}

/**
 * edit method
 *
 * @param string $frameId frameId
 * @throws NotFoundException
 * @return void
 */
	public function edit($frameId = null) {
		$options = array('conditions' => array('Frame.id' => $frameId));
		$searchBox = $this->SearchBox->find('first', $options);
		if (!$searchBox) {
			throw new NotFoundException(__('Invalid search box'));
		}

		if ($this->request->is(array('post', 'put'))) {
			$this->SearchBox->saveSettings($this->request->data);
			if (!$this->handleValidationError($this->SearchBox->validationErrors)) {
				return;
			}
			return $this->redirectByFrameId();
		}
		$this->request->data = $searchBox;
		$options = array('conditions' => array('language_id' => 2, 'key' => Topic::$availablePlugins));
		$plugins = $this->Plugin->getForOptions($options);
		$this->set(compact('plugins'));
	}
}

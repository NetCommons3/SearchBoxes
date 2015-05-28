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
class SearchBoxesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * uses
 *
 * @var array
 */
	public $uses = array(
		'PluginManager.Plugin',
		'SearchBoxes.SearchBox',
	);

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->SearchBox->recursive = 0;
		$this->set('searchBoxes', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @param string $frameId frameId
 * @throws NotFoundException
 * @return void
 */
	public function view($frameId = null) {
		/* if (!$this->SearchBox->exists($id)) { */
		/* 	throw new NotFoundException(__('Invalid search box')); */
		/* } */
		/* $options = array('conditions' => array('SearchBox.' . $this->SearchBox->primaryKey => $id)); */
		/* $this->set('searchBox', $this->SearchBox->find('first', $options)); */
		$options = array('conditions' => array('Frame.id' => $frameId));
		$this->set('searchBox', $this->SearchBox->find('first', $options));

		$options = array('conditions' => array('language_id' => 2, 'key' => Topic::$AVAILABLE_PLUGINS));
		$plugins = $this->Plugin->getForOptions($options);
		$this->set('plugins', $plugins);
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->SearchBox->create();
			if ($this->SearchBox->save($this->request->data)) {
				$this->Session->setFlash(__('The search box has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The search box could not be saved. Please, try again.'));
			}
		}
		$trackableCreators = $this->SearchBox->TrackableCreator->find('list');
		$trackableUpdaters = $this->SearchBox->TrackableUpdater->find('list');
		$this->set(compact('trackableCreators', 'trackableUpdaters'));
	}

/**
 * edit method
 *
 * @param string $frameId frameId
 * @throws NotFoundException
 * @return void
 */
	public function edit($frameId = null) {
		/* if (!$this->SearchBox->exists($id)) { */
		/* 	throw new NotFoundException(__('Invalid search box')); */
		/* } */
		if ($this->request->is(array('post', 'put'))) {
			if ($this->SearchBox->save($this->request->data)) {
				$this->Session->setFlash(__('The search box has been saved.'));
				return $this->redirectByFrameId();
			} else {
				$this->Session->setFlash(__('The search box could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Frame.id' => $frameId));
			/* $this->set('searchBox', $this->SearchBox->find('first', $options)); */
			/* $options = array('conditions' => array('SearchBox.' . $this->SearchBox->primaryKey => $id)); */
			$this->request->data = $this->SearchBox->find('first', $options);
			/* $options = array('conditions' => array('language_id' => 2, 'key' => Topic::$AVAILABLE_PLUGINS)); */
			$options = array('conditions' => array('language_id' => 2, 'key' => Topic::$AVAILABLE_PLUGINS));
			$plugins = $this->Plugin->getForOptions($options);
			/* var_dump($this->request->data); */
		}
		$trackableCreators = $this->SearchBox->TrackableCreator->find('list');
		$trackableUpdaters = $this->SearchBox->TrackableUpdater->find('list');
		$this->set(compact('plugins'));
	}

/**
 * delete method
 *
 * @param string $frameId frameId
 * @throws NotFoundException
 * @return void
 */
	public function delete($frameId = null) {
		$this->SearchBox->frameId = $frameId;
		if (!$this->SearchBox->exists()) {
			throw new NotFoundException(__('Invalid search box'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->SearchBox->delete()) {
			$this->Session->setFlash(__('The search box has been deleted.'));
		} else {
			$this->Session->setFlash(__('The search box could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}

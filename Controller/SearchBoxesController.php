<?php
App::uses('AppController', 'Controller');
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
class SearchBoxesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

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
 * @param string $id id
 * @throws NotFoundException
 * @return void
 */
	public function view($id = null) {
		/* if (!$this->SearchBox->exists($id)) { */
		/* 	throw new NotFoundException(__('Invalid search box')); */
		/* } */
		/* $options = array('conditions' => array('SearchBox.' . $this->SearchBox->primaryKey => $id)); */
		/* $this->set('searchBox', $this->SearchBox->find('first', $options)); */
		$options = array('conditions' => array('Frame.id' => $id));
		$this->set('searchBox', $this->SearchBox->find('first', $options));
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
 * @param string $id id
 * @throws NotFoundException
 * @return void
 */
	public function edit($id = null) {
		if (!$this->SearchBox->exists($id)) {
			throw new NotFoundException(__('Invalid search box'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->SearchBox->save($this->request->data)) {
				$this->Session->setFlash(__('The search box has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The search box could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('SearchBox.' . $this->SearchBox->primaryKey => $id));
			$this->request->data = $this->SearchBox->find('first', $options);
		}
		$trackableCreators = $this->SearchBox->TrackableCreator->find('list');
		$trackableUpdaters = $this->SearchBox->TrackableUpdater->find('list');
		$this->set(compact('trackableCreators', 'trackableUpdaters'));
	}

/**
 * delete method
 *
 * @param string $id id
 * @throws NotFoundException
 * @return void
 */
	public function delete($id = null) {
		$this->SearchBox->id = $id;
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

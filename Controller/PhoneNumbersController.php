<?php
App::uses('AppController', 'Controller');
/**
 * PhoneNumbers Controller
 *
 * @property PhoneNumber $PhoneNumber
 */
class PhoneNumbersController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->PhoneNumber->recursive = 0;
		$this->Paginator->setAllowedFilters(array('ref_table', 'ref_id')); // allow Bancha to remotly filter
		$phoneNumbers = $this->paginate();
		$this->set('phoneNumbers', $phoneNumbers);

		// provide a return value for Bancha requests
		return array_merge($this->request['paging']['PhoneNumber'],
			array('records'=>$phoneNumbers));
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->PhoneNumber->id = $id;
		if (!$this->PhoneNumber->exists()) {
			throw new NotFoundException(__('Invalid phone number'));
		}
		$this->set('phoneNumber', $this->PhoneNumber->read(null, $id));

		// provide a return value for Bancha requests
		return $this->PhoneNumber->data;
	}

/**
 * Return the (first) primary phone number for a given table and id.
 * In opposite to the Bancha default filter features this only returns
 * a single record.
 *
 * Currently used in the WorkOrder Header class.
 *
 * @banchaRemotable
 * @param  String $ref_table The name of the associated table, e.g. 'contacts'
 * @param  Integer $ref_id   The id property in the associatied table to look for.
 * @return Array             A single CakePHP record
 */
	public function getSingle($ref_table, $ref_id) {
		if(!is_numeric($ref_id)) {
			throw new NotFoundException(__('Invalid id'));
		}
		
		return $this->PhoneNumber->find('first', array(
			'conditions' => array(
				'ref_table' => $ref_table,
				'ref_id'    => $ref_id,
				'primary'	=> 1
			)));
	}
/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->PhoneNumber->create();
			if ($this->PhoneNumber->save($this->request->data)) {

				// provide a return value for Bancha requests
				// never use SessionComponent::setFlash() or Controller::redirect() in Bancha requests
				if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
					return $this->PhoneNumber->getLastSaveResult();
				}

				$this->Session->setFlash(__('The phone number has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {

				// provide a return value for Bancha requests
				// never use SessionComponent::setFlash() in Bancha requests
				if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
					return $this->PhoneNumber->getLastSaveResult();
				}

				$this->Session->setFlash(__('The phone number could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->PhoneNumber->id = $id;
		if (!$this->PhoneNumber->exists()) {
			throw new NotFoundException(__('Invalid phone number'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->PhoneNumber->save($this->request->data)) {

				// provide a return value for Bancha requests
				// never use SessionComponent::setFlash() or Controller::redirect() in Bancha requests
				if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
					return $this->PhoneNumber->getLastSaveResult();
				}

				$this->Session->setFlash(__('The phone number has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {

				// provide a return value for Bancha requests
				// never use SessionComponent::setFlash() in Bancha requests
				if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
					return $this->PhoneNumber->getLastSaveResult();
				}

				$this->Session->setFlash(__('The phone number could not be saved. Please, try again.'));
			}
		} else {
			// Bancha will never do this request, so no return needed here
			$this->request->data = $this->PhoneNumber->read(null, $id);
		}
	}

/**
 * delete method
 *
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->PhoneNumber->id = $id;
		if (!$this->PhoneNumber->exists()) {
			throw new NotFoundException(__('Invalid phone number'));
		}
		if ($this->PhoneNumber->delete()) {

			// provide a return value for Bancha requests
			// never use SessionComponent::setFlash() or Controller::redirect() in Bancha requests
			if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
				return $this->PhoneNumber->getLastSaveResult();
			}

			$this->Session->setFlash(__('Phone number deleted'));
			$this->redirect(array('action' => 'index'));
		}

		// provide a return value for Bancha requests
		// never use SessionComponent::setFlash() or Controller::redirect() in Bancha requests
		if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
			return $this->PhoneNumber->getLastSaveResult();
		}

		$this->Session->setFlash(__('Phone number was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}

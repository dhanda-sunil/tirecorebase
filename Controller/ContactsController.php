<?php
App::uses('AppController', 'Controller');
/**
 * Contacts Controller
 *
 * @property Contact $Contact
 */
class ContactsController extends AppController
{

	public $components = array('RequestHandler','DataTable');

	//public $virtualfields = array('name' => 'CONCAT(Contact.first_name, " ", Contact.last_name');


/**
	 * Scaffold
	 *
	 * @var mixed
	 */
	public function search($customer_id)
	{
//		debug($customer_id);
//		debug($this->request->query);
		$results = array();
		if (!empty($this->request->query['term'])) {
			$term    = $this->request->query['term'];
			$results = $this->Contact->find('all', array(
					'conditions' => array(
						'OR'                => array(
							'Contact.first_name LIKE' => "%$term%",
							'Contact.last_name LIKE'  => "%$term%",
						),
						'Contact.ref_table' => 'customers',
						'Contact.ref_id'    => $customer_id
					),
					'recursive'  => -1,
					'fields'     => array('id', 'first_name','last_name'),
				)
			);

		}
		$toSend=array();
		foreach($results as $contact) {
			$toSend[]=array('label' => sprintf("%s %s", $contact['Contact']['first_name'], $contact['Contact']['last_name']), 'value' => $contact['Contact']['id']);
		}
		$results=$toSend;
		$this->set(compact('results'));
		$this->set('_serialize', array('results'));
	}
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Contact->recursive = 0;
		$this->Paginator->setAllowedFilters(array('ref_table', 'ref_id')); // allow Bancha to remotly filter
		$contacts = $this->paginate();
		$this->set('contacts', $contacts);

		// provide a return value for Bancha requests
		return array_merge($this->request['paging']['Contact'],
			array('records'=>$contacts));
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Contact->id = $id;
		if (!$this->Contact->exists()) {
			throw new NotFoundException(__('Invalid contact'));
		}
		$this->set('contact', $this->Contact->read(null, $id));
        $this->set('_serialize','contact');

		// provide a return value for Bancha requests
		return $this->Contact->data;
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Contact->create();
			if ($this->Contact->save($this->request->data)) {

				// provide a return value for Bancha requests
				// never use SessionComponent::setFlash() or Controller::redirect() in Bancha requests
				if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
					return $this->Contact->getLastSaveResult();
				}

                $this->set('response',array('success'=>1, 'title'=> 'Contact Saved', 'Contact' => $this->Contact->read()));
                $this->set('_serialize','response');
                return;
			} else {

				// provide a return value for Bancha requests
				// never use SessionComponent::setFlash() in Bancha requests
				if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
					return $this->Contact->getLastSaveResult();
				}

                $this->set('response',array('success'=>0, 'errors'=>$this->Contact->validationErrors));
                $this->set('_serialize','response');
                return;
			}
		}
		$customers = $this->Contact->Customer->find('list');
		$this->set(compact('customers'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Contact->id = $id;
		if (!$this->Contact->exists()) {
			throw new NotFoundException(__('Invalid contact'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Contact->save($this->request->data)) {

				// provide a return value for Bancha requests
				// never use SessionComponent::setFlash() or Controller::redirect() in Bancha requests
				if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
					return $this->Contact->getLastSaveResult();
				}

                $this->set('response',array('success'=>1, 'title'=> 'Contact Saved', 'Contact' => $this->Contact->read()));
                $this->set('_serialize','response');
                return;
			} else {

				// provide a return value for Bancha requests
				// never use SessionComponent::setFlash() in Bancha requests
				if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
					return $this->Contact->getLastSaveResult();
				}

                $this->set('response',array('success'=>0, 'errors'=>$this->Contact->validationErrors));
                $this->set('_serialize','response');
                return;
			}
		} else {
			// Bancha will never do this request, so no return needed here
			$this->request->data = $this->Contact->read(null, $id);
		}
		$customers = $this->Contact->Customer->find('list');
		$this->set(compact('customers'));
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
		$this->Contact->id = $id;
		if (!$this->Contact->exists()) {
			throw new NotFoundException(__('Invalid contact'));
		}
		if ($this->Contact->delete()) {

			// provide a return value for Bancha requests
			// never use SessionComponent::setFlash() or Controller::redirect() in Bancha requests
			if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
				return $this->Contact->getLastSaveResult();
			}

			$this->Session->setFlash(__('Contact deleted'));
			$this->redirect(array('action' => 'index'));
		}

		// provide a return value for Bancha requests
		// never use SessionComponent::setFlash() or Controller::redirect() in Bancha requests
		if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
			return $this->Contact->getLastSaveResult();
		}

		$this->Session->setFlash(__('Contact was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
    
    public function getby_type($ref_table, $ref_id = false){
        
        if($this->RequestHandler->responseType() == 'json'){
            
            $conditions = array(
                'active'=>1,
                'ref_table' => $ref_table
            );
            
            if( $ref_id !== false ){
                $conditions = array_merge($conditions, array(
                    'ref_id' => $ref_id
                ));
            }
            
            $this->paginate = array(
                'fields' => array('Contact.first_name','Contact.last_name', 'Contact.phone_number', 'Contact.email','Contact.id'),
                'conditions' => $conditions
            );
            
            $this->DataTable->emptyElements = 1;
            $this->set('contacts',$this->DataTable->getResponse($this,$this->Contact));
            $this->set('_serialize','contacts');
        }
        else{
            
        }
    }
}

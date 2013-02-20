<?php
App::uses('AppController', 'Controller');
/**
 * Cos Controller
 *
 * @property Co $Co
 */
class CosController extends AppController {

/**
 * index method
 *
 * @return void
 */
    public function index() {
        $this->loadModel('CoItemType');
        $this->loadModel("Customer");
        $this->loadModel("TreadDesign");
        $this->Co->recursive = 0;
        $cos = $this->Paginator->paginate();
        $customers=$this->Customer->find('list');
        $treadDesigns=$this->TreadDesign->find('list');
        $lineCodes=$this->CoItemType->find('list', array(
            'conditions' => array('co_item_type_category_id' => 1)
        ));
        $this->set(compact('cos','customers','lineCodes','treadDesigns'));
        $this->layout='mobile';


        // provide a return value for Bancha requests
        // never use SessionComponent::setFlash() in Bancha requests
        if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
        // provide a return value for Bancha requests
        return array_merge($this->request['paging']['Co'],
            array('records'=>$cos));
        }
    }

/**
 * view method
 *
 * @param string $id
 * @return void
 */
    public function view($id = null) {
        $this->Co->id = $id;
        if (!$this->Co->exists()) {
            throw new NotFoundException(__('Invalid co'));
        }
        $this->set('co', $this->Co->read(null, $id));

        // provide a return value for Bancha requests
        return $this->Co->data;
    }

/**
 * add method
 *
 * @return void
 */
    public function add() {
        if ($this->request->is('post')) {
            $this->Co->create();

            // now set the CoStatus to open
            $this->Co->bindModel(array('belongsTo'=>array('CoStatus')));
            $co_status = $this->Co->CoStatus->findByName('Open');
            $this->request->data['Co']['co_status_id'] = $co_status['CoStatus']['id'];

            if ($this->Co->save($this->request->data)) {

                // provide a return value for Bancha requests
                // never use SessionComponent::setFlash() or Controller::redirect() in Bancha requests
                if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
                    return $this->Co->getLastSaveResult();
                }

                $this->Session->setFlash(__('The co has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {

                // provide a return value for Bancha requests
                // never use SessionComponent::setFlash() in Bancha requests
                if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
                    return $this->Co->getLastSaveResult();
                }

                $this->Session->setFlash(__('The co could not be saved. Please, try again.'));
            }
        }
    }

/**
 * @banchaRemotable
 * This function searches though Customer.company_name, 
 * as well as Co.ref and Account
 * 
 * Currently used in the TreadTracks WorkOrder WorkOrderSelection screen
 *
 * @param string $search the search values, separated by one or more spaces
 * @return Object[] an array of object with the fields id, ref, account 
 *                  and company_name, contact_name (will also send all the 
 *                  ids for faster loading of associated records)
 */
    public function search($params=array()) {

        // search specific conditions
        $searchConditions = array();
        $params['search'] = isset($params['search']) ? $params['search'] : '';
        $strings = split(' ', $params['search']);
        $afterFindStringConditions = array();
        if(count($strings)>0 && !empty($strings[0])) {

            // there are some search conditions, add each individually
            foreach($strings as $string) {
                if(is_numeric($string)) {
                    //it's a number, so only search in the account number and the work order ref
                    $searchConditions[] = array(
                        'OR' => array(
                            array('Co.ref LIKE' => '%'.$string.'%'),
                            array('Co.id LIKE' => '%'.$string.'%'),
                            array('Account.number LIKE' => '%'.$string.'%')
                        )
                    );
                } else if(strlen($string)>2) {
                    //for string searches we expect at least three chars
                    //it could be everywhere, so let's check after the find
                    $afterFindStringConditions[] = $string;
                }
            }
        }


        // we will need some advanced searching
        $this->Co->Behaviors->attach('Containable');


        $sortOrder = 'Co.ref';
        if(!empty($this->params['named']['sort'])) {
            switch ($this->params['named']['sort']) {
                case 'ref':
                    $sortOrder = 'Co.ref';
                    break;
                case 'account_number':
                    $sortOrder = 'Account.number';
                    break;
                default:
                    // could not recognize it, so ignore
                    break;
            }
        }
        $sortOrder .= ' ' . (!empty($this->params['named']['sort']) ? $this->params['named']['direction'] : 'ASC');

        $conditions = array(
            'order' => $sortOrder,
            'conditions' => array_merge(array(
                array('OR' => array(
                    array('CoStatus.name' => 'Building'),
                    array('CoStatus.name' => 'Open'),
                )),
                $searchConditions
            )),

            // load only necessary data
            'fields' => array('id','ref','account_id'),
            'contain' => array(
                'Account' => array(
                    'fields' => array('number', 'customer_id'),
                    'Customer' => array(
                        'fields' => array(
                            'company_name'/*,
                            'first_name',
                            'last_name'*/
                        )
                    )
                ),
                'CoStatus' => array(
                    'fields' => array('name')
                )
            )
        );

        // enforce limit
        // we can only enforce the limit before if there's not after find filtering
        if(count($afterFindStringConditions) == 0) {
            $conditions['page'] = $this->params['named']['page'];
            $conditions['limit'] = $this->params['named']['limit'];
        } 

        //  make the database lookup
        $result = $this->Co->find('all', $conditions);

        // transform result
        $result = array_map(function($record) {
            $data = array_merge(
                isset($record['Account']) ? $record['Account'] : array('number'=>''),
                isset($record['Account']['Customer']) ? $record['Account']['Customer'] : array(
                    /*'first_name' => '',
                    'last_name' => '',*/
                    'company_name' => ''
                    ),
                $record['Co'] // this must be the last one, so that id
                );
            
            // transform the fields as needed
            //$data['customer_name'] =  (!empty($data['first_name']) ? $data['first_name'].' ' : '') . $data['last_name']; // TODO internationalize
            
            ###################################################
            ############## TEMPORARY PLACEHOLDER ##############
            
            $data['contact_name'] = 'CONTACT_NAME';
            
            ###################################################
            
            
            $data['account_number'] = isset($data['number']) ? $data['number'] : '';
            unset($data['number']);

            return $data;
        }, $result);

        if(count($afterFindStringConditions) == 0) {
            return array(
                'success' => true,
                'data' => $result,
                'total' => $this->Co->find('count', $conditions)
            );
        }

        // check after find filters
        // this is checked after the transformation because otherwise we would need a lot of if isset
        $result = array_filter($result, function($record) use ($afterFindStringConditions) {
            // check if the record has all needed search strings
            foreach($afterFindStringConditions as $str) {
                $pattern = '/'.$str.'/i';
                if( preg_match($pattern, $record['ref']) !== 1 && 
                    preg_match($pattern, $record['account_number']) !== 1 && 
                    preg_match($pattern, $record['company_name']) !== 1 /*&& 
                    preg_match($pattern, $record['first_name']) !== 1 && 
                    preg_match($pattern, $record['last_name']) !== 1*/) {
                    // nono of the fields has the search string in it
                    // so this is not a valid record, dismiss it
                    return false; 
                }
            }
            return true;
        });
        // the keys may not be in sequence anymore, fix that
        $result = array_values($result);

        // enforce limit
        $limit = $this->params['named']['limit'];
        $start = ($this->params['named']['page']-1)*$limit;
        return array(
            'success' => true,
            'data' => array_slice($result, $start, $limit),
            'total' => count($result)
        );
    }
/**
 * edit method
 *
 * @param string $id
 * @return void
 */
    public function edit($id = null) {
        $this->Co->id = $id;
        if (!$this->Co->exists()) {
            throw new NotFoundException(__('Invalid co'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Co->save($this->request->data)) {

                // provide a return value for Bancha requests
                // never use SessionComponent::setFlash() or Controller::redirect() in Bancha requests
                if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
                    return $this->Co->getLastSaveResult();
                }

                $this->Session->setFlash(__('The co has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {

                // provide a return value for Bancha requests
                // never use SessionComponent::setFlash() in Bancha requests
                if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
                    return $this->Co->getLastSaveResult();
                }

                $this->Session->setFlash(__('The co could not be saved. Please, try again.'));
            }
        } else {
            // Bancha will never do this request, so no return needed here
            $this->request->data = $this->Co->read(null, $id);
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
        $this->Co->id = $id;
        if (!$this->Co->exists()) {
            throw new NotFoundException(__('Invalid co'));
        }
        if ($this->Co->delete()) {

            // provide a return value for Bancha requests
            // never use SessionComponent::setFlash() or Controller::redirect() in Bancha requests
            if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
                return $this->Co->getLastSaveResult();
            }

            $this->Session->setFlash(__('Co deleted'));
            $this->redirect(array('action' => 'index'));
        }

        // provide a return value for Bancha requests
        // never use SessionComponent::setFlash() or Controller::redirect() in Bancha requests
        if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
            return $this->Co->getLastSaveResult();
        }

        $this->Session->setFlash(__('Co was not deleted'));
        $this->redirect(array('action' => 'index'));
    }

    /*
     * @banchaRemotable
     * Get Unique ref id
     * @todo Need to build in better logic to avoid duplicate ref_ids published ... this is just a reference for right now
     *
     */
    public function getUniqueRef() {

        $maxRef = $this->find('first',array('fields' => array('MAX(Cos.ref) AS maxRef')));
        return $maxRef[0]['maxRef'] + 1;
    }

}
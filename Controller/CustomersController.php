<?php
App::uses('AppController', 'Controller');
/**
 * Customers Controller
 *
 * @property Customer $Customer
 */
class CustomersController extends AppController
{


    public $uses = array('Customer', 'Preference', 'RetreadTemplate', 'Contact', 'Address', 'User', 'Account');
    public $components = array('DataTable');

    public function sidebar_action() {

    }

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->Customer->unbindModelAll();

        // provide a return value for Bancha requests
        if (isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
            $customers = $this->paginate(null, array(
                'OR'     => array(
                    array('deleted' => '0000-00-00 00:00:00'), // don't show deleted records <-- move this to the model:beforeFind
                    array('deleted' => NULL),
                ),
                'active' => 1
            ));

            $this->set('customers', $customers);
            return array_merge($this->request['paging']['Customer'],
                array('records' => $customers));
        } elseif ($this->RequestHandler->responseType() == 'json') {
            $this->paginate                 = array(
                'fields'     => array('Customer.company_name', 'Customer.phone_number', 'Customer.fax_number', 'Customer.website', 'Customer.tax_number', 'Customer.id'),
                'conditions' => array(
                    'active' => 1
                ),
                'contain'    => array()
            );
            $this->set('customers', $this->DataTable->getResponse($this, $this->Customer));
            $this->set('_serialize', 'customers');
        } else {
            $this->set('retread_templates', $this->RetreadTemplate->find('list'));
            $this->set('salesperson', $this->User->find('all', array('conditions' => array('UserGroup.name' => 'Sales'))));
        }
    }

    /**
     * view method
     *
     * @param string $id
     *
     * @return void
     */
    public function view($id = null) {

        $this->Customer->id = $id;

        if (!$this->Customer->exists()) {
            throw new NotFoundException(__('Invalid customer'));
        }

        $this->set('customer', $this->Customer->read());

        if (isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
            // provide a return value for Bancha requests
            return $this->Customer->data;
        } else if ($this->RequestHandler->responseType() == 'json') {
            $this->set('_serialize', 'customer');
            return;
        }
    }

    /**
     * @banchaRemotable
     * This function searches though id, company_name
     *
     * Currently used in the TreadTracks WorkOrder CustomerSelection screen
     *
     * @param string $search the search values, separated by one or more spaces
     *
     * @return Object[] an array of customer records
     */
    public function search($params = array()) {

        // search specific conditions
        $searchConditions          = array();
        $params['search']          = isset($params['search']) ? $params['search'] : '';
        $strings                   = split(' ', $params['search']);
        $afterFindStringConditions = array();
        if (count($strings) > 0 && !empty($strings[0])) {

            // there are some search conditions, add each individually
            foreach ($strings as $string) {
                if (is_numeric($string)) {
                    //it's a number, so only search on id
                    $searchConditions[] = array(
                        array('Customer.id =' => $string)
                    );
                } else if (strlen($string) > 2) {
                    //for string searches we expect at least three chars
                    $searchConditions[] = array(
                        'OR' => array(
                            array('Customer.company_name LIKE' => '%' . $string . '%') /*,
                            array('Customer.first_name LIKE' => '%'.$string.'%'),
                            array('Customer.last_name LIKE' => '%'.$string.'%')*/
                        )
                    );
                }
            }
        }

        // use pagination, it already handles sorting and pagination for us
        $this->Customer->recursive = 0;
        $customers                 = $this->paginate(null, array(
            'OR'     => array(
                array('deleted' => '0000-00-00 00:00:00'), // don't show deleted records <-- move this to the model:beforeFind
                array('deleted' => NULL),
            ),
            'active' => 1,
            $searchConditions
        ));
        $this->set('customers', $customers);

        // provide a return value for Bancha requests
        return array_merge($this->request['paging']['Customer'],
            array('records' => $customers));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {

        if ($this->request->is('post') || $this->request->is('put')) {

            $this->Customer->create();
            if ($this->Customer->save($this->request->data)) {
                // provide a return value for Bancha requests
                // never use SessionComponent::setFlash() or Controller::redirect() in Bancha requests
                if (isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
                    return $this->Customer->getLastSaveResult();
                }
                //$this->Session->setFlash(__('The customer has been saved'));

                $this->set('response', array('success' => 1, 'title' => 'Customer Saved', 'Customer' => $this->Customer->read()));
                $this->set('_serialize', 'response');
            } else {
                if (isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
                    return $this->Contact->getLastSaveResult();
                }
                $this->set('response', array('success' => 0, 'errors' => $this->Customer->validationErrors));
                $this->set('_serialize', 'response');
            }
        } else {

            // provide a return value for Bancha requests
            // never use SessionComponent::setFlash() in Bancha requests
            if (isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
                return $this->Customer->getLastSaveResult();
            }

            $this->set('response', array('success' => 0, 'errors' => 'Unknown error encountered'));
            $this->set('_serialize', 'response');
        }
    }

    /**
     * edit method
     *
     * @param string $id
     *
     * @return void
     */
    public function edit($id = null) {
        $this->Customer->id = $id;

        if (!$this->Customer->exists()) {
            throw new NotFoundException(__('Invalid customer'));
        }

        if ($this->request->is('post') || $this->request->is('put')) {

            if ($this->Customer->save($this->request->data)) {

                // provide a return value for Bancha requests
                // never use SessionComponent::setFlash() or Controller::redirect() in Bancha requests
                if (isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
                    return $this->Customer->getLastSaveResult();
                }

                $customer = $this->Customer->read();

                $this->set('response', array(
                    'success'  => 1,
                    'Customer' => $customer,
                    'title'    => 'Saved Customer'
                ));
                $this->set('_serialize', 'response');

            } else {

                // provide a return value for Bancha requests
                // never use SessionComponent::setFlash() in Bancha requests
                if (isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
                    return $this->Customer->getLastSaveResult();
                }

                $this->set('response', array('success' => 0, 'errors' => $this->Customer->validationErrors));
                $this->set('_serialize', 'response');
            }
        } else {
            // Bancha will never do this request, so no return needed here
            //$this->request->data = $this->Customer->read(null, $id);
            $this->set('response', array('success' => 0, 'errors' => array('success' => 0, 'errors' => array('Not HTTP POST/PUT'))));
            $this->set('_serialize', 'response');
        }
    }

    /**
     * delete method
     *
     * @param string $id
     *
     * @return void
     */
    public function delete($id = null) {
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        $this->Customer->id = $id;
        if (!$this->Customer->exists()) {
            throw new NotFoundException(__('Invalid customer'));
        }
        if ($this->Customer->delete()) {

            // provide a return value for Bancha requests
            // never use SessionComponent::setFlash() or Controller::redirect() in Bancha requests
            if (isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
                return $this->Customer->getLastSaveResult();
            }

            $this->Session->setFlash(__('Customer deleted'));
            $this->redirect(array('action' => 'index'));
        }

        // provide a return value for Bancha requests
        // never use SessionComponent::setFlash() or Controller::redirect() in Bancha requests
        if (isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
            return $this->Customer->getLastSaveResult();
        }

        $this->Session->setFlash(__('Customer was not deleted'));
        $this->redirect(array('action' => 'index'));
    }

    public function get_accounts($customer_id) {
        if ($this->RequestHandler->responseType() == 'json') {
            $this->paginate = array(
                'fields'     => array('Account.number', 'BillingAddress.name', 'ShippingAddress.name', 'User.first_name', 'AccountType.name', 'Account.id'),
                'conditions' => array(
                    'Account.customer_id' => $customer_id
                )
            );

            $this->DataTable->emptyElements = 1;
            $this->set('accounts', $this->DataTable->getResponse($this, $this->Account));
            $this->set('_serialize', 'accounts');
        }
    }

    public function import() {
//        if (!$this->request->is('post')) {
//            throw new MethodNotAllowedException();
//        }
        $status  = array();
        $dataset = array();
        $lines = array();
        $lineNum = 0;
        if (isset($this->request->data['file']) && $this->request->data['file']['size'] > 0) {
            $handle = fopen($this->request->data['file']['tmp_name'], 'r');
            while (($line = fgetcsv($handle)) !== FALSE && $status == array()) {
                if ($lineNum === 0) {
                    $lineNum++;
                    continue;
                }
                $lines[]=$line;
                list($acct, $xref, $bName, $b1, $b2, $bCity, $bState, $bZip, $sName, $s1, $s2, $sCity, $sState, $sZip) = $line;
                // Create Company
                $companyData = array('Customer' => array(
                    'company_name' => $bName ? $bName : $xref,
                    'keywords'     => $xref,
//                    'tax_number_expiration' => '000-00-00',
//                    'website' => '',
//                    'phone_number' => '',
//                    'fax_number' => '',
//                    'email' => '',
//                    'tax_number' => '',
                    'is_company' => 1,
//                    'customer_location_id' => 0,
//                    'deleted' => '0000-00-00',
//                    'deleted_by'=>0
                )
                );

                $billData = array('Address' => array(
                    'ref_table'  => 'accounts',
                    'name'       => $bName,
                    'line1'      => $b1,
                    'line2'      => $b2,
                    'city'       => $bCity,
                    'state'      => $bState,
                    'zip'        => $bZip,
                    'is_billing' => 1,
                    'ref_id' => -10 // For switching later
                )
                );

                $shipData    = array('Address' => array(
                    'ref_table'   => 'accounts',
                    'name'        => $sName ? $sName : $bName,
                    'line1'       => $s1,
                    'line2'       => $s2,
                    'city'        => $sCity,
                    'state'       => $sState,
                    'zip'         => $sZip,
                    'is_shipping' => 1,
                    'ref_id' => -10 // For switching later
                )
                );
                $accountData = array('Account' => array(
                    'number' => $acct, 'active' => 1, 'account_type_id' => 1
                ));
                $this->Customer->create();
                if ($this->Customer->save($companyData)) {
                    $customerID                    = $this->Customer->id;
                    $billData['Address']['ref_id'] = $customerID;
                    $shipData['Address']['ref_id'] = $customerID;
                    $this->Customer->Address->create();
                    if ($this->Customer->Address->save($billData)) {
                        $billID = $this->Customer->Address->id;
                        $this->Customer->Address->create();
                        if ($this->Customer->Address->save($shipData)) {
                            $shipID                            = $this->Customer->Address->id;
                            $accountData['Account']['customer_id']        = $customerID;
                            $accountData['Account']['default_bill_to_id'] = $billID;
                            $accountData['Account']['default_ship_to_id'] = $shipID;
                            $this->Customer->Account->create();
                            if ($this->Customer->Account->save($accountData)) {
                                $accountID = $this->Customer->Account->id;
                                $this->Customer->Address->updateAll(array('Address.ref_id'=>$accountID), array('Address.ref_id'=>-10));
                                $dataset[] = array($companyData, $billData, $shipData, $accountData);
                            } else {
                                $status[] = array("Account failed", $accountData);
                            }
                        } else {
                            $status[] = array("Ship failed", $shipData);
                        }
                    } else {
                        $status[] = array("Bill failed", $billData);
                    }
                } else {
                    $status[] = array("Company Failed", $companyData);
                }
                $lineNum++;

            }
        }
        $this->set(compact('dataset', 'status','lines'));
        $this->set("_serialize", array($status));

    }
}

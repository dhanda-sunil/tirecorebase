<?php
App::uses('AppController', 'Controller');
/**
 * TreadDesigns Controller
 *
 * @property TreadDesign $TreadDesign
 */
class TreadDesignsController extends AppController
{

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->TreadDesign->recursive = 0;
//        $treadDesigns = $this->paginate('TreadDesign',array(
//            'fields' => array('TreadDesign.id','TreadDesign.name'),
//            'linkable' => array(
//                'TreadDesignTreadWidth' => array('TreadWidth'),
//            )
//        ));
        $this->paginate = array(
            //'fields' => array('id'),
            'contain' => array(
                'TreadDesignTreadWidth' => array(
                    'TreadWidth'
                ),
                'Vendor' => array(
                    'fields' => array('Vendor.name','Vendor.id')
                    )

            )
        );
        $treadDesigns                 = $this->paginate();
//        $treadDesigns                 = $this->paginate(array(
//                'fields' => array('TreadDesign.name'),
//
//            )
//        );
        $this->set('treadDesigns', $treadDesigns);
//        $this->set('testing',$testing);

        // provide a return value for Bancha requests
        if (isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
            return array_merge($this->request['paging']['TreadDesign'],
                array('records' => $treadDesigns));
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
        $this->TreadDesign->id = $id;
        if (!$this->TreadDesign->exists()) {
            throw new NotFoundException(__('Invalid tread design'));
        }
        $this->set('treadDesign', $this->TreadDesign->read(null, $id));

        // provide a return value for Bancha requests
        return $this->TreadDesign->data;
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->TreadDesign->create();

            if (isset($this->request->data['TreadDesign']['image']) && $this->request->data['TreadDesign']['image']['size'] > 0) {
                $this->request->data['TreadDesign']['image_type'] = $this->request['data']['TreadDesign']['image']['type'];
                $this->request->data['TreadDesign']['image']      = file_get_contents($this->request['data']['TreadDesign']['image']['tmp_name']);
            }

            if ($this->TreadDesign->save($this->request->data)) {

                // provide a return value for Bancha requests
                // never use SessionComponent::setFlash() or Controller::redirect() in Bancha requests
                if (isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
                    return $this->TreadDesign->getLastSaveResult();
                }

                $this->Session->setFlash(__('The tread design has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {

                // provide a return value for Bancha requests
                // never use SessionComponent::setFlash() in Bancha requests
                if (isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
                    return $this->TreadDesign->getLastSaveResult();
                }

                $this->Session->setFlash(__('The tread design could not be saved. Please, try again.'));
            }
        }
        $vendors = $this->TreadDesign->Vendor->find('list');
        $this->set(compact('vendors'));
        $this->set('_serialize', 'vendors');

    }

    /**
     * edit method
     *
     * @param string $id
     *
     * @return void
     */
    public function edit($id = null) {
        $this->TreadDesign->id = $id;
        if (!$this->TreadDesign->exists()) {
            throw new NotFoundException(__('Invalid tread design'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            print_r($this->request['data']);

            if (isset($this->request['data']['TreadDesign']['image'])) {
                if ($this->request['data']['TreadDesign']['image']['size'] > 0) {
                $this->request->data['TreadDesign']['image_type'] = $this->request['data']['TreadDesign']['image']['type'];
                $this->request->data['TreadDesign']['image']      = file_get_contents($this->request['data']['TreadDesign']['image']['tmp_name']);
            } else {
                    unset($this->request->data['TreadDesign']['image']);
                }
            }

            if ($this->TreadDesign->save($this->request->data)) {

                // provide a return value for Bancha requests
                // never use SessionComponent::setFlash() or Controller::redirect() in Bancha requests
                if (isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
                    return $this->TreadDesign->getLastSaveResult();
                }

                $this->Session->setFlash(__('The tread design has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {

                // provide a return value for Bancha requests
                // never use SessionComponent::setFlash() in Bancha requests
                if (isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
                    return $this->TreadDesign->getLastSaveResult();
                }

                $this->Session->setFlash(__('The tread design could not be saved. Please, try again.'));
            }
        } else {
            // Bancha will never do this request, so no return needed here
            $this->request->data = $this->TreadDesign->read(null, $id);
        }
        $vendors = $this->TreadDesign->Vendor->find('list');
        $this->set(compact('vendors'));
        $this->set('_serialize', 'vendors');
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
        $this->TreadDesign->id = $id;
        if (!$this->TreadDesign->exists()) {
            throw new NotFoundException(__('Invalid tread design'));
        }
        if ($this->TreadDesign->delete()) {

            // provide a return value for Bancha requests
            // never use SessionComponent::setFlash() or Controller::redirect() in Bancha requests
            if (isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
                return $this->TreadDesign->getLastSaveResult();
            }

            $this->Session->setFlash(__('Tread design deleted'));
            $this->redirect(array('action' => 'index'));
        }

        // provide a return value for Bancha requests
        // never use SessionComponent::setFlash() or Controller::redirect() in Bancha requests
        if (isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
            return $this->TreadDesign->getLastSaveResult();
        }

        $this->Session->setFlash(__('Tread design was not deleted'));
        $this->redirect(array('action' => 'index'));
    }

    public function viewimage($id) {
        $this->autoRender = false;
        $treadDesign      = $this->TreadDesign->findById($id);
        if ($treadDesign && !empty($treadDesign['TreadDesign']['image']) && !empty($treadDesign['TreadDesign']['image_type'])) {
            header("Content-type: " . $treadDesign['TreadDesign']['image_type']);
            echo $treadDesign['TreadDesign']['image'];
        } else {
            $this->redirect('/img/tread_default.jpg');
        }
    }
}

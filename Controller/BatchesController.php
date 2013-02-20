<?php
App::uses('AppController', 'Controller');
/**
 * Batches Controller
 *
 * @property Batch $Batch
 */
class BatchesController extends AppController
{


	/**
	 * index method
	 *
	 * @return void
	 */
	public function index()
	{
		$this->Batch->recursive = 0;

		$batches = $this->Paginator->paginate();
		foreach ($batches as $item => $val) {
			if (!empty($val['Batch']['data'])) {
				$batches[$item]['Batch']['data'] = $this->implodeBatch($val['Batch']['data']);
			}
		}


		$this->set('batches', $batches);
	}

/**
 * retreives an inventory batch and sets $batch as array/json
 * @param integer $id
 * @return void
 */
    public function getinventory(){
        if($this->request->is('ajax')) {
            $batch = $this->Batch->getCalculatedInventoryBatch($this->request->data['Batch']['id']);
            $this->set('batch',array_values($batch));
            $this->set('_serialize','batch');
        }
    }
    

	/**
	 * view method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function view($id = null)
	{
		$this->Batch->id = $id;
		if (!$this->Batch->exists()) {
			throw new NotFoundException(__('Invalid batch'));
		}

		$batch = $this->Batch->read(null, $id);
		$this->set('batch', $batch);
	}

	/**
	 * Implodes multi-dimensional array
	 *
	 * @param $data
	 * @param string $separator -- first character: first level, second character: 2nd level, etc.
	 * @return string
	 */
	protected function implodeBatch($data, $separator = "|:/")
	{
		foreach ($data as $key => $val) {
			$data[$key] = is_array($val) ? $this->implodeBatch($val, substr($separator, 1)) : $val;
		}
		return implode(substr($separator, 0, 1), $data);
	}


	/**
	 * add method
	 *
	 * @return void
	 */
	public function add()
	{
		if ($this->request->is('post')) {
			$this->Batch->create();
			if ($this->Batch->save($this->request->data)) {
				if ($this->request->is('ajax')) {
					$this->set('message', "Sent successfully");
					$this->set('id', $this->Batch->id);
					$this->set('_serialize', array('message', 'id'));
					return;
				}
				$this->Session->setFlash(__('The batch has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The batch could not be saved. Please, try again.'));
			}
		}

	}

	/**
	 * edit method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function edit($id = null)
	{
		$this->Batch->id = $id;
		if (!$this->Batch->exists()) {
			throw new NotFoundException(__('Invalid batch'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Batch->save($this->request->data)) {
				$this->Session->setFlash(__('The batch has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The batch could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Batch->read(null, $id);
		}
	}

	/**
	 * delete method
	 *
	 * @throws MethodNotAllowedException
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function delete($id = null)
	{
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Batch->id = $id;
		if (!$this->Batch->exists()) {
			throw new NotFoundException(__('Invalid batch'));
		}
		if ($this->Batch->delete()) {
			$this->Session->setFlash(__('Batch deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Batch was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}

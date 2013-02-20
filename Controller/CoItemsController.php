<?php
App::uses('AppController', 'Controller');
/**
 * CoItems Controller
 *
 * @property CoItem $CoItem
 */
class CoItemsController extends AppController
{

	/**
	 * index method
	 *
	 * @return void
	 */
	public function index()
	{
		$this->CoItem->recursive = 0;
		$coItems                 = $this->paginate();
		$this->set('coItems', $coItems);

		// provide a return value for Bancha requests
		return array_merge($this->request['paging']['CoItem'],
			array('records' => $coItems));
	}

	/**
	 * @banchaRemotable
	 * @param string $id
	 * @return void
	 */
	public function getByCasingId($id = null)
	{
		// provide a return value for Bancha requests
		$this->CoItem->recursive = -1;
		return $this->CoItem->findByCasingId($id);
	}

	/**
	 * @banchaRemotable
	 * Get's all CoItems of the Co where of type service
	 * Also consideres the remote filter (is used for setting the co_id)
	 */
	public function getCoServiceItems($data)
	{
		// allways expect an co id filter
		if (!isset($this->request->params['named']['conditions']['CoItem.co_id'])) {
			throw new NotFoundException(__('Expected an Co.id for filtering'));
		}

		if (substr($this->request->params['named']['conditions']['CoItem.co_id'], 0, 3) == 'ext') {
			// record doesn't yet exist
			return array();
		}

		// use containable for complex query
		$this->CoItem->Behaviors->load('Containable');

		// bind associations
		$this->CoItem->bindModel(array(
			'belongsTo' => array('Casing', 'CoItemType'),
		));
		$this->CoItem->CoItemType->bindModel(array(
			'belongsTo' => array('CoItemTypeCategory'),
		));

		// figure out the service category id
		$service = $this->CoItem->CoItemType->CoItemTypeCategory->findByName('Service');

		// find data
		$coItems = $this->CoItem->find('all', array(
			'fields'     => array('id', 'co_id', 'line_number', 'co_item_type_id', 'desc'),
			'conditions' => array_merge(
				$this->request->params['named']['conditions'], // remoteFilter conditions
				array('CoItemType.co_item_type_category_id' => $service['CoItemTypeCategory']['id'])
			)
		));

		return $coItems;
	}

	/**
	 * @banchaRemotable
	 * Get's all CoItems of the Co where of type casing with given id and merges with Casings data
	 * Also consideres the remote filter (is used for setting the co_id)
	 */
	public function getCoCasingItems($data)
	{
		// allways expect an co id filter
		if (!isset($this->request->params['named']['conditions']['CoItem.co_id'])) {
			throw new NotFoundException(__('Expected a Co.id for filtering'));
		}

		if (substr($this->request->params['named']['conditions']['CoItem.co_id'], 0, 3) == 'ext') {
			// record doesn't yet exist
			return array();
		}

		// use containable for complex query
		$this->CoItem->Behaviors->attach('Containable');

		// bind associations
		$this->CoItem->bindModel(array(
			'belongsTo' => array('Casing', 'CoItemType'),
		));
		$this->CoItem->CoItemType->bindModel(array(
			'belongsTo' => array('CoItemTypeCategory'),
		));
		$this->CoItem->Casing->bindModel(array(
			'belongsTo' => array('ManufacturerPlant', 'ManufacturerProductLine'),
		));
		$this->CoItem->Casing->ManufacturerPlant->bindModel(array(
			'hasMany'   => array('ManufacturerPlantSize'),
			'belongsTo' => array('Manufacturer')
		));
		$this->CoItem->Casing->ManufacturerPlant->ManufacturerPlantSize->bindModel(array(
			'belongsTo' => array('TireSize'),
		));


		// figure out the service category id
		$casing = $this->CoItem->CoItemType->CoItemTypeCategory->findByName('Casing');

		// find data
		$coItems = $this->CoItem->find('all', array(
			'fields'     => array('id', 'co_id', 'line_number', 'casing_id', 'co_item_type_id'), //containable needs casing_id field
			'conditions' => array_merge(
				$this->request->params['named']['conditions'], // remoteFilter conditions
				array('CoItemType.co_item_type_category_id' => $casing['CoItemTypeCategory']['id'])
			),
			'contain'    => array(
				'Casing'     => array(
					'fields'                  => array('barcode', 'tire_size_id', 'tread_design_id', 'production_week',
						'remaining_tread', 'vehicle_number', 'brand_number', 'manufacturer_id', 'previous_caps',
						'size_id', 'production_week', 'plant_dot', 'size_dot', 'product_line_dot'
					),
					'ManufacturerPlant'       => array(
						'fields'                => array('id', 'manufacturer_id', 'code'),
						'Manufacturer'          => array(
							'fields' => array('name')
						),
						'ManufacturerPlantSize' => array(
							'fields'     => array('size_code'),
							'conditions' => array(
								'ManufacturerPlantSize.tire_size_id' => 'Casing.tire_size_id'),
							/*
							'TireSize' => array(
								'fields' => array('id')
							)*/
						),
					),
					'ManufacturerProductLine' => array(
						'fields' => array('dot_code')
					),
				),
				'CoItemType' => array(
					'fields' => array('id')
				)
			)
		));

		// add the necessary casing field and return only the coItem, everything else is done by Bancha
		$coItems = array_map(function ($record) {

			// already in array: 'co_id', 'casing_id', line_number', 'co_item_type_id'
			$record['CoItem']['barcode']         = empty($record['Casing']['barcode']) ? null : $record['Casing']['barcode'];
			$record['CoItem']['tread_design_id'] = empty($record['Casing']['tread_design_id']) ? null : $record['Casing']['tread_design_id'];
			$record['CoItem']['remaining_tread']     = empty($record['Casing']['remaining_tread']) ? 0 : $record['Casing']['remaining_tread'];
			$record['CoItem']['vehicle_number']  = empty($record['Casing']['vehicle_number']) ? '' : $record['Casing']['vehicle_number'];
			$record['CoItem']['brand_number']    = empty($record['Casing']['brand_number']) ? '' : $record['Casing']['brand_number'];
			$record['CoItem']['previous_caps']   = empty($record['Casing']['previous_caps']) ? 0 : $record['Casing']['previous_caps'];

			// the dot field -- Check the override fields first, then the 'id' fields, then fall back to dashes
			$record['CoItem']['dot_code'] = empty($record['Casing']['plant_dot']) ?
				(empty($record['Casing']['ManufacturerPlant']['code']) ? '--' : $record['Casing']['ManufacturerPlant']['code'])
				: $record['Casing']['plant_dot'];
			$record['CoItem']['dot_code'] .= empty($record['Casing']['size_dot']) ?
				(empty($record['Casing']['tire_size_id']) ? '--' : ClassRegistry::getObject('Casing')->findTireSizeCode($record['Casing']['tire_size_id'], $record['Casing']['manufacturer_plant_id']))
				: $record['Casing']['size_dot'];
			$record['CoItem']['dot_code'] .= empty($record['Casing']['product_line_dot']) ?
				(empty($record['Casing']['ManufacturerProductLine']['dot_code']) ? '----' : $record['Casing']['ManufacturerProductLine']['dot_code'])
				: $record['Casing']['product_line_dot'];
			$record['CoItem']['dot_code'] .= empty($record['Casing']['production_week']) ? '----' : $record['Casing']['production_week'];

			// retrieved data from dot code -- check overrides first
			$record['CoItem']['manufacturer_name'] = empty($record['Casing']['ManufacturerPlant']['Manufacturer']['name']) ? null : $record['Casing']['ManufacturerPlant']['Manufacturer']['name'];

			$record['CoItem']['manufacturer_id']              = empty($record['Casing']['manufacturer_id']) ?
				(empty($record['Casing']['ManufacturerPlant']['manufacturer_id']) ? null : $record['Casing']['ManufacturerPlant']['manufacturer_id'])
				: $record['Casing']['manufacturer_id'];
			$record['CoItem']['tire_size_id']                 = empty($record['Casing']['size_id']) ?
				(empty($record['Casing']['tire_size_id']) ? null : $record['Casing']['tire_size_id'])
				: $record['Casing']['size_id'];
			$record['CoItem']['manufacturer_product_line_id'] = empty($record['Casing']['manufacturer_product_line_id']) ? null : $record['Casing']['manufacturer_product_line_id'];

			return $record['CoItem'];
		}, $coItems);

		return $coItems;
	}


	/**
	 * @banchaRemotable
	 * Creates a new CoItem for the casings table
	 */
	public function createCoCasingItem($data)
	{
		if (!isset($this->request->params['isBancha']) || !$this->request->params['isBancha']) {
			throw new NotFoundException(__('This function is only for Bancha requests'));
		}

		return $this->saveCoCasingItem(null, null);
	}

	/**
	 * @banchaRemotable
	 */
	public function updateCoCasingItem($id = null)
	{
		$this->CoItem->id = $id;
		if (!$this->CoItem->exists()) {
			throw new NotFoundException(__('Invalid co item'));
		}
		if (!isset($this->request->params['isBancha']) || !$this->request->params['isBancha']) {
			throw new NotFoundException(__('This function is only for Bancha requests'));
		}

		return $this->saveCoCasingItem($id, $this->request->data['CoItem']['casing_id']);
	}


	/**
	 * Creates or updates an CoCasingItem depending on if the ids are set or null
	 *
	 * @param  [type] $data       [description]
	 * @param  [type] $co_item_id [description]
	 * @param  [type] $casing_id  [description]
	 * @return [type]             [description]
	 */
	private function saveCoCasingItem($co_item_id, $casing_id)
	{
		$original_data = $this->request->data['CoItem'];

		$this->CoItem->Behaviors->load('Containable');

		// bind associations
		$this->CoItem->bindModel(array(
			'belongsTo' => array('Casing', 'CoItemType', 'Co'),
		));
		$this->CoItem->Casing->bindModel(array(
			'belongsTo' => array('ManufacturerPlant', 'ManufacturerProductLine'),
		));


		//check if we have all DOT code values, if not insert them into respective tables
		//$parseResponse = $this->parseDotCodeForInsert($original_data['dot_code'], $original_data);
		$parseResponse = $this->CoItem->Casing->parseDOT($original_data['dot_code']);

		// only save the casing data here
		$casing_data = array(
			// directly entered data
			'id'                           => $casing_id,
			'barcode'                      => $original_data['barcode'],
			'tread_design_id'              => $original_data['tread_design_id'],
			'customer_id'                  => $original_data['customer_id'],
			'remaining_tread'                  => empty($original_data['remaining_tread']) ? 0 : $original_data['remaining_tread'],
			'vehicle_number'               => empty($original_data['vehicle_number']) ? '' : $original_data['vehicle_number'],
			'brand_number'                 => empty($original_data['brand_number']) ? '' : $original_data['brand_number'],

			// retrieved from the dot code
			'manufacturer_plant_id'        => $parseResponse['manufacturer_plant_id'],
			'tire_size_id'                 => $parseResponse['size_id'],
			'manufacturer_product_line_id' => $parseResponse['manufacturer_product_line_id'],
			'production_week'              => $parseResponse['production_week'],
			'plant_dot'                    => $parseResponse['plant_dot'],
			'size_dot'                     => $parseResponse['size_dot'],
			'product_line_dot'             => $parseResponse['product_line_dot'],

		);

		// These fields are currently not in the workorder, but this is added here for future compatibility
		if (!empty($original_data['customer_tag']))
			$casing_data['customer_tag'] = $original_data['customer_tag'];
		if (!empty($original_data['rfid']))
			$casing_data['rfid'] = $original_data['rfid'];
		if (!empty($original_data['grade']))
			$casing_data['grade'] = $original_data['grade'];
		if (!empty($original_data['checking']))
			$casing_data['checking'] = $original_data['checking'];
		if (!empty($original_data['previous_caps']))
			$casing_data['previous_caps'] = $original_data['previous_caps'];

		// Add in overrides if necessary
		if ($original_data['manufacturer_id'] != $parseResponse['manufacturer_id'])
			$casing_data['manufacturer_id'] = $original_data['manufacturer_id'];
		if ($original_data['tire_size_id'] != $parseResponse['size_id'])
			$casing_data['size_id'] = $original_data['tire_size_id'];
		// The following is currently not used.
		if (!empty($original_data['product_line_txt']) && $original_data['product_line_txt'] != $parseResponse['product_line_txt'])
			$casing_data['product_line_txt'] = $original_data['product_line_txt'];

		if (!$this->CoItem->Casing->save(array('Casing' => $casing_data))) {
			// just return the error
			return $this->CoItem->Casing->getLastSaveResult();
		}

		// only save the coItem data here
		$co_item_data = array( // probably just use some filter function here
			'id'              => $co_item_id,
			'co_id'           => $original_data['co_id'],
			'casing_id'       => $this->CoItem->Casing->id,
			'line_number'     => $original_data['line_number'],
			'co_item_type_id' => $original_data['co_item_type_id'],
		);
		if (!$this->CoItem->save(array('CoItem' => $co_item_data))) {
			// just return the error
			return $this->CoItem->getLastSaveResult();
		}

		// both coItem and casing data has been saved
		return $this->request->data;
	}

	/**
	 * @banchaRemotable
	 * @param string $id
	 * @return void
	 */
	public function parseDotCodeForInsert($dot_code = null, $saveData)
	{
		// bind associations
		$this->CoItem->bindModel(array(
			'belongsTo' => array('Casing', 'CoItemType'),
		));
		$this->CoItem->Casing->bindModel(array(
			'belongsTo' => array('ManufacturerPlant', 'ManufacturerProductLine'),
		));
		$this->CoItem->Casing->ManufacturerPlant->bindModel(array(
			'hasMany'   => array('ManufacturerPlantSize'),
			'belongsTo' => array('Manufacturer')
		));
		$this->CoItem->Casing->ManufacturerPlant->ManufacturerPlantSize->bindModel(array(
			'belongsTo' => array('TireSize'),
		));

		//define initial vars for override
		$o_manufacturer_id = $saveData['manufacturer_id'];
		$o_tire_size_id    = $saveData['tire_size_id'];

		//create response object indexes
		$response['manufacturer_plant_id']        = '';
		$response['manufacturer_product_line_id'] = '';

		//First determine if we have production week/year
		if (is_numeric(substr($dot_code, -4))) {
			//found the production week/year, no lookup needed, continue to review the rest of the DOT code
			$productionInfo = substr($dot_code, -4);
			$dot_code       = substr($dot_code, 0, -4);
		}
		//make sure there is some dot_code left to parse
		if (strlen($dot_code) > 0) {
			//make sure we've got a manufacturer override otherwise do nothing
			if (isset($o_manufacturer_id)) {
				// find the manufacturer
				$manufacturer_plant_code = substr($dot_code, 0, 2);
				if ($manufacturer_plant_code == '--') {
					$manufacturer_id = null;
				} else {
					$manufacturer_plant = $this->CoItem->Casing->ManufacturerPlant->find('first', array(
						'conditions' => array(
							'ManufacturerPlant.manufacturer_id' => $o_manufacturer_id,
							'ManufacturerPlant.code'            => $manufacturer_plant_code,
						)));
					$manufacturer_id    = isset($manufacturer_plant['ManufacturerPlant']['manufacturer_id']) ? $manufacturer_plant['ManufacturerPlant']['manufacturer_id'] : null;
				}
				if ($manufacturer_id !== null) {
					$manufacturer        = $this->CoItem->Casing->ManufacturerPlant->Manufacturer->findById($manufacturer_id);
					$manufacturerPlantId = $manufacturer_plant['ManufacturerPlant']['id'];
				}

				if (!isset($manufacturer)) {
					//create insert object for a new manufacturer plant
					$mp_data = array(
						'manufacturer_id' => $o_manufacturer_id,
						'code'            => $manufacturer_plant_code,

					);
					if (!$this->CoItem->Casing->ManufacturerPlant->save(array('ManufacturerPlant' => $mp_data))) {
						// just return the error
						return $this->CoItem->Casing->ManufacturerPlant->getLastSaveResult();
					}
					$plantDetails        = $this->CoItem->Casing->ManufacturerPlant->getLastSaveResult();
					$manufacturerPlantId = $plantDetails['ManufacturerPlant']['id'];
				}

				//set response index for plant id
				$response['manufacturer_plant_id'] = $manufacturerPlantId;

				$tireSizeCode = substr($dot_code, 2, 2);
				$plantSizeRec=0;
				// make sure there is a valid plant id and a tire size override
				if (isset($manufacturerPlantId) && strlen($tireSizeCode) == 2 && isset($o_tire_size_id)) {
					//check to see if there is an existing plant size record
					$plantSizeRec = $this->CoItem->Casing->ManufacturerPlant->ManufacturerPlantSize->find('first', array(
						'conditions' => array(
							'ManufacturerPlantSize.tire_size_id'          => $o_tire_size_id,
							'ManufacturerPlantSize.manufacturer_plant_id' => $manufacturerPlantId,
						)));
				}

				if (count($plantSizeRec) == 0) {
					//could not find a record so insert the override
					$mp_data = array(
						'manufacturer_plant_id' => $manufacturerPlantId,
						'tire_size_id'          => $o_tire_size_id,
						'size_code'             => $tireSizeCode,

					);
					if (!$this->CoItem->Casing->ManufacturerPlant->ManufacturerPlantSize->save(array('ManufacturerPlantSize' => $mp_data))) {
						// just return the error
						return $this->CoItem->Casing->ManufacturerPlant->ManufacturerPlantSize->getLastSaveResult();
					}
				}

				$productLineCode = substr($dot_code, 4, 4);
				$productLineRec=0;
				if (isset($manufacturerPlantId) && strlen($productLineCode) == 4) {
					//check to see if there is an existing product line record exists
					$productLineRec = $this->CoItem->Casing->ManufacturerProductLine->find('first', array(
						'conditions' => array(
							'ManufacturerProductLine.manufacturer_plant_id' => $manufacturerPlantId,
							'ManufacturerProductLine.dot_code'              => $productLineCode,
						)));
				}

				if (count($productLineRec) == 0) {
					//could not find a record so insert the override
					$mp_data = array(
						'manufacturer_plant_id'              => $manufacturerPlantId,
						'manufacturer_product_line_group_id' => 1,
						'is_material'                        => 1,
						'dot_code'                           => $productLineCode,
						'name'                               => 'Product Line ' . $productLineCode,
						'order'                              => 1

					);
					if (!$this->CoItem->Casing->ManufacturerProductLine->save(array('ManufacturerProductLine' => $mp_data))) {
						// just return the error
						return $this->CoItem->Casing->ManufacturerProductLine->getLastSaveResult();
					}
					$pLineResult = $this->CoItem->Casing->ManufacturerProductLine->getLastSaveResult();
					if (isset($pLineResult['ManufacturerProductLine'])) {
						$response['manufacturer_product_line_id'] = $pLineResult['ManufacturerProductLine']['id'];
					}
				}
			}
		}
		return $response;
	}

	/**
	 * @banchaRemotable
	 * @param string $id
	 * @return array
	 */
	public function getDisplayDataFromDot($dot_code = null)
	{

		if (strlen($dot_code) > 0) {
			$parseResponse = $this->CoItem->Casing->parseDOT($dot_code);

			// provide a return value for Bancha requests
			return array(
				'success' => true,
				'data'    => array(
					'manufacturer_id'              => $parseResponse['manufacturer_id'],
					'manufacturer_product_line_id' => $parseResponse['manufacturer_product_line_id'],
					'tire_size_id'                 => $parseResponse['size_id'],
					'dot_code'                     => $parseResponse['original']
				));
		} else {
			//no valid input, return empty
			return array(
				'success' => true,
				'data'    => array(
					'manufacturer_id'              => '',
					'manufacturer_product_line_id' => '',
					'tire_size_id'                 => '',
					'dot_code'                     => ''
				));
		}
	}

	/**
	 * view method
	 *
	 * @param string $id
	 * @return void
	 */
	public function view($id = null)
	{
		$this->CoItem->id = $id;
		if (!$this->CoItem->exists()) {
			throw new NotFoundException(__('Invalid co item'));
		}
		$this->set('coItem', $this->CoItem->read(null, $id));

		// provide a return value for Bancha requests
		return $this->CoItem->data;
	}

	/**
	 * add method
	 *
	 * @return void
	 */
	public function add()
	{
		if ($this->request->is('post')) {
			$this->CoItem->create();
			if ($this->CoItem->save($this->request->data)) {

				// provide a return value for Bancha requests
				// never use SessionComponent::setFlash() or Controller::redirect() in Bancha requests
				if (isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
					return $this->CoItem->getLastSaveResult();
				}

				$this->Session->setFlash(__('The co item has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {

				// provide a return value for Bancha requests
				// never use SessionComponent::setFlash() in Bancha requests
				if (isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
					return $this->CoItem->getLastSaveResult();
				}

				$this->Session->setFlash(__('The co item could not be saved. Please, try again.'));
			}
		}

		$cos     = $this->CoItem->Co->find('list');
		$casings = $this->CoItem->Casing->find('list');
		$this->set(compact('cos', 'casings'));
	}

	/**
	 * edit method
	 *
	 * @param string $id
	 * @return void
	 */
	public function edit($id = null)
	{
		$this->CoItem->id = $id;
		if (!$this->CoItem->exists()) {
			throw new NotFoundException(__('Invalid co item'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->CoItem->save($this->request->data)) {

				// provide a return value for Bancha requests
				// never use SessionComponent::setFlash() or Controller::redirect() in Bancha requests
				if (isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
					return $this->CoItem->getLastSaveResult();
				}

				$this->Session->setFlash(__('The co item has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {

				// provide a return value for Bancha requests
				// never use SessionComponent::setFlash() in Bancha requests
				if (isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
					return $this->CoItem->getLastSaveResult();
				}

				$this->Session->setFlash(__('The co item could not be saved. Please, try again.'));
			}
		} else {
			// Bancha will never do this request, so no return needed here
			$this->request->data = $this->CoItem->read(null, $id);
		}

		$cos     = $this->CoItem->Co->find('list');
		$casings = $this->CoItem->Casing->find('list');
		$this->set(compact('cos', 'casings'));
	}

	/**
	 * delete method
	 *
	 * @param string $id
	 * @return void
	 */
	public function delete($id = null)
	{
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->CoItem->id = $id;
		if (!$this->CoItem->exists()) {
			throw new NotFoundException(__('Invalid co item'));
		}
		if ($this->CoItem->delete()) {

			// provide a return value for Bancha requests
			// never use SessionComponent::setFlash() or Controller::redirect() in Bancha requests
			if (isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
				return $this->CoItem->getLastSaveResult();
			}

			$this->Session->setFlash(__('Co item deleted'));
			$this->redirect(array('action' => 'index'));
		}

		// provide a return value for Bancha requests
		// never use SessionComponent::setFlash() or Controller::redirect() in Bancha requests
		if (isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
			return $this->CoItem->getLastSaveResult();
		}

		$this->Session->setFlash(__('Co item was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}

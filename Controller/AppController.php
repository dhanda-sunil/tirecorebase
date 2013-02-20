<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
	/*
	 * Add authentification, same as in the Bancha config in core.php
	 */
	public $components = array(
		'Acl',
		'Auth' => array(
			'authorize' => array(
				'Actions' => array('actionPath' => 'controllers'),
			),
			'Form' => array(
				'userModel' => 'User',
				'fields' => array(
					'username' => 'username',
					'password' => 'password'
				)
			),
			'loginAction' => array(
				'controller' => 'users',
				'action' => 'login',
			),
			'loginRedirect' => '/users/dashboard', //'/admin/customers/index',//'/admin/tread_designs', // '/shopfloor/build/app.html',
			'logoutRedirect' => '/users/login', //'/shopfloor/build/app.html'
		),
		'Session',
        'RequestHandler',
        'DebugKit.Toolbar',
		'Paginator' => array('className' => 'Bancha.BanchaPaginator') // support filtering by associations
	);
    
	public function beforeFilter() {
        parent::beforeFilter();

        if($this->RequestHandler->responseType() == 'json'){
            $this->RequestHandler->setContent('json', 'application/json' );
        }

//		$this->Auth->loginAction = array('controller' => 'users', 'action' => 'login');
//		$this->Auth->logoutRedirect = array('controller' => 'users', 'action' => 'login');
//		$this->Auth->loginRedirect = array('controller' => 'users', 'action' => 'login');


		// allow the Bancha API and meta data do be loaded from anyone
		if(strtolower($this->params['plugin']) == 'bancha' && strtolower($this->name) == 'bancha') {
			$this->Auth->allow('index','loadMetaData','translations','logError');
		}
        $this->Auth->allow('barcode','index');
        $this->Auth->allow('pdfs','test');
        $this->Auth->allow('*');
	}
    
    public function beforeRender(){
        parent::beforeRender();
        
        // logic for standard full page requests
        //if($this->request->is('ajax') == false){
            $this->set('user',$this->Session->read('Auth.User'));
        //}
    }
}
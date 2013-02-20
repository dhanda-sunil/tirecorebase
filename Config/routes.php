<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different urls to chosen controllers and their actions (functions).
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
 * @package       app.Config
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

    Router::connect('/admin', array('controller' => 'users', 'action' => 'login'));
    //Router::connect('/admin/:controller/:action');


/**
 * Here, we are connecting '/' (base path) to controller called 'Pages',
 * its action called 'display', and we pass a param to select the view file
 * to use (in this case, /app/View/Pages/home.ctp)...
 */
	Router::connect('/', array('controller' => 'pages', 'action' => 'display', 'home'));
/**
 * ...and connect the rest of 'Pages' controller's urls.
 */
	Router::connect('/pages/*', array('controller' => 'pages', 'action' => 'display'));

/**
 * Load all plugin routes.  See the CakePlugin documentation on 
 * how to customize the loading of plugin routes.
 */
	CakePlugin::routes();

	// add support for json
	Router::setExtensions(array('json'),true);

/**
 * Load the CakePHP default routes. Remove this if you do not want to use
 * the built-in default routes.
 */
	require CAKE . 'Config' . DS . 'routes.php';
=======
 * This file configures Banchas routing.
 *
 * Bancha Project : Seamlessly integrates CakePHP with ExtJS and Sencha Touch (http://banchaproject.org)
 * Copyright 2011-2012 StudioQ OG
 *
 * @package       Bancha
 * @subpackage    Config
 * @copyright     Copyright 2011-2012 StudioQ OG
 * @link          http://banchaproject.org Bancha Project
 * @since         Bancha v 0.9.0
 * @author        Roland Schuetz <mail@rolandschuetz.at>
 */


/**
 * Enable support for the file extension js
 *
 * In CakePHP 2.2 and above Router:setExtensions could be used,
 * for legacy support we need the bug fix version below
 */
if(Router::extensions() !== true) { // if all extensions are supported we are done

	// add json to the extensions
	$extensions = Router::extensions();
	if(!is_array($extensions)) {
		$extensions = array('json');
	} else {
		array_push($extensions, 'Json');
	}

	Router::parseExtensions($extensions);
}


/**
 * connect the remote api
 */
Router::connect('/bancha-api', array('plugin' => 'bancha', 'controller' => 'bancha', 'action' => 'index'));
Router::connect('/bancha-api/models/:metaDataForModels', array('plugin' => 'bancha', 'controller' => 'bancha', 'action' => 'index'),array('pass'=>array('metaDataForModels')));


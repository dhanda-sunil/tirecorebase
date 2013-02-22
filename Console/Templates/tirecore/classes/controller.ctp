<?php
/**
 * Controller bake template file
 *
 * Allows templating of Controllers generated from bake.
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
 * @package       Cake.Console.Templates.default.classes
 * @since         CakePHP(tm) v 1.3
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

/***************
* Create Aco for this controller
******************/
// find / make controller node
App::uses('ComponentCollection', 'Controller');
App::uses('AclComponent', 'Controller/Component');
$Acl = new AclComponent(new ComponentCollection());
$aco = $Acl->Aco;

if(!function_exists('_getPluginName')){
	function _getPluginName($ctrlName = null) {
		$arr = String::tokenize($ctrlName, '/');
		if (count($arr) == 2) {
			return $arr[0];
		} else {
			return false;
		}
	}
}
if(!function_exists('_getPluginControllerName')){
	function _getPluginControllerName($ctrlName = null) {
		$arr = String::tokenize($ctrlName, '/');
		if (count($arr) == 2) {
			return $arr[1];
		} else {
			return false;
		}
	}
}

$root = $aco->node('controllers');
$root = $aco->node('controllers');
if (!$root) {
	$aco->create(array('parent_id' => null, 'model' => null, 'alias' => 'controllers'));
	$root = $aco->save();
	$root['Aco']['id'] = $aco->id;
	$this->out("\n" . __d('cake_console', 'Created Aco node for controllers'), 1, Shell::QUIET);
} else {
	$root = $root[0];
}
$controllerNode = $aco->node('controllers/'.$controllerName);
if (!$controllerNode) {	 
	if ($plugin){
		$pluginNode = $aco->node('controllers/' . _getPluginName($controllerName));
		$aco->create(array('parent_id' => $pluginNode['0']['Aco']['id'], 'model' => null, 'alias' => _getPluginControllerName($controllerName)));
		$controllerNode = $aco->save();
		$controllerNode['Aco']['id'] = $aco->id;
		//$this->out = 'Created Aco node for ' . _getPluginControllerName($controllerName) . ' ' . _getPluginName($controllerName) . ' Plugin Controller';
		$this->out("\n" . __d('cake_console', 'Created Aco node for `%s` ', _getPluginControllerName($controllerName)), 1, Shell::QUIET);
	} else {
		$aco->create(array('parent_id' => $root['Aco']['id'], 'model' => null, 'alias' => $controllerName));
		$controllerNode = $aco->save();
		$controllerNode['Aco']['id'] = $aco->id;
		$this->out("\n" . __d('cake_console', 'Created Aco node for `%s` ', $controllerName), 1, Shell::QUIET);		
	}
	$actionsNames = array('sidebar_action', 'add', 'edit', 'view', 'delete');
	foreach($actionsNames as $actionsName){
		$actionsName = $admin?($admin.$actionsName):$actionsName;
		$aco->create(array('parent_id' => $controllerNode['Aco']['id'], 'model' => null, 'alias' => $actionsName));
		$sidebarActionNode = $aco->save();
		$this->out("\n" . __d('cake_console', 'Created Aco node for `%s/%s` ', $controllerName, $actionsName), 1, Shell::QUIET);
	}
} else {
	//$controllerNode = $controllerNode[0];
	$this->out("\n" . __d('cake_console', 'Aco node for `%s` already exists ', $controllerName), 1, Shell::QUIET);
}

/**********************************/


echo "<?php\n";
echo "App::uses('{$plugin}AppController', '{$pluginPath}Controller');\n";
?>
/**
 * <?php echo $controllerName; ?> Controller
 *
<?php
if (!$isScaffold) {
	$defaultModel = Inflector::singularize($controllerName);
	echo " * @property {$defaultModel} \${$defaultModel}\n";
	if (!empty($components)) {
		foreach ($components as $component) {
			echo " * @property {$component}Component \${$component}\n";
		}
	}
}
?>
 */
class <?php echo $controllerName; ?>Controller extends <?php echo $plugin; ?>AppController {

<?php if ($isScaffold): ?>
/**
 * Scaffold
 *
 * @var mixed
 */
	public $scaffold;

<?php else:

    if (count($helpers)):
        echo "/**\n * Helpers\n *\n * @var array\n */\n";
        echo "\tpublic \$helpers = array(";
        for ($i = 0, $len = count($helpers); $i < $len; $i++):
            if ($i != $len - 1):
                echo "'" . Inflector::camelize($helpers[$i]) . "', ";
            else:
                echo "'" . Inflector::camelize($helpers[$i]) . "'";
            endif;
        endfor;
        echo ");\n\n";
    endif;

    if (count($components)):
        echo "/**\n * Components\n *\n * @var array\n */\n";
        echo "\tpublic \$components = array(";
        for ($i = 0, $len = count($components); $i < $len; $i++):
            if ($i != $len - 1):
                echo "'" . Inflector::camelize($components[$i]) . "', ";
            else:
                echo "'" . Inflector::camelize($components[$i]) . "'";
            endif;
        endfor;
        echo ");\n\n";
    endif;

    echo trim($actions) . "\n";

endif; ?>
}

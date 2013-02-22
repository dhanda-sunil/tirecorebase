<?php
/**
 * Command-line code generation utility to automate programmer chores.
 *
 * Bake is CakePHP's code generation script, which can help you kickstart
 * application development by writing fully functional skeleton controllers,
 * models, and views. Going further, Bake can also write Unit Tests for you.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         CakePHP(tm) v 1.2.0.5012
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::uses('BakeShell', 'Console/Command');

/**
 * Command-line code generation utility to automate programmer chores.
 *
 * Bake is CakePHP's code generation script, which can help you kickstart
 * application development by writing fully functional skeleton controllers,
 * models, and views. Going further, Bake can also write Unit Tests for you.
 *
 * @package       Cake.Console.Command
 * @link          http://book.cakephp.org/2.0/en/console-and-shells/code-generation-with-bake.html
 */
class Bake2Shell extends BakeShell {

/**
 * Contains tasks to load and instantiate
 *
 * @var array
 */
	public $tasks = array('Project', 'DbConfig', 'Model', 'Controller', 'View', 'Viewnjs', 'Plugin', 'Fixture', 'Test');
	/**
 * Quickly bake the MVC
 *
 * @return void
 */
	public function all() {
		$this->out('Bake All');
		$this->hr();

		if (!isset($this->params['connection']) && empty($this->connection)) {
			$this->connection = $this->DbConfig->getConfig();
		}

		if (empty($this->args)) {
			$this->Model->interactive = true;
			$name = $this->Model->getName($this->connection);
		}

		foreach (array('Model', 'Controller', 'Viewnjs') as $task) {
			$this->{$task}->connection = $this->connection;
			$this->{$task}->interactive = false;
		}

		if (!empty($this->args[0])) {
			$name = $this->args[0];
		}

		$modelExists = false;
		$model = $this->_modelName($name);

		App::uses('AppModel', 'Model');
		App::uses($model, 'Model');
		if (class_exists($model)) {
			$object = new $model();
			$modelExists = true;
		} else {
			$object = new Model(array('name' => $name, 'ds' => $this->connection));
		}

		$modelBaked = $this->Model->bake($object, false);

		if ($modelBaked && $modelExists === false) {
			if ($this->_checkUnitTest()) {
				$this->Model->bakeFixture($model);
				$this->Model->bakeTest($model);
			}
			$modelExists = true;
		}

		if ($modelExists === true) {
			$controller = $this->_controllerName($name);
			if ($this->Controller->bake($controller, $this->Controller->bakeActions($controller))) {
				if ($this->_checkUnitTest()) {
					$this->Controller->bakeTest($controller);
				}
			}
			App::uses($controller . 'Controller', 'Controller');
			if (class_exists($controller . 'Controller')) {
				$this->Viewnjs->args = array($name);
				$this->Viewnjs->execute();
			}
			$this->out('', 1, Shell::QUIET);
			$this->out(__d('cake_console', '<success>Bake All complete</success>'), 1, Shell::QUIET);
			array_shift($this->args);
		} else {
			$this->error(__d('cake_console', 'Bake All could not continue without a valid model'));
		}
		return $this->_stop();
	}
}

<?php
App::uses('SchemaShell', 'Console/Command');

class Schema2Shell extends SchemaShell
{

	/**
	 * Update database with Schema object
	 * Should be called via the run method
	 *
	 * @param CakeSchema $Schema
	 * @param string $table
	 * @return void
	 */
	protected function _update(&$Schema, $table = null, $args = null)
	{
		$db = ConnectionManager::getDataSource($this->Schema->connection);

		$this->out(__d('cake_console', 'Comparing Database to Schema...'));
		$options = array();
		//if (isset($this->params['force'])) {
			$options['models'] = false;
		//}
		$Old     = $this->Schema->read($options);
		$compare = $this->Schema->compare($Old, $Schema);
		debug($compare);
		$parser=$this->getOptionParser();


		// Added this next part in to create a table if it's not already there
		$addTables = array();
		if (empty($table)) {
			foreach ($compare as $table => $changes) {
				if (!in_array($table, $db->listSources())) {
					$this->out("$table is not in Sources...Creating it now");
					$this->out($db->query("CREATE TABLE $table (x_deleteme INT);")); // Create the table with the id Field
					$addTables[] = $table;
				}
			}
		}

		$contents = array();

		// End of this change

		if (empty($table)) {
			foreach ($compare as $table => $changes) {

				$contents[$table] = $db->alterSchema(array($table => $changes), $table);
			}
		} elseif (isset($compare[$table])) {
			$contents[$table] = $db->alterSchema(array($table => $compare[$table]), $table);
		}
		if (empty($contents)) {
			$this->out(__d('cake_console', 'Schema is up to date.'));
			$this->_stop();
		}

		$this->out("\n" . __d('cake_console', 'The following statements will run.'));
		$this->out(array_map('trim', $contents));

		// @changed: Removed the question to alter the tables
		//if ('y' == $this->in(__d('cake_console', 'Are you sure you want to alter the tables?'), array('y', 'n'), 'n')) {
			$this->out();
			$this->out(__d('cake_console', 'Updating Database...'));
			$this->_run($contents, 'update', $Schema);
		//}
		// Drop the dummy fields
		if ($addTables != array()) {
			foreach($addTables as $table) {
				$this->out("Removing dummy field from $table");
				$db->query("ALTER TABLE `{$table}` DROP `x_deleteme`;");
			}
		}

		$this->out(__d('cake_console', 'End update.'));
	}

}
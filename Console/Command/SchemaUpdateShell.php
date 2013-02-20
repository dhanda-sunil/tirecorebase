<?php
App::uses('ConsoleOptionParser', 'Utility');

/**
 * Updates Schema to the latest version
 * @author jared jloosli@tcstire.com
 */
class SchemaUpdateShell extends AppShell{
    
    public $directory;
    public $uses = array('SchemaConfig');

/**
 * Run import methods, requires absolute path to export directory as shell arg
 * @example Console/cake FileImport run /home/chris/Downloads/export/
 * @param string $arg[0] absolute path to export directory containing xml files
 * @return void
 */
    public function main(){
        
        $this->out("<info>Checking Current Schema Version ...</info>");

	    $currentSchema = $this->SchemaConfig->find('first');
	    $currentSchema=$currentSchema['SchemaConfig'];
	    //$this->out(sprintf("<info>Current Version: %d installed %s</info>",$currentSchema['ver'],date("Y-m-d",strtotime($currentSchema['updated']))));

	    $schemaFiles = scandir(APP.'Config/Schema/');
	    $max=0;
	    foreach($schemaFiles as $file) {
		    preg_match("/schema_(\d+)\.php/i",$file,$matches);
		    if(count($matches) && (int) $matches[1] > $max) {
			    $max = max($max,(int) $matches[1]);
		    }
	    }

	    //debug(get_defined_constants()); 'CORE_PATH' => '/var/www/cake/lib/',
	    debug($this->dispatchShell('schema2','update','-s',$max));
	    //debug($this->Schema->query("SHOW TABLES"));

        $this->out("<comment>Complete!</comment>");
    }
}
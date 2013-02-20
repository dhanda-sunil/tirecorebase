<?php
App::uses('Sanitize', 'Utility');
App::uses('ConsoleOptionParser', 'Utility');
App::uses('ConnectionManager', 'Core');
App::uses('AuthComponent', 'Controller/Component');
App::uses('AclComponent', 'Controller/Component');
App::uses('AclInterface', 'Controller/Component/Acl');
//App::uses('AclExtras', 'AclExtras.Lib');


/**
 * Sets up the Usergroups and creates a superuser
 * @example Console/cake AclSetup
 * @author jared
 */
class AclSetupShell extends AppShell
{

	public $uses = array('User','Group');

	/**
	 * Sets up the Acl databases, creates Initial groups, syncs controllers, Adds first user
	 * @example Console/cake AclSetup
	 * @return void
	 */
	public function main()
	{

		//@todo set up datasource as first parameter
		// ConnectionManager::getDataSource($args[0]);

		$this->out("<info>Setting group permissions</info>");
		$group=$this->Group;
		$group->id = 1;
		$this->AclInterface->allow($group, 'controllers');

		//allow managers to posts and widgets
		$group->id = 2;
		$this->Acl->deny($group, 'controllers');
		$this->Acl->allow($group, 'controllers/Posts');
		$this->Acl->allow($group, 'controllers/Widgets');

		//allow users to only add and edit on posts and widgets
		$group->id = 3;
		$this->Acl->deny($group, 'controllers');
		$this->Acl->allow($group, 'controllers/Posts/add');
		$this->Acl->allow($group, 'controllers/Posts/edit');
		$this->Acl->allow($group, 'controllers/Widgets/add');
		$this->Acl->allow($group, 'controllers/Widgets/edit');
		//we add an exit to avoid an ugly "missing views" error message
		echo "all done";
	}

	public function aco_sync() {
		$this->dispatchShell('AclExtras.AclExtras aco_sync');
	}
}


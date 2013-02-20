<?php
class ControllerListComponent extends Component {
    public $components = array('Session');
    public function get() {
        $controllerClasses = App::objects('controller');

        $controllers = array();
        

        foreach($controllerClasses as $controller) {
            if ($controller != 'App') { 
                App::import('Controller', $controller);
                $className = $controller . 'Controller';
                $actions = get_class_methods($className);
                if(is_array($actions)){
                    foreach($actions as $k => $v) {
                        if ($v{0} == '_') {
                            unset($actions[$k]);
                        }
                    }
                }

                $parentActions = get_class_methods('AppController');
                $name = preg_replace('/Controller/','',$controller);
                $humanize = ucwords(preg_replace('/_/',' ',Inflector::underscore($name)));
                
                if($this->Session->Read('Auth.User.user_group_id') >= 1 && in_array($humanize,array('Accounts','Addresses','Customers','Account Types','Tread Designs')) ){
                    $controllers[$controller] = array(
                        'humanize' => $humanize,
                        'url' => $name
                    );
                }
                else if($this->Session->Read('Auth.User.user_group_id') == 1){
                    $controllers[$controller] = array(
                        'humanize' => $humanize,
                        'url' => $name
                    );
                }

            }
        }

        return $controllers;  
    }
//
//    function initialize(Controller $controller){
//        parent::initialize($controller);
//    }
//    function startup(Controller $controller){
//        parent::
//    }
//    function beforeRender(Controller $controller){
//
//    }
//    function shutdown(Controller $controller){
//
//    }
//
	//@todo had to comment out because it disables all beforeRedirect directives
//	function beforeRedirect() {
//
//	}
}
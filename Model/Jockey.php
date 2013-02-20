<?php
App::uses('AppModel', 'Model');
class Jockey extends AppModel{
    public $actsAs = array('Bancha.BanchaRemotable');
}
<?php
App::uses('AppController', 'Controller');
App::uses('Security', 'Utility');

class RequestController extends AppController {

	/** Model */
	public $uses = array('');
	public $name = 'Request';
	public $viewName = '運行計画入力';

	public function beforeFilter() {
		parent::beforeFilter();
	}

	public function index() {

	}

}

<?php
App::uses('AppController', 'Controller');

class LoginController extends AppController {

	/** Model */
	public $uses = array();
	public $name = 'Login';
	public $viewName = 'ログイン';

	public function beforeFilter() {
		parent::beforeFilter();
		$this->layout = strtolower($this->name);
	}

	public function index() {

	}

	public function execute() {

		$this->autoRender = false;
		$this->render('index');
	}

}

<?php
App::uses('Controller', 'Controller');

class AppController extends Controller {

	public $helpers = array('Style', 'View');
	public $components = array();

	public function beforeFilter() {

		$this->setAppForm();
	}

	private function setAppForm() {
		$app = array(
				'myself' => strtolower($this->name),
				'viewName' => $this->viewName,
		);

		$this->set('app', $app);
	}
}

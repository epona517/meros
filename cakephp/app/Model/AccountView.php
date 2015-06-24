<?php
App::uses('AppModel', 'Model');

class AccountView extends AppModel {

	// var $useTable = 'AccountViews';

	public function getAccountViewList() {

		$opt = array();
		$data = $this->find('all', $opt);
		return $data;
	}

	public function getAccountInfo($loginId) {

		$opt = array(
			'conditions' => array(
				'id' => $loginId
			)
		);
		$data = $this->find('all', $opt);
		return $data;
	}
}

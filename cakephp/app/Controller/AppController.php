<?php
App::uses('Controller', 'Controller');

class AppController extends Controller {

	public $helpers = array('Style', 'View');
	public $components = array('Session', 'Message', 'Access');
	// Session
	public $Me;

	public function beforeFilter() {

		$this->setAppForm();

		$url = $this->request->url;
		// セッションチェック（ログイン画面以外の場合）
		if (!$this->hasMySession() && !empty($url)
				&& !$this->Access->isAccessTo($url, array('Login'))) {
			$this->Message->setMessage('E', 'セッション切れてます。');
			// ログイン画面に返す
			$this->Session->delete('Me');
			$this->redirect('../');

		} else {
			// セッションの設定
			$this->Me = $this->Session->read('Me');
		}
	}

	private function setAppForm() {
		$app = array(
				'myself' => strtolower($this->name),
				'viewName' => $this->viewName,
		);

		$this->set('app', $app);
	}

	public function hasMySession() {
		return $this->Session->check('Me');
	}

}

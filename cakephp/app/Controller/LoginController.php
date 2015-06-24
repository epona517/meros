<?php
App::uses('AppController', 'Controller');
App::uses('Security', 'Utility');

class LoginController extends AppController {

	/** Model */
	public $uses = array('AccountView');

	public $name = 'Login';
	public $viewName = 'ログイン';

	public function beforeFilter() {
		parent::beforeFilter();
		$this->layout = strtolower($this->name);
		$this->Session->delete('Me');
	}

	public function index() {
		// debug(Security::hash('pass', 'Blowfish'));
	}

	public function auth() {
		$this->autoRender = false;

		if (!$this->request->is('post')) {
			$this->messageBack('URL直接入力はあきまへん。');
			return;
		}

		$id = $this->request->data('form.loginId');
		$pass = $this->request->data('form.loginPassword');

		$select = $this->AccountView->getAccountInfo($id);

		$selectSize = sizeof($select);

		// ID存在
		if ($selectSize <= 0) {
			// IDが存在しない
			$this->messageBack('IDまたはパスワードが一致しません。1');
			return;

		} elseif ($selectSize > 1) {
			// IDが重複している。
			$this->messageBack('IDまたはパスワードが一致しません。2');
			return;
		}

		// ログイン者情報
		$account = $select[0]['AccountView'];
		// パスワード認証
		// TODO: passの暗号化
		if ($pass != $account['password']) {
			$this->messageBack('IDまたはパスワードが一致しません。3');
			return;
		}

		// 使用不可フラグ判定
		// TODO: 定数
		if ($account['invalidFlg'] == 1) {
			$this->messageBack('アカウントは利用停止中です。');
			return;
		}

		// セッションの設定
		$Me = array(
			'myId' => $account['id'],
			'myName' => $account['name'],
			'myAreaCode' => $account['areaCode'],
			'myKbn' => $account['kbn']
		);

		// セッションに格納
		$this->Session->write('Me', $Me);

		// TODO: ログイン最終日時を更新
		// セッションのログイン者情報を設定
		$this->redirect(array('controller' => 'Request', 'action' => 'index'));
	}

	private function messageBack($message) {

		$this->Message->setMessage('E', $message);
		$this->render('index');
	}
}

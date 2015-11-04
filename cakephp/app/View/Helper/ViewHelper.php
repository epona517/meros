<?php
App::uses('AppHelper', 'View/Helper');

class ViewHelper extends AppHelper {

	public function makeTitle($app) {
		echo h(SYSTEM_MAIN_NAME) . ' | ' . $app['viewName'];
	}

	public function getProjectPath() {
		echo '/' . PROJECT;
	}

	// ログイン画面のシステム名の正式名称を仕込む
	public function makeSystemNameForLogin() {

		$systemName = SYSTEM_MAIN_NAME;
		// 頭文字を抜いた正式名称を設定
		// 頭文字になる開始位置を設定
		$remains = array(
			   array('name' => 'equest',	 'start' => 0),
			   array('name' => 'pproval',	 'start' => 0),
			   array('name' => 'Refere　ce', 'start' => 6),
			   array('name' => 'Tra　sport', 'start' => 3)
		);
		$len = count($remains);
		$enclosed = "";
		// HTML生成
		for ($i = 0; $i < $len; $i++) {
			$enclosed .= '<p class="jsRemains remains" data-for="remains_' . ($i + 1) . '">'
					   . mb_substr($systemName, $i, 1) . '<span id="remains_' . ($i + 1)
					   .'" class="hidden remain" data-start="' . $remains[$i]["start"] . '">'
					   . $remains[$i]["name"] . '</span></p>';
		}
		echo $enclosed;
	}

}

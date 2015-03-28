<?php
App::uses('AppHelper', 'View/Helper');

class ViewHelper extends AppHelper {

	public function makeTitle($app) {
		echo h(SYSTEM_MAIN_NAME) . ' | ' . $app['viewName'];
	}

	public function getProjectPath() {
		echo '/' . PROJECT;
	}
}

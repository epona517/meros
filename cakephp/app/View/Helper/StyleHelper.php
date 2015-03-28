<?php
App::uses('AppHelper', 'View/Helper');

class StyleHelper extends AppHelper {

	public $per = array('px', '%', 'pt', 'em', 'rem');

	public function width($size) {
		echo 'style="width: ' . $size . 'px;"';
	}
}

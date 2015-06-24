<?php
	$this->assign('myself', $app['myself']);
	$this->assign('special', '_' . $app['myself']);
	$width_content = 1024;
	$this->assign('width_content', $width_content);
	$width_login = 320;

	// Form作成時、labelとdivの自動生成なし
	$this->Form->inputDefaults(array(
	        // 'label' => false,
	        'div' => false,
	));
?>
<section id="area__login" <?php $this->Style->width($width_login);?>>
	<ul>
		<li class="wrap__form_login">
			<?php
				// ログインID
				echo $this->Form->input('form.loginId', array(
						'type' => 'text',
						'value' => '',
						'maxlength' => 12,
						'class' => 'width_full form_login enterSubmit',
						'placeholder' => 'ログインID',
						'label' => array(
								'class' => 'hidden',
								'text' => 'ログインID'
							)
				));
			?>

		<li class="wrap__form_login">
			<?php
				// パスワード
				echo $this->Form->input('form.loginPassword', array(
						'type' => 'password',
						'value' => '',
						'maxlength' => 16,
						'class' => 'width_full form_login enterSubmit',
						'placeholder' => 'パスワード',
						'label' => array(
								'class' => 'hidden',
								'text' => 'パスワード'
							)
				));
			?>

		<li class="wrap__button_login">
			<button type="button" id="button_login" class="width_l mortion mortion_whiteout">
				<i class="fa fa-sign-in"></i>
				ログイン
			</button>

		<li class="wrap__check_session">
			<input type="checkbox" id="check_session">
			<label for="check_session" class="checkbox">ログインしたまま</label>

	</ul>
</section>
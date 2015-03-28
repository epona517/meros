<?php
	$this->assign('myself', $app['myself']);
	$this->assign('special', '_' . $app['myself']);
	$width_content = 1024;
	$this->assign('width_content', $width_content);
	$width_login = 320;

	// Form作成時、labelとdivの自動生成なし
	$this->Form->inputDefaults(array(
	        'label' => false,
	        'div' => false,
	));
?>
<section id="area_login" <?php $this->Style->width($width_login);?>>
	<ul>
		<li class="form_login">
			<?php
				// ログインID
				echo $this->Form->input('form.loginId', array(
						'type' => 'text',
						'value' => '',
						'maxlength' => 12,
						'class' => 'width_xxl form_login',
						'placeholder' => 'ログインID'
				));
			?>
		</li>
		<li class="form_login">
			<?php
				// パスワード
				echo $this->Form->input('form.loginPassword', array(
						'type' => 'password',
						'value' => '',
						'maxlength' => 16,
						'class' => 'width_xxl form_login',
						'placeholder' => 'パスワード'
				));
			?>
		</li>
		<li class="button_login">
			<button type="button" id="button_login" class="width_l">
				<span class="genericon genericon-next"></span>
				ログイン
			</button>
		</li>
		<li class="check_session">
			<input type="checkbox" id="check_session">
			<label for="check_session" class="checkbox">ログインしたまま</label>
		</li>
	</ul>
</section>
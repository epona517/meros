<?php
	$this->assign('myself', 'login');
	$width = 'width_' . 'm';
?>


<div>
	<input type="text" value="テキスト" class="<?php echo $width; ?>"><br><br>
	<input type="button" value="ボタン１" class="mortion mortion_spacing <?php echo $width; ?>"><br><br>
	<button class="mortion mortion_spacing <?php echo $width; ?>">ボタン２</button><br><br>
	<button class="mortion mortion_whiteout <?php echo $width; ?>">ボタン３</button><br><br>
	<button class="mortion mortion_spacing <?php echo $width; ?>">ボタン４</button><br>

	<div class="select <?php echo $width; ?>">
		<select>
			<option value="1" selected>その１</option>
			<option value="2">その２</option>
		</select>
		<span class="carat"></span>
	</div>
	<br><br>
	<textarea cols="10" rows="5" class="<?php echo $width; ?>">あああ</textarea><br>
	<input type="radio" id="testRadio">
	<label for="testRadio" class="radio">ラベル</label><br><br>
	<input type="checkbox" id="testCheck">
	<label for="testCheck" class="checkbox">チェック</label><br><br>
		<?php
			echo $this->Form->input('form.requestDate', array(
					'type' => 'date',
					'dateFormat' => 'YMD',
					'monthNames' => false,
					'maxYear' => date('Y'),
					'minYear' => date('Y') - 1,
					'separator' => array('年', '月', '日'),
					'label' => array(
							'class' => 'hidden',
							'text' => '日付'
					)
			));
		?>
</div>
<script type="text/javascript">
	$(function() {

		common.init();
		login.init();

	});
</script>

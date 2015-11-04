<?php
	$this->assign('myself', $app['myself']);
	// $this->assign('special', '_' . $app['myself']);
	$width_content = 1024;
	$this->assign('width_content', $width_content);

	// Form作成時、labelとdivの自動生成なし
	$this->Form->inputDefaults(array(
			// 'label' => false,
			'div' => false,
	));
?>
<header class="clearfix">
	<!--日付-->
	<section id="area__request_date" class="flt">
		<?php
			// 年
			$lblRequestYear = '年';
			echo $this->Form->input('form.request.year', array(
					'type' => 'text',
					'value' => date('Y'),
					'maxlength' => 4,
					'class' => 'text_year',
					'placeholder' => $lblRequestYear,
					'label' => array(
							'class' => 'hidden',
							'text' => $lblRequestYear
					),
					'after' => '<span>' . $lblRequestYear . '</span>'
			));
			// 月
			$lblRequestMonth = '月';
			echo $this->Form->input('form.request.month', array(
					'type' => 'select',
					'options' => array('1' => '1', '2' => '2', '3' => '3'),
					'selected' => '2',
					'class' => 'select_month',
					'label' => array(
							'class' => 'hidden',
							'text' => $lblRequestMonth
					),
					'after' => '<span>' . $lblRequestMonth . '</span>',
					// 空白を許可
					// 'empty' => true
			));
			// 日
			$lblRequestDay = '日';
			echo $this->Form->input('form.request.day', array(
					'type' => 'select',
					'options' => array('1' => '1', '2' => '2', '3' => '3'),
					'selected' => '2',
					'class' => 'select_day',
					'label' => array(
							'class' => 'hidden',
							'text' => $lblRequestDay
					),
					'after' => '<span>' . $lblRequestDay . '</span>',
					// 空白を許可
					// 'empty' => true
			));
		?>
	</section>
	<!-- 車輌情報 -->
	<section id="area__car_inf" class="flt">
		<table id="tbl__car_inf" class="tbl__inf">
			<thead>
				<tr>
					<th class="inf_th__ttl">
					<th class="inf_th__ctt">
			<tbody>
				<tr>
					<th class="inf_tb__ttl">
						<?php
							$lblCustomerName = '顧客名';
							echo $lblCustomerName;
						?>
					<td class="inf_tb__ctt">
						<?php
							// 顧客名
							echo $this->Form->input('form.customerName', array(
									'type' => 'text',
									'value' => '',
									'maxlength' => 45,
									'class' => 'width_full',
									'placeholder' => $lblCustomerName,
									'label' => array(
											'class' => 'hidden',
											'text' => $lblCustomerName
										)
							));
						?>
				<tr>
					<th class="inf_tb__ttl">
						<?php
							$lblCarNumber = '車輌ナンバー';
							echo $lblCarNumber;
						?>
					<td class="inf_tb__ctt">
						<?php
							echo $this->Form->input('form.carNumber', array(
									'type' => 'select',
									'options' => array('1' => 'その1', '2' => 'その2', '3' => 'その3'),
									'selected' => '1',
									'class' => 'select_carNumber width_full',
									'label' => array(
											'class' => 'hidden',
											'text' => $lblCarNumber
									)
									// 空白を許可
									// TODO: モードによって切り替え
									// 'empty' => true
							));
						?>
		</table>
	</section>
</header>
<!--操作-->
<section id="area__action">
	<table id="tbl__action" class="tbl__conditions">
		<thead>
			<tr>
				<th class="inf_th__ttl">
				<th class="inf_th__ctt">
		<tbody>
			<tr>
				<th class="inf_tb__ttl">操作
				<td class="inf_tb__ctt">
					<p class="action_buttons clearfix">
						<!--行追加ボタン-->
						<button type="button" id="btn_plus" class="width_xs">
							<i class="fa fa-plus-square"></i>
							行追加
						</button>

						<!--保存ボタン-->
						<button type="button" id="btn_preserve" class="width_xs">
							<i class="fa fa-floppy-o"></i>
							保存
						</button>

						<!--依頼ボタン-->
						<button type="button" id="btn_request" class="width_xs">
							<i class="fa fa-car"></i>
							依頼
						</button>
	</table>
</section>
<!--タイムテーブル-->
<section id="area__time_tbl">
	<table id="tbl__time_tbl" class="tbl__list">
		<thead>
			<tr>
				<th class="list_th edit_status"><i class="fa fa-info-circle"></i>
				<th class="list_th start_time">開始時刻
				<th class="list_th end_time">終了時刻
				<th class="list_th destination">目的地
				<th class="list_th status">ｽﾃｰﾀｽ
				<th class="list_th cancel">
		<tbody>
			<tr>
				<td class="list_td edit_status">ao

				<td class="list_td start_time ta_center">
					<?php
						$lblStartTime = '開始時刻';
						echo $this->Form->input('form.startTimeHh', array(
								'type' => 'select',
								'options' => array('0' => '0', '1' => '1', '2' => '2', '10' => '10'),
								'selected' => '0',
								'class' => 'select_time',
								'label' => array(
										'class' => 'hidden',
										'text' => $lblStartTime
								),
								'after' => ':'
						));
						echo $this->Form->input('form.startTimeMm', array(
								'type' => 'select',
								'options' => array('0' => '0', '5' => '5', '10' => '10'),
								'selected' => '1',
								'class' => 'select_time',
								'label' => array(
										'class' => 'hidden',
										'text' => $lblStartTime
								)
						));
					?>

				<td class="list_td end_time ta_center">
					<?php
						$lblEndTime = '終了時刻';
						echo $this->Form->input('form.endTimeHh', array(
								'type' => 'select',
								'options' => array('0' => '0', '1' => '1', '2' => '2', '10' => '10'),
								'selected' => '0',
								'class' => 'select_time',
								'label' => array(
										'class' => 'hidden',
										'text' => $lblEndTime
								),
								'after' => ':'
						));
						echo $this->Form->input('form.endTimeMm', array(
								'type' => 'select',
								'options' => array('0' => '0', '5' => '5', '10' => '10'),
								'selected' => '1',
								'class' => 'select_time',
								'label' => array(
										'class' => 'hidden',
										'text' => $lblEndTime
								)
						));
					?>

				<td class="list_td destination">
					<?php
						$lblDestination = '目的地';
						// 目的地
						echo $this->Form->input('form.destination', array(
								'type' => 'text',
								'value' => '',
								'maxlength' => 200,
								'class' => 'width_full',
								'placeholder' => $lblDestination,
								'label' => array(
										'class' => 'hidden',
										'text' => $lblDestination
								)
						));
					?>

				<td class="list_td status ta_center">
					依頼済

				<td class="list_td cancel">
					<!--キャンセルボタン-->
					<button type="button" id="btn_cancel" class="width_full">
						<i class="fa fa-remove"></i>
					</button>
	</table>
</section>
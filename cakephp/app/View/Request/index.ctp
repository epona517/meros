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
<!-- 車輌情報 -->
<header id="area__car_inf" class="">
	<table id="tbl__car_inf" class="tbl__inf">
		<thead>
			<tr>
				<th class="inf_th__ttl">
				<th class="inf_th__ctt">
		<tbody>
			<tr>
				<th class="inf_tb__ttl">顧客名
				<td class="inf_tb__ctt">
					<?php
						// 顧客名
						echo $this->Form->input('form.customerName', array(
								'type' => 'text',
								'value' => '',
								'maxlength' => 45,
								'class' => 'width_full',
								'placeholder' => '顧客名',
								'label' => array(
										'class' => 'hidden',
										'text' => '顧客名'
									)
						));
					?>
			<tr>
				<th class="inf_tb__ttl">車輌ナンバー
				<td class="inf_tb__ctt">
					<div class="select width_full">
						<select>
							<option value="1" selected>その１</option>
							<option value="2">その２</option>
						</select>
						<span class="carat"></span>
					</div>
	</table>
</header>
<!-- 日付 -->
<section id="area__date" class="">
	<table id="tbl__date" class="tbl__conditions">
		<thead>
			<tr>
				<th class="inf_th__ttl">
				<th class="inf_th__ctt">
		<tbody>
			<tr>
				<th class="inf_tb__ttl">日付
				<td class="inf_tb__ctt">
					<?php
						// 年
						echo $this->Form->input('form.year', array(
								'type' => 'text',
								'value' => '2015',
								'maxlength' => 4,
								'class' => 'text_year',
								'placeholder' => '年',
								'label' => array(
										'class' => 'hidden',
										'text' => '年'
								)
						));
					?>
					年

					<!-- 月 -->
					<div class="select width_xxs select_month">
						<select>
							<option value="1" selected>6</option>
							<option value="2">7</option>
						</select>
						<span class="carat"></span>
					</div>
					月

					<!--日-->
					<div class="select select_day">
						<select>
							<option value="1" selected>16</option>
							<option value="2">17</option>
						</select>
						<span class="carat"></span>
					</div>
					日（月）
					<i class="fa fa-calendar"></i>

					<!--表示ボタン-->
					<button type="button" id="btn_confirm" class="width_xs">
						<i class="fa fa-search"></i>
						表示
					</button>
	</table>
</section>
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
				<th class="list_th edit_status">編集状況
				<th class="list_th start_time">開始時刻
				<th class="list_th end_time">終了時刻
				<th class="list_th destination">目的地
				<th class="list_th status">ｽﾃｰﾀｽ
				<th class="list_th cancel">
		<tbody>
			<tr>
				<td class="list_td edit_status">ao

				<td class="list_td start_time">
					<div class="select select_time">
						<select>
							<option value="0" selected>0</option>
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
						</select>
						<span class="carat"></span>
					</div>
					:
					<div class="select select_time">
						<select>
							<option value="0" selected>0</option>
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
						</select>
						<span class="carat"></span>
					</div>

				<td class="list_td end_time">
					<div class="select select_time">
						<select>
							<option value="0" selected>0</option>
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
						</select>
						<span class="carat"></span>
					</div>
					:
					<div class="select select_time">
						<select>
							<option value="0" selected>0</option>
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
						</select>
						<span class="carat"></span>
					</div>

				<td class="list_td destination">
					<?php
						// 目的地
						echo $this->Form->input('form.destination', array(
								'type' => 'text',
								'value' => '',
								'maxlength' => 45,
								'class' => 'width_full',
								'placeholder' => '目的地',
								'label' => array(
										'class' => 'hidden',
										'text' => '目的地'
								)
						));
					?>

				<td class="list_td status">
					依頼済

				<td class="list_td cancel">
					<!--キャンセルボタン-->
					<button type="button" id="btn_cancel" class="width_full">
						<i class="fa fa-remove"></i>
					</button>
	</table>
</section>
/**
 * common javascript
 */
var common = common || {};


// <input type="date" id="date" value="<?php echo date('Y-m-d'); ?>" min="2015-04-01" max="2015-08-12">
// <p>
// 	<span class="jsDateScroll" data-for="date" data-format="yy"><span class="val"></span><span class="up">▲</span><span class="down">▼</span></span>
// 	<span class="jsDateScroll" data-for="date" data-format="mm"><span class="val"></span><span class="up">▲</span><span class="down">▼</span></span>
// 	<span class="jsDateScroll" data-for="date" data-format="dd"><span class="val"></span><span class="up">▲</span><span class="down">▼</span></span>
// </p>

common.init = function() {
	var mousewhelevent = common.getMouseWheelEvent();

	$('#select').on(mousewhelevent, function(e) {
		var delta = common.getMouseWheelDelta(e);
		common.upAndDownByScroll(delta);
	});


	common.makeDateScroll();
	$('.jsDateScroll').on(mousewhelevent, function(e) {
		var delta = common.getMouseWheelDelta(e);
		common.changeDataScroll($(this), delta);
	});
};


common.makeDateScroll = function() {

	if (!$('.jsDateScroll').length) return;

	$('.jsDateScroll').each(function() {
		var id = $(this).data('for');
		var format = $(this).data('format');
		$(this).find('.val').text($.datepicker.formatDate(format, new Date($('#' + id).val())));
	});
};

common.changeDataScroll = function($obj, delta) {

	var timeFmt = " 00:00:00";
	var roll = delta < 0 ? -1 : 1;
	var id = $obj.data('for');
	var now = new Date($('#' + id).val() + timeFmt);
	// console.log('now: ' + now);
	var target = $obj.data('format');
	// console.log('target: ' + target);
	var calc = common.calculateDate(now, target, roll);
	// console.log('calc: ' + calc);
	var ret;
	if (delta < 0) {
		var min = new Date($('#' + id).prop('min') + timeFmt);
		// console.log('min: ' + min);
		ret = common.compareDayFirstArgIs(min, calc) <= 0 ? calc : now;
	} else {
		var max = new Date($('#' + id).prop('max') + timeFmt);
		// console.log('max: ' + max);
		ret = common.compareDayFirstArgIs(max, calc) >= 0 ? calc : now;
	}
	// console.log('ret: ' + ret);
	// console.log('formatted: ' + $.datepicker.formatDate('yy-mm-dd', ret));
	$('#' + id).val($.datepicker.formatDate('yy-mm-dd', ret));
};

common.calculateDate = function(_date, target, roll, format) {

	// console.log('arguments.length: ' + arguments.length);
	var date = typeof _date === 'string' ? new Date(_date) : _date;
	// console.log('date: ' + date);
	// console.log('date.getFullYear(): ' + date.getFullYear());
	// console.log('date.getMonth(): ' + date.getMonth());
	// console.log('date.getDate(): ' + date.getDate());
	// console.log('roll: ' + roll);
	var result;
	if (/year|yy/.test(target)) {
		result = new Date(date.getFullYear() + roll, date.getMonth(), date.getDate());
		// console.log('test: year');
	} else if (/month|mm/.test(target)) {
		result = new Date(date.getFullYear(), date.getMonth() + roll, date.getDate());
		// console.log('test: month');
	} else if (/day|dd/.test(target)) {
		result = new Date(date.getFullYear(), date.getMonth(), date.getDate() + roll);
		// console.log('test: day');
	} else {
		result = new Date();
	}
	result = arguments.length == 4 ? $.datepicker.formatDate(format, result) : result;

	return result;
};

common.compareDayFirstArgIs = function(base, target) {
	var diffDay = (base - target) / 86400000;
	return diffDay;
};



common.upAndDownByScroll = function(delta) {
	var output = parseInt($('#output').text());
	if (delta < 0) {
		$('#output').html(output + 1);
	} else {
		$('#output').html(output - 1);
	}
};



common.submit = function(action, params) {

	var urlParam = '';
	if (Array.isArray(params)) {
		urlParam = '/' + params.join('/')
	}
	var myself = $('#myself').val();
	var rootPath = $('#rootPath').val();
	var form = document.getElementById(myself + 'Form');

	// console.log(rootPath + myself + action + urlParam);
	form.action = rootPath + '/' + myself + '/' + action + urlParam;
	form.submit();
};

common.isPressedEnter = function(e) {

	return e.keyCode == 13;
};


// dialog message
// --------------------------------------------------------

 /**
  * 画面読み込み時、サーバサイドメッセージが設定されていた場合
  * ダイアログメッセージを表示する。
  */
common.loadMessage = function() {

	if ($('#dialogMessage').size() !== 0) {
		common.popupMessage(
			$('#messageTitle').val(),
			$('#flashMessage').val()
		);
	}
}

/**
 * ダイアログを生成し、タイトルとメッセージを設定して、
 * ダイアログを表示する。
 *
 * @param {string} title ダイアログタイトル
 * @param {string} message ダイアログメッセージ
 * @param {} _buttons ダイアログのボタン設定
 */
common.popupMessage = function(title, message, _buttons) {

	var argsLen = arguments.length;
	if (argsLen < 3) {
		var _buttons = {
			'確認': function() {
				$(this).dialog('close');
			}
		}
	}

	$('#dialogMessage')
		.dialog({
			width: 320,
			modal: true,
			position: {
				of : '#mainHeader',
				at: 'center top',
				my: 'center top'
			},
			autoOpen: false,
			show: {
				easing: 'swing',
				effect: 'blind'
			},
			hide: {
				duration: 300,
				easing: 'swing',
				effect: 'blind'
			},
			buttons: _buttons,
			title: common.getMessageTitle(title)
		})
		.html(message)
		.dialog('open');
};

common.getMessageTitle = function(key) {

	var title;
	switch (key) {
		case 'E':
			title = 'エラー'; break;
		case 'W':
			title = '注意'; break;
		case 'I':
			title = 'インフォメーション'; break;
		case 'Q':
			title = '確認'; break;
		default:
			title = 'メッセージ'; break;
	}
	return title;
}

common.getMouseWheelEvent = function() {
	return 'onwheel' in document
			? 'wheel' : 'onmousewheel' in document
			? 'mousewheel' : 'DOMMouseScroll';
};

common.getMouseWheelDelta = function(e) {
	e.preventDefault();
	return e.originalEvent.deltaY ? -(e.originalEvent.deltaY) : e.originalEvent.wheelDelta
			? e.originalEvent.wheelDelta : -(e.originalEvent.detail);
};
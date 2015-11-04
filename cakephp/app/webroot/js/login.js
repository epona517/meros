/**
 * login javascript
 */
var common = common || {};
var login = login || {};


// INITIALIZATION
// ======================================================================
login.init = function () {
	// PROCESS
	// ======================================================================
	common.loadMessage();

	// ACTION
	// ======================================================================
	// 【ログインボタン】押下
	$('#button_login').click(function() {

		common.submit('auth');
	});

	// EVENT
	// ======================================================================
	// 【ログインID/PW】エンター押下
	$('.enterSubmit').keypress(function(e) {

		if (common.isPressedEnter(e)) {
			$('#button_login').click();
		}
	});

	// 【ヘッダアイコン】押下
	$('#systemTitle').find('.fa-car').click(function() {
		login.animateRotate($(this));
	});

	// 【システム名】マウスホバー時
	$('.jsRemains').hover(function() {
		// hover on
		login.displayRemains($(this), true);
	},
	// hover out
	function() {
		login.displayRemains($(this), false);
	});
};


// METHOD
// ======================================================================

// アイコンをまわす
login.animateRotate = function($obj) {

	$obj.animate({zIndex: 1}, {
		// １秒かけて
		duration: 1000,
		// stepはアニメーションが進むたびに呼ばれる
		// z-indexが0から1へ変化していくにつれて、cssの角度が増加していく。
		step: function(now) {
			$(this).css({transform: 'rotate(' + (now * 360) + 'deg)'});
		},
		// 回転終了後、z-indexを元に戻す
		complete: function() {
			$(this).css({zIndex: 0});
		}
	});
}

// 正式名称を表示する
login.displayRemains = function($obj, dispFlg) {

	var remainId = $obj.data('for');
	// hover outの場合
	if (!dispFlg) {
		$('#' + remainId)
			.animate({opacity: 0}, 500, function() {
				$(this).addClass('hidden');
			});
		return;
	}
	// hover onの場合
	// 文字の開始位置を取得
	var start = Number($('#' + remainId).data('start'));
	// css:left の文字開始値からの差分を取得（1つ上の数字の二乗-二乗）×係数
	var leftMinus = (Math.pow(start + 1, 2) - Math.pow(start, 2)) * 4.6;
	// 透明度を「透明」にし、左位置を指定->可視->透明度を徐々に「不透明」に
	$('#' + remainId)
		.css({opacity: '0', left: 16 - leftMinus})
		.removeClass('hidden')
		.animate({opacity: 1}, 750, 'linear');
}
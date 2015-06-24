/**
 * login javascript
 */
var common = common || {};
var login = login || {};

login.init = function () {

	// 【ログインボタン押下】
	$('#button_login').click(function() {

		common.submit('auth');
	});

	$('.enterSubmit').keypress(function(e) {

		if (common.isPressedEnter(e)) {
			$('#button_login').click();
		}
	});

};
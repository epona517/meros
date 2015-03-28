/**
 * login javascript
 */
var login = login || {};

login.init = function () {

	$('#button_login').click(function() {

		common.submit('execute');
	});
};
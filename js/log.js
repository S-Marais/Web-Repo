/* JS file for handling login register and logout actions
 * Dependencies :
 * jQuery
 * base_layout.js
 * tools.js
 */
$(document).ready(function () {
	$('.toolbar_log_button').on('click', function (e) {
		e.preventDefault();
		e.stopPropagation();
		ajaxCallHelper("home", $(this).text().toLowerCase() + '_form.html', $('.dialog'), true);
	});
	$('.toolbar_register_button').on('click', function (e) {
		e.preventDefault();
		e.stopPropagation();
		ajaxCallHelper("home", 'register_form.html', $('.dialog'), true);
	});

	$(document).on('click', '#register', function (e) {
		e.preventDefault();
		e.stopPropagation();
		var data = {
			id_profile: $('select[name="id_profile"]').val(),
			firstname: $('input[name="firstname"]').val(),
			lastname: $('input[name="lastname"]').val(),
			email: $('input[name="email"]').val(),
			password: $('input[name="password"]').val()
		};
		ajaxCallAction("home", 'RegisterUser', data, function(data) {
			if (data.result) {
				$('#cover').data('closable', true);
				$('.dialog').text(data.msg);
			} else {
				$('.required').hide();
				data.invalid_inputs.forEach(function (name) {
					$('.required.input_'+name).show();
				});
			}
		});
	});

	$(document).on('click', '#login', function (e) {
		e.preventDefault();
		e.stopPropagation();
		var data = {
			email: $('input[name="email"]').val(),
			password: $('input[name="password"]').val()
		};
		ajaxCallAction("home", 'LoginUser', data, function(data) {
			if (data.result) {
				$('#cover').data('closable', true);
				$('.dialog').text(data.msg);
			} else {
				$('#cover').data('closable', true);
				$('.dialog').text(data.error);
			}
		});
	});
});

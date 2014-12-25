/* JS file for handling login register and logout actions
 * Dependencies :
 * jQuery
 * base_layout.js
 * tools.js
 */
$(document).ready(function () {
	$('.top_right_tools').on('click', '.toolbar_log_button', function (e) {
		e.preventDefault();
		e.stopPropagation();
		if ($(this).text() == 'Login') {
			ajaxCallHelper("home", $(this).text().toLowerCase() + '_form.html', $('.dialog'), true);
		} else {
			ajaxCallAction("home", 'LogoutUser', null, function(data) {
				if (data.result) {
					$('.toolbar_log_button').text('Login');
					elem = $('<a href=""></a>')
						.addClass('toolbar_register_button')
						.text('Register');
					$('.top_right_tools').append(elem);
				}
			});
		}
	});
	$('.top_right_tools').on('click', '.toolbar_register_button', function (e) {
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
				$('.toolbar_log_button').text('Logout');
				$('.toolbar_register_button').remove();
			} else {
				$('#cover').data('closable', true);
				$('.dialog').text(data.error);
			}
		});
	});
});

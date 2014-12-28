/* JS file for handling login register and logout actions
 * Dependencies :
 * jQuery
 * base_layout.js
 * tools.js
 */
$(document).ready(function () {
	$('.top_right_tools').on('click', '.toolbar_login_button', function (e) {
		e.preventDefault();
		e.stopPropagation();
		ajaxCallHelper("home", 'login_form.html', $('.dialog'), true);
	});
	$('.top_right_tools').on('click', '.toolbar_logout_button', function (e) {
		e.preventDefault();
		e.stopPropagation();
		ajaxCallAction("home", 'LogoutUser', null, function(data) {
			if (data.result) {
				$('.toolbar_logout_button').remove();
				$('.toolbar_manage_button').remove();
				$('.top_manage_menu').remove();
				elem = $('<a href=""></a>')
					.addClass('toolbar_login_button')
					.text('Login');
				$('.top_right_tools').append(elem);
				elem = $('<a href=""></a>')
					.addClass('toolbar_register_button')
					.text('Register');
				$('.top_right_tools').append(elem);
			}
		});
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
				$('.dialog').html(data.msg);
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
				$('#cover').hide();
				$('.toolbar_login_button').remove();
				$('.toolbar_register_button').remove();
				elem = $('<a href=""></a>')
					.addClass('toolbar_logout_button')
					.text('Logout');
				$('.top_right_tools').append(elem);
				elem = $('<a href=""></a>')
					.addClass('toolbar_manage_button')
					.text('Manage');
				$('.top_right_tools').append(elem);
				ajaxCallHelper("home", 'manage_menu.html', $('#header'), false, true);
			} else {
				$('#cover').data('closable', true);
				$('.dialog').html(data.error);
			}
		});
	});
});

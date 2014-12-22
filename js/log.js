
$(document).ready(function () {
	$('#cover').hide();
	$('#cover').data('closable', true);
	$('.toolbar_log_button').on('click', function (e) {
		e.preventDefault();
		e.stopPropagation();
		$.ajax({
			ajax: 1,
			type: "POST",
			url: "home",
			dataType: "html",
			data: {
				action: 'RenderHelper',
				helper_name: $(this).text().toLowerCase() + '_form.tpl.html',
				token: token,
			},
			success: function(data) {
				$('#cover').data('closable', false);
				$('.dialog').html(data);
			},
			error: function() {
				$('#cover').data('closable', true);
				$('.dialog').text('An error occurred');
			}
		});
		$('#cover').show();
	});
	$('.toolbar_register_button').on('click', function (e) {
		e.preventDefault();
		e.stopPropagation();
		$.ajax({
			ajax: 1,
			type: "POST",
			url: "home",
			dataType: "html",
			data: {
				action: 'RenderHelper',
				helper_name: 'register_form.tpl.html',
				token: token,
			},
			success: function(data) {
				$('#cover').data('closable', false);
				$('.dialog').html(data);
			},
			error: function() {
				$('#cover').data('closable', true);
				$('.dialog').text('An error occurred');
			}
		});
		$('#cover').show();
	});

	$(document).on('click', '#register', function (e) {
		e.preventDefault();
		e.stopPropagation();
		$.ajax({
			ajax: 1,
			type: "POST",
			url: "home",
			dataType: "json",
			data: {
				action: 'RegisterUser',
				id_profile: $('select[name="id_profile"]').val(),
				firstname: $('input[name="firstname"]').val(),
				lastname: $('input[name="lastname"]').val(),
				email: $('input[name="email"]').val(),
				password: $('input[name="password"]').val(),
				token: token,
			},
			success: function(data) {
				if (data.result) {
					$('#cover').data('closable', true);
					$('.dialog').text(data.msg);
				} else {
					$('.required').hide();
					data.invalid_inputs.forEach(function (name) {
						$('.required.input_'+name).show();
					});
				}
			},
			error: function() {
				$('#cover').data('closable', true);
				$('.dialog').text('An error occurred');
			}
		});
	});

	$(document).on('click', '#login', function (e) {
		e.preventDefault();
		e.stopPropagation();
		$.ajax({
			ajax: 1,
			type: "POST",
			url: "home",
			dataType: "json",
			data: {
				action: 'LoginUser',
				token: token,
			},
			success: function(data) {
				if (data.result) {
					$('#cover').data('closable', true);
					$('.dialog').text(data.msg);
				} else {
					$('#cover').data('closable', true);
					$('.dialog').text(data.error);
				}
			},
			error: function() {
				$('#cover').data('closable', true);
				$('.dialog').text('An error occurred');
			}
		});
	});

	$(document).on('click', '#cover,.dialog', function (e) {
		e.preventDefault();
		e.stopPropagation();
		if ($('#cover').data('closable') == true) {
			$('#cover').hide();
		}
	});
});

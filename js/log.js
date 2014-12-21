
$(document).ready(function () {
	$('#cover').hide();
	$('.toolbar_log_button').on('click', function (e) {
		e.preventDefault();
		e.stopPropagation();
		$('#cover').show();
	});
	$('.toolbar_register_button').on('click', function (e) {
		e.preventDefault();
		e.stopPropagation();
		$('#cover').show();
	});

	$('#register').on('click', function (e) {
		e.preventDefault();
		e.stopPropagation();
		$.ajax({
			ajax: 1,
			type: "POST",
			url: "home",
			dataType: "json",
			data: {
				action: 'RegisterUser',
				token: token,
			},
			success: function(data) {
				if (data.result) {
					alert(data.msg);
					$('#cover').hide();
				} else {
					alert(data.error);
				}
			},
			error: function() {
				$('.dialog').text('An error occurred');
			}
		});
	});
});

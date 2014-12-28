/* Main Js file for base_layout template
 * Dependencies :
 * jQuery
 */
$(document).ready(function () {
	$('#cover').hide();
	$('#cover').data('closable', true);

	$(document).on('click', '.dialog', function (e) {
		e.preventDefault();
		e.stopPropagation();
		if ($('#cover').data('closable') == true) {
			$('#cover').hide();
		}
	});

	$(document).on('click', '#cover', function (e) {
		e.preventDefault();
		e.stopPropagation();
		$('#cover').hide();
		$('#cover').data('closable', true);
	});

	/* Close dialog on escape */
	$(document).keydown(function (e) {
		if (e.keyCode == 27 && $('#cover').data('closable') == false) {
			$('#cover').hide();
			$('#cover').data('closable', true);
		}
	});
	/* Close menu on click elsewhere */
	$(document).on('click', function (e) {
		if(!$(e.target).is('.top_manage_menu') && !$(e.target).parents('.top_manage_menu').is('.top_manage_menu')) {
			$('.top_manage_menu').hide();
		}
	});
});

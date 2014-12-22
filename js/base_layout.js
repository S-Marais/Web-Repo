/* Main Js file for base_layout template
 * Dependencies :
 * jQuery
 */
$(document).ready(function () {
	$('#cover').hide();
	$('#cover').data('closable', true);

	$(document).on('click', '#cover,.dialog', function (e) {
		e.preventDefault();
		e.stopPropagation();
		if ($('#cover').data('closable') == true) {
			$('#cover').hide();
		}
	});

	/* Close dialog on escape */
	$(document).keydown(function (e) {
		if (e.keyCode == 27 && $('#cover').data('closable') == false) {
			$('#cover').hide();
			$('#cover').data('closable', true);
		}
	});
});

/* JS file for handling top right manage menu
 * Dependencies :
 * jQuery
 * base_layout.js
 * tools.js
 */
$(document).ready(function () {
	$('.top_right_tools').on('click', '.toolbar_manage_button', function (e) {
		e.preventDefault();
		e.stopPropagation();
		$('.top_manage_menu').toggle();
	});

	$('#header .inner').on('click', '.menu_option',  function (e) {
		e.preventDefault();
		e.stopPropagation();
		if ($(this).data('href'))
			window.location.href = $(this).data('href');
	});
});

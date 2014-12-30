/* JS file for handling profile
 * Dependencies :
 * jQuery
 * base_layout.js
 * tools.js
 */
 $(document).ready(function () {
    //run on scroll
     $(window).scroll(function () {
        var windowpos = $(window).scrollTop();
        $('#side_menu_bar').stop().animate({'margin-top':windowpos},500);
     });

	$('#side_menu_bar .menu_option').on('click', function (e) {
		e.preventDefault();
		e.stopPropagation();
		$(this).append($('#right_arrow'));
		ajaxCallHelper("profile&id="+id_user, $(this).data('helper') + '.html', $('#main_form'), false);
		history.pushState({}, '', $(this).data('href'));
	});
});

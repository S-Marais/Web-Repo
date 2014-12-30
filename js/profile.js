/* JS file for handling profile
 * Dependencies :
 * jQuery
 * base_layout.js
 * tools.js
 */
 $(document).ready(function(){
    //run on scroll
     $(window).scroll(function(){
        var windowpos = $(window).scrollTop();
        $('#side_menu_bar').stop().animate({'margin-top':windowpos},500);
     });
});

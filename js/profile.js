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
		ajaxCallHelper("profile&edit&id="+id_user, $(this).data('helper') + '.html', $('#main_form'), false);
		history.pushState({}, '', $(this).data('href'));
	});

	//image uploader
	function uploadProfileImage(file)
	{
		var xhr = null;
		try {
			xhr = new XMLHttpRequest();
		} catch (e) {
			try {
				xhr = new ActiveXobject('Msxml2.XMLHTTP');
			} catch (e) {
				try {
					xhr = new ActiveXobject('Microsoft.XMLHTTP');
				} catch (e) {}
			}
		}
		xhr.onreadystatechange = function () {
			$('#response').html("Wait server...<br/><br />")
			$('#response').attr('class', '');
			if (xhr.readyState == 4) {
				if (xhr.status == 200)
					if (xhr.responseText === "success") {
						var reader = new FileReader();
						reader.onload = function (e) {
							$('#profile_image_preview').attr('src', e.target.result);
						}
						reader.readAsDataURL(file);
						$('#response').html("Image uploaded!<br/><br />");
						$('#response').attr('class', 'green');
					} else {
						$('#response').html("Received: " + xhr.responseText + "<br /><br />");
						$('#response').attr('class', 'red');
					}
				else
					$('#response').html("Error: returned status code " + xhr.status + " " + xhr.statusText + "<br /><br />");
			}
		}
		xhr.open("POST", "profile&edit&id="+id_user+"&action=UploadProfileImage", true);
		xhr.send(file);
	}

	$('#main_form').on('click', '#profile_image_preview', function (e) {
		$('#profile_image_input').click();
	});
	$('#main_form').on('dragleave', '#profile_image_preview', function (e) {
		$("#profile_image_preview").removeClass('dragover');
		e.preventDefault();
		e.stopPropagation();
	});
	$('#main_form').on('dragover', '#profile_image_preview', function (e) {
		$("#profile_image_preview").addClass('dragover');
		e.preventDefault();
		e.stopPropagation();
	});
	$('#main_form').on('drop', '#profile_image_preview', function (e) {
		if(e.originalEvent.dataTransfer){
			if(e.originalEvent.dataTransfer.files.length) {
				e.preventDefault();
				e.stopPropagation();
				uploadProfileImage(e.originalEvent.dataTransfer.files[0]);
			}
		}
		$("#profile_image_preview").removeClass('dragover');
	});
	$('#main_form').on('change', '#profile_image_input', function (e) {
		uploadProfileImage(this.files[0]);
	});
});

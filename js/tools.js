/* JS file providing tools for ajax calls and more
 * Dependencies :
 * jQuery
 */
function ajaxCallHelper(url, helper_name, handler, is_dialog, append)
{
	$.ajax({
		ajax: 1,
		type: "POST",
		url: url,
		dataType: "html",
		data: {
			action: 'RenderHelper',
			helper_name: helper_name,
			token: token,
		},
		success: function(data) {
			if (is_dialog)
				$('#cover').data('closable', false);
			if (append)
				handler.append(data);
			else
				handler.html(data);
		},
		error: function() {
			if (is_dialog)
				$('#cover').data('closable', true);
			if (append)
				handler.append('An error occurred X_X');
			else
				handler.text('An error occurred X_X');
		}
	});
	if (is_dialog)
		$('#cover').show();
}

function ajaxCallAction(url, action, data, callback, dataType)
{
	var merged_data = {'action':action,'token':token};
	if (!dataType)
		dataType = 'json';
	if (data != null)
		$.extend(true, merged_data, data);
	$.ajax({
		ajax: 1,
		type: "POST",
		url: url,
		dataType: dataType,
		data: merged_data,
		success: function(data) {
			return callback(data);
		},
		error: function() {
			$('#cover').show().data('closable', true);
			$('.dialog').text('An error occurred X_X');
		}
	});
}

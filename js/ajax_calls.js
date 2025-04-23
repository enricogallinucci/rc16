function ajaxCompleted(){
	console.log("Ajax action completed");
}
function ajaxError(jqXHR, textStatus, error){
	console.log("Ajax action completed with errors");
}

function upsert_preference(cookieId, level, levelId, preference, level1Id) {
	$.ajax({ url: 'http://www.referendumcostituzionale2016.it/ajax/upsert_preference.php',
		data: {cookieId: cookieId, level: level, levelId: levelId, preference: preference, level1Id: level1Id},
		type: 'post',
		complete: ajaxCompleted,
		error: ajaxError,
		success: function(output) {
			res = jQuery.parseJSON(output);
		}
	});
}

function ajax_send_mail(sender, object, message) {
	$.ajax({ url: 'http://www.referendumcostituzionale2016.it/ajax/send_mail.php',
		data: {sender: sender, object: object, message: message},
		type: 'post',
		complete: ajaxCompleted,
		error: ajaxError,
		success: function(output) {
			console.log("Ajax action completed successfully");
			res = jQuery.parseJSON(output);
			if(res['result']=='OK'){
				Materialize.toast('EMail inviata con successo', 4000, 'green');
				$('#sender').val('');
				$('#object').val('');
				$('#message').val('');
			};
		}
	});
}


function nutsAlertSuccess( message ) {
	$('.nuts-alert').css('display', 'none');
	successAlert = $('.alert-success');
	successAlert.find('.msg').html(message);
	successAlert.show('fast');
}

function nutsAlertDanger( message ) {
	$('.nuts-alert').css('display', 'none');
	errorAlert = $('.alert-danger');
	errorAlert.find('.msg').html(message);
	errorAlert.show('fast');
}

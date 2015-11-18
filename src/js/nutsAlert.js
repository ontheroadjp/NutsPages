function nutsAlertSuccess( message ) {
	$('.nuts-alert').css('display', 'none');
	alert = $('.alert-success');
	alert.find('.msg').html(message);
	alert.show('fast');
	initCloseBtn();
}

function nutsAlertInfo( message ) {
	$('.nuts-alert').css('display', 'none');
	alert = $('.alert-info');
	alert.find('.msg').html(message);
	alert.show('fast');
	initCloseBtn();
}

function nutsAlertDanger( message ) {
	$('.nuts-alert').css('display', 'none');
	alert = $('.alert-danger');
	alert.find('.msg').html(message);
	alert.show('fast');
	initCloseBtn();
}

function nutsAlertWarning( message ) {
	$('.nuts-alert').css('display', 'none');
	alert = $('.alert-warning');
	alert.find('.msg').html(message);
	alert.show('fast');
	initCloseBtn();
}

function initCloseBtn() {
	$('.close').click(function(){
		$(this).parent('.nuts-alert').hide('first');
	});
}

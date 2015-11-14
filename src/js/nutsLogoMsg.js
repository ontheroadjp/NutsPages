
function nutsAlertDanger( message ) {
	$('.nuts-alert').css('display', 'none');
	errorAlert = $('.alert-danger');
	errorAlert.find('.msg').html(message);
	errorAlert.show('fast');
}

function nutsLogoMsgSuccess( message ) {
	logo = $('.logo-lg').html();
	$('.logo').addClass('nuts-alert alert-success alert-dark').css('display','block');
	$('.logo-lg').css('font-size','14px').html( message);
	setTimeout(function(){
		$('.logo-lg').html(logo);
		$('.logo').removeClass('nuts-alert alert-success alert-dark');
	},2000);
}

function nutsLogoMsgDanger( message ) {
	logo = $('.logo-lg').html();
	$('.logo').addClass('nuts-alert alert-danger alert-dark').css('display','block');
	$('.logo-lg').css('font-size','14px').html( message);
	setTimeout(function(){
		$('.logo-lg').html(logo);
		$('.logo').removeClass('nuts-alert alert-danger alert-dark');
	},2000);
}

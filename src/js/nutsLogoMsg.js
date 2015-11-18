

function nutsLogoMsgSuccess( message ) {
	logo = $('.logo-lg').html();
	$('.logo').addClass('nuts-alert alert-success alert-dark').css('display','block');
	$('.logo-lg').css('font-size','14px').html( message);
	setTimeout(function(){
		$('.logo-lg').html(logo);
		$('.logo').removeClass('nuts-alert alert-success alert-dark');
	},2000);
}

function nutsLogoMsgInfo( message ) {
	logo = $('.logo-lg').html();
	$('.logo').addClass('nuts-alert alert-info alert-dark').css('display','block');
	$('.logo-lg').css('font-size','14px').html( message);
	setTimeout(function(){
		$('.logo-lg').html(logo);
		$('.logo').removeClass('nuts-alert alert-info alert-dark');
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

function nutsLogoWarning( message ) {
	logo = $('.logo-lg').html();
	$('.logo').addClass('nuts-alert alert-warning alert-dark').css('display','block');
	$('.logo-lg').css('font-size','14px').html( message);
	setTimeout(function(){
		$('.logo-lg').html(logo);
		$('.logo').removeClass('nuts-alert alert-warning alert-dark');
	},2000);
}

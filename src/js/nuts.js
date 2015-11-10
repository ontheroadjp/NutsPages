
function nutsSuccessMsg( message ) {
	logo = $('.logo-lg').html();
	$('.logo').addClass('nuts-alert alert-success alert-dark').css('display','block');
	$('.logo-lg').css('font-size','14px').html( message);
	setTimeout(function(){
		$('.logo-lg').html(logo);
		$('.logo').removeClass('nuts-alert alert-success alert-dark');
	},2000);
}

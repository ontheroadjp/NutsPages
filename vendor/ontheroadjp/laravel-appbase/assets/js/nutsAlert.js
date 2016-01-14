
// success
// info
// danger
// warning

function nutsAlert( type, messages ) {
	$('.nuts-alert').css('display', 'none');
    var class = '.alert-' + type;
	var alert = $(class);
    out = '';
    $(messages).each(function(index, element){
        out += '<li>' + element + '</li>'; 
    });
	alert.find('.msg').html(out);
	alert.show('fast');
	initCloseBtn();
}

function initCloseBtn() {
	$('.close').click(function(){
		$(this).parent('.nuts-alert').hide('first');
	});
}



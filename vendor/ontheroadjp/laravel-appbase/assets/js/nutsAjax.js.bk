	
// ----------------------------------
// Ajax
// ----------------------------------

var ajax = function(method, url, params) {
    $(this).prop("disabled",true);
	$.ajax({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		},
		url: url,
		type: method,
		cache: false,
		data: params,
		dataType: "json",
		statusCode : {

			// Laravel validation err
			422 : function() {
				nutsAlertDanger( "<?php echo _('Invalid value you entered.'); ?>" );
			}
		},
	}).done(function(data, textStatus, jqXHR){
		nutsAlertSuccess(data.message);

	}).fail(function(data, textStatus, errorThrown){
		nutsAlertDanger(errorThrown);

	}).always(function(data, textStatus, returnedObject){ 
        $('.update-btn').prop("disabled",false);
	});
});


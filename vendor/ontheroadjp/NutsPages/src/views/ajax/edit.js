
	$('.site-edit-btn').click( function() {

		successAlert = $('.alert-success').css('display', 'none');
		errorAlert = $('.alert-danger').css('display', 'none');

		$.ajax({
			headers: {
	            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	        },
			url: "/site/edit",
			type: "POST",
			cache: false,
			data: {
				"id" : "{{ $user->id }}",
				"field" : $(this).attr('name'),
				"val" : $(":text[name=\"" + $(this).attr('name') + "\"]").val()
			},
			dataType: "json",
			statusCode : {
				// Laravel validation err
				422 : function() {
					errorAlert = $('.alert-danger');
					errorAlert.find('.msg').html('Invalid value you entered.');
					errorAlert.show('fast');
				}
			},
		}).done(function(data, textStatus, jqXHR){
			// successAlert.find('.msg').html(data.message);
			// successAlert.show('fast');
			nutsSuccessMsg(data.message);

		}).fail(function(data, textStatus, errorThrown){
			errorAlert.find('.msg').html(errorThrown);
			errorAlert.show('fast');
			// alert(errorHandler(arguments));

		}).always(function(data, textStatus, returnedObject){ 
			// alert(textStatus);
		});
	});

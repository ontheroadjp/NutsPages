
	$('.site-delete-btn').click( function() {

		if(!confirm('本当に削除しますか？')){
	        /* キャンセルの時の処理 */
	        return false;
	    }else{
	        /*　OKの時の処理 */
			successAlert = $('.alert-success').css('display', 'none');
			errorAlert = $('.alert-danger').css('display', 'none');

			$.ajax({
				headers: {
		            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		        },
				url: "/site/delete/" + $(this).parents('.panel').attr('hash'),
				type: "POST",
				cache: false,
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
				// nutsSuccessMsg(data.message);
				target = $('div[hash="' + data.message + '"]');
				target.hide('slow',function(){
					target.remove();
				});

			}).fail(function(data, textStatus, errorThrown){
				//errorAlert.find('.msg').html(errorThrown);
				//errorAlert.show('fast');
				nutsAlertDanger(data.message);
				// alert(errorHandler(arguments));

			}).always(function(data, textStatus, returnedObject){ 
				// alert(textStatus);
			});
	    }

	});

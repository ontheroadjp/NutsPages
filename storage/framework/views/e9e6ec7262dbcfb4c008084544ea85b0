
	$('.site-delete-btn').click( function() {

		if(!confirm('本当に削除しますか？')){
	        /* キャンセルの時の処理 */
	        return false;
	    }else{
	        /* OKの時の処理 */
			successAlert = $('.alert-success').css('display', 'none');
			errorAlert = $('.alert-danger').css('display', 'none');

			$.ajax({
				headers: {
		            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
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
					},
					500 : function(data) {
        				nutsAlertDanger(data.responseJSON.message);
					}
				},
			}).done(function(data, textStatus, jqXHR){
				target = $('div[hash="' + data.message + '"]');
				target.hide('slow',function(){
					target.remove();
				});

			}).fail(function(data, textStatus, errorThrown){
				//nutsAlertDanger(data.responseJSON.message);

			}).always(function(data, textStatus, returnedObject){ 
				// alert(textStatus);
			});
	    }

	});

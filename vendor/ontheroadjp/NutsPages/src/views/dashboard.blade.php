@extends('app')

@section('htmlheader_title')
{{ _('Dashboard') }}
@endsection

@section('contentheader_title')
<i class="fa fa-user"></i> {{ _('Dashboard') }}
@endsection



@section('help_content')
<ul>
	<li>このページでは登録情報の変更が行えます。</li>
</ul>
@endsection


@section('main-content')
@include('partials.help_panel')

<div class="panel panel-default">
<div class="panel-heading">WEB Site 01</div>

<div class="panel-heading panel-button">
<a type="button" class="btn nuts-btn-success tooltip-success" data-toggle="tooltip" data-placement="top" title="" data-original-title="Tooltip on top">PUBLISH</a>

<a type="button" class="btn nuts-btn-success tooltip-success" data-toggle="tooltip" data-placement="top" title="" data-original-title="Tooltip on top">EDIT</a>

<a type="button" class="btn nuts-btn-danger tooltip-success" data-toggle="tooltip" data-placement="top" title="" data-original-title="Tooltip on top">DELETE</a>
</div>

<div class="panel-body">
	<div class="panel-body">
		<ul id="" class="nav nav-tabs">
			<li class="active">
				<a href="#site-status" data-toggle="tab"><i class="fa fa-tachometer"></i> {{ _('Status') }}</a>
			</li>
			<li class="">
				<a href="#site-settings" data-toggle="tab"><i class="fa fa-cog"></i> {{ _('Settings') }}</a>
			</li>
			<li class="">
				<a href="#google-analytics" data-toggle="tab"><i class="fa fa-google"></i> {{ _('Google Analitics') }}</a>
			</li>
		</ul>

		<div class="tab-content tab-content-bordered">

			<!-- ------------------------------------- -->
			<div class="tab-pane fade active in" id="site-status">
				<div class="box box-primary">
					<div class="box-header with-border">
						<h3 class="box-title"><i class="fa fa-paw"></i>{{ _('User Profile') }}</h3>
					</div>

					<form role="form">
						<div class="box-body">
						<div class="col-md-6">

						<div class="form-group">
							<label for="exampleInputEmail1">{{ _('User Name') }}</label>
								<div class="input-group input-group">
								<input name="name" type="text" class="form-control" placeholder="{{ _('User Name') }}" value="{{ $user->name }}">
								<span class="input-group-btn">
								<button name="name" type="button" class="btn nuts-btn-info btn-flat change-btn">{{ _('UPDATE') }}</button>
								</span>
							</div>
						</div>

						<div class="form-group">
							<label for="exampleInputEmail1">{{ _('Email Address') }}</label>
								<div class="input-group input-group">
								<input name='email' type="text" class="form-control" placeholder="{{ _('Email Address') }}" value="{{ $user->email }}">
								<span class="input-group-btn">
								<button name="email" type="button" class="btn nuts-btn-info btn-flat change-btn">{{ _('UPDATE') }}</button>
								</span>
							</div>
						</div>

						</div><!-- / .col -->
						</div><!-- /.box-body -->
					</form>
				</div>
			</div> <!-- / .tab-pane -->

			<!-- ------------------------------------- -->
			<div class="tab-pane fade" id="site-settings">
				<div class="box box-primary">

					<form role="form">
						<div class="box-body">
						<div class="col-md-6">

						<div class="form-group">
							<label for="exampleInputEmail1">{{ _('Site Address') }}</label>
								<div class="input-group input-group">
								<input name="name" type="text" class="form-control" placeholder="{{ _('User Name') }}" value="{{ $user->name }}">
								<span class="input-group-btn">
								<button name="name" type="button" class="btn nuts-btn-info btn-flat change-btn">{{ _('UPDATE') }}</button>
								</span>
							</div>
						</div>

						<div class="form-group">
							<label for="exampleInputEmail1">{{ _('Site Name') }}</label>
								<div class="input-group input-group">
								<input name="name" type="text" class="form-control" placeholder="{{ _('User Name') }}" value="{{ $user->name }}">
								<span class="input-group-btn">
								<button name="name" type="button" class="btn nuts-btn-info btn-flat change-btn">{{ _('UPDATE') }}</button>
								</span>
							</div>
						</div>

						<div class="form-group">
							<label for="exampleInputEmail1">{{ _('Site Description') }}</label>
								<div class="input-group input-group">
								<input name='email' type="text" class="form-control" placeholder="{{ _('Email Address') }}" value="{{ $user->email }}">
								<span class="input-group-btn">
								<button name="email" type="button" class="btn nuts-btn-info btn-flat change-btn">{{ _('UPDATE') }}</button>
								</span>
							</div>
						</div>

						<div class="form-group">
							<label for="exampleInputEmail1">{{ _('Keywords') }}</label>
								<div class="input-group input-group">
								<input name='email' type="text" class="form-control" placeholder="{{ _('Email Address') }}" value="{{ $user->email }}">
								<span class="input-group-btn">
								<button name="email" type="button" class="btn nuts-btn-info btn-flat change-btn">{{ _('UPDATE') }}</button>
								</span>
							</div>
						</div>

						</div><!-- / .col -->
						</div><!-- /.box-body -->
					</form>
				</div>
			</div> <!-- / .tab-pane -->

			<!-- ------------------------------------- -->
			<div class="tab-pane fade" id="google-analytics">
				<p>Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui photo booth letterpress, commodo enim craft beer mlkshk aliquip jean shorts ullamco ad vinyl cillum PBR. Homo nostrud organic, assumenda labore aesthetic magna delectus mollit. Keytar helvetica VHS salvia yr, vero magna velit sapiente labore stumptown. Vegan fanny pack odio cillum wes anderson 8-bit, sustainable jean shorts beard ut DIY ethical culpa terry richardson biodiesel. Art party scenester stumptown, tumblr butcher vero sint qui sapiente accusamus tattooed echo park.</p>
			</div> <!-- / .tab-pane -->
		</div> <!-- / .tab-content -->
	</div>
</div>










</div>
</div>


<div class="nuts-alert alert-success alert-dark">
<button type="button" class="close" data-dismiss="alert">×</button>
<strong><i class="icon fa fa-ban"></i> Success!</strong>　<span class="msg"></span>
</div>

<div class="nuts-alert alert-info alert-dark">
<button type="button" class="close" data-dismiss="alert">×</button>
<strong><i class="icon fa fa-ban"></i> Info!</strong>　<span class="msg"></span>
</div>

<div class="nuts-alert alert-danger alert-dark">
<button type="button" class="close" data-dismiss="alert">×</button>
<strong><i class="icon fa fa-ban"></i> Alert!</strong>　<span class="msg"></span>
</div>

<div class="nuts-alert alert-warning alert-dark">
<button type="button" class="close" data-dismiss="alert">×</button>
<strong><i class="icon fa fa-ban"></i> Warning!</strong>　<span class="msg"></span>
</div>


<div class="panel">
	<div class="panel-body">
		<ul id="" class="nav nav-tabs">
			<li class="active">
				<a href="#account-settings-tab-pane" data-toggle="tab">{{ _('Account Settings') }}</a>
			</li>
			<li class="">
				<a href="#billing-and-plan-settings-tab-pane" data-toggle="tab">{{ _('Billing & Plan Settings') }}</a>
			</li>
		</ul>

		<div class="tab-content tab-content-bordered">
			<div class="tab-pane fade active in" id="account-settings-tab-pane">

<!-- ------------------------------------- -->


<style>
.nuts-modal {
    display: none; 
    overflow: hidden;
    position: fixed;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    z-index: 1050;
    -webkit-overflow-scrolling: touch;
    outline: 0;
    background-color: rgba(0, 0, 0, 0.6);
    text-align: center;
}
.nuts-modal-dialog {
    width: 350px;
    margin: 150px auto;
}
.nuts-modal-content {
    -webkit-box-shadow: 0 5px 15px rgba(0, 0, 0, 0.5);
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.5);
    background-color: #fff;
}
.nuts-modal-success .modal-header {
    background-color: #5ebd5e;
    color: #fff;
    font-size: 90px;
    margin-bottom: 30px;
    padding: 0px;
    text-shadow: 0 1px 0 rgba(0,0,0,.15);
    border-bottom: 4px solid rgba(0,0,0,.08);
}
.nuts-modal-success .modal-title{
	font-size: 14px;
    font-weight: 600;
    margin-bottom: 3px;
}}
.nuts-modal-success .modal-body {
	color: #888;
}
.nuts-modal-success .modal-footer {
	padding: 15px;
	border-top: none;
	text-align: center;
}
.nuts-modal-success button {
    width: 100px;
    background-color: #fff;
    color: #449d44;
    margin-bottom: 20px;
}
</style>

<div id="successModal" class="nuts-modal nuts-modal-success fade in" aria-hidden="false">
	<div class="nuts-modal-dialog">
		<div class="nuts-modal-content">
			<div class="modal-header">
				<i class="fa fa-check-circle"></i>
			</div>
			<div class="modal-title">{{ _('SUCCESS') }}</div>
			<div class="modal-body">{{ _('User name has been changed.') }}</div>
			<div class="modal-footer">
				<button type="button" class="btn nuts-btn-success" data-dismiss="modal" aria-hidden="true">OK</button>
			</div>
		</div> <!-- / .modal-content -->
	</div> <!-- / .modal-dialog -->
</div>

@endsection

@section('javascript')
<script>
$(function(){

	$('.change-btn').click( function() {

		successAlert = $('.alert-success').css('display', 'none');
		errorAlert = $('.alert-danger').css('display', 'none');

		$.ajax({
			headers: {
	            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	        },
			url: "/profile/edit",
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

	$('.close').click(function(){
		$(this).parent('.nuts-alert').hide('first');
	});

	// function successMsg( message ) {
	// 	logo = $('.logo-lg').html();
	// 	$('.logo').addClass('nuts-alert alert-success alert-dark').css('display','block');
	// 	$('.logo-lg').css('font-size','14px').html( message);
	// 	setTimeout(function(){
	// 		$('.logo-lg').html(logo);
	// 		$('.logo').removeClass('nuts-alert alert-success alert-dark');
	// 	},2000);
	// }

});

	/* エラー文字列の生成 */
	function errorHandler(args) {
	    var error;
	    // errorThrownはHTTP通信に成功したときだけ空文字列以外の値が定義される
	    if (args[2]) {
	        try {
	            // JSONとしてパースが成功し、且つ {"error":"..."} という構造であったとき
	            // (undefinedが代入されるのを防ぐためにtoStringメソッドを使用)
	            error = $.parseJSON(args[0].responseText).error.toString();
	        } catch (e) {
	            // パースに失敗した、もしくは期待する構造でなかったとき
	            // (PHP側にエラーがあったときにもデバッグしやすいようにレスポンスをテキストとして返す)
	            error = 'parsererror(' + args[2] + '): ' + args[0].responseText;
	        }
	    } else {
	        // 通信に失敗したとき
	        error = args[1] + '(HTTP request failed)';
	    }
	    return error;
	}

</script>
@endsection

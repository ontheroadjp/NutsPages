@extends('app')

@section('htmlheader_title')
{{ _('User Pofile') }}
@endsection

@section('contentheader_title')
<i class="fa fa-user"></i> {{ _('My Account') }}
@endsection

@section('breadcrumb')
{{ _('My Account') }}
@endsection


@section('help_content')
<ul>
	<li>このページでは登録情報の変更が行えます。</li>
	<li>画面には現在の登録情報が表示されています。</li>
	<li>変更したい項目の内容を修正して、変更ボタン（パスワード変更の場合はパスワードの変更ボタン）を押してください。</li>
	<li>登録情報の変更が完了すると、その旨のメッセージが表示されます。</li>
	<li>エラーが表示されてしまう場合には、お手数ですがこちらまでお問い合わせください。</li>
</ul>
@endsection


@section('main-content')
@include('partials.help_panel')

{{-- Alert 使う場合 --}
{{-- @include('nuts-components.nuts-alert') --}}

<div class="panel no-box-shadow">
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
				@include('LaravelUser::partials.user.account-settings-panel')
			</div> <!-- / .tab-pane -->
			<div class="tab-pane fade" id="billing-and-plan-settings-tab-pane">
				@include('LaravelUser::partials.user.billing-and-plan-settings-panel')
			</div> <!-- / .tab-pane -->
		</div> <!-- / .tab-content -->
	</div>
</div>


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
}
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
		<button type="button" class="btn btn-success" data-dismiss="modal" aria-hidden="true">OK</button>
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
			nutsLogoMsgSuccess(data.message);
			// nutsAlertSuccess(data.message);

		}).fail(function(data, textStatus, errorThrown){
			nutsLogoMsgDanger(errorThrown);
			// nutsAlertDanger(errorThrown);

		}).always(function(data, textStatus, returnedObject){ 
			// alert(textStatus);
		});
	});

	$('.close').click(function(){
		$(this).parent('.nuts-alert').hide('first');
	});

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
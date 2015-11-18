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
<div class="panel no-box-shadow">
<div class="panel-body">

	<ul id="" class="nav nav-tabs">
		<li class="active">
			<a href="#action-history-tab-pane" data-toggle="tab"><?php echo _('Action History') ?></a>
		</li>
		<li class="">
			<a href="#account-settings-tab-pane" data-toggle="tab">{{ _('Account Settings') }}</a>
		</li>
		<li class="">
			<a href="#billing-and-plan-settings-tab-pane" data-toggle="tab">{{ _('Billing & Plan Settings') }}</a>
		</li>
	</ul>

	<div class="tab-content tab-content-bordered">
		<div id="action-history-tab-pane" class="tab-pane fade active in">
			@include('LaravelUser::partials.user.action-history-pane')
		</div>
		<div id="account-settings-tab-pane" class="tab-pane fade">
			@include('LaravelUser::partials.user.account-settings-pane')
		</div>
		<div id="billing-and-plan-settings-tab-pane" class="tab-pane fade">
			@include('LaravelUser::partials.user.billing-and-plan-settings-pane')
		</div>
	</div>

</div>
</div>



@endsection

@section('javascript')

<script>
$(function(){

	// -----------------------------------------
	// For Account Settings Pane
	// -----------------------------------------
	$('.change-btn').click( function() {
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
					nutsAlertDanger( "<?php echo _('Invalid value you entered.'); ?>" );
					// errorAlert = $('.alert-danger');
					// errorAlert.find('.msg').html('Invalid value you entered.');
					// errorAlert.show('fast');
				}
			},
		}).done(function(data, textStatus, jqXHR){
			nutsLogoMsgSuccess(data.message);
			nutsAlertSuccess(data.message);

		}).fail(function(data, textStatus, errorThrown){
			nutsLogoMsgDanger(errorThrown);
			// nutsAlertDanger(errorThrown);

		}).always(function(data, textStatus, returnedObject){ 
			// alert(textStatus);
		});
	});
});
</script>
@endsection

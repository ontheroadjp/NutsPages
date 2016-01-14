@extends('LaravelAppBase::two_columns_page')

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
	<li>{{ _('Update registerd infomation and past activity history can be checked on this page.') }}</li>
    <li>{{ _('If you want to change your user name or Email Address, please click on the corresponding UPDATE button after you edit the item to be applicable by clicking on the Account Settings tab .') }}</li>
    <li>{{ _('If you want to change your password, after you enter your current password and newly registered password, please click on the Change Password button.') }}</li>
    <li>{{ _('If you want to see the activity history, please click the Action History tab.') }}</li>
    <li>{{ _('If the error from being displayed, please contact us sorry to trouble you, but up to here.') }}</li>
	<li>このページでは登録情報の変更や過去の活動履歴を確認できます。</li>
	<li>ユーザー名または Email Address を変更する場合は、Account Settings タブをクリックして該当する項目を編集したのち対応する UPDATE ボタンをクリックしてください。</li>
	<li>パスワードを変更する場合は、現在のパスワード及び新しく登録するパスワードを入力したのち、Change Password ボタンをクリックしてください。</li>
	<li>活動履歴を確認する場合は、Action History タブをクリックしてください。</li>
	<li>エラーが表示されてしまう場合には、お手数ですがこちらまでお問い合わせください。</li>
</ul>
@endsection


@section('main-content')
<div class="panel no-box-shadow">
<div class="panel-body">

	<ul id="" class="nav nav-tabs">
		<li class="active">
			<a href="#account-settings-tab-pane" data-toggle="tab">{{ _('Account Settings') }}</a>
		</li>
		<li class="">
			<a href="#billing-and-plan-settings-tab-pane" data-toggle="tab">{{ _('Billing & Plan Settings') }}</a>
		</li>
		<li class="">
			<a href="#action-history-tab-pane" data-toggle="tab"><?php echo _('Action History') ?></a>
		</li>
	</ul>

	<div class="tab-content tab-content-bordered">
		<div id="account-settings-tab-pane" class="tab-pane fade in active">
			@include('LaravelUser::partials.account-settings-pane')
		</div>
		<div id="billing-and-plan-settings-tab-pane" class="tab-pane fade">
			@include('LaravelUser::partials.billing-and-plan-settings-pane')
		</div>
		<div id="action-history-tab-pane" class="tab-pane fade">
			@include('LaravelUser::partials.action-history-pane')
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
	$('.update-btn').click( function() {
        $(this).prop("disabled",true);
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
				}
			},
		}).done(function(data, textStatus, jqXHR){
			//nutsLogoMsgSuccess(data.message);
			nutsAlertSuccess(data.message);

		}).fail(function(data, textStatus, errorThrown){
			//nutsLogoMsgDanger(errorThrown);
			nutsAlertDanger(errorThrown);

		}).always(function(data, textStatus, returnedObject){ 
            $('.update-btn').prop("disabled",false);
		});
	});

    // -----------------------------------------
	// For Account Settings Pane
	// -----------------------------------------
	$('.password-change-btn').click( function() {
		$.ajax({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			},
			url: "/profile/changepass",
			type: "POST",
			cache: false,
			data: {
				"current_password" : $(':password[name="current_password"]').val(),
				"new_password" : $(':password[name="new_password"]').val(),
				"new_password_confirmation" : $(':password[name="new_password_confirmation"]').val()
			},
			dataType: "json",
			statusCode : {

				// Unprocessable Entity: Laravel validation err.
				422 : function(data) {
					nutsAlertDanger("<?php echo _('Invalid value you entered.'); ?>");
				},

                // Forbidden: current password is not match.
                403 : function(data) {
                    nutsAlertDanger(data.message);
                },

                // Bad Request: not AJAX access.
                400 : function(data) {
                    nutsAlertDanger(data.message);
                }
			},
		}).done(function(data, textStatus, jqXHR){
			//nutsLogoMsgSuccess(data.message);
			nutsAlertSuccess(data.message);

		}).fail(function(data, textStatus, errorThrown){
			//nutsLogoMsgDanger(errorThrown);
			//nutsAlertDanger(errorThrown);

		}).always(function(data, textStatus, returnedObject){ 
			$(':password[name="current_password"]').val(''),
			$(':password[name="new_password"]').val(''),
			$(':password[name="new_password_confirmation"]').val('')
		});
	});
});
</script>
@endsection

<div class="box box-primary no-box-shadow">
	<div class="box-header">
		<h3 class="box-title"><i class="fa fa-paw"></i>{{ _('User Profile') }}</h3>
	</div>


	<form role="form">
		<div class="box-body">
		<div class="col-md-6">

		<div class="form-group">
			<label for="name">{{ _('User Name') }}</label>
				<div class="input-group input-group">
				<input name="name" type="text" class="form-control" placeholder="{{ _('User Name') }}" value="{{ $user->name }}">
				<span class="input-group-btn">
				<button name="name" type="button" class="btn nuts-btn-info btn-flat update-btn">{{ _('UPDATE') }}</button>
				</span>
			</div>
		</div>

		<div class="form-group">
			<label for="email">{{ _('Email Address') }}</label>
				<div class="input-group input-group">
				<input name='email' type="text" class="form-control" placeholder="{{ _('Email Address') }}" value="{{ $user->email }}">
				<span class="input-group-btn">
				<button name="email" type="button" class="btn nuts-btn-info btn-flat update-btn">{{ _('UPDATE') }}</button>
				</span>
			</div>
		</div>

		</div><!-- / .col -->
		</div><!-- /.box-body -->
	</form>
</div>


<div class="box box-primary no-box-shadow">
	<div class="box-header">
		<h3 class="box-title"><i class="fa fa-lock"></i>{{ _('Password') }}</h3>
	</div>


	<form role="form">
		<div class="box-body">
		<div class="col-md-6">

		<div class="form-group">
			<label for="current_password">{{ _('Current password') }}</label>
			<input type="password" name="current_password" class="form-control" id="" placeholder="{{ _('Old Password') }}">
		</div>

		<div class="form-group">
			<label for="new_password">{{ _('New password') }}</label>
			<input type="password" name="new_password" class="form-control" id="" placeholder="{{ _('New Password') }}">
		</div>

		<div class="form-group">
			<label for="new_password_confirmation">{{ _('New password(Confirm)') }}</label>
			<input type="password" name="new_password_confirmation" class="form-control" id="" placeholder="{{ _('New Password Again') }}">
		</div>

		</div><!-- / .col -->
		</div><!-- /.box-body -->
	    <div class="box-footer no-border">
	    <div class="col-md-6 text-right">
            <button name="change-password" type="button" class="btn nuts-btn-info password-change-btn">{{ _('Change Password') }}</button>
	    </div>
	    </div>

	</form>
</div>

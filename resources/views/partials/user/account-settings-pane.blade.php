<div class="box box-primary no-box-shadow">
	<div class="box-header">
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


<div class="box box-primary no-box-shadow">
	<div class="box-header">
		<h3 class="box-title"><i class="fa fa-lock"></i>{{ _('Password') }}</h3>
	</div>


	<form role="form">
		<div class="box-body">
		<div class="col-md-6">

		<div class="form-group">
			<label for="exampleInputEmail1">{{ _('Old password') }}</label>
			<input type="email" class="form-control" id="" placeholder="{{ _('Old Password') }}">
		</div>

		<div class="form-group">
			<label for="exampleInputEmail1">{{ _('New password') }}</label>
			<input type="email" class="form-control" id="" placeholder="{{ _('New Password') }}">
		</div>

		<div class="form-group">
			<label for="exampleInputEmail1">{{ _('New password(Confirm)') }}</label>
			<input type="email" class="form-control" id="" placeholder="{{ _('New Password Again') }}">
		</div>

		</div><!-- / .col -->
		</div><!-- /.box-body -->
	</form>

	<div class="box-footer no-border">
	<div class="col-md-6 text-right">
	<button type="submit" class="btn nuts-btn-info">{{ _('Change Password') }}</button>
	</div>
	</div>

</div>

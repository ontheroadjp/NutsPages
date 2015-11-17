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

<a href="/create" class="btn nuts-btn-primary tooltip-success" data-toggle="tooltip" data-placement="top" data-original-title="{{ _('Site edit') }}">{{ _('Create New Site') }}</a>


@for( $n=0; $n<count($sites); $n++ )
<div class="panel panel-default" hash="{{ $sites[$n]->hash }}">
<div class="panel-heading">{{ $sites[$n]->site_name }}</div>

<div class="panel-heading panel-button">
<a class="btn nuts-btn-success tooltip-success" data-toggle="tooltip" data-placement="top" title="" data-original-title="{{ _('Site published') }}">{{ _('PUBLISH') }}</a>

<a href="/delete/{{ $sites[$n]->hash }}" class="btn nuts-btn-success tooltip-success" data-toggle="tooltip" data-placement="top" title="" data-original-title="{{ _('Site edit') }}">{{ _('SITE EDIT') }}</a>

<!-- <a class="btn nuts-btn-danger tooltip-success site-delete-btn" data-toggle="tooltip" data-placement="top" hash="{{ $sites[$n]->hash }}" data-original-title="{{ _('Site delete') }}">{{ _('DELETE') }}</a> -->
<a class="btn nuts-btn-danger tooltip-success site-delete-btn" data-toggle="tooltip" data-placement="top" data-original-title="{{ _('Site delete') }}">{{ _('DELETE') }}</a>

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
@endfor


@endsection

@section('javascript')
<script>
$(function(){

@include('NutsPages::ajax.delete')

});
</script>
@endsection

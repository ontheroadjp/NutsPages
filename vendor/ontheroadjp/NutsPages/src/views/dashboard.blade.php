@extends('app')

@section('htmlheader_title')
{{ _('Dashboard') }}
@endsection

@section('contentheader_title')
<i class="fa fa-user"></i> {{ _('Dashboard') }}
@endsection



@section('help_content')
<ul>
	<li>このページでは WEB サイトの作成、編集、削除などが行えます。</li>
	<li><button class="btn nuts-btn-primary btn-xs"><i class="fa fa-plus"></i>&nbsp;&nbsp;{{ _('Create New Site') }}</button> をクリックすると新規サイトを作成できます。</li>
	<li><button class="btn btn-xs nuts-btn-success"><i class="fa fa-leanpub"></i>&nbsp;{{ _('SITE PUBLISHE') }}</button> をクリックするとサイトの公開/非公開を切り替えることができます。</li>
	<li><button class="btn btn-xs nuts-btn-success"><i class="fa fa-pencil-square-o"></i>&nbsp;{{ _('SITE EDIT') }}</button> をクリックすると WEB サイトの編集が行えます。</li>
	<li><button class="btn btn-xs nuts-btn-danger"><i class="fa fa-trash-o"></i>&nbsp;{{ _('DELETE') }}</button> をクリックすると WEB サイトを削除できます（削除した WEB サイトは元に戻せませんのでご注意ください）。</li>

</ul>
@endsection


@section('main-content')
@include('partials.help_panel')

<!-- ----------------------------------- -->
@if( count($sites) === 0 ) 
<h2 class="text-center">{{ _('Welcome to Nuts Pages') }}</h2>
<p class="nuts-fs-14 text-center">
{{ _('The easy way to creating web site is here.') }}
</p>

<p class="nuts-fs-18 text-center nuts-mg-b-80">
{{ _("Let's start now, while a cup of coffee !") }}
</p>

<p class="text-center">
<a href="/create" class="btn nuts-btn-primary tooltip-success" data-toggle="tooltip" data-placement="top" data-original-title="{{ _('Creating new site') }}"><i class="fa fa-plus"></i>&nbsp;&nbsp;{{ _('Create New Site') }}</a>
</p>

<!-- ----------------------------------- -->
@else
<div class="nuts-mg-b-20">
<a href="/create" class="btn nuts-btn-primary tooltip-success" data-toggle="tooltip" data-placement="top" data-original-title="{{ _('Creating new site') }}"><i class="fa fa-plus"></i>&nbsp;&nbsp;{{ _('Create New Site') }}</a>
</div>

<style>
.panel-title {
    color: #555;
    font-size: 14px;
    font-weight: 600;
    line-height: 20px;
}
.panel-heading-controls {
    margin-top: -2px;
    margin-bottom: -200px;
    float: right;
}
.panel-heading-text {
    display: inline-block;
    line-height: 20px;
    font-size: 12px;
    margin-top: 1px;
}
ul.site-status {
    list-style: none;
    padding: 15px;
    line-height: 2em;
}
</style>

@for( $n=0; $n<count($sites); $n++ )
<div class="panel panel-default" hash="{{ $sites[$n]->hash }}">
<div class="panel-heading">
	<span class="panel-title">
		<i class="fa fa-dot-circle-o"></i>&nbsp;&nbsp;
		{{ $sites[$n]->site_name }}
	</span>
	<div class="panel-heading-controls">
		<span class="panel-heading-text"><em>{{ _('Created at ')}}{{ $sites[$n]->created_at }}</em>&nbsp;&nbsp;<span style="color: #ccc">|</span>&nbsp;&nbsp;</span>

		<a class="btn btn-xs nuts-btn-success tooltip-success" data-toggle="tooltip" data-placement="top" title="" data-original-title="{{ _('publishing your site') }}"><i class="fa fa-leanpub"></i>&nbsp;{{ _('SITE PUBLISHE') }}</a>

		<a class="btn btn-xs nuts-btn-success tooltip-success" data-toggle="tooltip" data-placement="top" title="" data-original-title="{{ _('editing your site') }}"><i class="fa fa-pencil-square-o"></i>&nbsp;{{ _('SITE EDIT') }}</a>

		<a class="btn btn-xs nuts-btn-danger tooltip-success site-delete-btn" data-toggle="tooltip" data-placement="top" data-original-title="{{ _('deleting your site') }}"><i class="fa fa-trash-o"></i>&nbsp;{{ _('DELETE') }}</a>
	</div>
</div>

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
			<div class="">
				<ul class="site-status">
				<li style="color: #333">{{ _('Site name')}}:&nbsp;{{ $sites[$n]->site_name}}</li>
				<li style="color: #333">{{ _('URL')}}:&nbsp;<a href="http://{{ $sites[$n]->subdomain }}.nutspages.com" target="_blank">http://{{ $sites[$n]->subdomain }}.nutspages.com</a></li>
				<li style="color: #333">{{ _('Created at')}}:&nbsp;{{ $sites[$n]->created_at}}</li>
				<li style="color: #333">{{ _('Last updated at')}}:&nbsp;{{ $sites[$n]->updated_at}}</li>
				</ul>
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
@endfor
@endif

@endsection

@section('javascript')
<script>
$(function(){

@include('NutsPages::ajax.delete')

});
</script>
@endsection

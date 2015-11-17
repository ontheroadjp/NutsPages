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

<h1>New Site Created.</h1>

@endsection


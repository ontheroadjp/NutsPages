{{-- newsite.blade.php --}}
@extends('app')

@section('htmlheader_title')
{{ _('Dashboard') }}
@endsection

@section('contentheader_title')
	<i class="fa fa-user"></i> {{ _('Dashboard') }}
@endsection


@section('help_content')
	<ul>
		<li>WEB サイトの編集画面</li>
	</ul>
@endsection

@section('main-content')
	<h1>New Site Created.</h1>
	<ul>
		<li>id: {{ $site->id }}</li>
		<li>user_id: {{ $site->user_id }}</li>
		<li>site_name: {{ $site->site_name }}</li>
		<li>subdomain: {{ $site->subdomain }}</li>
		<li>hash: {{ $site->hash }}</li>
	</ul>
	<p>
		<a href="{{ url('dashboard') }}">ダッシュボードへ戻る</a>
	</p>
@endsection


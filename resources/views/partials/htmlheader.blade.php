<?php // LaravelGettext::setLocale('ja_JP'); ?>

<meta charset="UTF-8">
<title> Laravel-Auth - @yield('htmlheader_title', '') </title>

<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

<meta name="csrf-token" content="{{ csrf_token() }}">

<!-- Ionicons -->
<link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />

<!-- Theme style -->
<link href="{{ asset('/css/AdminLTE.css') }}" rel="stylesheet" type="text/css" />
<!-- <link href="{{ asset('/css/pixel-admin.min.css') }}" rel="stylesheet" type="text/css" /> -->
<!-- AdminLTE Skins. We have chosen the skin-blue for this starter
      page. However, you can choose any other skin. Make sure you
      apply the skin class to the body tag so the changes take effect.
-->
<link href="{{ asset('/css/skins/skin-nuts.css') }}" rel="stylesheet" type="text/css" />

<!-- iCheck -->
<link href="{{ asset('/js/iCheck/square/blue.css') }}" rel="stylesheet" type="text/css" />

<link href="{{ asset('/css/style.css') }}" rel="stylesheet" type="text/css" />

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

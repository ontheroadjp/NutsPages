<?php LaravelGettext::setLocale('ja_JP'); ?>
<!DOCTYPE html>
<html>

<head>
<title>Laravel</title>
<link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
<link href="{{ asset('/css/style.css') }}" rel="stylesheet" type="text/css" />
<style>
    html, body {
        height: 100%;
    }
    body {
        margin: 0;
        padding: 0;
        width: 100%;
        display: table;
        font-weight: 100;
        font-family: 'Lato';
    }
    .container {
        text-align: center;
        display: table-cell;
        vertical-align: middle;
    }
    .content {
        text-align: center;
        display: inline-block;
    }
    .title {
        font-size: 72px;
				margin-bottom: 100px;
    }
		.start-btn {
				font-size: 18px;
				padding: 5px 50px;
		}
</style>
</head>

<body>
    <div class="container">
        <div class="content">
            <div class="title">Nuts Pages</div>
            <div><a href="{{ url('dashboard') }}" class="btn btn-primary start-btn">{{ _('Start') }}</a></div>
        </div>
    </div>
</body>

</html>2





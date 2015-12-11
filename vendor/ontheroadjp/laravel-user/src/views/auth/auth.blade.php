<!DOCTYPE html>
<html prefix="og: http://ogp.me/ns#">
<head>
    @include('LaravelAppBase::partials.htmlheader')
    <link href='//fonts.googleapis.com/css?family=Lato:100' rel='stylesheet' type='text/css'>
    <style>
    .login-logo, .register-logo{
        font-weight: 100;
        font-family: 'Lato';
        font-size: 72px;
        margin:3% auto;
    }
    .login-logo a, .register-logo a {
        color: #B0BEC5;
    }
    .login-box, .register-box {
        width: 360px;
        margin: 0px auto;
    }
    .login-box-body, .register-box-body {
    	background-color: rgb(246, 247, 251);
    }
    .main-section {
    	background-color: rgb(246, 247, 251);
    }
    .btn-facebook, .btn-google {
    	width: 300px;
    	margin: 0 auto;
    }
    .mg-30 {
    	margin: 30px;
    }
    </style>
</head>

<body>

    <div class="login-logo"> <a href="{{ url('/') }}">Laravel 5.1</a></div>
    <div style="width:60%; margin: 0 auto; margin-bottom:30px;">
        @include('LaravelAppBase::nuts-components.nuts-alert')
    </div>
    @yield('content')
    @include('LaravelAppBase::partials.scripts')
    <script>
        initCloseBtn();
    </script>

</body>
</html>


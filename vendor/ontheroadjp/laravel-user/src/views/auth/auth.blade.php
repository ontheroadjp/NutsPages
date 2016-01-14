@extends('LaravelAppBase::single_page')
@section('css')
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
@endsection



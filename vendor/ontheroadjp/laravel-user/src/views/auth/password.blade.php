@extends('LaravelUser::auth.auth')

@section('htmlheader_title')
{{ _('Password recovery') }}
@endsection

@section('main-content')
<div class="login-logo"><a href="{{ url('/') }}">Laravel 5.1</a></div>

<div class="main-section">

    <div class="login-box">
    <div class="login-box-body">
        <p class="login-box-msg">{{ _('Reset Password') }}</p>
        <form action="{{ url('/password/email') }}" method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group has-feedback">
                <input type="email" class="form-control" placeholder="{{ _('Email') }}" name="email" value="{{ old('email') }}"/>
                <span class="form-control-feedback"><i class="fa fa-envelope-o"></i></span>
            </div>

            <div class="row">
                <div class="col-xs-1">
                </div>
                <div class="col-xs-10">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">{{ _('Send Password Reset Link') }}</button>
                </div>
                <div class="col-xs-1"> </div>
            </div>
        </form>

        <a href="{{ url('/auth/login') }}">{{ _('Log in') }}</a><br>
        <a href="{{ url('/auth/register') }}" class="text-center">{{ _('Register a new membership') }}</a>

    </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

</div><!-- / .main-section -->
@endsection

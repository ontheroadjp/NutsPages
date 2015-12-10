@extends('LaravelUser::auth.auth')

@section('htmlheader_title')
    Password reset
@endsection

@section('content')
<div class="main-section">

    <div class="login-box">
    <div class="login-box-body">
        <p class="login-box-msg">{{ _('Reset Password') }}</p>
        <form action="{{ url('/password/reset') }}" method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="token" value="{{ $token }}">                                                         

            <div class="form-group has-feedback">
                <input type="email" class="form-control" placeholder="{{ _('Your Email Address') }}" name="email" value="{{ old('email') }}"/>
                <!-- <span class="glyphicon glyphicon-envelope form-control-feedback"></span> -->
                <span class="form-control-feedback"><i class="fa fa-envelope-o"></i></span>

            </div>

            <div class="form-group has-feedback">
                <input type="password" class="form-control" placeholder="{{ _('New Password') }}" name="password"/>
                <!-- <span class="glyphicon glyphicon-lock form-control-feedback"></span> -->
                <sapn class="form-control-feedback"><i class="fa fa-lock"></i></sapn>

            </div>

            <div class="form-group has-feedback">
                <input type="password" class="form-control" placeholder="{{ _('New Password(Confirm)') }}" name="password_confirmation"/>
                <!-- <span class="glyphicon glyphicon-lock form-control-feedback"></span> -->
                <sapn class="form-control-feedback"><i class="fa fa-lock"></i></sapn>

            </div>

            <div class="row">
                <div class="col-xs-1">
                </div><!-- /.col -->
                <div class="col-xs-10">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">{{ _('Exsecute Reset password') }}</button>
                </div><!-- /.col -->
                <div class="col-xs-1">
                </div><!-- /.col -->
            </div>
        </form>

<!--
        <a href="{{ url('/auth/login') }}">{{ _('Log in') }}</a><br>
        <a href="{{ url('/auth/register') }}" class="text-center">{{ _('Register a new membership') }}</a>
 -->
    </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

</div>
@endsection

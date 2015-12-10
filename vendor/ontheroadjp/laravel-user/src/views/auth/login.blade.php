@extends('LaravelUser::auth.auth')

@section('htmlheader_title')
{{ _('Log in') }}
@endsection

@section('content')
<div class="main-section">
<div class="login-box">
<div class="login-box-body">
<p class="login-box-msg">{{ _('Sign in to start your session') }}</p>

    <form action="{{ url('/auth/login') }}" method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group has-feedback">
            <input type="email" class="form-control" placeholder="{{ _('Email') }}" name="email"/>
            <span class="form-control-feedback"><i class="fa fa-envelope-o"></i></span>
        </div>
        <div class="form-group has-feedback">
            <input type="password" class="form-control" placeholder="{{ _('Password') }}" name="password"/>
            <sapn class="form-control-feedback"><i class="fa fa-lock"></i></sapn>
        </div>

        <div class="row">
            <div class="col-xs-8">
                <div class="checkbox icheck">
                    <label><input type="checkbox" name="remember">{{ _('Remember Me') }}</label>
                </div>
            </div>

            <div class="col-xs-4">
                <button type="submit" class="btn btn-primary btn-block btn-flat">{{ _('Sign In') }}</button>
            </div>
        </div>
    </form>

    <a href="{{ url('/password/email') }}">{{ _('I forgot my password') }}</a><br>
    <a href="{{ url('/auth/register') }}" class="text-center">{{ _('Register a new membership') }}</a>

</div><!-- /.login-box-body -->
</div><!-- /.login-box -->
</div><!-- / .main-section -->
@endsection


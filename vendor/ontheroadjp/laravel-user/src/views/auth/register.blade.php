@extends('LaravelUser::auth.auth')

@section('htmlheader_title')
{{ _('Register') }}
@endsection

@section('main-content')
<div class="login-logo"><a href="{{ url('/') }}">Laravel 5.1</a></div>

<div class="main-section">

    <div class="register-box">
    <div class="register-box-body">
        <p class="login-box-msg">{{ _('Register a new membership') }}</p>
        <form action="{{ url('/auth/register') }}" method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group has-feedback">
                <input type="text" class="form-control" placeholder="{{ _('Full name') }}" name="name" value="{{ old('name') }}"/>
                <span class="form-control-feedback"><i class="fa fa-user"></i></span>
            </div>
            <div class="form-group has-feedback">
                <input type="email" class="form-control" placeholder="{{ _('Email') }}" name="email" value="{{ old('email') }}"/>
                <span class="form-control-feedback"><i class="fa fa-envelope-o"></i></span>

            </div>
            <div class="form-group has-feedback">
                <input type="password" class="form-control" placeholder="{{ _('Password') }}" name="password"/>
                <sapn class="form-control-feedback"><i class="fa fa-lock"></i></sapn>
            </div>
            <div class="form-group has-feedback">
                <input type="password" class="form-control" placeholder="{{ _('Retype password') }}" name="password_confirmation"/>
                <sapn class="form-control-feedback"><i class="fa fa-lock"></i></sapn>

            </div>
            <div class="row">
                <div class="col-xs-8">
                    <div class="checkbox icheck">
                        <label>
                            <input type="checkbox" name="agreement"> {{ _('I agree to the') }} <a href="#">{{ _('terms') }}</a>
                        </label>
                    </div>
                </div><!-- /.col -->
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">{{ _('Register') }}</button>
                </div><!-- /.col -->
            </div>
        </form>

        <a href="{{ url('/auth/login') }}" class="text-center">{{ _('I already have a membership') }}</a>
    </div><!-- /.form-box -->
    </div><!-- /.register-box -->
</div>

<div class="social-auth-links text-center">
    <p class="mg-30">- OR -</p>
    <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> {{ _('Sign up using Facebook') }}</a>
    <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> {{ _('Sign up using Google') }}</a>
</div>

@endsection

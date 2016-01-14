@extends('LaravelAppBase::single_page')

@section('css')
    .title {
        font-family: 'Lato';
        font-size: 72px;
        margin: 200px auto 0 auto;
    }
    .sub-title{
        font-family: 'Lato';
        font-size: 28px;
        margin-bottom: 180px;
    }
    .start-btn {
        font-size: 18px;
        padding: 5px 50px;
    }
@endsection

@section('main-content')
<div class="container">
<div class="content">
    <div class="title text-center">Nuts Pages</div>
    <div class="sub-title text-center">www.nutspages.com</div>
    <div class="text-center">
        <a href="{{ url('dashboard') }}" class="btn btn-primary start-btn">{{ _('Start') }}</a>
    </div>
</div>
</div>
@endsection




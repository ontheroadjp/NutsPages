@extends('LaravelAppBase::app')
@section('body')
<?php $has_sidebar = false; ?>

<body class="skin-nuts nuts-single-page">
<div class="wrapper">

    {{-- Modal --}}
    @include('LaravelAppBase::nuts-components.nuts-modal')

    {{-- Main Header --}}
    @include('LaravelAppBase::partials.mainheader.simple')

    {{-- Sidebar --}}
    {{-- @include('LaravelAppBase::partials.sidebar.simple') --}}

    <div class="content-wrapper">
        {{-- @include('LaravelAppBase::partials.contentheader') --}}
        <section class="content">
            {{-- @include('LaravelAppBase::partials.help_panel') --}}
            @include('LaravelAppBase::nuts-components.nuts-alert')
            @yield('main-content')
        </section>
    </div>

    {{-- @include('LaravelAppBase::partials.controlsidebar') --}}
    @include('LaravelAppBase::partials.footer')

</div><!-- ./wrapper -->

@include('LaravelAppBase::partials.scripts')

</body>
@endsection



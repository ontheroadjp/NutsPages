@extends('LaravelAppBase::app')
@section('body')
<?php $has_sidebar = true; ?>

<body class="skin-nuts nuts-two-columns-page">
<div class="wrapper">

    {{-- Modal --}}
    @include('LaravelAppBase::nuts-components.nuts-modal')

    @include('LaravelAppBase::partials.mainheader.simple')
    @include('LaravelAppBase::partials.sidebar.simple')

    <div class="content-wrapper">
        @include('LaravelAppBase::partials.contentheader')
        <section class="content">
            @include('LaravelAppBase::partials.help_panel')
            @include('LaravelAppBase::nuts-components.nuts-alert')
            @yield('main-content')
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->

    {{-- @include('LaravelAppBase::partials.controlsidebar') --}}
    @include('LaravelAppBase::partials.footer')

</div><!-- ./wrapper -->

@include('LaravelAppBase::partials.scripts')

</body>
@endsection



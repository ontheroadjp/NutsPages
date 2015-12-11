<!DOCTYPE html>
<html prefix="og: http://ogp.me/ns#">
<head>
@include('LaravelAppBase::partials.htmlheader')
</head>
<body class="skin-nuts">
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

{{-- Alert --}}
@if (count($errors) > 0)
    <script>nutsAlertDanger( "{{ Session::get('alert_danger') }}" );</script>
@endif

@if(Session::has('alert_success'))
    <script>nutsAlertSuccess( "{{ Session::get('alert_success') }}" );</script>
@elseif(Session::has('alert_info'))
    <script>nutsAlertInfo( "{{ Session::get('alert_info') }}" );</script>
@elseif(Session::has('alert_danger'))
    <script>nutsAlertDanger( "{{ Session::get('alert_danger') }}" );</script>
@elseif(Session::has('alert_warning'))
    <script>nutsAlertWarning( "{{ Session::get('alert_warning') }}" );</script>
@endif
{{-- Alert --}}


</body>
</html>

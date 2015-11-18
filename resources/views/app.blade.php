<!DOCTYPE html>
<html prefix="og: http://ogp.me/ns#">
<head>
@include('partials.htmlheader')
</head>
<body class="skin-nuts">
<div class="wrapper">

    {{-- Modal --}}
    @include('nuts-components.nuts-modal')
    {{-- Modal --}}

    @include('partials.mainheader.simple')
    @include('partials.sidebar.simple')

    <div class="content-wrapper">
        @include('partials.contentheader')
        <section class="content">
            @include('partials.help_panel')
            @include('nuts-components.nuts-alert')
            @yield('main-content')
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->

    {{-- @include('partials.controlsidebar') --}}
    @include('partials.footer')

</div><!-- ./wrapper -->

@include('partials.scripts')


{{-- Alert --}}
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
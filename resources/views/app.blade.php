<!DOCTYPE html>
<html prefix="og: http://ogp.me/ns#">
<head>
@include('partials.htmlheader')
</head>
<body class="skin-nuts">
<div class="wrapper">

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
<script>
@if(Session::has('alert_success'))
    nutsAlertSuccess( "{{ Session::get('alert_success') }}" );
@elseif(Session::has('alert_info'))
    nutsAlertInfo( "{{ Session::get('alert_info') }}" );
@elseif(Session::has('alert_danger'))
    nutsAlertDanger( "{{ Session::get('alert_danger') }}" );
@elseif(Session::has('alert_warning'))
    nutsAlertWarning( "{{ Session::get('alert_warning') }}" );
@endif
</script>
{{-- Alert --}}


</body>
</html>
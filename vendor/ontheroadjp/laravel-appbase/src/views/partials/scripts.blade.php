<!-- jQuery 2.1.4 -->
<!-- Bootstrap 3.3.2 JS -->
<!-- AdminLTE App -->
<!-- Optionally, you can add Slimscroll and FastClick plugins.
      Both of these plugins are recommended to enhance the
      user experience. Slimscroll is required when using the
      fixed layout. -->

<script src="{{ asset('/js/app.js') }}" type="text/javascript"></script>
<script src="{{ asset('/js/holder.js') }}" type="text/javascript"></script>

{{-- Alert --}}
@if( count($errors) > 0 )
    <script>nutsAlert( 'warning', <?php echo phpToJs($errors->all()); ?> );</script>
@elseif(Session::has('alert_success'))
    <script>nutsAlert( 'success', <?php echo phpToJs($errors->all()); ?> );</script>
@elseif(Session::has('alert_info'))
    <script>nutsAlert( 'info', <?php echo phpToJs($errors->all()); ?> );</script>
@elseif(Session::has('alert_danger'))
    <script>nutsAlert( 'danger', <?php echo phpToJs($errors->all()); ?> );</script>
@elseif(Session::has('alert_warning'))
    <script>nutsAlert( 'warning', <?php echo phpToJs($errors->all()); ?> );</script>
@endif
{{-- Alert --}}

<?php
    /**
     * phpToJs 
     * 
     * @param array $val 
     * @static
     * @access public
     * @return json
     */
    function phpToJs($val)
    {
        return json_encode($val, JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT);
    }
?>

@yield('javascript')

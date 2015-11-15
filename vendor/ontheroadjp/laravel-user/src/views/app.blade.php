<?php
// $pathUrl = str_replace(Request::root().'/', '', Request::url());
// $pageTitles = array(
//     "imagegallery" => _('Image Gallery'),
//     "profile" => _('My Acctount'),
// );
// $pageIcons = array(
//     "imagegallery" => "fa-picture-o",
//     "profile" => "fa-picture-o",    
// );
?>

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
            @yield('main-content')
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->

    @include('partials.controlsidebar')
    @include('partials.footer')

</div><!-- ./wrapper -->

@include('partials.scripts')
</body>
</html>

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
<?php echo $__env->make('partials.htmlheader', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</head>
<body class="skin-nuts">
<div class="wrapper">

    <?php echo $__env->make('partials.mainheader.simple', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->make('partials.sidebar.simple', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <div class="content-wrapper">
        <?php echo $__env->make('partials.contentheader', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <section class="content">
            <?php echo $__env->yieldContent('main-content'); ?>
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->

    <?php echo $__env->make('partials.controlsidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->make('partials.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

</div><!-- ./wrapper -->

<?php echo $__env->make('partials.scripts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</body>
</html>

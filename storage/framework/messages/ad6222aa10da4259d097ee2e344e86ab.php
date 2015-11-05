<!DOCTYPE html>
<html>
<head>
<?php echo $__env->make('partials.htmlheader', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|               | skin-blue-light                         |
|               | skin-black-light                        |
|               | skin-purple-light                       |
|               | skin-yellow-light                       |
|               | skin-red-light                          |
|               | skin-green-light                        |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="skin-nuts">
<div class="wrapper">

    <?php /* <?php echo $__env->make('partials.mainheader.full', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> */ ?>
    <?php echo $__env->make('partials.mainheader.simple', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <?php /* <?php echo $__env->make('partials.sidebar.full', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> */ ?>
    <?php echo $__env->make('partials.sidebar.simple', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <?php echo $__env->make('partials.contentheader', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <!-- Main content -->
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

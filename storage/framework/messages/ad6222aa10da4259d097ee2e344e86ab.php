<!DOCTYPE html>
<html prefix="og: http://ogp.me/ns#">
<head>
<?php echo $__env->make('partials.htmlheader', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</head>
<body class="skin-nuts">
<div class="wrapper">

    <?php /* Modal */ ?>
    <?php echo $__env->make('nuts-components.nuts-modal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php /* Modal */ ?>

    <?php echo $__env->make('partials.mainheader.simple', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->make('partials.sidebar.simple', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <div class="content-wrapper">
        <?php echo $__env->make('partials.contentheader', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <section class="content">
            <?php echo $__env->make('partials.help_panel', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <?php echo $__env->make('nuts-components.nuts-alert', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <?php echo $__env->yieldContent('main-content'); ?>
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->

    <?php /* <?php echo $__env->make('partials.controlsidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> */ ?>
    <?php echo $__env->make('partials.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

</div><!-- ./wrapper -->

<?php echo $__env->make('partials.scripts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>


<?php /* Alert */ ?>
<?php if(count($errors) > 0): ?>
    <script>nutsAlertDanger( "<?php echo e(Session::get('alert_danger')); ?>" );</script>
<?php endif; ?>

<?php if(Session::has('alert_success')): ?>
    <script>nutsAlertSuccess( "<?php echo e(Session::get('alert_success')); ?>" );</script>
<?php elseif(Session::has('alert_info')): ?>
    <script>nutsAlertInfo( "<?php echo e(Session::get('alert_info')); ?>" );</script>
<?php elseif(Session::has('alert_danger')): ?>
    <script>nutsAlertDanger( "<?php echo e(Session::get('alert_danger')); ?>" );</script>
<?php elseif(Session::has('alert_warning')): ?>
    <script>nutsAlertWarning( "<?php echo e(Session::get('alert_warning')); ?>" );</script>
<?php endif; ?>
<?php /* Alert */ ?>




</body>
</html>

<?php $__env->startSection('htmlheader_title'); ?>
<?php echo e(_('Password recovery')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<!-- <body class="login-page"> -->
<body>
 
     <?php if(session('status')): ?>
        <div class="alert alert-success text-center">
            <?php echo e(session('status')); ?>

        </div>
    <?php endif; ?>

    <?php if(count($errors) > 0): ?>
        <div class="alert alert-danger text-center">
            <strong>Whoops!</strong> <?php echo e(_('There were some problems with your input.')); ?><br><br>
            <ul>
                <?php foreach($errors->all() as $error): ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

   <div class="login-logo">
        <a href="<?php echo e(url('/')); ?>">Laravel 5.1</a>
    </div><!-- /.login-logo -->

    <div class="main-section">

        <div class="login-box">
        <div class="login-box-body">
            <p class="login-box-msg"><?php echo e(_('Reset Password')); ?></p>
            <form action="<?php echo e(url('/password/email')); ?>" method="post">
                <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                <div class="form-group has-feedback">
                    <input type="email" class="form-control" placeholder="<?php echo e(_('Email')); ?>" name="email" value="<?php echo e(old('email')); ?>"/>
                    <!-- <span class="glyphicon glyphicon-envelope form-control-feedback"></span> -->
                        <span class="form-control-feedback"><i class="fa fa-envelope-o"></i></span>

                </div>

                <div class="row">
                    <div class="col-xs-1">
                    </div><!-- /.col -->
                    <div class="col-xs-10">
                        <button type="submit" class="btn btn-primary btn-block btn-flat"><?php echo e(_('Send Password Reset Link')); ?></button>
                    </div><!-- /.col -->
                    <div class="col-xs-1">
                    </div><!-- /.col -->
                </div>
            </form>

            <a href="<?php echo e(url('/auth/login')); ?>"><?php echo e(_('Log in')); ?></a><br>
            <a href="<?php echo e(url('/auth/register')); ?>" class="text-center"><?php echo e(_('Register a new membership')); ?></a>

        </div><!-- /.login-box-body -->
        </div><!-- /.login-box -->
    </div>


    <?php echo $__env->make('auth.scripts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <script>
        $(function () {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' // optional
            });
        });
    </script>
</body>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('auth.auth', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
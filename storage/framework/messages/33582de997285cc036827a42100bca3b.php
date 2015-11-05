<?php $__env->startSection('htmlheader_title'); ?>
<?php echo e(_('Register')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<!-- <body class="register-page"> -->
<body>
 
    <?php if(count($errors) > 0): ?>
        <div class="alert alert-danger text-align">
            <!-- <strong>Whoops!</strong> There were some problems with your input.<br><br> -->
            <strong><?php echo e(_('Woops!')); ?></strong> <?php echo e(_('There were some problems with your input.')); ?><br><br>
            <ul>
                <?php foreach($errors->all() as $error): ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

   <div class="register-logo">
        <a href="<?php echo e(url('/')); ?>">Laravel 5.1</a>
    </div>

    <div class="main-section">

        <div class="register-box">
        <div class="register-box-body">
            <p class="login-box-msg"><?php echo e(_('Register a new membership')); ?></p>
            <form action="<?php echo e(url('/auth/register')); ?>" method="post">
                <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" placeholder="<?php echo e(_('Full name')); ?>" name="name" value="<?php echo e(old('name')); ?>"/>
                    <!-- <span class="glyphicon glyphicon-user form-control-feedback"></span> -->
                    <span class="form-control-feedback"><i class="fa fa-user"></i></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="email" class="form-control" placeholder="<?php echo e(_('Email')); ?>" name="email" value="<?php echo e(old('email')); ?>"/>
                    <!-- <span class="glyphicon glyphicon-envelope form-control-feedback"></span> -->
                        <span class="form-control-feedback"><i class="fa fa-envelope-o"></i></span>

                </div>
                <div class="form-group has-feedback">
                    <input type="password" class="form-control" placeholder="<?php echo e(_('Password')); ?>" name="password"/>
                    <!-- <span class="glyphicon glyphicon-lock form-control-feedback"></span> -->
                        <sapn class="form-control-feedback"><i class="fa fa-lock"></i></sapn>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" class="form-control" placeholder="<?php echo e(_('Retype password')); ?>" name="password_confirmation"/>
                    <!-- <span class="glyphicon glyphicon-log-in form-control-feedback"></span> -->
                        <sapn class="form-control-feedback"><i class="fa fa-lock"></i></sapn>

                </div>
                <div class="row">
                    <div class="col-xs-8">
                        <div class="checkbox icheck">
                            <label>
                                <input type="checkbox"> <?php echo e(_('I agree to the')); ?> <a href="#"><?php echo e(_('terms')); ?></a>
                            </label>
                        </div>
                    </div><!-- /.col -->
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat"><?php echo e(_('Register')); ?></button>
                    </div><!-- /.col -->
                </div>
            </form>

            <a href="<?php echo e(url('/auth/login')); ?>" class="text-center"><?php echo e(_('I already have a membership')); ?></a>
        </div><!-- /.form-box -->
        </div><!-- /.register-box -->
    </div>


            <div class="social-auth-links text-center">
                <p class="mg-30">- OR -</p>
                <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> <?php echo e(_('Sign up using Facebook')); ?></a>
                <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> <?php echo e(_('Sign up using Google')); ?></a>
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
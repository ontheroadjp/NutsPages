<?php /* resources/views/emails/password.blade.php */ ?>
 
<?php echo e(_('Click here to reset your password')); ?>: <a href="<?php echo e(url('password/reset/'.$token)); ?>"><?php echo e(url('password/reset/'.$token)); ?></a>
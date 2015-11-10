<div class="panel panel-default nuts-help-panel">
	<div class="panel-heading text-right">
		<a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion-example" href="#collapseOne"><i class="fa fa-question-circle"></i><?php echo e(_('HELP')); ?></a>
	</div> <!-- / .panel-heading -->
	<div id="collapseOne" class="panel-collapse collapse" style="height: 0px;">
		<div class="panel-body">
		<?php echo $__env->yieldContent('help_content', ''); ?>
		</div> <!-- / .panel-body -->
	</div> <!-- / .collapse -->
</div>

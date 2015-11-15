<div class="panel">
	<div class="panel-heading text-right">
		<a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion-example" href="#help-panel"><i class="fa fa-question-circle"></i>{{ _('HELP') }}</a>
	</div> <!-- / .panel-heading -->
	<div id="help-panel" class="panel-collapse collapse" style="height: 0px;">
		<div class="panel-body">
		@yield('help_content', '')
		</div> <!-- / .panel-body -->
	</div> <!-- / .collapse -->
</div>

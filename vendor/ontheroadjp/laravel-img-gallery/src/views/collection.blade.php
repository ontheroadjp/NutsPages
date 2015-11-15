<div class="row">
<?php
	$usermodel = \Ontheroadjp\LaravelImageGallery\Models\ExUser::find(Auth::user()->id);
	$mediaItems = $usermodel->getMedia();
	for( $n=0; $n<count( $mediaItems ); $n++ ) {

		$url = $mediaItems[$n]->getUrl();
		$path = $mediaItems[$n]->getPath();
		echo '<div class="col-md-2 col-sm-3 col-xs-4">';
		?>

		<div class="view nuts-overlay nuts-thumbnail">
		<img src="{{ $url }}">
		<div class="mask">
		<a href="#" class="info"><i class="fa fa-trash-o"></i>{{ _('Delete') }}</a>
		</div>
		</div>

		<?php
		echo '</div>';
	}
?>
</div><!-- / .row -->

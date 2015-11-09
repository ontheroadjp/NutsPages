<?php $__env->startSection('htmlheader_title'); ?>
<?php echo e(_('Image Gallery')); ?>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('main-content'); ?>
<div class="panel panel-default">
	<div class="panel-heading"><?php echo e(_('Image Gallery')); ?></div>
	<div class="panel-body">
		You are logged in!
		<?php if( Auth::viaRemember() ): ?>
			via Remember Token
		<?php endif; ?>
	</div>
</div>

<div id="nuts-img-collection"></div>

<hr>

<p class="lead"><?php echo e(_('Try it by uploading an image (max. 1 MB).')); ?></p>

<div class="row">

<!-- 
<div class="view nuts-overlay">
<img src="/media/24/menu5_img.jpg">
<div class="mask">
<h2>Hover Style #8</h2>
<p>A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart.</p>
<a href="#" class="info">Read More</a>
</div>
</div>
-->

<div class="col-md-6">
<form>
	<div class="fileupload" data-url="<?php echo e(Request::root()); ?>/media-upload">
		<div class="form-group">
		<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
		<a class="btn btn-primary nuts-upload-btn btn-lg btn-block">
			<span><?php echo e(_('Upload')); ?></span>
			<input type="file" name="file">
		</a>
		</div>
		<div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="display:none">
			<div class="progress-bar progress-bar-default"></div>
		</div>
		<a href="#" class="thumbnail" style="display:none">
			<img src="" class="img-responsive">
		</a>
		<input type="text" class="form-control input-block" name="file_path" value="" readonly>
	</div>
</form>
</div>

<div class="col-md-6">
	<div class="well">
		Output:
		<pre class="output"></pre>
	</div>
</div>

</div><!-- / .row -->

<hr>
 
<br />
Special Thanx!<br />
<a href="https://github.com/triasrahman/laravel-media-upload" target="_blank">triasrahman/laravel-media-upload</a><br />
<a href="https://github.com/Intervention/image" target="_blank">Intervention/image</a><br />
<a href="https://github.com/spatie/laravel-medialibrary" target="_blank">spatie/laravel-medialibrary</a>
<br />

<?php $__env->stopSection(); ?>


<?php $__env->startSection('javascript'); ?>
<!-- <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> -->
<script src="//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/blueimp-file-upload/9.5.7/jquery.fileupload.js"></script>

<script type="text/javascript"> 
var buttonUpload 	= '.upload-btn';
var progress 		= '.progress';
var progressBar 	= '.progress-bar';
var message 		= '.message';
var messageText 	= '.message-text';

var settings = {
	autoUpload : true,
	progressall : function (e, data) {
		// update progress bar
		var progress = parseInt(data.loaded / data.total * 100, 10);
		$(this).find(progressBar).css('width', progress + '%');
	},

	add : function (e, data) {
		data.submit();
	},

	submit : function (e, data) {
		// hide the upload button
		$(this).find(buttonUpload).attr('disabled', true);

	},

	start : function (e) {      
		// show and reset progress bar
		$(this).find(progress).show();
		$(this).find(progressBar).css('width', 0);
	},

	done : function (e, data) {

		$('pre.output').html(JSON.stringify(data.result, null, 4));

		if(data.result.error) {
			alert('ERROR:'+data.result.error);
			return false;
		}

		if(data.result.format == 'image') {
			$(this).find('.thumbnail').show().find('img').attr('src','/'+data.result.path);
		}
		else {
			$(this).find('.thumbnail').hide()
		}

		$(this).find('input[name=file_path]').val(data.result.path);

		$("#nuts-img-collection").load("/<?php echo e(Auth::user()->id); ?>/collection", function(){ 
			//alert("success!"); 
		});
	},

	stop : function (e) {
		$(this).find(buttonUpload).removeAttr('disabled');

		// hide the progress bar
		$(this).find(progress).hide();

		filesList = null;
	}
};

$('.fileupload').fileupload(settings);

var loadCollection = (function($){
	$("#nuts-img-collection").load("/<?php echo e(Auth::user()->id); ?>/collection", function(){ 
		//alert("success!"); 
	});
}(jQuery));

</script>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
@extends('LaravelAppBase::two_columns_page')

@section('htmlheader_title')
{{ _('Image Gallery') }}
@endsection

@section('contentheader_title')
<i class="fa fa-picture-o"></i> {{ _('Image Gallery') }}
@endsection

@section('breadcrumb')
{{ _('Image Gallery') }}
@endsection


@section('help_content')
<ul>
	<li>このページでは画像ファイルの登録（アップロード）/削除が行えます。</li>
	<li>画像ギャラリに登録してある画像は、作成したページにて使用することができます。</li>
</ul>
@endsection


@section('main-content')
<style>
.dropzone-box {
    position: relative;
    background-color: #F6F6F6;
    margin-bottom: 20px;
    min-height: 284px;
    border: 3px dashed #ddd;
    border-radius: 3px;
    vertical-align: middle;
    width: 100%;
    cursor: pointer;
    padding: 0 15px 15px 0;
    -webkit-transition: all .2s;
    transition: all .2s;
}
.dz-default.dz-message {
    color: #555;
    font-size: 20px;
    font-weight: 600;
    display: block;
    min-height: 70px;
    width: 300px;
    position: absolute;
    padding-left: 90px;
    padding-top: 12px;
    line-height: 22px;
    top: 50%;
    margin-top: -35px;
    left: 50%;
    margin-left: -150px;
    -webkit-transition: all .2s;
    transition: all .2s;
}
.dropzone-box .fa.fa-cloud-upload {
    display: block;
    width: 70px;
    height: 70px;
    position: absolute;
    left: 0;
    top: 0;
    text-align: center;
    line-height: 70px;
    font-size: 32px;
    background: #eee;
    color: #aaa;
    border-radius: 2px;
    -webkit-transition: all .2s;
    transition: all .2s;
}
.dz-default.dz-message {
    color: #555;
    font-size: 20px;
    font-weight: 600;
    display: block;
    min-height: 70px;
    width: 300px;
    position: absolute;
    padding-left: 90px;
    padding-top: 12px;
    line-height: 22px;
    top: 50%;
    margin-top: -35px;
    left: 50%;
    margin-left: -150px;
    -webkit-transition: all .2s;
    transition: all .2s;
}
.dz-text-small {
    font-size: 14px;
    font-weight: 400;
}
.skin-nuts .dropzone-box:hover .fa.fa-cloud-upload {
    background: #1d89cf;
}
.dropzone-box:hover .fa.fa-cloud-upload {
    color: #fff;
}

</style>

<div id="dropzonejs-example" class="dropzone-box dz-clickable">
	<div class="dz-default dz-message">
		<i class="fa fa-cloud-upload"></i>
		{{ _('Drop files in here') }}<br><span class="dz-text-small">{{ _('or click to pick manually') }}</span>
	</div>

<form>
</form>

</div>


<div id="nuts-img-collection"></div>

<hr>

<p class="lead">{{ _('Try it by uploading an image (max. 1 MB).') }}</p>

<div class="row">


<div class="col-md-6">
<form>
	<div class="fileupload" data-url="{{ Request::root() }}/media-upload">
		<div class="form-group">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<a class="btn btn-primary nuts-upload-btn btn-lg btn-block">
			<span>{{ _('Upload') }}</span>
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

@endsection


@section('javascript')
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

		$("#nuts-img-collection").load("/{{ Auth::user()->id }}/collection", function(){ 
			nutsSuccessMsg("成功");
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
	$("#nuts-img-collection").load("/{{ Auth::user()->id }}/collection", function(){ 
		//alert("success!"); 
	});
}(jQuery));

</script>

@endsection


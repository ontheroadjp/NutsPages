<?php $__env->startSection('htmlheader_title'); ?>
<?php echo e(_('User Pofile')); ?>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('main-content'); ?>
<div class="panel panel-default">
	<div class="panel-heading"><?php echo e(_('User Pofile')); ?></div>

	<div class="panel-body">
		<?php echo e(_('You can change your profile')); ?>

	</div>
</div>

<?php
	// echo '<pre>';var_dump($user);echo '</pre>';
?>

<style>
.nuts-alert.alert-success.alert-dark {
	display:none;

    color: #fff;
    text-shadow: 0 1px 0 rgba(0,0,0,.2);
    background: 0 0;
    border-color: #43a543;
    background-color: #5ebd5e !important;
    background-image: -webkit-gradient(linear,0 100%,100% 0,color-stop(0.25,rgba(255,255,255,.06)),color-stop(0.25,transparent),color-stop(0.5,transparent),color-stop(0.5,rgba(255,255,255,.06)),color-stop(0.75,rgba(255,255,255,.06)),color-stop(0.75,transparent),to(transparent));
    background-image: -webkit-linear-gradient(45deg,rgba(255,255,255,.06)25%,transparent 25%,transparent 50%,rgba(255,255,255,.06)50%,rgba(255,255,255,.06)75%,transparent 75%,transparent);
    background-image: -moz-linear-gradient(45deg,rgba(255,255,255,.06)25%,transparent 25%,transparent 50%,rgba(255,255,255,.06)50%,rgba(255,255,255,.06)75%,transparent 75%,transparent);
    background-image: linear-gradient(45deg,rgba(255,255,255,.06)25%,transparent 25%,transparent 50%,rgba(255,255,255,.06)50%,rgba(255,255,255,.06)75%,transparent 75%,transparent);
    background-size: 20px 20px;
}
.nuts-alert.alert-danger.alert-dark {
	display:none;

    color: #fff;
    text-shadow: 0 1px 0 rgba(0,0,0,.2);
    background: 0 0;
    border-color: #df3c28;
    background-color: #e66454 !important;
    background-image: -webkit-gradient(linear,0 100%,100% 0,color-stop(0.25,rgba(255,255,255,.04)),color-stop(0.25,transparent),color-stop(0.5,transparent),color-stop(0.5,rgba(255,255,255,.04)),color-stop(0.75,rgba(255,255,255,.04)),color-stop(0.75,transparent),to(transparent));
    background-image: -webkit-linear-gradient(45deg,rgba(255,255,255,.04)25%,transparent 25%,transparent 50%,rgba(255,255,255,.04)50%,rgba(255,255,255,.04)75%,transparent 75%,transparent);
    background-image: -moz-linear-gradient(45deg,rgba(255,255,255,.04)25%,transparent 25%,transparent 50%,rgba(255,255,255,.04)50%,rgba(255,255,255,.04)75%,transparent 75%,transparent);
    background-image: linear-gradient(45deg,rgba(255,255,255,.04)25%,transparent 25%,transparent 50%,rgba(255,255,255,.04)50%,rgba(255,255,255,.04)75%,transparent 75%,transparent);
    background-size: 20px 20px;
}
.nuts-alert.alert-info.alert-dark {
	display:none;

    color: #fff;
    text-shadow: 0 1px 0 rgba(0,0,0,.2);
    background: 0 0;
    border-color: #31b0d5;
    background-color: #5bc0de !important;
    background-image: -webkit-gradient(linear,0 100%,100% 0,color-stop(0.25,rgba(255,255,255,.06)),color-stop(0.25,transparent),color-stop(0.5,transparent),color-stop(0.5,rgba(255,255,255,.06)),color-stop(0.75,rgba(255,255,255,.06)),color-stop(0.75,transparent),to(transparent));
    background-image: -webkit-linear-gradient(45deg,rgba(255,255,255,.06)25%,transparent 25%,transparent 50%,rgba(255,255,255,.06)50%,rgba(255,255,255,.06)75%,transparent 75%,transparent);
    background-image: -moz-linear-gradient(45deg,rgba(255,255,255,.06)25%,transparent 25%,transparent 50%,rgba(255,255,255,.06)50%,rgba(255,255,255,.06)75%,transparent 75%,transparent);
    background-image: linear-gradient(45deg,rgba(255,255,255,.06)25%,transparent 25%,transparent 50%,rgba(255,255,255,.06)50%,rgba(255,255,255,.06)75%,transparent 75%,transparent);
    background-size: 20px 20px;
}
.nuts-alert.alert-warning.alert-dark {
	display:none;

    color: #fff;
    text-shadow: 0 1px 0 rgba(0,0,0,.2);
    background: 0 0;
    border-color: #f19a1f;
    background-color: #f4b04f;
    background-image: -webkit-gradient(linear,0 100%,100% 0,color-stop(0.25,rgba(255,255,255,.06)),color-stop(0.25,transparent),color-stop(0.5,transparent),color-stop(0.5,rgba(255,255,255,.06)),color-stop(0.75,rgba(255,255,255,.06)),color-stop(0.75,transparent),to(transparent));
    background-image: -webkit-linear-gradient(45deg,rgba(255,255,255,.06)25%,transparent 25%,transparent 50%,rgba(255,255,255,.06)50%,rgba(255,255,255,.06)75%,transparent 75%,transparent);
    background-image: -moz-linear-gradient(45deg,rgba(255,255,255,.06)25%,transparent 25%,transparent 50%,rgba(255,255,255,.06)50%,rgba(255,255,255,.06)75%,transparent 75%,transparent);
    background-image: linear-gradient(45deg,rgba(255,255,255,.06)25%,transparent 25%,transparent 50%,rgba(255,255,255,.06)50%,rgba(255,255,255,.06)75%,transparent 75%,transparent);
    background-size: 20px 20px;
}

.nuts-alert {
    background: #f9f1c7;
    border-color: #f6deac;
    color: #af8640;
    background-size: 20px 20px;
    padding: 15px;
    margin-bottom: 18px;
    border: 1px solid transparent;
    border-radius: 2px;
}

.nuts-alert .nuts-close {
    top: 0;
}

</style>

<div class="nuts-alert alert-success alert-dark">
<button type="button" class="close" data-dismiss="alert">×</button>
<strong><i class="icon fa fa-ban"></i> Success!</strong>　<span class="msg">Change a few things up and try submitting again.</span>
</div>

<div class="nuts-alert alert-info alert-dark">
<button type="button" class="close" data-dismiss="alert">×</button>
<strong><i class="icon fa fa-ban"></i> Info!</strong>　<span class="msg">Change a few things up and try submitting again.</span>
</div>

<div class="nuts-alert alert-danger alert-dark">
<button type="button" class="close" data-dismiss="alert">×</button>
<strong><i class="icon fa fa-ban"></i> Alert!</strong>　<span class="msg">Change a few things up and try submitting again.</span>
</div>

<div class="nuts-alert alert-warning alert-dark">
<button type="button" class="close" data-dismiss="alert">×</button>
<strong><i class="icon fa fa-ban"></i> Warning!</strong>　<span class="msg">Change a few things up and try submitting again.</span>
</div>


<div class="box box-primary">
	<div class="box-header with-border">
		<h3 class="box-title"><?php echo e(_('User Profile')); ?></h3>
	</div>


	<form role="form">
		<div class="box-body">
		<div class="col-md-6">

		<div class="form-group">
			<label for="exampleInputEmail1"><?php echo e(_('User Name')); ?></label>
				<div class="input-group input-group">
				<input name="name" type="text" class="form-control" placeholder="<?php echo e(_('User Name')); ?>" value="<?php echo e($user->name); ?>">
				<span class="input-group-btn">
				<button name="name" type="button" class="btn btn-info btn-flat change-btn"><?php echo e(_('Change')); ?></button>
				</span>
			</div>
		</div>

		<div class="form-group">
			<label for="exampleInputEmail1"><?php echo e(_('Email Address')); ?></label>
				<div class="input-group input-group">
				<input name='email' type="text" class="form-control" placeholder="<?php echo e(_('Email Address')); ?>" value="<?php echo e($user->email); ?>">
				<span class="input-group-btn">
				<button name="email" type="button" class="btn btn-info btn-flat change-btn"><?php echo e(_('Change')); ?></button>
				</span>
			</div>
		</div>

		</div><!-- / .col -->
		</div><!-- /.box-body -->
	</form>

</div>


<div class="box box-primary">
	<div class="box-header with-border">
		<h3 class="box-title"><?php echo e(_('Password')); ?></h3>
	</div>


	<form role="form">
		<div class="box-body">
		<div class="col-md-6">

		<div class="form-group">
			<label for="exampleInputEmail1"><?php echo e(_('Old password')); ?></label>
			<input type="email" class="form-control" id="" placeholder="<?php echo e(_('Old Password')); ?>">
		</div>

		<div class="form-group">
			<label for="exampleInputEmail1"><?php echo e(_('New password')); ?></label>
			<input type="email" class="form-control" id="" placeholder="<?php echo e(_('New Password')); ?>">
		</div>

		<div class="form-group">
			<label for="exampleInputEmail1"><?php echo e(_('New password(Confirm)')); ?></label>
			<input type="email" class="form-control" id="" placeholder="<?php echo e(_('New Password Again')); ?>">
		</div>

		</div><!-- / .col -->
		</div><!-- /.box-body -->
	</form>

	<div class="box-footer">
	<div class="col-md-6 text-right">
	<button type="submit" class="btn btn-info"><?php echo e(_('Change Password')); ?></button>
	</div>
	</div>

</div>

<style>
.nuts-modal {
    display: none; 
    overflow: hidden;
    position: fixed;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    z-index: 1050;
    -webkit-overflow-scrolling: touch;
    outline: 0;
    background-color: rgba(0, 0, 0, 0.6);
    text-align: center;
}
.nuts-modal-dialog {
    width: 350px;
    margin: 150px auto;
}
.nuts-modal-content {
    -webkit-box-shadow: 0 5px 15px rgba(0, 0, 0, 0.5);
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.5);
    background-color: #fff;
}
.nuts-modal-success .modal-header {
    background-color: #5ebd5e;
    color: #fff;
    font-size: 90px;
    margin-bottom: 30px;
    padding: 0px;
    text-shadow: 0 1px 0 rgba(0,0,0,.15);
    border-bottom: 4px solid rgba(0,0,0,.08);
}
.nuts-modal-success .modal-title{
	font-size: 14px;
    font-weight: 600;
    margin-bottom: 3px;
}}
.nuts-modal-success .modal-body {
	color: #888;
}
.nuts-modal-success .modal-footer {
	padding: 15px;
	border-top: none;
	text-align: center;
}
.nuts-modal-success button {
    width: 100px;
    background-color: #fff;
    color: #449d44;
    margin-bottom: 20px;
}
</style>

<div id="successModal" class="nuts-modal nuts-modal-success fade in" aria-hidden="false">
	<div class="nuts-modal-dialog">
		<div class="nuts-modal-content">
			<div class="modal-header">
				<i class="fa fa-check-circle"></i>
			</div>
			<div class="modal-title"><?php echo e(_('SUCCESS')); ?></div>
			<div class="modal-body"><?php echo e(_('User name has been changed.')); ?></div>
			<div class="modal-footer">
				<button type="button" class="btn btn-success" data-dismiss="modal" aria-hidden="true">OK</button>
			</div>
		</div> <!-- / .modal-content -->
	</div> <!-- / .modal-dialog -->
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>
<script>
$(function(){

	$('.change-btn').click( function() {

		successAlert = $('.alert-success').css('display', 'none');
		errorAlert = $('.alert-danger').css('display', 'none');

		$.ajax({
			headers: {
	            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	        },
			url: "/profile/edit",
			type: "POST",
			cache: false,
			data: {
				"id" : "<?php echo e($user->id); ?>",
				"field" : $(this).attr('name'),
				"val" : $(":text[name=\"" + $(this).attr('name') + "\"]").val()
			},
			dataType: "json",
			statusCode : {

				// Laravel validation err
				422 : function() {
					errorAlert = $('.alert-danger');
					errorAlert.find('.msg').html('Invalid value you entered.');
					errorAlert.show('fast');
				}
			},
		}).done(function(data, textStatus, jqXHR){
			successAlert.find('.msg').html(data.message);
			successAlert.show('fast');

		}).fail(function(data, textStatus, errorThrown){
			errorAlert.find('.msg').html(errorThrown);
			errorAlert.show('fast');
			// alert(errorHandler(arguments));

		}).always(function(data, textStatus, returnedObject){ 
			// alert(textStatus);
		});
	});

	$('.close').click(function(){
		$(this).parent('.nuts-alert').hide('first');
	});

});

	/* エラー文字列の生成 */
	function errorHandler(args) {
	    var error;
	    // errorThrownはHTTP通信に成功したときだけ空文字列以外の値が定義される
	    if (args[2]) {
	        try {
	            // JSONとしてパースが成功し、且つ {"error":"..."} という構造であったとき
	            // (undefinedが代入されるのを防ぐためにtoStringメソッドを使用)
	            error = $.parseJSON(args[0].responseText).error.toString();
	        } catch (e) {
	            // パースに失敗した、もしくは期待する構造でなかったとき
	            // (PHP側にエラーがあったときにもデバッグしやすいようにレスポンスをテキストとして返す)
	            error = 'parsererror(' + args[2] + '): ' + args[0].responseText;
	        }
	    } else {
	        // 通信に失敗したとき
	        error = args[1] + '(HTTP request failed)';
	    }
	    return error;
	}

</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
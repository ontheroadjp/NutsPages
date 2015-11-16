<?php $__env->startSection('htmlheader_title'); ?>
<?php echo e(_('Domain Search')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_title'); ?>
<i class="fa fa-search"></i> <?php echo e(_('Domain Search')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
<?php echo e(_('Domain search')); ?>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('help_content'); ?>
<ul>
	<li>このページではドメイン検索が行えます。</li>
</ul>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('main-content'); ?>
<?php echo $__env->make('partials.help_panel', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<!-- alert -->
<div class="nuts-alert alert-success alert-dark">
<button type="button" class="close" data-dismiss="alert">×</button>
<strong><i class="icon fa fa-ban"></i> Success!</strong>　<span class="msg"></span>
</div>

<div class="nuts-alert alert-info alert-dark">
<button type="button" class="close" data-dismiss="alert">×</button>
<strong><i class="icon fa fa-ban"></i> Info!</strong>　<span class="msg"></span>
</div>

<div class="nuts-alert alert-danger alert-dark">
<button type="button" class="close" data-dismiss="alert">×</button>
<strong><i class="icon fa fa-ban"></i> Alert!</strong>　<span class="msg"></span>
</div>

<div class="nuts-alert alert-warning alert-dark">
<button type="button" class="close" data-dismiss="alert">×</button>
<strong><i class="icon fa fa-ban"></i> Warning!</strong>　<span class="msg"></span>
</div>

<!-- modal -->
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


<style>
.wizard-wrapper {
    border: 1px solid #e4e4e4;
    border-radius: 2px;
    white-space: nowrap;
    width: auto;
    position: relative;
    overflow: hidden;
}
.wizard-steps {
    cursor: default;
    display: block!important;
    float: left;
    margin: 0;
    padding: 0;
    position: relative;
    white-space: nowrap;
    -webkit-transition: left .3s;
    transition: left .3s;
    -webkit-touch-callout: none;
    -webkit-user-select: none;
    -khtml-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
}
.wizard-steps>li {
    display: inline-block;
    list-style: none;
    margin: 0;
    padding: 0 10px 0 50px;
    vertical-align: middle;
}
.wizard-steps>li.active .wizard-step-number, .wizard-steps>li.completed .wizard-step-number {
    border-color: #155073;
    color: #155073;
}
.wizard-steps>li.active .wizard-step-caption, .wizard-steps>li.completed .wizard-step-caption {
    color: #155073;
    font-weight: 600;
}
.wizard-steps>li+li:before {
    background: #e4e4e4;
    bottom: 0;
    content: "";
    margin-left: -51px;
    position: absolute;
    top: 0;
    width: 1px;
}
.wizard-step-number, .wizard-steps>li.completed .wizard-step-number:after {
    background: #fff;
    border-radius: 9999px;
    display: block;
    font-size: 14px;
    line-height: 26px;
    position: absolute;
    text-align: center;
}

.wizard-step-number {
    border: 2px solid #bbb;
    color: #bbb;
    font-weight: 700;
    height: 30px;
    margin-left: -40px;
    margin-top: -15px;
    top: 50%;
    width: 30px;
}
.wizard-step-caption {
    margin-bottom: 15px;
    margin-top: 15px;
    vertical-align: middle;
}
.wizard-step-caption, .wizard-step-description {
    color: #bbb;
    display: inline-block;
    line-height: 18px;
    white-space: normal;
}

.wizard-steps>li.completed .wizard-step-number:after {
    content: '\f00c';
    font-family: FontAwesome;
    font-size: 24px;
    font-weight: 400;
    height: 26px;
    left: 0;
    width: 26px;
    top: 0;
    color: #4cae4c;
}

/* ------------------------------------------ */
.wizard-content {
    padding: 20px;
}

.wizard-wrapper+.wizard-content.panel {
    margin-top: -1px;
}
.wizard-content:after, .wizard-content:before {
    content: " ";
    display: table;
}
.wizard-pane {
    display: none;
}

</style>


<div class="wizard ui-wizard-example">
	<div class="wizard-wrapper">
		<ul class="wizard-steps" style="left: 0px;">

			<!--STEP 1 Header -->
			<li data-target="#wizard-example-step1" class="active" style="width: 200px; max-width: 200px; min-width: 200px;">
				<span class="wizard-step-number">1</span>
				<span class="wizard-step-caption">
					<?php echo e(_('Step')); ?> 1
					<span class="wizard-step-description"><?php echo e(_('Domain Search')); ?></span>
				</span>
			</li>

			<!--STEP 2 Header -->
			<li data-target="#wizard-example-step2" style="width: 200px; max-width: 200px; min-width: 200px;"> <!-- ! Remove space between elements by dropping close angle -->
				<span class="wizard-step-number">2</span>
				<span class="wizard-step-caption">
					<?php echo e(_('Step')); ?> 2
					<span class="wizard-step-description"><?php echo e(_('Regist ID & PASS')); ?></span>
				</span>
			</li>

			<!--STEP 3 Header -->
			<li data-target="#wizard-example-step3" style="width: 200px; max-width: 200px; min-width: 200px;"> <!-- ! Remove space between elements by dropping close angle -->
				<span class="wizard-step-number">3</span>
				<span class="wizard-step-caption">
					<?php echo e(_('Step')); ?> 3
					<span class="wizard-step-description"><?php echo e(_('Regist Your Info.')); ?></span>
				</span>
			</li>

			<!--STEP 4 Header -->
			<li data-target="#wizard-example-step4" style="width: 200px; max-width: 200px; min-width: 200px;"> <!-- ! Remove space between elements by dropping close angle -->
				<span class="wizard-step-number">4</span>
				<span class="wizard-step-caption">
					<?php echo e(_('Step')); ?> 4
					<span class="wizard-step-description"><?php echo e(_('Payment')); ?></span>
				</span>
			</li>
		</ul> <!-- / .wizard-steps -->
	</div> <!-- / .wizard-wrapper -->


	<div class="wizard-content panel no-box-shadow">

		<!--STEP 1 Content -->
		<style>
		.nuts-header-blue {
		    background-color: #CEE4EC;
		    border-radius: 8px;
		    line-height: 0.2em;
		    margin-bottom: 20px;
		    padding: 10px 15px;
		}		
		</style>
		<div class="wizard-pane" id="wizard-example-step1" style="display: block;">

			<div class="panel no-box-shadow form-horizontal form-bordered">
				<div class="panel-heading">
				</div>
				<div class="panel-body no-padding-hr">
					<div class="form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
						<div class="col-sm-offset-3 col-sm-6 col-md-offset-3 col-md-6">
							<input type="text" name="domain" class="form-control">
						</div>
					</div>
				</div>
				<div class="nuts-mg-b-20 text-center">
					<button class="btn nuts-btn-primary btn-domain-search" name="domain"><?php echo e(_('Search Domain')); ?></button>
				</div>
				<div class="panel no-box-shadow">
					<div class="panel-body">
						<div id="whois-results"></div>
						<div class="text-center">
							<button class="btn nuts-btn-primary wizard-next-step-btn"><?php echo e(_('Next')); ?></button>
						</div>
					</div>
				</div>
			</div>
		</div> <!-- / .wizard-pane -->

		<!--STEP 2 Content -->
		<div class="wizard-pane" id="wizard-example-step2" style="">
			This is step 2<br><br>
			<button class="btn wizard-prev-step-btn">Prev</button>
			<button class="btn nuts-btn-primary wizard-next-step-btn">Next</button>
		</div> <!-- / .wizard-pane -->

		<!--STEP 3 Content -->
		<div class="wizard-pane" id="wizard-example-step3" style="">
			This is step 3<br><br>
			<button class="btn wizard-prev-step-btn">Prev</button>
			<button class="btn nuts-btn-primary wizard-next-step-btn">Next</button>
		</div> <!-- / .wizard-pane -->

		<!--STEP 4 Content -->
		<div class="wizard-pane" id="wizard-example-step4" style="">
			Finish<br><br>
			<button class="btn wizard-prev-step-btn">Prev</button>
			<button class="btn nuts-btn-success wizard-go-to-step-btn">Go to Step 2</button>
			<button class="btn nuts-btn-primary wizard-next-step-btn">Finish</button>
		</div> <!-- / .wizard-pane -->
	</div> <!-- / .wizard-content -->
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>

<script>
$(function() {
	$('.ui-wizard-example').pixelWizard({
		onChange: function () {
			console.log('Current step: ' + this.currentStep());
		},
		onFinish: function () {
			// Disable changing step. To enable changing step just call this.unfreeze()
			this.freeze();
			console.log('Wizard is freezed');
			console.log('Finished!');
		}
	});

	$('.wizard-next-step-btn').click(function () {
		$(this).parents('.ui-wizard-example').pixelWizard('nextStep');
	});

	$('.wizard-prev-step-btn').click(function () {
		$(this).parents('.ui-wizard-example').pixelWizard('prevStep');
	});

	$('.wizard-go-to-step-btn').click(function () {
		$(this).parents('.ui-wizard-example').pixelWizard('setCurrentStep', 2);
	});
});
</script>


<script>
$(function(){

	$('.btn-domain-search').click( function() {

		$('#whois-results').empty();
		var field = $(this).attr('name');
		var inputValue = $(":text[name=\"" + $(this).attr('name') +"\"]").val()

		$.ajax({
			headers: {
	            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	        },
			url: "/whois/result",
			type: "POST",
			cache: false,
			data: {
				// "field" : $(this).attr('name'),
				// "val" : $(":text[name=\"" + $(this).attr('name') +"\"]").val()
				"field" : field,
				"val" : inputValue
			},
			dataType: "json",
			statusCode : {

				// Laravel validation err
				422 : function() {
					errorAlert = $('.nuts-alert-danger');
					errorAlert.find('.msg').html('Invalid value you entered.');
					errorAlert.show('fast');
				}
			},
		}).done(function(data, textStatus, jqXHR){
			// nutsAlertSuccess(data);
			// nutsLogoMsgSuccess(data);
			// var json = JSON.stringify(data);

			var output = '<div class="nuts-header-blue text-center">' + data.title + '</div>';
			for(var i=0; i<data.domains.length; i++){
				var name = inputValue + "." + data.domains[i].name;
				var message = data.domains[i].message;
				var available = data.domains[i].available;
				var btnLabel = data.domains[i].btnLabel;
				var disabled = '';
				if(available != 'true') {
					disabled = "disabled";
				}
				output += '<div class="row nuts-mg-b-15">';
				output += '<div class="col-sm-3 col-sm-offset-1">' + name + '</div>';
				output += '<div class="col-sm-3">' + message + '</div>';
				output += '<div class="col-sm-2 col-sm-offset-2"><button class="btn nuts-btn-primary ' + disabled + '">' + btnLabel + '</button></div>';
				output += '</div>';
			}
			$('#whois-results').html(output);


			// var result = '<div class="panel"><div class="panel-body">' 
			// 		+ JSON.stringify(data)
			// 		+ '</div</div>';
			// $('#whois-results').html(result);

		}).fail(function(data, textStatus, errorThrown){
			nutsAlertDanger(errorThrown);
			nutsLogoMsgDanger(errorThrown);

		}).always(function(data, textStatus, returnedObject){ 
			// alert(textStatus);
		});
	});

	$('.close').click(function(){
		$(this).parent('.nuts-alert').hide('first');
	});

	// function successMsg( message ) {
	// 	logo = $('.logo-lg').html();
	// 	$('.logo').addClass('nuts-alert alert-success alert-dark').css('display','block');
	// 	$('.logo-lg').css('font-size','14px').html( message);
	// 	setTimeout(function(){
	// 		$('.logo-lg').html(logo);
	// 		$('.logo').removeClass('nuts-alert alert-success alert-dark');
	// 	},2000);
	// }

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
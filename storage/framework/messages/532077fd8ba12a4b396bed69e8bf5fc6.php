<meta charset="UTF-8">
<title>Nuts Pages - <?php echo $__env->yieldContent('htmlheader_title', ''); ?></title>

<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

<meta property="og:title" content="Nuts Pages - <?php echo $__env->yieldContent('htmlheader_title', ''); ?>" />
<meta property="og:description" content="" />
<meta property="og:type" content="website" />
<meta property="og:url" content="<?php echo e(Request::url()); ?>" />
<meta property="og:image" content="" />
<meta property="og:site_name" content="Nuts Pages" />

<meta property="fb:app_id" content="" />
<meta name="twitter:card" content="summary">
<meta name="twitter:site" content="">

<!-- Ionicons -->
<!-- <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" /> -->

<!-- Core CSS -->
<link href="<?php echo e(asset('/css/AdminLTE.css')); ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo e(asset('/css/skins/skin-nuts.css')); ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo e(asset('/css/style.css')); ?>" rel="stylesheet" type="text/css" />

<?php echo $__env->yieldContent('css', ''); ?>

<!-- Plug-in CSS -->
<link href="<?php echo e(asset('/js/iCheck/square/blue.css')); ?>" rel="stylesheet" type="text/css" />


<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

<!-- Google Analytics -->
<script>
	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
	ga('create', '', 'auto');
	ga('require', 'displayfeatures');
	ga('send', 'pageview');
</script>
<!-- END Google Analytics -->

<!DOCTYPE html>
<?php if (\Illuminate\Support\Facades\Blade::check('langrtl')): ?>
    <html lang="<?php echo e(app()->getLocale()); ?>" dir="rtl">
<?php else: ?>
    <html lang="<?php echo e(app()->getLocale()); ?>">
<?php endif; ?>

	<!-- begin::Head -->
	<head>
		<meta charset="utf-8" />
    <title><?php echo $__env->yieldContent('title', app_name()); ?></title>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
		<meta name="description" content="<?php echo $__env->yieldContent('meta_description', 'Akıllı TV - Management UI'); ?>">
    <meta name="author" content="<?php echo $__env->yieldContent('meta_author', 'Ali Kamil YAĞLI'); ?>">

    <?php echo $__env->yieldContent('meta'); ?>

    <!--begin::Web font -->
		<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
		<script>
          WebFont.load({
            google: {"families":["Poppins:300,400,500,600,700","Roboto:300,400,500,600,700"]},
            active: function() {
                sessionStorage.fonts = true;
            }
          });
		</script>
		<!--end::Web font -->
        <!--begin::Base Styles -->
		<link href="/assets/vendors/base/vendors.bundle.css" rel="stylesheet" type="text/css" />
		<link href="/assets/demo/default/base/style.bundle.css" rel="stylesheet" type="text/css" />
		<!--end::Base Styles -->
		<link rel="shortcut icon" href="/assets/demo/default/media/img/logo/favicon.ico" />
	</head>
	<!-- end::Head -->
    <!-- end::Body -->
	<body class="m--skin- m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default"  >
    <div id="app">
        <?php echo $__env->make('includes.partials.logged-in-as', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php echo $__env->make('frontend.includes.nav', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>


        <?php echo $__env->make('includes.partials.messages', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php echo $__env->yieldContent('content'); ?>

    </div><!-- #app -->

    

    <?php echo $__env->make('includes.partials.ga', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    	<!--begin::Base Scripts -->
		<script src="/assets/vendors/base/vendors.bundle.js" type="text/javascript"></script>
		<script src="/assets/demo/default/base/scripts.bundle.js" type="text/javascript"></script>
		<!--end::Base Scripts -->
        <!--begin::Page Snippets -->
		<script src="/assets/snippets/pages/user/login.js" type="text/javascript"></script>
		<!--end::Page Snippets -->
	</body>
	<!-- end::Body -->
</html>

<!DOCTYPE html>
@langrtl
    <html lang="{{ app()->getLocale() }}" dir="rtl">
@else
    <html lang="{{ app()->getLocale() }}">
@endlangrtl
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', app_name())</title>
    <meta name="description" content="@yield('meta_description', 'Laravel 5 Boilerplate')">
    <meta name="author" content="@yield('meta_author', 'Anthony Rappa')">
    @yield('meta')

    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
    <script>
        WebFont.load({
            google: {
                "families":["Poppins:300,400,500,600,700","Roboto:300,400,500,600,700"]
            },
            active: function() {
                sessionStorage.fonts = true;
            }
        });
		</script>

    <link href="/assets/vendors/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css" />
		<!--end::Page Vendors -->
		<link href="/assets/vendors/base/vendors.bundle.css" rel="stylesheet" type="text/css" />
		<link href="/assets/demo/default/base/style.bundle.css" rel="stylesheet" type="text/css" />
		<!--end::Base Styles -->
		<link rel="shortcut icon" href="/assets/demo/default/media/img/logo/favicon.ico" />

    @stack('before-styles')


    @stack('after-styles')
</head>

<body class="{{ config('backend.body_classes') }}">


    @include('backend.includes.loaderBase')

    <!-- begin:: Page -->
    <div class="m-grid m-grid--hor m-grid--root m-page">

      @include('backend.includes.header')
      @include('backend.includes.sidebar')



      <!-- begin::Body -->
    	<div class="m-grid__item m-grid__item--fluid m-grid m-grid--hor-desktop m-grid--desktop m-body">
    		<div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-container m-container--responsive m-container--xxl m-container--full-height">
    			<div class="m-grid__item m-grid__item--fluid m-wrapper">
    				<div class="m-content">

              @yield('content')

            </div>
    			</div>
    		</div>
    	</div>
    	<!-- end:: Body -->
      @include('backend.includes.partials.footerDefault')
    </div>
    <!-- end:: Page -->


    <!-- begin::Scroll Top -->
    <div class="m-scroll-top m-scroll-top--skin-top" data-toggle="m-scroll-top" data-scroll-offset="500" data-scroll-speed="300">
    	<i class="la la-arrow-up"></i>
    </div>
    <!-- end::Scroll Top -->


    <!-- Scripts -->
    <script src="/assets/vendors/base/vendors.bundle.js" type="text/javascript"></script>
		<script src="/assets/demo/default/base/scripts.bundle.js" type="text/javascript"></script>
		<!--end::Base Scripts -->
    <!--begin::Page Vendors -->
		<script src="/assets/vendors/custom/fullcalendar/fullcalendar.bundle.js" type="text/javascript"></script>
		<!--end::Page Vendors -->
    <!--begin::Page Snippets -->
		<script src="/assets/app/js/dashboard.js" type="text/javascript"></script>
		<!--end::Page Snippets -->
    <!-- begin::Page Loader -->
		<script>
        $(window).on('load', function() {
            $('body').removeClass('m-page--loading');
        });
		</script>
</body>
</html>

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

    <link href="./assets/vendors/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css" />
		<!--end::Page Vendors -->
		<link href="./assets/vendors/base/vendors.bundle.css" rel="stylesheet" type="text/css" />
		<link href="./assets/demo/default/base/style.bundle.css" rel="stylesheet" type="text/css" />
		<!--end::Base Styles -->
		<link rel="shortcut icon" href="assets/demo/default/media/img/logo/favicon.ico" />

    @stack('before-styles')

    <!-- Check if the language is set to RTL, so apply the RTL layouts -->
    <!-- Otherwise apply the normal LTR layouts -->
    {{ style(mix('css/backend.css')) }}

    @stack('after-styles')
</head>

<body class="{{ config('backend.body_classes') }}">
    <!--
    @include('backend.includes.header')

    <div class="app-body">
        @include('backend.includes.sidebar')

        <main class="main">
            @include('includes.partials.logged-in-as')
            {!! Breadcrumbs::render() !!}

            <div class="container-fluid">
                <div class="animated fadeIn">
                    <div class="content-header">
                        @yield('page-header')
                    </div>

                    @include('includes.partials.messages')
                    @yield('content')
                </div>
            </div>
        </main>

        @include('backend.includes.aside')
    </div>

    @include('backend.includes.footer')
    -->

    <!--[html-partial:include:{"file":"partials\/_loader-base.html"}]/-->
    <!--[html-partial:include:{"file":"_layout.html"}]/-->
    @include('backend.includes.loader-base')
    @include('backend.includes.main-layout')

    <!-- Scripts -->
    @stack('before-scripts')
    {!! script(mix('js/backend.js')) !!}
    @stack('after-scripts')
</body>
</html>

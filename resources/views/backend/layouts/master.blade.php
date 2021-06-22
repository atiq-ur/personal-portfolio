<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>
        @yield('title', "Admin- Panel | Atiqur Rahman")
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="assets/images/icon/favicon.ico">
    @include('backend.partials.styles')
    @yield('styles')
</head>

<body>
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->
<!-- preloader area start -->
<div id="preloader">
    <div class="loader"></div>
</div>
<!-- preloader area end -->
<!-- page container area start -->
<div class="page-container">
    @include('backend.partials.sidebar')
    <!-- main content area start -->
    <div class="main-content">
       @include('backend.partials.header')
        @yield('admin-page-content')
    </div>
    <!-- main content area end -->
    @include('backend.partials.footer')
</div>
<!-- page container area end -->
@include('backend.partials.offset')
<!-- jquery latest version -->
@include('backend.partials.scripts')
@yield('scripts')
</body>

</html>

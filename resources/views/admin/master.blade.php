<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="vertical" data-theme-mode="light" data-header-styles="light" data-menu-styles="dark" data-toggled="close">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    dark
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- TITLE -->
    <title> Admin || @yield('title')</title>

    <link rel="shortcut icon" href="{{asset('backend/build/assets/images/brand-logos/favicon.ico')}}" type="image/x-icon">
    <link href="{{asset('backend/build/assets/icon-fonts/icons.css')}}" rel="stylesheet">
    <!-- Bootstrap Css -->
    <link id="style" href="{{asset('backend/build/assets/libs/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" >
    <!-- Node Waves Css -->
    <link href="{{asset('backend/build/assets/libs/node-waves/waves.min.css')}}" rel="stylesheet" >

    <link href="{{asset('backend/build/assets/libs/simplebar/simplebar.min.css')}}" rel="stylesheet" >
    <!-- Color Picker Css -->
    <link rel="stylesheet" href="{{asset('backend/build/assets/libs/flatpickr/flatpickr.min.css')}}">
    <link rel="stylesheet" href="{{asset('backend/build/assets/libs/%40simonwep/pickr/themes/nano.min.css')}}">
    <!-- Choices Css -->
    <link rel="stylesheet" href="{{asset('backend/build/assets/libs/choices.js/public/assets/styles/choices.min.css')}}">
    <!-- APP CSS & APP SCSS -->
    <link rel="preload" as="style" href="{{asset('backend/build/assets/app-DBELQW1b.css')}}" />
    <link rel="stylesheet" href="{{asset('backend/build/assets/app-DBELQW1b.css')}}" />
    <!-- Jsvector Maps -->
    <link rel="stylesheet" href="{{asset('backend/build/assets/libs/jsvectormap/jsvectormap.min.css')}}">
    <link rel="modulepreload" href="{{asset('backend/build/assets/us-merc-en-V0CEs0pf.js')}}" />
    <link rel="modulepreload" href="{{asset('backend/build/assets/simplebar-B35Aj-bA.js')}}" />
    <link rel="modulepreload" href="{{asset('backend/build/assets/index-ChlSDD4z.js')}}" />
    <link rel="modulepreload" href="{{asset('backend/build/assets/app-ClKBXEo6.js')}}" />
    <link rel="modulepreload" href="{{asset('backend/build/assets/custom-switcher-CDFJCGB8.js')}}" />
    <link rel="modulepreload" href="{{ asset('backend/build/assets/Toasts-DHQE7Pe5.js') }}">

    <style>

    </style>
    @stack('styles')

</head>

<body class="">

<div class="page">
    @include('admin.includes.header')
    @include('admin.includes.sidebar')
    <div class="main-content app-content">
       @yield('content')
    </div>

</div>

{{--<div class="scrollToTop">
    <span class="arrow"><i class="las la-angle-double-up"></i></span>
</div>--}}

<script src="{{asset('backend/js/jquery-3.7.1.min.js')}}"></script>

<script src="{{asset('backend/build/assets/main.js')}}"></script>
<!-- Popper JS -->
<script src="{{asset('backend/build/assets/libs/%40popperjs/core/umd/popper.min.js')}}"></script>
<!-- Bootstrap JS -->
<script src="{{asset('backend/build/assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('backend/build/assets/libs/choices.js/public/assets/scripts/choices.min.js')}}"></script>
<!-- Node Waves JS-->
<script src="{{asset('backend/build/assets/libs/node-waves/waves.min.js')}}"></script>
<!-- Simplebar JS -->
<script src="{{asset('backend/build/assets/libs/simplebar/simplebar.min.js')}}"></script>
<script type="module" src="{{asset('backend/build/assets/simplebar-B35Aj-bA.js')}}"></script>
<!-- Color Picker JS -->
<script src="{{asset('backend/build/assets/libs/%40simonwep/pickr/pickr.es5.min.js')}}"></script>
<!-- Apex Charts JS -->
{{--<script src="{{asset('backend/build/assets/libs/apexcharts/apexcharts.min.js')}}"></script>--}}
<!-- JSVector Maps JS -->
<script src="{{asset('backend/build/assets/libs/jsvectormap/jsvectormap.min.js')}}"></script>
<!-- JSVector Maps MapsJS -->
<script src="{{asset('backend/build/assets/libs/jsvectormap/maps/world-merc.js')}}"></script>

<script type="module" src="{{asset('backend/build/assets/us-merc-en-V0CEs0pf.js')}}"></script>
<!-- Chartjs Chart JS -->
{{--<script type="module" src="{{asset('backend/build/assets/index-ChlSDD4z.js')}}"></script>--}}
<!-- Sticky JS -->
<script src="{{asset('backend/build/assets/sticky.js')}}"></script>
<!-- Custom-Switcher JS -->
<script type="module" src="{{asset('backend/build/assets/custom-switcher-CDFJCGB8.js')}}"></script>
<!-- APP JS-->
{{--<script type="module" src="{{asset('backend/build/assets/app-ClKBXEo6.js')}}"></script>--}}
<script type="module" src="{{ asset('backend/build/assets/Toasts-DHQE7Pe5.js') }}"></script>
<!-- END SCRIPTS -->
@stack('scripts')

@include('admin.includes.toasts')

</body>

</html>

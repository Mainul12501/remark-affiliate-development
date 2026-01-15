<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Herlan Affluencer - @yield('title')</title>
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{ isset($siteSetting) ? asset($siteSetting->favicon) : '' }}" type="image/x-icon">
    <link rel="icon" href="{{ isset($siteSetting) ? asset($siteSetting->favicon) : '' }}" type="image/x-icon">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @include('front.includes.assets.style')

</head>
<body>

<!-- Navbar -->
@include('front.includes.menu')


@yield('body')

<!-- Footer -->
<footer class="py-4 text-center">
    <div class="mb-2">
        <a href="javascript:void(0)"><i class="bi bi-facebook mx-2"></i></a>
        <a href="javascript:void(0)"><i class="bi bi-instagram mx-2"></i></a>
        <a href="javascript:void(0)"><i class="bi bi-youtube mx-2"></i></a>
    </div>
    <div class="d-flex justify-content-center gap-3 flex-wrap footer-menu">
        <a href="#" class="">FAQ</a>
        <a href="#" class="">Privacy Policy</a>
        <a href="#" class="">Operating Agreement</a>
        <a href="#" class="">Contact Us</a>
    </div>
    <div class="mt-2 text-muted">© {{ date('Y') }} Herlan Affluencer</div>
</footer>
@yield('modal')
@include('front.includes.assets.script')



</body>
</html>

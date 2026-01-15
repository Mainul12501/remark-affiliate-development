<!-- Bootstrap 5 -->
<link href="{{ asset('frontend/css/bootstrap.min.css') }}" rel="stylesheet">
<!-- Icons -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
<!--    helper css-->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/Mainul12501/css-common-helper-classes/helper.min.css" />
<!--    inter font-->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">


<!--    custom css-->
<link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}" />

@yield('style')
@stack('style')


<script src="{{ asset('frontend/js/jquery-3.7.1.min.js') }}"></script>
<script src="{{ asset('frontend/js/bootstrap.bundle.min.js') }}"></script>

<!--high chart cdn-->
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="{{ asset('frontend/js/script.js') }}"></script>


{{--toastr assets--}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
{!! Toastr::message() !!}


{{--common variables and functions--}}
<script src="{{ asset('frontend/js/common.js') }}"></script>

@yield('script')
@stack('script')

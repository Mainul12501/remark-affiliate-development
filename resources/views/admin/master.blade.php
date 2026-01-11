<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="vertical" data-theme-mode="light" data-header-styles="light" data-menu-styles="dark" data-toggled="close">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
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

{{--    helper css--}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/Mainul12501/css-common-helper-classes/helper.min.css">

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
<!-- Toastr Scripts -->
@include('admin.includes.toasts')
<!-- END SCRIPTS -->
{{--sweet alert 2--}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    let base_url = "{!! url('/') !!}/"
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    // ajax request common function
    function sendAjaxRequest(url, method, data = {}, eventTriggerBtn = null) {
        var btnText = '';
        return $.ajax({ // Return the Promise from $.ajax
            url: base_url + url,
            method: method,
            data: data,
            processData: !(data instanceof FormData),
            contentType: data instanceof FormData ? false : 'application/x-www-form-urlencoded; charset=UTF-8',
            beforeSend: function () {
                // You can show a loader here if needed
                btnText = $(eventTriggerBtn).text();
                $(eventTriggerBtn).attr('disabled', true).text('Please wait...');
            },
            complete: function () {
                // Hide the loader here if needed
                $(eventTriggerBtn).attr('disabled', false).text(btnText);
            },
        })
            .done(function (data) { // .done() for success
                // console.log('print from dno');
                // No need to assign to 'response' here, it's passed to .then()
            })
            .fail(function (xhr, status, error) {
                console.log('AJAX Error:', xhr.responseText);

                // Handle different types of errors
                if (xhr.status === 422) {
                    // Laravel validation errors
                    try {
                        var response = JSON.parse(xhr.responseText);
                        if (response.error) {
                            // Handle your custom error format: {"error":{"mobile":["The mobile has already been taken."]},"status":"error"}
                            $.each(response.error, function(field, messages) {
                                if (Array.isArray(messages)) {
                                    messages.forEach(function(message) {
                                        // toastr.error(message);
                                        showAjaxToast('error', message);
                                    });
                                } else {
                                    // toastr.error(messages);
                                    showAjaxToast('error', messages);
                                }
                            });
                        } else if (response.errors) {
                            // Handle standard Laravel validation format
                            $.each(response.errors, function(field, messages) {
                                messages.forEach(function(message) {
                                    // toastr.error(message);
                                    showAjaxToast('error', messages);
                                });
                            });
                        }
                    } catch (e) {
                        // toastr.error('Validation failed. Please check your input.');
                        showAjaxToast('error', 'Validation failed. Please check your input.');
                    }
                } else if (xhr.status === 500) {
                    // toastr.error('Server error. Please try again later.');
                    showAjaxToast('error', 'Server error. Please try again later.');
                } else if (xhr.status === 403) {
                    // toastr.error('Access denied.');
                    showAjaxToast('error', 'Access denied.');
                } else {
                    // toastr.error('An error occurred. Please try again.');
                    showAjaxToast('error', 'An error occurred. Please try again.');
                }
            });
    }
    $(document).on('click', '.delete-data', function () {
        event.preventDefault();
        var formElement = $(this).closest('form');
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!"
        }).then((result) => {
            if (result.isConfirmed) {
                // Swal.fire({
                //     title: "Deleted!",
                //     text: "Your file has been deleted.",
                //     icon: "success"
                // });
                formElement.submit();
            }
        });
    })
    $(document).on('click', '.call-ajax-reload', function () {
        event.preventDefault();
        var thisElement = $(this);
        $.ajax({
            url: $(this).attr('href'),
            method: "GET",
            beforeSend: function () {
                thisElement.attr('disabled', true);
            },
            success: function (response) {
                if (response.status == 'success')
                    showAjaxToast('success', response.message);
                else if (response.status == 'error')
                    showAjaxToast('error', response.message);

                setTimeout(function () {
                    window.location.reload();
                }, 1500)
            },
            complete: function () {
                thisElement.attr('disabled', false);
            }
        })
    });
</script>

@stack('scripts')



</body>

</html>

<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="vertical" data-vertical-style="overlay" data-theme-mode="light" data-header-styles="light" data-menu-styles="dark" data-toggled="close">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- TITLE -->
    <title> Admin Login</title>
    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('backend/build/assets/images/favicon.png')}}">
    <link rel="modulepreload" href="{{asset('backend/build/assets/authentication-main-nWtBO75B.js')}}" /><script type="module" src="{{asset('/')}}backend/build/assets/authentication-main-nWtBO75B.js"></script>
    <link id="style" href="{{asset('backend/build/assets/libs/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" >
    <link href="{{asset('backend/build/assets/icon-fonts/icons.css')}}" rel="stylesheet">
    <link rel="preload" as="style" href="{{asset('backend/build/assets/app-DBELQW1b.css')}}" />
    <link rel="stylesheet" href="{{asset('backend/build/assets/app-DBELQW1b.css')}}" />
    <link rel="modulepreload" href="{{ asset('backend/build/assets/Toasts-DHQE7Pe5.js') }}">
    <style>
        .auth-input {
            background: #eef3ff;
            border: 1px solid transparent;
            transition: .2s;
        }
        .auth-input:focus {
            background: #e6ecff;
            border-color: #0d6efd;
            box-shadow: 0 0 0 .2rem rgba(13,110,253,.25);
        }

    </style>
</head>

<body class="">


<div class="d-flex align-items-center justify-content-center bg-light min-vh-100">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-10 col-md-8 col-lg-4">
               @include('admin.error.error')
                <div class="card border-0 shadow-sm p-4">
                    <div class="text-center mb-4">
                        <img src="{{asset('backend/build/assets/images/login_logo.png')}}" alt="Logo" class="img-fluid mb-2" style="max-height: 120px; width: auto;">
                    </div>

                    <form method="POST" action="{{ url('/admin/process-to-login') }}">
                        @csrf
                        <div class="mb-4">
                            <div class="input-group ">
                                <span class="input-group-text"><i class="ri-mail-line fs-5"></i></span>
                                <input type="email" name="email" class="form-control py-2 @error('email') is-invalid @enderror" placeholder="Enter Email">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4">
                            <div class="input-group">
                                <span class="input-group-text"> <i class="ri-lock-line fs-5"></i> </span>
                                <input type="password" name="password" class="form-control py-2 @error('password') is-invalid @enderror" placeholder="Enter Password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <button type="submit" class="btn btn-outline-primary w-100">LOGIN</button>
                    </form>
                    <div class="text-center mt-4">
                        @if (Route::has('reset.password'))
                            <a href="{{ route('reset.password') }}" class="btn btn-link text-muted"><i class="fas fa-lock-open me-1"></i> Forgot Password ?</a>
                        @endif
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>


<script src="{{asset('backend/build/assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('backend/build/assets/show-password.js')}}"></script>
<script type="module" src="{{ asset('backend/build/assets/Toasts-DHQE7Pe5.js') }}"></script>

@include('admin.includes.toasts')

</body>
</html>

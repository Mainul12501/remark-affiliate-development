<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="vertical" data-vertical-style="overlay" data-theme-mode="light" data-header-styles="light" data-menu-styles="dark" data-toggled="close">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- TITLE -->
    <title> Reset Password</title>
    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('backend/build/assets/images/favicon.png')}}">
    <link rel="modulepreload" href="{{asset('backend/build/assets/authentication-main-nWtBO75B.js')}}" /><script type="module" src="{{asset('/')}}backend/build/assets/authentication-main-nWtBO75B.js"></script>
    <link id="style" href="{{asset('backend/build/assets/libs/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" >
    <link href="{{asset('backend/build/assets/icon-fonts/icons.css')}}" rel="stylesheet">
    <link rel="preload" as="style" href="{{asset('backend/build/assets/app-DBELQW1b.css')}}" />
    <link rel="stylesheet" href="{{asset('backend/build/assets/app-DBELQW1b.css')}}" />
    <link rel="modulepreload" href="{{ asset('backend/build/assets/Toasts-DHQE7Pe5.js') }}">
    <link rel="stylesheet" href="{{asset('backend/css/custom.css')}}"/>
</head>

<body class="">

<div class="d-flex justify-content-center bg-light min-vh-100 mt-lg-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-10 col-md-8 col-lg-6">
                @include('admin.error.error')
                <div class="card border-0 shadow-sm">
                    <div class="text-center">
                        <img src="{{asset('backend/build/assets/images/login_logo.png')}}" alt="Logo" class="img-fluid py-3" style="max-height:120px; width: auto;">
                    </div>
                    <div class="card-header d-flex justify-content-between align-items-center border-bottom mb-4">
                        <h5 class="mb-0">
                            <i class="fa fa-key me-2"></i> Reset your password
                        </h5>
                        <a href="{{url('admin/login')}}" class="btn btn-sm btn-outline-primary border-0 rounded-0">
                            <i class="fa fa-arrow-circle-left"></i> Back
                        </a>
                    </div>
                    <div class="card-body p-3">
                        <form method="POST" action="{{url('admin/password-reset')}}">
                            @csrf
                            <div class="row mb-3">
                                <label class="col-lg-3" for="email">Email <span class="text-danger">*</span> </label>
                                <div class="col-lg-9">
                                    <input required type="email" name="email" value="{{old('email')}}" class="form-control @error('email') is-invalid @enderror" placeholder="Enter email"/>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-lg-3" for="password">New Password<span class="text-danger">*</span></label>
                                <div class="col-lg-9 position-relative">
                                    <input required type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror"   placeholder="Enter password"/>
                                    <!-- Eye Icon Toggle -->
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    <span class="password-toggle-icon" onclick="togglePassword()">
                                        <i id="toggleIcon" class="bi bi-eye-slash"></i>
                                    </span>
                                    <small id="passwordHelp" class="text-danger d-none"></small>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-lg-3" for="password_confirmation">Confirm Password <span class="text-danger">*</span> </label>
                                <div class="col-lg-9">
                                    <input id="confirmPassword" required type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" placeholder="Enter confirm password"/>
                                    @error('password_confirmation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                    @enderror
                                    <small id="confirmHelp" class="text-danger d-none"></small>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-md-9 offset-3">
                                    <button type="submit" class="btn btn-outline-primary"><i class="fa fa-arrow-circle-up mr-1"></i> Reset Password </button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="{{asset('backend/js/jquery-3.7.1.min.js')}}"></script>
<script src="{{asset('backend/build/assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('backend/build/assets/show-password.js')}}"></script>
<script type="module" src="{{ asset('backend/build/assets/Toasts-DHQE7Pe5.js') }}"></script>

@include('admin.includes.toasts')
@include('admin.partials.password.password-script')

</body>
</html>

@extends('front.master')

@section('title', "Login")

@section('body')
    <!-- Login Section -->
    <section class="login-section">
        <div class="login-container">
            <h1 class="login-title">Login</h1>
            <form action="{{ route('auth.login') }}" method="post" id="loginForm">
                @csrf
                <div class="form-group">
                    <input type="text" name="email_phone" id="email_phone" class="form-control" value="{{ old('email_phone') }}" placeholder="Email Or Phone Number" >
                    <span class="error-message" id="email_phone_error"></span>
                </div>
                <div class="form-group position-relative">
                    <input type="password" name="password" id="password" class="form-control" placeholder="Password" >
                    <span class="error-message" id="password_error"></span>
                    <span class="password-toggle" onclick="togglePassword()">
                        <i class="bi bi-eye" id="toggleIcon"></i>
                    </span>
                </div>
                <button type="submit" class="btn-login">Login</button>
{{--                <div class="forgot-password-link">--}}
{{--                    <a href="#">Forgot password?</a>--}}
{{--                </div>--}}
                <div class="create-account-link">
                    <a href="{{ route('auth.influencer-register') }}">Create an account</a>
                </div>
            </form>
        </div>
    </section>



@endsection

@push('style')
    <style>
        .password-toggle {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: #6c757d;
        }
        .password-toggle:hover {
            color: #333;
        }
        .error-message {
            color: #dc3545;
            font-size: 13px;
            display: none;
            margin-top: 5px;
        }
        .form-control.is-invalid {
            border-color: #dc3545;
        }
        .form-control.is-invalid ~ .password-toggle {
            display: none;
        }
    </style>
@endpush

@push('script')
    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const toggleIcon = document.getElementById('toggleIcon');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleIcon.classList.remove('bi-eye');
                toggleIcon.classList.add('bi-eye-slash');
            } else {
                passwordInput.type = 'password';
                toggleIcon.classList.remove('bi-eye-slash');
                toggleIcon.classList.add('bi-eye');
            }
        }

        // Form validation
        document.getElementById('loginForm').addEventListener('submit', function(e) {
            let isValid = true;

            // Reset errors
            clearErrors();

            // Validate email/phone
            const emailPhone = document.getElementById('email_phone');
            if (emailPhone.value.trim() === '') {
                showError('email_phone', 'Email or Phone Number is required');
                isValid = false;
            }

            // Validate password
            const password = document.getElementById('password');
            if (password.value.trim() === '') {
                showError('password', 'Password is required');
                isValid = false;
            }

            if (!isValid) {
                e.preventDefault();
            }
        });

        function showError(fieldId, message) {
            const field = document.getElementById(fieldId);
            const errorSpan = document.getElementById(fieldId + '_error');
            field.classList.add('is-invalid');
            errorSpan.textContent = message;
            errorSpan.style.display = 'block';
        }

        function clearErrors() {
            const fields = ['email_phone', 'password'];
            fields.forEach(function(fieldId) {
                const field = document.getElementById(fieldId);
                const errorSpan = document.getElementById(fieldId + '_error');
                field.classList.remove('is-invalid');
                errorSpan.textContent = '';
                errorSpan.style.display = 'none';
            });
        }

        // Clear error on input
        document.getElementById('email_phone').addEventListener('input', function() {
            this.classList.remove('is-invalid');
            document.getElementById('email_phone_error').style.display = 'none';
        });

        document.getElementById('password').addEventListener('input', function() {
            this.classList.remove('is-invalid');
            document.getElementById('password_error').style.display = 'none';
        });
    </script>
@endpush


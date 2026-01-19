@extends('front.master')

@section('title', "Partner Registration")

@section('body')
    <!-- Sign Up Section -->
    <section class="signup-section">
        <div class="signup-container">
            <h1 class="signup-title">Sign Up</h1>
            <form action="{{ route('auth.register-partner') }}" method="post">
                @csrf
                <input type="hidden" name="user_type" value="partner">
                <div class="form-group">
                    <input type="text" name="name" value="{{ old('name') }}" class="form-control" required placeholder="Full Name">
                    <small class="text-danger error-name">@error('name'){{ $message }}@enderror</small>
                </div>

                <div class="form-group">
                    <input type="email" name="email" value="{{ old('email') }}" class="form-control unique-check" data-type="email" placeholder="Email Address">
                    <small class="text-danger error-email">@error('email'){{ $message }}@enderror</small>
                </div>

                <div class="form-group">
                    <div class="position-relative">
                        <input type="password" name="password" class="form-control password-input" placeholder="Password">
                        <i class="fa fa-eye toggle-password"></i>
                    </div>
                    <small class="text-danger error-password">@error('password'){{ $message }}@enderror</small>

                    <!-- Password Strength Indicator -->
                    <div class="password-rules d-none mt-2">
                        <small class="rule-item" data-rule="length">
                            <i class="fa fa-circle-xmark text-danger"></i>
                            <span>At least 8 characters</span>
                        </small>
                        <small class="rule-item" data-rule="uppercase">
                            <i class="fa fa-circle-xmark text-danger"></i>
                            <span>One uppercase letter</span>
                        </small>
                        <small class="rule-item" data-rule="lowercase">
                            <i class="fa fa-circle-xmark text-danger"></i>
                            <span>One lowercase letter</span>
                        </small>
                        <small class="rule-item" data-rule="number">
                            <i class="fa fa-circle-xmark text-danger"></i>
                            <span>One number</span>
                        </small>
                        <small class="rule-item" data-rule="special">
                            <i class="fa fa-circle-xmark text-danger"></i>
                            <span>One special character (!@#$%^&*...)</span>
                        </small>
                    </div>
                </div>

                <div class="form-group">
                    <div class="position-relative">
                        <input type="password" name="confirm_password" class="form-control" placeholder="Confirm Password">
                        <i class="fa fa-eye toggle-password"></i>
                    </div>
                    <small class="text-danger error-confirm-password"></small>
                </div>

                <div class="form-group {{ old('user_otp') ? '' : 'd-none' }} otp-input">
                    <input type="number" min="0" maxlength="6" name="user_otp" value="{{ old('user_otp') }}" class="form-control" placeholder="Input OTP">
                    <small class="text-danger error-otp"></small>
                </div>
                <button type="button" id="nextBtn" class="btn-next {{ old('user_otp') ? 'd-none' : '' }}">Next</button>
                <button type="button" id="submitBtn" class="btn-next {{ old('user_otp') ? '' : 'd-none' }}">Submit</button>
                <div class="login-link">
                    Already have an Account? <a href="{{ route('auth.login') }}">Login</a>
                </div>
            </form>
        </div>
    </section>
@endsection

@push('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        .toggle-password {
            position: absolute;
            top: 50%;
            right: 12px;
            transform: translateY(-50%);
            cursor: pointer;
            color: #6c757d;
            z-index: 10;
        }
        .toggle-password:hover {
            color: #000;
        }
        input {
            max-height: 45px;
        }

        /* Password Rules Styling */
        .password-rules {
            padding: 10px;
            background-color: #f8f9fa;
            border-radius: 6px;
            border: 1px solid #e0e0e0;
        }

        .rule-item {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 4px 0;
            font-size: 13px;
            transition: all 0.3s ease;
        }

        .rule-item i {
            font-size: 14px;
            transition: all 0.3s ease;
        }

        .rule-item.valid i {
            color: #28a745 !important;
        }

        .rule-item.valid span {
            color: #28a745;
            text-decoration: line-through;
        }

        .rule-item.invalid i {
            color: #dc3545 !important;
        }

        .rule-item.invalid span {
            color: #6c757d;
        }

        /* Icon classes for validation */
        .fa-circle-check {
            color: #28a745;
        }

        .fa-circle-xmark {
            color: #dc3545;
        }
    </style>
@endpush

@push('script')
    <script>
        // ========================================
        // PASSWORD STRENGTH VALIDATOR
        // ========================================
        const passwordRules = {
            length: (password) => password.length >= 8,
            uppercase: (password) => /[A-Z]/.test(password),
            lowercase: (password) => /[a-z]/.test(password),
            number: (password) => /\d/.test(password),
            special: (password) => /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]/.test(password)
        };

        function validatePasswordRules(password) {
            const results = {};
            for (const [rule, validator] of Object.entries(passwordRules)) {
                results[rule] = validator(password);
            }
            return results;
        }

        function updatePasswordUI(validationResults) {
            $('.rule-item').each(function() {
                const rule = $(this).data('rule');
                const isValid = validationResults[rule];
                const icon = $(this).find('i');

                if (isValid) {
                    $(this).removeClass('invalid').addClass('valid');
                    icon.removeClass('fa-circle-xmark text-danger')
                        .addClass('fa-circle-check text-success');
                } else {
                    $(this).removeClass('valid').addClass('invalid');
                    icon.removeClass('fa-circle-check text-success')
                        .addClass('fa-circle-xmark text-danger');
                }
            });
        }

        // Show password rules on focus
        $(document).on('focus', '.password-input', function() {
            $('.password-rules').removeClass('d-none');
        });

        // Real-time password validation
        $(document).on('input', '.password-input', function() {
            const password = $(this).val();
            const validationResults = validatePasswordRules(password);
            updatePasswordUI(validationResults);
        });

        // ========================================
        // DYNAMIC ERROR CLEARING
        // ========================================
        $(document).on('input', 'input, textarea, select', function() {
            // Clear error message for the current field
            $(this).siblings('.text-danger').text('');
            $(this).closest('.form-group').find('.text-danger').text('');

            // Remove error styling if any
            $(this).removeClass('is-invalid');
        });

        // ========================================
        // TOGGLE PASSWORD VISIBILITY
        // ========================================
        $(document).on('click', '.toggle-password', function() {
            let input = $(this).siblings('input');
            let type = input.attr('type') === 'password' ? 'text' : 'password';

            input.attr('type', type);
            $(this).toggleClass('fa-eye fa-eye-slash');
        });

        // Hide password rules on blur (optional - you can remove this if you want rules to stay visible)
        $(document).on('blur', '.password-input', function() {
            // if ($(this).val().trim() === '') {
            $('.password-rules').addClass('d-none');
            // }
        });

        // ========================================
        // SEND OTP (NEXT BUTTON)
        // ========================================
        $(document).on('click', '#nextBtn', function() {
            $(this).attr('disabled', true);

            // Clear previous errors
            $('.text-danger').text('');

            let name = $('input[name="name"]').val().trim();
            let email = $('input[name="email"]').val().trim();
            let password = $('input[name="password"]').val();
            let confirmPassword = $('input[name="confirm_password"]').val();

            let hasError = false;

            // Regex patterns
            const patterns = {
                email: /^[^\s@]+@[^\s@]+\.[^\s@]+$/,
                password: /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?])[A-Za-z\d!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]{8,}$/
            };

            // Validation helper function
            function showError(selector, message) {
                $(selector).text(message);
                hasError = true;
            }

            // Name validation
            if (!name) {
                showError('.error-name', 'Name is required');
            }

            // Email validation
            if (!email) {
                showError('.error-email', 'Email is required');
            } else if (!patterns.email.test(email)) {
                showError('.error-email', 'Please enter a valid email address');
            }

            // Password validation
            if (!password) {
                showError('.error-password', 'Password is required');
            } else if (!patterns.password.test(password)) {
                showError('.error-password', 'Password must meet all requirements');
            }

            // Confirm password validation
            if (!confirmPassword) {
                showError('.error-confirm-password', 'Confirm password is required');
            } else if (password !== confirmPassword) {
                showError('.error-confirm-password', 'Passwords do not match');
            }

            // Stop if any error
            if (hasError) {
                $(this).attr('disabled', false);
                return;
            }

            $('.otp-input').removeClass('d-none');
            $('#submitBtn').removeClass('d-none');
            $('#nextBtn').addClass('d-none');

            // Disable email field after sending OTP
            $('input[name="email"]').attr('disabled', 'disabled');

            sendAjaxRequest("auth/send-otp-mail", 'POST', {
                email: email,
                purpose: "register"
            }).then(function(response) {
                if (response.status == 'error') {
                    toastr.error(response.message);
                } else if (response.status == 'success') {
                    toastr.success(response.message);
                }
                $('#nextBtn').attr('disabled', false);
            }).catch(function(error) {
                toastr.error(error.message || 'Failed to send OTP');
                $('#nextBtn').attr('disabled', false);
            });
        });

        // ========================================
        // FORM VALIDATION AND SUBMISSION
        // ========================================
        $(document).on('click', '#submitBtn', function() {
            // Clear all previous errors
            $('.text-danger').text('');

            let name = $('input[name="name"]').val().trim();
            let email = $('input[name="email"]').val().trim();
            let userOtp = $('input[name="user_otp"]').val().trim();
            let password = $('input[name="password"]').val();
            let confirmPassword = $('input[name="confirm_password"]').val();

            let hasError = false;

            // Regex patterns
            const patterns = {
                email: /^[^\s@]+@[^\s@]+\.[^\s@]+$/,
                password: /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?])[A-Za-z\d!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]{8,}$/
            };

            // Validation helper function
            function showError(selector, message) {
                $(selector).text(message);
                hasError = true;
            }

            // Name validation
            if (!name) {
                showError('.error-name', 'Name is required');
            }

            // Email validation
            if (!email) {
                showError('.error-email', 'Email is required');
            } else if (!patterns.email.test(email)) {
                showError('.error-email', 'Please enter a valid email address');
            }

            // OTP validation
            if (!userOtp) {
                showError('.error-otp', 'OTP is required');
            } else if (userOtp.length !== 6) {
                showError('.error-otp', 'OTP must be 6 digits');
            }

            // Password validation
            if (!password) {
                showError('.error-password', 'Password is required');
            } else if (!patterns.password.test(password)) {
                showError('.error-password', 'Password must meet all requirements');
            }

            // Confirm password validation
            if (!confirmPassword) {
                showError('.error-confirm-password', 'Confirm password is required');
            } else if (password !== confirmPassword) {
                showError('.error-confirm-password', 'Passwords do not match');
            }

            // Stop if any error
            if (hasError) {
                return;
            }

            // If no errors, submit the form
            $(this).closest('form').submit();
        });

        // ========================================
        // UNIQUE FIELD CHECK (on blur)
        // ========================================
        $(document).on('blur', '.unique-check', function() {
            if (typeof checkUniqueField === 'function') {
                checkUniqueField($(this));
            }
        });
    </script>
@endpush


{{--@extends('front.master')--}}

{{--@section('title', "Partner Registration")--}}

{{--@section('body')--}}
{{--    <!-- Sign Up Section -->--}}
{{--    <section class="signup-section">--}}
{{--        <div class="signup-container">--}}
{{--            <h1 class="signup-title">Sign Up</h1>--}}
{{--            <form action="{{ route('auth.register-partner') }}" method="post">--}}
{{--                @csrf--}}
{{--                <input type="hidden" name="user_type" value="partner">--}}
{{--                <div class="form-group">--}}
{{--                    <input type="text" name="name" value="{{ old('name') }}" class="form-control" required placeholder="Full Name">--}}
{{--                    <small class="text-danger error-name">@error('name'){{ $message }}@enderror</small>--}}
{{--                </div>--}}

{{--                <div class="form-group">--}}
{{--                    <input type="email" name="email" value="{{ old('email') }}" class="form-control unique-check" data-type="email" placeholder="Email Address">--}}
{{--                    <small class="text-danger error-email">@error('email'){{ $message }}@enderror</small>--}}
{{--                </div>--}}

{{--                <div class="form-group ">--}}
{{--                    <div class="position-relative">--}}
{{--                        <input type="password" name="password" class="form-control" placeholder="Password">--}}
{{--                        <i class="fa fa-eye toggle-password"></i>--}}
{{--                    </div>--}}

{{--                        <small class="text-danger error-password">@error('password'){{ $message }}@enderror</small>--}}

{{--                </div>--}}

{{--                <div class="form-group">--}}
{{--                    <div class="position-relative">--}}
{{--                        <input type="password" name="confirm_password" class="form-control" placeholder="Confirm Password">--}}
{{--                        <i class="fa fa-eye toggle-password"></i>--}}
{{--                    </div>--}}
{{--                    <small class="text-danger error-confirm-password"></small>--}}
{{--                </div>--}}

{{--                <div class="form-group {{ old('user_otp') ? '' : 'd-none' }} otp-input">--}}
{{--                    <input type="number" min="0" maxlength="6" name="user_otp" value="{{ old('user_otp') }}" class="form-control" placeholder="Input OTP">--}}
{{--                    <small class="text-danger error-otp"></small>--}}
{{--                </div>--}}
{{--                <button type="button" id="nextBtn" class="btn-next {{ old('user_otp') ? 'd-none' : '' }}">Next</button>--}}
{{--                <button type="submit" id="submitBtn" class="btn-next {{ old('user_otp') ? '' : 'd-none' }}">Submit</button>--}}
{{--                <div class="login-link">--}}
{{--                    Already have an Account? <a href="{{ route('auth.login') }}">Login</a>--}}
{{--                </div>--}}
{{--            </form>--}}
{{--        </div>--}}
{{--    </section>--}}
{{--@endsection--}}

{{--@push('style')--}}
{{--    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">--}}
{{--    <style>--}}
{{--        .toggle-password {--}}
{{--            position: absolute;--}}
{{--            top: 50%;--}}
{{--            right: 12px;--}}
{{--            transform: translateY(-50%);--}}
{{--            cursor: pointer;--}}
{{--            color: #6c757d;--}}
{{--        }--}}
{{--        .toggle-password:hover {--}}
{{--            color: #000;--}}
{{--        }--}}
{{--        input{max-height: 45px;}--}}
{{--    </style>--}}

{{--@endpush--}}

{{--@push('script')--}}
{{--    <script>--}}
{{--        $(document).on('click', '#nextBtn', function () {--}}
{{--            $(this).attr('disabled', true);--}}
{{--            // Clear previous errors--}}
{{--            $('.text-danger').text('');--}}

{{--            let name = $('input[name="name"]').val().trim();--}}
{{--            let email = $('input[name="email"]').val().trim();--}}
{{--            let password = $('input[name="password"]').val();--}}
{{--            let confirmPassword = $('input[name="confirm_password"]').val();--}}

{{--            let hasError = false;--}}

{{--            // Regex--}}
{{--            let emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;--}}
{{--            let passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?])[A-Za-z\d!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]{8,}$/;--}}

{{--            // name validateion--}}
{{--            if (!name)--}}
{{--            {--}}
{{--                $('.error-name').text('Name is required');--}}
{{--                hasError = true;--}}
{{--            }--}}
{{--            // Email validation--}}
{{--            if (!email) {--}}
{{--                $('.error-email').text('Email is required');--}}
{{--                hasError = true;--}}
{{--            } else if (!emailRegex.test(email)) {--}}
{{--                $('.error-email').text('Please enter a valid email address');--}}
{{--                hasError = true;--}}
{{--            }--}}

{{--            // Password validation--}}
{{--            if (!password) {--}}
{{--                $('.error-password').text('Password is required');--}}
{{--                hasError = true;--}}
{{--            } else if (!passwordRegex.test(password)) {--}}
{{--                $('.error-password').text(--}}
{{--                    'Min 8 chars, include uppercase, lowercase, number & special character'--}}
{{--                );--}}
{{--                hasError = true;--}}
{{--            }--}}

{{--            // Confirm password validation--}}
{{--            if (!confirmPassword) {--}}
{{--                $('.error-confirm-password').text('Confirm password is required');--}}
{{--                hasError = true;--}}
{{--            } else if (password !== confirmPassword) {--}}
{{--                $('.error-confirm-password').text('Passwords do not match');--}}
{{--                hasError = true;--}}
{{--            }--}}

{{--            // Stop if any error--}}
{{--            if (hasError) return;--}}

{{--            $('.otp-input').removeClass('d-none');--}}
{{--            $('#submitBtn').removeClass('d-none');--}}
{{--            $('#nextBtn').addClass('d-none');--}}

{{--            sendAjaxRequest("auth/send-otp-mail", 'POST', {email: email,purpose: "register"}).then(function (response) {--}}
{{--                toastr.success(response.message);--}}
{{--            })--}}
{{--        })--}}
{{--        $('input').on('input', function () {--}}
{{--            $(this).siblings('.text-danger').text('');--}}
{{--        });--}}

{{--    </script>--}}
{{--    <script>--}}
{{--        $(document).on('click', '.toggle-password', function () {--}}
{{--            let input = $(this).siblings('input');--}}
{{--            let type = input.attr('type') === 'password' ? 'text' : 'password';--}}

{{--            input.attr('type', type);--}}
{{--            $(this).toggleClass('fa-eye fa-eye-slash');--}}
{{--        });--}}

{{--        // Trigger on blur for all unique-check fields--}}
{{--        $(document).on('blur', '.unique-check', function () {--}}
{{--            checkUniqueField($(this));--}}
{{--        });--}}
{{--    </script>--}}
{{--@endpush--}}

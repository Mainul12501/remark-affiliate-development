@extends('front.master')

@section('title', "Influencer Registration")

@section('body')
    <!-- Sign Up Section -->
    <div class="signup-section">
        <div class="container">
            <div class="signup-form-container">
                <h1 class="signup-title">Sign Up Now</h1>

                <form method="post" action="{{route('auth.register-influencer')}}">
                    @csrf
                    <input type="hidden" name="user_type" value="influencer">
                    <div class="form-group">
                        <input type="text" name="name" value="{{ old('name') }}" class="form-control" required placeholder="Full Name">
                        <small class="text-danger error-name">@error('name'){{ $message }}@enderror</small>
                    </div>

                    <!-- Phone Number Input -->
                    <div class="phone-input-group mobile-div">
                        <input type="text" class="country-code" name="country_code" value="+880" readonly>
                        <input type="tel" class="phone-input" maxlength="10" value="{{ old('mobile') }}" name="mobile" data-type="mobile" data-active-status="active" min="0" placeholder="1789123456">
                        <small class="text-danger error-mobile">@error('mobile'){{ $message }}@enderror</small>
                    </div>

                    <div class="form-group email-div d-none">
                        <input type="email" name="email" value="{{ old('email') }}" class="form-control unique-check" data-type="email" data-active-status="inactive" placeholder="Email Address">
                        <small class="text-danger error-email">@error('email'){{ $message }}@enderror</small>
                    </div>

                    <div class="form-group {{ old('user_otp') ? '' : 'd-none' }} otp-input">
                        <input type="number" min="0" maxlength="6" name="user_otp" value="{{ old('user_otp') }}" required class="form-control" placeholder="Input OTP">
                        <small class="text-danger error-otp"></small>
                    </div>

{{--                    <div class="form-group show-hide-block d-none">--}}
{{--                        <div class="position-relative">--}}
{{--                            <input type="password" name="password" class="form-control" placeholder="Password">--}}
{{--                            <i class="fa fa-eye toggle-password"></i>--}}
{{--                        </div>--}}

{{--                        <small class="text-danger error-password">@error('password'){{ $message }}@enderror</small>--}}

{{--                    </div>--}}

                    <div class="form-group show-hide-block d-none">
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

                    <div class="form-group show-hide-block d-none">
                        <div class="position-relative">
                            <input type="password" name="confirm_password" class="form-control" placeholder="Confirm Password">
                            <i class="fa fa-eye toggle-password"></i>
                        </div>
                        <small class="text-danger error-confirm-password"></small>
                    </div>

                    <!-- Send OTP Button -->
                    <button type="button" id="nextBtn" class="btn-send-otp {{ old('user_otp') ? 'd-none' : '' }}">Send OTP</button>
                    <button type="button" id="submitBtn" class="btn-send-otp {{ old('user_otp') ? '' : 'd-none' }}">Submit</button>
{{--                    <button type="button" class="btn-send-otp">Send OTP</button>--}}

                    <!-- Divider -->
                    <div class="divider-text">Or</div>

                    <!-- Sign Up with Email -->
                    <button type="button" class="btn-signup-option" id="loginWithEmail">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M4 4H20C21.1 4 22 4.9 22 6V18C22 19.1 21.1 20 20 20H4C2.9 20 2 19.1 2 18V6C2 4.9 2.9 4 4 4Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M22 6L12 13L2 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        Sign Up with Email
                    </button>
                    <!-- Sign Up with Mobile -->
                    <button type="button" class="btn-signup-option d-none" id="loginWithMobile">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect x="6" y="2" width="12" height="20" rx="2" stroke="currentColor" stroke-width="2"/>
                            <line x1="6" y1="18" x2="18" y2="18" stroke="currentColor" stroke-width="2"/>
                            <circle cx="12" cy="20" r="0.5" fill="currentColor"/>
                        </svg>
                        Sign Up with Mobile
                    </button>

                    <!-- Sign Up with Google -->
                    <a href="{{ route('auth.socialite.redirect', ['provider' => 'google', 'user' => 'influencer']) }}" style="text-decoration: none;" class="btn-signup-option">
                        <svg width="20" height="20" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"/>
                            <path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/>
                            <path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" fill="#FBBC05"/>
                            <path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"/>
                        </svg>
                        Sign Up with Google
                    </a>

                    <!-- Login Link -->
                    <div class="login-link-text">
                        Already have an account? <a href="#">Login</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('style')
    <style>
        input {max-height: 45px}
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        .toggle-password {
            position: absolute;
            top: 50%;
            right: 12px;
            transform: translateY(-50%);
            cursor: pointer;
            color: #6c757d;
        }
        .toggle-password:hover {
            color: #000;
        }
        input{max-height: 45px;}

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

        // Hide password rules on blur (optional - you can remove this if you want rules to stay visible)
        $(document).on('blur', '.password-input', function() {
            // if ($(this).val().trim() === '') {
                $('.password-rules').addClass('d-none');
            // }
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

        // ========================================
        // LOGIN METHOD SWITCHING
        // ========================================
        $(document).on('click', '#loginWithEmail', function() {
            $('input[name="mobile"]').attr('data-active-status', 'inactive');
            $('input[name="email"]').attr('data-active-status', 'active');
            $(this).addClass('d-none');
            $('.mobile-div').addClass('d-none');
            $('.email-div').removeClass('d-none');
            $('#loginWithMobile').removeClass('d-none');
        });

        $(document).on('click', '#loginWithMobile', function() {
            $('input[name="email"]').attr('data-active-status', 'inactive');
            $('input[name="mobile"]').attr('data-active-status', 'active');
            $(this).addClass('d-none');
            $('.email-div').addClass('d-none');
            $('.mobile-div').removeClass('d-none');
            $('#loginWithEmail').removeClass('d-none');
        });

        // ========================================
        // SEND OTP FUNCTIONALITY
        // ========================================
        $(document).on('click', '#nextBtn', function() {
            $(this).attr('disabled', true);

            let email = $('input[name="email"]').val().trim();
            let mobile = $('input[name="mobile"]').val();

            // Check which field is active
            let emailActive = $('input[name="email"]').attr('data-active-status') === 'active';
            let mobileActive = $('input[name="mobile"]').attr('data-active-status') === 'active';

            $('.otp-input').removeClass('d-none');
            $('.show-hide-block').removeClass('d-none');
            $('#submitBtn').removeClass('d-none');
            $('#nextBtn').addClass('d-none');

            $('input[name="mobile"]').attr('readonly', true);
            $('input[name="email"]').attr('readonly', true);

            // Send OTP based on active field
            let otpData = emailActive ?
                { email: email, purpose: "register" } :
                { mobile: "0" + mobile, purpose: "register", for: "registration" };

            let otpEndpoint = emailActive ? "auth/send-otp-mail" : "auth/send-otp-sms";

            sendAjaxRequest(otpEndpoint, 'POST', otpData).then(function(response) {
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
            let mobile = $('input[name="mobile"]').val();
            let userOtp = $('input[name="user_otp"]').val().trim();
            let password = $('input[name="password"]').val();
            let confirmPassword = $('input[name="confirm_password"]').val();

            // Check which field is active
            let emailActive = $('input[name="email"]').attr('data-active-status') === 'active';
            let mobileActive = $('input[name="mobile"]').attr('data-active-status') === 'active';

            let hasError = false;

            // Regex patterns
            const patterns = {
                email: /^[^\s@]+@[^\s@]+\.[^\s@]+$/,
                mobile: /^[0-9]{10}$/,
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

            // Email validation (only if email is active)
            if (emailActive) {
                if (!email) {
                    showError('.error-email', 'Email is required');
                } else if (!patterns.email.test(email)) {
                    showError('.error-email', 'Please enter a valid email address');
                }
            }

            // Mobile validation (only if mobile is active)
            if (mobileActive) {
                if (!mobile) {
                    showError('.error-mobile', 'Mobile number is required');
                } else if (!patterns.mobile.test(mobile)) {
                    showError('.error-mobile', 'Please enter a valid 10-digit mobile number');
                }
            }

            // OTP validation
            if (!userOtp) {
                showError('.error-otp', 'OTP is required');
            } else if (userOtp.length !== 4) {
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


{{--@push('script')--}}
{{--    <script>--}}
{{--        // password validation--}}
{{--        // ========================================--}}
{{--        // PASSWORD STRENGTH VALIDATOR--}}
{{--        // ========================================--}}
{{--        const passwordRules = {--}}
{{--            length: (password) => password.length >= 8,--}}
{{--            uppercase: (password) => /[A-Z]/.test(password),--}}
{{--            lowercase: (password) => /[a-z]/.test(password),--}}
{{--            number: (password) => /\d/.test(password),--}}
{{--            special: (password) => /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]/.test(password)--}}
{{--        };--}}

{{--        function validatePasswordRules(password) {--}}
{{--            const results = {};--}}
{{--            for (const [rule, validator] of Object.entries(passwordRules)) {--}}
{{--                results[rule] = validator(password);--}}
{{--            }--}}
{{--            return results;--}}
{{--        }--}}

{{--        function updatePasswordUI(validationResults) {--}}
{{--            $('.rule-item').each(function() {--}}
{{--                const rule = $(this).data('rule');--}}
{{--                const isValid = validationResults[rule];--}}
{{--                const icon = $(this).find('i');--}}

{{--                if (isValid) {--}}
{{--                    $(this).removeClass('invalid').addClass('valid');--}}
{{--                    icon.removeClass('fa-circle-xmark text-danger')--}}
{{--                        .addClass('fa-circle-check text-success');--}}
{{--                } else {--}}
{{--                    $(this).removeClass('valid').addClass('invalid');--}}
{{--                    icon.removeClass('fa-circle-check text-success')--}}
{{--                        .addClass('fa-circle-xmark text-danger');--}}
{{--                }--}}
{{--            });--}}
{{--        }--}}

{{--        // Show password rules on focus--}}
{{--        $(document).on('focus', '.password-input', function() {--}}
{{--            $('.password-rules').removeClass('d-none');--}}
{{--        });--}}

{{--        // Hide password rules on blur (optional - you can remove this if you want rules to stay visible)--}}
{{--        // $(document).on('blur', '.password-input', function() {--}}
{{--        //     if ($(this).val().trim() === '') {--}}
{{--        //         $('.password-rules').addClass('d-none');--}}
{{--        //     }--}}
{{--        // });--}}

{{--        // Real-time password validation--}}
{{--        $(document).on('input', '.password-input', function() {--}}
{{--            const password = $(this).val();--}}
{{--            const validationResults = validatePasswordRules(password);--}}
{{--            updatePasswordUI(validationResults);--}}
{{--        });--}}

{{--        // ========================================--}}
{{--        // DYNAMIC ERROR CLEARING--}}
{{--        // ========================================--}}
{{--        $(document).on('input', 'input, textarea, select', function() {--}}
{{--            // Clear error message for the current field--}}
{{--            $(this).siblings('.text-danger').text('');--}}
{{--            $(this).closest('.form-group').find('.text-danger').text('');--}}

{{--            // Remove error styling if any--}}
{{--            $(this).removeClass('is-invalid');--}}
{{--        });--}}


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
{{--    <script>--}}
{{--        $(document).on('click', '#loginWithEmail', function () {--}}
{{--            $('input[name="mobile"]').attr('data-active-status', 'inactive');--}}
{{--            $('input[name="email"]').attr('data-active-status', 'active');--}}
{{--            $(this).addClass('d-none');--}}
{{--            $('.mobile-div').addClass('d-none');--}}
{{--            $('.email-div').removeClass('d-none');--}}
{{--            $('#loginWithMobile').removeClass('d-none');--}}
{{--        });--}}

{{--        $(document).on('click', '#loginWithMobile', function () {--}}
{{--            $('input[name="email"]').attr('data-active-status', 'inactive');--}}
{{--            $('input[name="mobile"]').attr('data-active-status', 'active');--}}
{{--            $(this).addClass('d-none');--}}
{{--            $('.email-div').addClass('d-none');--}}
{{--            $('.mobile-div').removeClass('d-none');--}}
{{--            $('#loginWithEmail').removeClass('d-none');--}}
{{--        });--}}
{{--    </script>--}}
{{--    <script>--}}



{{--        $(document).on('click', '#nextBtn', function () {--}}
{{--            $(this).attr('disabled', true);--}}

{{--            let email = $('input[name="email"]').val().trim();--}}
{{--            let mobile = $('input[name="mobile"]').val();--}}

{{--            // Check which field is active--}}
{{--            let emailActive = $('input[name="email"]').attr('data-active-status') === 'active';--}}
{{--            let mobileActive = $('input[name="mobile"]').attr('data-active-status') === 'active';--}}


{{--            $('.otp-input').removeClass('d-none');--}}
{{--            $('.show-hide-block').removeClass('d-none');--}}
{{--            $('#submitBtn').removeClass('d-none');--}}
{{--            $('#nextBtn').addClass('d-none');--}}

{{--            $('input[name="mobile"]').attr('disabled', 'disabled');--}}

{{--            // Send OTP based on active field--}}
{{--            let otpData = emailActive ?--}}
{{--                { email: email, purpose: "register" } :--}}
{{--                { mobile: "0"+mobile, purpose: "register", for: "registration" };--}}

{{--            let otpEndpoint = emailActive ? "auth/send-otp-mail" : "auth/send-otp-sms";--}}

{{--            sendAjaxRequest(otpEndpoint, 'POST', otpData).then(function (response) {--}}
{{--                if (response.status == 'error')--}}
{{--                    toastr.error(response.message);--}}
{{--                else if (response.status == 'success')--}}
{{--                    toastr.success(response.message);--}}
{{--                // console.log(response);--}}
{{--                $('#nextBtn').attr('disabled', false);--}}
{{--            }).catch(function(error) {--}}
{{--                toastr.error(error.message || 'Failed to send OTP');--}}
{{--                $('#nextBtn').attr('disabled', false);--}}
{{--            });--}}
{{--        });--}}
{{--        $('input').on('input', function () {--}}
{{--            $(this).siblings('.text-danger').text('');--}}
{{--        });--}}
{{--        $(document).on('click', '#submitBtn', function () {--}}
{{--            // Clear previous errors--}}
{{--            $('.text-danger').text('');--}}

{{--            let name = $('input[name="name"]').val().trim();--}}
{{--            let email = $('input[name="email"]').val().trim();--}}
{{--            let mobile = $('input[name="mobile"]').val();--}}
{{--            let userOtp = $('input[name="user_otp"]').val().trim();--}}
{{--            let password = $('input[name="password"]').val();--}}
{{--            let confirmPassword = $('input[name="confirm_password"]').val();--}}

{{--            // Check which field is active--}}
{{--            let emailActive = $('input[name="email"]').attr('data-active-status') === 'active';--}}
{{--            let mobileActive = $('input[name="mobile"]').attr('data-active-status') === 'active';--}}

{{--            let hasError = false;--}}

{{--            // Regex--}}
{{--            let emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;--}}
{{--            let mobileRegex = /^[0-9]{10}$/;--}}
{{--            let passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?])[A-Za-z\d!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]{8,}$/;--}}

{{--            // Name validation--}}
{{--            if (!name) {--}}
{{--                $('.error-name').text('Name is required');--}}
{{--                hasError = true;--}}
{{--            }--}}

{{--            // Email validation (only if email is active)--}}
{{--            if (emailActive) {--}}
{{--                if (!email) {--}}
{{--                    $('.error-email').text('Email is required');--}}
{{--                    hasError = true;--}}
{{--                } else if (!emailRegex.test(email)) {--}}
{{--                    $('.error-email').text('Please enter a valid email address');--}}
{{--                    hasError = true;--}}
{{--                }--}}
{{--            }--}}

{{--            // Mobile validation (only if mobile is active)--}}
{{--            if (mobileActive) {--}}
{{--                if (!mobile) {--}}
{{--                    $('.error-mobile').text('Mobile number is required');--}}
{{--                    hasError = true;--}}
{{--                } else if (!mobileRegex.test(mobile)) {--}}
{{--                    $('.error-mobile').text('Please enter a valid 10-digit mobile number');--}}
{{--                    hasError = true;--}}
{{--                }--}}
{{--            }--}}

{{--            // OTP validation--}}
{{--            if (!userOtp) {--}}
{{--                $('.error-otp').text('OTP is required');--}}
{{--                hasError = true;--}}
{{--            }--}}

{{--            // Password validation--}}
{{--            if (!password) {--}}
{{--                $('.error-password').text('Password is required');--}}
{{--                hasError = true;--}}
{{--            } else if (!passwordRegex.test(password)) {--}}
{{--                $('.error-password').text(--}}
{{--                    'Min 8 chars, include one uppercase, one lowercase, one number & one special character'--}}
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
{{--            if (hasError) {--}}
{{--                return;--}}
{{--            }--}}

{{--            // If no errors, submit the form--}}
{{--            $(this).closest('form').submit();--}}
{{--        });--}}
{{--    </script>--}}

{{--@endpush--}}

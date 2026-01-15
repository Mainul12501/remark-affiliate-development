@extends('front.master')

@section('title', 'Bank Info')

@section('body')

    <!-- Main Content -->
    <div class="influencer-profile-main">
        <div class="container-fluid px-md-4 px-3 py-4 influencer-profile-shell">

            @include('front.influencer.includes.dashboard-common-sections')

            <div class="bg-white rounded-4 p-4 bank-details-content">
                <form action="{{ route('influencer.user-bank-infos.store') }}" method="POST" enctype="multipart/form-data" id="influencerBankDetailsForm">
                    @csrf
                    <div class="row g-4 mb-5">
                        <!-- Left Section: Bank Account Details -->
                        <div class="col-lg-6">
                            <h6 class="bank-section-title mb-4">Submit your Bank Account Details</h6>

                            <!-- Your Bank Dropdown -->
                            <div class="mb-3">
                                <label class="form-label bank-form-label">Your Bank:</label>
                                <select class="form-select bank-form-input" name="bank_id" >
                                    <option selected disabled>Select Your Bank</option>
                                    @foreach($banks as $bank)
                                        <option value="{{ $bank->id }}" {{ $bankInfo->bank_id == $bank->id ? 'selected' : '' }}>{{ $bank->name ?? 'Bank Name' }}</option>
                                    @endforeach
                                    {{--                                <option value="2">Chase Bank</option>--}}
                                    {{--                                <option value="3">Wells Fargo</option>--}}
                                    {{--                                <option value="4">Citibank</option>--}}
                                </select>
                            </div>

                            <!-- Bank Account Name -->
                            <div class="mb-3">
                                <label class="form-label bank-form-label">Bank ACC Name :</label>
                                <input type="text" class="form-control bank-form-input" value="{{ old('account_name', $bankInfo->account_name ?? '') }}" name="account_name" placeholder="Remark">
                            </div>

                            <!-- Bank Account Number -->
                            <div class="mb-3">
                                <label class="form-label bank-form-label">Bank ACC No :</label>
                                <input type="text" class="form-control bank-form-input" value="{{ old('account_number', $bankInfo->account_number ?? '') }}" name="account_number" placeholder="012345678998">
                            </div>

                            <!-- Branch Name -->
                            <div class="mb-4">
                                <label class="form-label bank-form-label">Branch name:</label>
                                <input type="text" class="form-control bank-form-input" value="{{ old('branch_name', $bankInfo->branch_name ?? '') }}" name="branch_name" placeholder="EBL Gulshan Branch">
                            </div>

                            <!-- Upload Cheque Book -->
                            <div class="mb-4">
                                <label class="form-label bank-form-label">Upload the Front Page of your Cheque Book</label>
                                <div class="bank-upload-area bank-upload-dropzone" data-upload-type="cheque"
                                     @if(isset($bankInfo) && $bankInfo->cheque_img) data-existing-image="{{ asset($bankInfo->cheque_img) }}" @endif>
                                    <input type="file" name="cheque_img" class="bank-upload-input" id="chequeUpload" accept="image/*,.pdf" hidden>
                                    <div class="bank-upload-content" @if(isset($bankInfo) && $bankInfo->cheque_img) style="display: none;" @endif>
                                        <div class="bank-upload-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="currentColor" class="bi bi-arrow-up-circle-fill" viewBox="0 0 16 16">
                                                <path d="M16 8A8 8 0 1 0 0 8a8 8 0 0 0 16 0m-7.5 3.5a.5.5 0 0 1-1 0V5.707L5.354 7.854a.5.5 0 1 1-.708-.708l3-3a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 5.707z"/>
                                            </svg>
                                        </div>
                                        <p class="bank-upload-text mb-0">Image/PDF</p>
                                        <p class="bank-upload-subtext mb-0">JPEG, PNG or PDF</p>
                                    </div>
                                    <div class="bank-upload-preview" @if(isset($bankInfo) && $bankInfo->cheque_img) style="display: flex;" @else style="display: none;" @endif>
                                        <img src="{{ isset($bankInfo) && $bankInfo->cheque_img ? asset($bankInfo->cheque_img) : '' }}" alt="Preview" class="bank-preview-image">
                                        <button type="button" class="bank-remove-file">&times;</button>
                                    </div>
                                </div>
                            </div>


                        </div>

                        <!-- Right Section: TIN Details -->
                        <div class="col-lg-6">
                            <h6 class="bank-section-title mb-4">Submit Your <span class="fw-bold">TIN</span> & get additional <span class="fw-bold">2.5%</span> Benefit*</h6>

                            <!-- TIN Input -->
                            <div class="mb-3">
                                <label class="form-label bank-form-label">Mobile Banking Agent</label>
                                <select name="mobile_vendor" class="form-select bank-form-input" id="">
                                    <option value="BKash" {{ isset($bankInfo) && $bankInfo->mobile_vendor == 'BKash' ? 'selected' : '' }}>BKash</option>
                                    <option value="Rocket" {{ isset($bankInfo) && $bankInfo->mobile_vendor == 'Rocket' ? 'selected' : '' }}>Rocket</option>
                                    <option value="Nagad" {{ isset($bankInfo) && $bankInfo->mobile_vendor == 'Nagad' ? 'selected' : '' }}>Nagad</option>
                                    <option value="Sure Cash" {{ isset($bankInfo) && $bankInfo->mobile_vendor == 'Sure Cash' ? 'selected' : '' }}>Sure Cash</option>
                                    <option value="mCash" {{ isset($bankInfo) && $bankInfo->mobile_vendor == 'mCash' ? 'selected' : '' }}>mCash</option>
                                </select>
                            </div>

                            <!-- TIN Input -->
                            <div class="mb-3">
                                <label class="form-label bank-form-label">Mobile Number</label>
                                <input type="text" class="form-control bank-form-input" maxlength="11" value="{{ old('mobile_number', $bankInfo->mobile_number ?? '') }}" name="mobile_number" placeholder="01XXXXXXXXX">
                            </div>

                            <!-- TIN Input -->
                            <div class="mb-3">
                                <label class="form-label bank-form-label">TIN</label>
                                <input type="text" name="tin_number" value="{{ old('tin_number', $loggedUser?->userInfo?->tin_number ?? '') }}" class="form-control bank-form-input" placeholder="012345678998">
                            </div>

                            <!-- Or Divider -->
                            <div class="bank-or-divider mb-3">Or</div>

                            <!-- Upload TIN Certificate -->
                            <div class="mb-3">
                                <label class="form-label bank-form-label">Upload TIN Certificate</label>
                                <div class="bank-upload-area bank-upload-dropzone" data-upload-type="tin"
                                     @if(isset($loggedUser) && $loggedUser?->userInfo?->tin_cert_img) data-existing-image="{{ asset($loggedUser?->userInfo?->tin_cert_img) }}" @endif>
                                    <input type="file" name="tin_cert_img" class="bank-upload-input" id="tinUpload" accept="image/*,.pdf" hidden>
                                    <div class="bank-upload-content" @if(isset($loggedUser) && $loggedUser?->userInfo?->tin_cert_img) style="display: none;" @endif>
                                        <div class="bank-upload-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="currentColor" class="bi bi-arrow-up-circle-fill" viewBox="0 0 16 16">
                                                <path d="M16 8A8 8 0 1 0 0 8a8 8 0 0 0 16 0m-7.5 3.5a.5.5 0 0 1-1 0V5.707L5.354 7.854a.5.5 0 1 1-.708-.708l3-3a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 5.707z"/>
                                            </svg>
                                        </div>
                                        <p class="bank-upload-text mb-0">Image/PDF</p>
                                        <p class="bank-upload-subtext mb-0">JPEG, PNG or PDF</p>
                                    </div>
                                    <div class="bank-upload-preview" @if(isset($loggedUser) && $loggedUser?->userInfo?->tin_cert_img) style="display: flex;" @else style="display: none;" @endif>
                                        <img src="{{ isset($loggedUser) && $loggedUser?->userInfo?->tin_cert_img ? asset($loggedUser?->userInfo?->tin_cert_img) : '' }}" alt="Preview" class="bank-preview-image">
                                        <button type="button" class="bank-remove-file">&times;</button>
                                    </div>
                                </div>
                            </div>

                            <!-- TIN Help Text -->
                            <div class="bank-tin-help mb-3">
                                <p class="mb-0">Don't Have Your TIN?</p>
                                <p class="mb-0">Click The Link and <a href="#" class="bank-tin-link">Get Your TIN</a></p>
                            </div>

                            <!-- Disclaimer -->
                            <div class="bank-disclaimer">
                                <p class="mb-0">* If the creator provided TIN (Tax Identification Number) during sign up then 5% tax will be deducted and failure to do so will result in a 7.5% tax deduction as AIT.</p>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-12">
                                <!-- Submit Button -->
                                <button class="btn btn-dark bank-submit-btn">Submit</button>
                            </div>
                        </div>
                    </div>
                </form>


                <!-- Withdrawal History Section -->
                <div class="bank-withdrawal-history">
                    <h6 class="bank-history-title mb-3">Withdrawal History:</h6>

                    <!-- Table for Desktop -->
                    <div class="table-responsive d-none d-lg-block">
                        <table class="table bank-history-table">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Order Report</th>
                                <th>is connected</th>
                                <th>Affiliate</th>
                                <th>key</th>
                                <th>Invoice Number</th>
                                <th>Date</th>
                                <th>Amount</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>Name Here</td>
                                <td>Order Report</td>
                                <td>connected</td>
                                <td>Affiliate</td>
                                <td>123457</td>
                                <td>123457</td>
                                <td>12 Apr 2025</td>
                                <td>25,000</td>
                            </tr>
                            <tr>
                                <td>Name Here</td>
                                <td>Order Report</td>
                                <td>connected</td>
                                <td>Affiliate</td>
                                <td>123457</td>
                                <td>123457</td>
                                <td>12 Apr 2025</td>
                                <td>54</td>
                            </tr>
                            <tr>
                                <td>Name Here</td>
                                <td>Order Report</td>
                                <td>connected</td>
                                <td>Affiliate</td>
                                <td>123457</td>
                                <td>123457</td>
                                <td>12 Apr 2025</td>
                                <td>54</td>
                            </tr>
                            <tr>
                                <td>Name Here</td>
                                <td>Order Report</td>
                                <td>connected</td>
                                <td>Affiliate</td>
                                <td>123457</td>
                                <td>123457</td>
                                <td>12 Apr 2025</td>
                                <td>54</td>
                            </tr>
                            <tr>
                                <td>Name Here</td>
                                <td>Order Report</td>
                                <td>connected</td>
                                <td>Affiliate</td>
                                <td>123457</td>
                                <td>123457</td>
                                <td>12 Apr 2025</td>
                                <td>54</td>
                            </tr>
                            <tr>
                                <td>Name Here</td>
                                <td>Order Report</td>
                                <td>connected</td>
                                <td>Affiliate</td>
                                <td>123457</td>
                                <td>123457</td>
                                <td>12 Apr 2025</td>
                                <td>54</td>
                            </tr>
                            <tr>
                                <td>Name Here</td>
                                <td>Order Report</td>
                                <td>connected</td>
                                <td>Affiliate</td>
                                <td>123457</td>
                                <td>123457</td>
                                <td>12 Apr 2025</td>
                                <td>54</td>
                            </tr>
                            <tr>
                                <td>Name Here</td>
                                <td>Order Report</td>
                                <td>connected</td>
                                <td>Affiliate</td>
                                <td>123457</td>
                                <td>123457</td>
                                <td>12 Apr 2025</td>
                                <td>54</td>
                            </tr>
                            <tr>
                                <td>Name Here</td>
                                <td>Order Report</td>
                                <td>connected</td>
                                <td>Affiliate</td>
                                <td>123457</td>
                                <td>123457</td>
                                <td>12 Apr 2025</td>
                                <td>54</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                    <!-- Cards for Mobile -->
                    <div class="d-lg-none">
                        <div class="bank-history-card mb-3">
                            <div class="d-flex justify-content-between mb-2">
                                <span class="bank-history-label">Name:</span>
                                <span class="bank-history-value">Name Here</span>
                            </div>
                            <div class="d-flex justify-content-between mb-2">
                                <span class="bank-history-label">Order Report:</span>
                                <span class="bank-history-value">Order Report</span>
                            </div>
                            <div class="d-flex justify-content-between mb-2">
                                <span class="bank-history-label">Status:</span>
                                <span class="bank-history-value">connected</span>
                            </div>
                            <div class="d-flex justify-content-between mb-2">
                                <span class="bank-history-label">Date:</span>
                                <span class="bank-history-value">12 Apr 2025</span>
                            </div>
                            <div class="d-flex justify-content-between">
                                <span class="bank-history-label">Amount:</span>
                                <span class="bank-history-value fw-bold">25,000</span>
                            </div>
                        </div>
                        <div class="bank-history-card mb-3">
                            <div class="d-flex justify-content-between mb-2">
                                <span class="bank-history-label">Name:</span>
                                <span class="bank-history-value">Name Here</span>
                            </div>
                            <div class="d-flex justify-content-between mb-2">
                                <span class="bank-history-label">Order Report:</span>
                                <span class="bank-history-value">Order Report</span>
                            </div>
                            <div class="d-flex justify-content-between mb-2">
                                <span class="bank-history-label">Status:</span>
                                <span class="bank-history-value">connected</span>
                            </div>
                            <div class="d-flex justify-content-between mb-2">
                                <span class="bank-history-label">Date:</span>
                                <span class="bank-history-value">12 Apr 2025</span>
                            </div>
                            <div class="d-flex justify-content-between">
                                <span class="bank-history-label">Amount:</span>
                                <span class="bank-history-value fw-bold">54</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>



@endsection

@push('style')
    <style>
        .is-invalid {
            border-color: #dc3545;
        }
        .invalid-feedback {
            display: block;
        }

    </style>
@endpush

@push('script')
    <script>
        $(document).ready(function () {

            // ===============================
            // REGEX
            // ===============================
            const bdMobileRegex = /^(01)[0-9]{9}$/;

            // ===============================
            // HELPER FUNCTIONS
            // ===============================
            function showError(input, message) {
                $(input).addClass('is-invalid');
                if (!$(input).next('.invalid-feedback').length) {
                    $(input).after(`<div class="invalid-feedback">${message}</div>`);
                }
            }

            function clearError(input) {
                $(input).removeClass('is-invalid');
                $(input).next('.invalid-feedback').remove();
            }

            function validateFile(input) {
                const file = input.files[0];
                if (!file) return true;

                const allowedTypes = ['image/jpeg', 'image/png', 'image/jpg'];
                const maxSize = 5 * 1024 * 1024; // 5MB

                if (!allowedTypes.includes(file.type)) {
                    showError(input, 'Only JPG, JPEG, PNG images are allowed.');
                    input.value = '';
                    return false;
                }

                if (file.size > maxSize) {
                    showError(input, 'File size must not exceed 5MB.');
                    input.value = '';
                    return false;
                }

                clearError(input);
                return true;
            }

            // ===============================
            // LIVE FIELD VALIDATION
            // ===============================

            // Mobile Number (BD)
            $('input[name="mobile_number"]').on('input', function () {
                if (!bdMobileRegex.test(this.value)) {
                    showError(this, 'Enter a valid Bangladeshi number (01XXXXXXXXX).');
                } else {
                    clearError(this);
                }
            });

            // TIN Number (numeric)
            $('input[name="tin_number"]').on('input', function () {
                this.value = this.value.replace(/\D/g, '');
            });

            // Bank Account Number (numeric)
            $('input[name="account_number"]').on('input', function () {
                this.value = this.value.replace(/\D/g, '');
            });

            // File validations
            $('input[name="cheque_img"], input[name="tin_cert_img"]').on('change', function () {
                validateFile(this);
            });

            // ===============================
            // FORM SUBMIT VALIDATION
            // ===============================
            $(document).on('submit', '#influencerBankDetailsForm', function (e) {
                let isValid = true;

                // Mobile
                const mobile = $('input[name="mobile_number"]');
                if (!bdMobileRegex.test(mobile.val())) {
                    showError(mobile, 'Valid Bangladeshi mobile number required.');
                    isValid = false;
                }

                // Bank Account
                const acc = $('input[name="account_number"]');
                if (!/^\d+$/.test(acc.val())) {
                    showError(acc, 'Bank account number must be numeric.');
                    isValid = false;
                }

                // TIN (if provided)
                const tin = $('input[name="tin_number"]');
                if (tin.val() && !/^\d+$/.test(tin.val())) {
                    showError(tin, 'TIN must contain numbers only.');
                    isValid = false;
                }

                // Files
                if (!validateFile(document.querySelector('input[name="cheque_img"]'))) {
                    isValid = false;
                }

                if (!validateFile(document.querySelector('input[name="tin_cert_img"]'))) {
                    isValid = false;
                }

                if (!isValid) {
                    e.preventDefault();
                }
            });
        });
    </script>

@endpush



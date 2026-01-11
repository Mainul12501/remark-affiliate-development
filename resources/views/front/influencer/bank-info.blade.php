@extends('front.master')

@section('title', 'Bank Info')

@section('body')

    <!-- Main Content -->
    <div class="influencer-profile-main">
        <div class="container-fluid px-md-4 px-3 py-4 influencer-profile-shell">

            @include('front.influencer.includes.dashboard-common-sections')

            <div class="bg-white rounded-4 p-4 bank-details-content">
                <div class="row g-4 mb-5">
                    <!-- Left Section: Bank Account Details -->
                    <div class="col-lg-6">
                        <h6 class="bank-section-title mb-4">Submit your Bank Account Details</h6>

                        <!-- Your Bank Dropdown -->
                        <div class="mb-3">
                            <label class="form-label bank-form-label">Your Bank:</label>
                            <select class="form-select bank-form-input">
                                <option selected>Select Your Bank</option>
                                <option value="1">Bank of America</option>
                                <option value="2">Chase Bank</option>
                                <option value="3">Wells Fargo</option>
                                <option value="4">Citibank</option>
                            </select>
                        </div>

                        <!-- Bank Account Number -->
                        <div class="mb-3">
                            <label class="form-label bank-form-label">Bank ACC No.:</label>
                            <input type="text" class="form-control bank-form-input" placeholder="012345678998">
                        </div>

                        <!-- Branch Name -->
                        <div class="mb-4">
                            <label class="form-label bank-form-label">Branch name:</label>
                            <input type="text" class="form-control bank-form-input" placeholder="EBL Gulshan Branch">
                        </div>

                        <!-- Upload Cheque Book -->
                        <div class="mb-4">
                            <label class="form-label bank-form-label">Upload the Front Page of your Cheque Book</label>
                            <div class="bank-upload-area bank-upload-dropzone" data-upload-type="cheque">
                                <input type="file" class="bank-upload-input" id="chequeUpload" accept="image/*,.pdf" hidden>
                                <div class="bank-upload-content">
                                    <div class="bank-upload-icon">
                                        <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <circle cx="24" cy="24" r="24" fill="#4A4A4A"/>
                                            <path d="M24 18V30M18 24H30" stroke="#FFFFFF" stroke-width="2.5" stroke-linecap="round"/>
                                            <path d="M24 16L24 20" stroke="#FFFFFF" stroke-width="2.5" stroke-linecap="round"/>
                                            <path d="M20 20L24 16L28 20" stroke="#FFFFFF" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </div>
                                    <p class="bank-upload-text mb-0">Image/PDF</p>
                                    <p class="bank-upload-subtext mb-0">JPEG, PNG or PDF</p>
                                </div>
                                <div class="bank-upload-preview" style="display: none;">
                                    <img src="" alt="Preview" class="bank-preview-image">
                                    <button type="button" class="bank-remove-file">&times;</button>
                                </div>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <button class="btn btn-dark bank-submit-btn">Submit</button>
                    </div>

                    <!-- Right Section: TIN Details -->
                    <div class="col-lg-6">
                        <h6 class="bank-section-title mb-4">Submit Your <span class="fw-bold">TIN</span> & get additional <span class="fw-bold">2.5%</span> Benefit*</h6>

                        <!-- TIN Input -->
                        <div class="mb-3">
                            <label class="form-label bank-form-label">TIN</label>
                            <input type="text" class="form-control bank-form-input" placeholder="012345678998">
                        </div>

                        <!-- Or Divider -->
                        <div class="bank-or-divider mb-3">Or</div>

                        <!-- Upload TIN Certificate -->
                        <div class="mb-3">
                            <label class="form-label bank-form-label">Upload TIN Certificate</label>
                            <div class="bank-upload-area bank-upload-dropzone" data-upload-type="tin">
                                <input type="file" class="bank-upload-input" id="tinUpload" accept="image/*,.pdf" hidden>
                                <div class="bank-upload-content">
                                    <div class="bank-upload-icon">
                                        <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <circle cx="24" cy="24" r="24" fill="#4A4A4A"/>
                                            <path d="M24 18V30M18 24H30" stroke="#FFFFFF" stroke-width="2.5" stroke-linecap="round"/>
                                            <path d="M24 16L24 20" stroke="#FFFFFF" stroke-width="2.5" stroke-linecap="round"/>
                                            <path d="M20 20L24 16L28 20" stroke="#FFFFFF" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </div>
                                    <p class="bank-upload-text mb-0">Image/PDF</p>
                                    <p class="bank-upload-subtext mb-0">JPEG, PNG or PDF</p>
                                </div>
                                <div class="bank-upload-preview" style="display: none;">
                                    <img src="" alt="Preview" class="bank-preview-image">
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
                </div>

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



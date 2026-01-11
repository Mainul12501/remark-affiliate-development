@extends('front.master')

@section('title', 'Influencer Albums')

@section('body')

    <!-- Main Content -->
    <div class="influencer-profile-main">
        <div class="container-fluid px-md-4 px-3 py-4 influencer-profile-shell">

            @include('front.influencer.includes.dashboard-common-sections')

            <div class="influencer-edit-content">
                <div class="row">
                    <div class="col-12">
                        <!-- Upload Profile Picture Section -->
                        <div class="mb-4">
                            <h6 class="fw-semibold mb-3">Upload Your Profile Picture</h6>
                            <div class="d-flex flex-column align-items-start influencer-upload-area">
                                <div class="influencer-upload-box bg-white rounded-4 d-flex align-items-center justify-content-center mb-3">
                                    <svg width="120" height="120" viewBox="0 0 120 120" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="60" cy="40" r="20" fill="#A3C4F3"/>
                                        <path d="M30 100C30 83.4315 43.4315 70 60 70C76.5685 70 90 83.4315 90 100H30Z" fill="#A3C4F3"/>
                                    </svg>
                                </div>
                                <button class="btn btn-outline-dark rounded-pill influencer-upload-btn">Upload</button>
                            </div>
                        </div>

                        <!-- Form Fields -->
                        <div class="influencer-form-stack">
                            <!-- Name Field -->
                            <div class="mb-4">
                                <label class="form-label fw-semibold">Name</label>
                                <input type="text" class="form-control influencer-form-input" placeholder="Sadiya A. Suchita">
                            </div>

                            <!-- Bio Field -->
                            <div class="mb-4">
                                <label class="form-label fw-semibold">Bio</label>
                                <textarea class="form-control influencer-form-input" rows="4" placeholder="Write your bio"></textarea>
                            </div>

                            <!-- Referral Account Field -->
                            <div class="mb-5">
                                <label class="form-label fw-semibold">Referral Account</label>
                                <input type="text" class="form-control influencer-form-input" placeholder="Referral account">
                            </div>
                        </div>

                        <!-- Social Media Links Section -->
                        <div class="mb-5">
                            <h6 class="fw-semibold mb-4">Social Media Links</h6>

                            <div class="row g-4">
                                <!-- Facebook Column -->
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Facebook</label>
                                    <div class="position-relative mb-3">
                                        <input type="text" class="form-control influencer-social-input" placeholder="facebook.com/johndoe" value="facebook.com/johndoe">
                                        <span class="influencer-social-check">
                                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M15 4.5L6.75 12.75L3 9" stroke="#10B981" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                </svg>
                                            </span>
                                    </div>
                                    <button class="btn influencer-btn-facebook w-100 mb-4 influencer-social-action">
                                        <i class="bi bi-facebook me-2"></i>
                                        Log in with Facebook
                                    </button>

                                    <!-- Youtube -->
                                    <label class="form-label fw-semibold">Youtube</label>
                                    <div class="position-relative mb-3">
                                        <input type="text" class="form-control influencer-social-input" placeholder="Youtube.com/@johndoe" value="Youtube.com/@johndoe">
                                        <span class="influencer-social-check">
                                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M15 4.5L6.75 12.75L3 9" stroke="#10B981" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                </svg>
                                            </span>
                                    </div>
                                    <button class="btn influencer-btn-google w-100 influencer-social-action">
                                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M18.1713 8.36791H17.5001V8.33331H10.0001V11.6666H14.7096C14.0226 13.6071 12.1763 15 10.0001 15C7.23884 15 5.00009 12.7612 5.00009 9.99998C5.00009 7.23873 7.23884 4.99998 10.0001 4.99998C11.2746 4.99998 12.4342 5.48081 13.3171 6.26623L15.6742 3.90915C14.1859 2.52248 12.1951 1.66665 10.0001 1.66665C5.39801 1.66665 1.66675 5.39791 1.66675 9.99998C1.66675 14.602 5.39801 18.3333 10.0001 18.3333C14.6021 18.3333 18.3334 14.602 18.3334 9.99998C18.3334 9.44123 18.2759 8.89581 18.1713 8.36791Z" fill="#FFC107"/>
                                            <path d="M2.62756 6.12123L5.36548 8.12915C6.10631 6.29498 7.90048 4.99998 10.0005 4.99998C11.2751 4.99998 12.4346 5.48081 13.3176 6.26623L15.6746 3.90915C14.1863 2.52248 12.1955 1.66665 10.0005 1.66665C6.79923 1.66665 3.99923 3.47373 2.62756 6.12123Z" fill="#FF3D00"/>
                                            <path d="M10.0001 18.3333C12.1526 18.3333 14.1101 17.5096 15.5876 16.17L13.0084 13.9875C12.1432 14.6452 11.0865 15.0009 10.0001 15C7.83259 15 5.99176 13.6179 5.29842 11.6891L2.58176 13.7829C3.93426 16.4816 6.76092 18.3333 10.0001 18.3333Z" fill="#4CAF50"/>
                                            <path d="M18.1713 8.36796H17.5001V8.33337H10.0001V11.6667H14.7096C14.3809 12.5902 13.7889 13.3972 13.0071 13.9879L13.0084 13.9871L15.5876 16.1696C15.4051 16.3355 18.3334 14.1667 18.3334 10C18.3334 9.44129 18.2759 8.89587 18.1713 8.36796Z" fill="#1976D2"/>
                                        </svg>
                                        Login with Google
                                    </button>
                                    <p class="small text-muted mt-2 influencer-social-action">Use your Google account that is linked with your YouTube Channel</p>
                                </div>

                                <!-- Instagram & TikTok Column -->
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Instagram</label>
                                    <div class="position-relative mb-3">
                                        <span class="influencer-social-prefix">@</span>
                                        <input type="text" class="form-control influencer-social-input influencer-social-input-prefix" placeholder="johndoe" value="johndoe">
                                    </div>
                                    <button class="btn influencer-btn-instagram w-100 mb-4 influencer-social-action">
                                        <i class="bi bi-instagram me-2"></i>
                                        Log in with Instagram
                                    </button>

                                    <!-- TikTok -->
                                    <label class="form-label fw-semibold">Tiktok</label>
                                    <div class="position-relative mb-3">
                                        <span class="influencer-social-prefix">@</span>
                                        <input type="text" class="form-control influencer-social-input influencer-social-input-prefix" placeholder="johndoe" value="johndoe">
                                    </div>
                                    <button class="btn influencer-btn-tiktok w-100 influencer-social-action">
                                        <i class="bi bi-tiktok me-2"></i>
                                        Log in with Tiktok
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Save Changes Button -->
                        <div class="mb-5">
                            <button class="btn btn-dark rounded-pill px-5 py-3">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>



@endsection


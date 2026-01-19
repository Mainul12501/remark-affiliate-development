@extends('front.master')

@section('title', 'Partner Profile Verify')

@section('body')

    <!-- Profile Section -->
    <section class="bg-light py-4 py-md-5">
        <div class="container">

            <!-- Profile Card -->
            <div class="card border-0 shadow-sm rounded-3 mb-4">
                <div class="card-body p-4">
                    <div class="row g-3 align-items-start">
                        <!-- Profile Image -->
                        <div class="col-12 col-md-auto text-center text-md-start">
                            <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=200&h=200&fit=crop"
                                 alt="John Doe" class="rounded profile-img"
                                 style="width: 140px; height: 140px; object-fit: cover;">
                        </div>

                        <!-- Profile Info -->
                        <div class="col-12 col-md text-center text-md-start">
                            <h1 class="fs-4 fw-semibold mb-1">John Doe</h1>
                            <p class="text-secondary text-uppercase mb-3" style="font-size: 11px; letter-spacing: 0.5px; font-weight: 500;">PARTNER</p>

                            <!-- Social Icons -->
                            <div class="d-flex gap-2 mb-3 justify-content-center justify-content-md-start social-icons">
                                <a href="#" class="text-dark">
                                    <svg width="28" height="28" viewBox="0 0 24 24" fill="currentColor"><path d="M19.59 6.69a4.83 4.83 0 0 1-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 0 1-5.2 1.74 2.89 2.89 0 0 1 2.31-4.64 2.93 2.93 0 0 1 .88.13V9.4a6.84 6.84 0 0 0-1-.05A6.33 6.33 0 0 0 5 20.1a6.34 6.34 0 0 0 10.86-4.43v-7a8.16 8.16 0 0 0 4.77 1.52v-3.4a4.85 4.85 0 0 1-1-.1z"/></svg>
                                </a>
                                <a href="#" class="text-primary">
                                    <svg width="28" height="28" viewBox="0 0 24 24" fill="#1877F2"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                                </a>
                                <a href="#">
                                    <svg width="28" height="28" viewBox="0 0 24 24" fill="url(#instagram-gradient)">
                                        <defs>
                                            <linearGradient id="instagram-gradient" x1="0%" y1="100%" x2="100%" y2="0%">
                                                <stop offset="0%" style="stop-color:#FCAF45;stop-opacity:1" />
                                                <stop offset="50%" style="stop-color:#E1306C;stop-opacity:1" />
                                                <stop offset="100%" style="stop-color:#833AB4;stop-opacity:1" />
                                            </linearGradient>
                                        </defs>
                                        <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 1 0 0 12.324 6.162 6.162 0 0 0 0-12.324zM12 16a4 4 0 1 1 0-8 4 4 0 0 1 0 8zm6.406-11.845a1.44 1.44 0 1 0 0 2.881 1.44 1.44 0 0 0 0-2.881z"/>
                                    </svg>
                                </a>
                                <a href="#" class="text-danger">
                                    <svg width="28" height="28" viewBox="0 0 24 24" fill="#FF0000"><path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
                                </a>
                            </div>

                            <!-- Referral Link -->
                            <div class="mb-2">
                                <div class="text-secondary text-uppercase fw-semibold mb-2" style="font-size: 11px; letter-spacing: 0.5px;">REFERRAL LINK:</div>
                                <div class="d-flex flex-column flex-md-row gap-2 align-items-center align-items-md-start">
                                    <span class="text-secondary" style="font-size: 14px;">https://herlan.com/partner</span>
                                    <button class="btn btn-dark btn-sm px-3 rounded-2" style="font-size: 12px; font-weight: 500;">Copy Link</button>
                                </div>
                            </div>
                        </div>

                        <!-- Balance Section (Desktop Only) -->
                        <div class="col-12 col-md-auto d-none d-md-block text-end">
                            <div class="d-flex gap-4">
                                <div>
                                    <div class="text-secondary text-uppercase fw-semibold mb-2" style="font-size: 10px; letter-spacing: 0.5px;">AVAILABLE BALANCE</div>
                                    <div class="fs-5 fw-semibold">৳5,000</div>
                                </div>
                                <div>
                                    <div class="text-secondary text-uppercase fw-semibold mb-2" style="font-size: 10px; letter-spacing: 0.5px;">THIS MONTH SOLD</div>
                                    <div class="fs-5 fw-semibold">৳5,0000</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Balance Section (Mobile Only) -->
            <div class="card border-0 shadow-sm rounded-3 mb-4 d-md-none">
                <div class="card-body p-3">
                    <div class="row g-3 text-center">
                        <div class="col-6">
                            <div class="text-secondary text-uppercase fw-semibold mb-2" style="font-size: 10px; letter-spacing: 0.5px;">AVAILABLE BALANCE</div>
                            <div class="fs-5 fw-semibold">৳5,000</div>
                        </div>
                        <div class="col-6">
                            <div class="text-secondary text-uppercase fw-semibold mb-2" style="font-size: 10px; letter-spacing: 0.5px;">THIS MONTH SOLD</div>
                            <div class="fs-5 fw-semibold">৳5,000</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Nav Pills Tabs -->
            <div class="mb-4 overflow-auto">
                <ul class="nav nav-pills flex-nowrap pb-2 profile-nav-pills" id="profileTabs" role="tablist">
                    <!-- Influencers Tab (Both Mobile and Desktop) -->
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active rounded-3 px-4" id="influencers-tab" data-bs-toggle="pill"
                                data-bs-target="#influencers" type="button" role="tab">Influencers</button>
                    </li>

                    <!-- Desktop Only Tabs -->
{{--                    <li class="nav-item d-none d-md-block" role="presentation">--}}
{{--                        <button class="nav-link rounded-3 px-4" id="earnings-tab" data-bs-toggle="pill"--}}
{{--                                data-bs-target="#earnings" type="button" role="tab">Your Earnings</button>--}}
{{--                    </li>--}}
                    <li class="nav-item d-none d-md-block" role="presentation">
                        <button class="nav-link rounded-3 px-4" id="edit-profile-tab" data-bs-toggle="pill"
                                data-bs-target="#edit-profile" type="button" role="tab">Edit Profile</button>
                    </li>
                    <li class="nav-item d-none d-md-block" role="presentation">
                        <button class="nav-link rounded-3 px-4" id="bank-details-tab" data-bs-toggle="pill"
                                data-bs-target="#bank-details" type="button" role="tab">Bank Details</button>
                    </li>

                    <!-- Mobile Only Tabs -->
{{--                    <li class="nav-item d-md-none" role="presentation">--}}
{{--                        <button class="nav-link rounded-3 px-4" id="earnings-mobile-tab" data-bs-toggle="pill"--}}
{{--                                data-bs-target="#earnings" type="button" role="tab">Your Earnings</button>--}}
{{--                    </li>--}}
                    <li class="nav-item d-md-none" role="presentation">
                        <button class="nav-link rounded-3 px-4" id="edit-profile-mobile-tab" data-bs-toggle="pill"
                                data-bs-target="#edit-profile" type="button" role="tab">Edit Profile</button>
                    </li>
                </ul>
            </div>

            <!-- Tab Content -->
            <div class="tab-content" id="profileTabsContent">

                <!-- Influencers Tab (Active) -->
                <div class="tab-pane fade show active" id="influencers" role="tabpanel" aria-labelledby="influencers-tab">
                    <!-- Total Influencers -->
                    <div class="mb-3">
                        <h2 class="fw-semibold mb-0" style="font-size: 15px;">Total Influencers: <span>40</span></h2>
                    </div>

                    <!-- Reward Banner -->
                    <div class="alert alert-light border-0 shadow-sm rounded-3 d-flex align-items-center mb-4 py-3" style="background-color: #ffffff;">
                        <span class="me-2" style="font-size: 20px;">🎁</span>
                        <span style="font-size: 14px;">Add more <strong>10 Influencers</strong>, and Get <strong class="text-success">৳5,000</strong> Reward</span>
                    </div>

                    <!-- Column Headers - Mobile Only -->
                    <div class="d-md-none mb-3 px-2">
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="text-secondary fw-semibold" style="font-size: 12px;">Influencers</span>
                            <span class="text-secondary fw-semibold" style="font-size: 12px;">Total Order</span>
                        </div>
                    </div>

                    <!-- Influencer List Container -->
                    <div class="influencer-list-container">
                        <!-- Header Row - Desktop Only -->
                        <div class="card border-0 shadow-sm rounded-3 d-none d-lg-block mb-0">
                            <div class="influencer-list-header">
                                <div class="influencer-col-info">Influencers</div>
                                <div class="influencer-col-data text-center">Total Order</div>
                                <div class="influencer-col-data text-center">Total Conversion</div>
                                <div class="influencer-col-data text-center">Influencer Revenue</div>
                                <div class="influencer-col-data text-center">Your Revenue</div>
                                <div class="influencer-col-action"></div>
                            </div>
                        </div>

                        <!-- Influencer Items -->
                        <div class="influencer-items">
                            <!-- Single Influencer Item -->
                            <div class="card border-0 shadow-sm rounded-3 influencer-item">
                                <div class="influencer-item-content">
                                    <!-- Influencer Info -->
                                    <div class="influencer-col-info">
                                        <div class="d-flex align-items-center gap-2 gap-md-3">
                                            <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=100&h=100&fit=crop"
                                                 alt="Sadiya A. Suchita" class="rounded-circle influencer-avatar">
                                            <div class="influencer-details">
                                                <div class="influencer-name">Sadiya A. Suchita</div>
                                                <a href="#" class="influencer-link">https://herlan.com/sadiya_a_suchita</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Total Order -->
                                    <div class="influencer-col-data">
                                        <span class="fw-semibold">125</span>
                                    </div>
                                    <!-- Total Conversion - Desktop Only -->
                                    <div class="influencer-col-data d-none d-lg-flex">
                                        <span class="fw-semibold">125000</span>
                                    </div>
                                    <!-- Influencer Revenue - Desktop Only -->
                                    <div class="influencer-col-data d-none d-lg-flex">
                                        <span class="fw-semibold">15000</span>
                                    </div>
                                    <!-- Your Revenue - Desktop Only -->
                                    <div class="influencer-col-data d-none d-lg-flex">
                                        <span class="fw-bold">5000</span>
                                    </div>
                                    <!-- Action Button - Desktop Only -->
                                    <div class="influencer-col-action d-none d-lg-flex">
                                        <button class="btn btn-dark btn-sm px-3 py-2 rounded-2" style="font-size: 12px; font-weight: 500;">View Details</button>
                                    </div>
                                </div>
                            </div>

                            <!-- Repeat for other influencers -->
                            <div class="card border-0 shadow-sm rounded-3 influencer-item">
                                <div class="influencer-item-content">
                                    <div class="influencer-col-info">
                                        <div class="d-flex align-items-center gap-2 gap-md-3">
                                            <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=100&h=100&fit=crop"
                                                 alt="Sadiya A. Suchita" class="rounded-circle influencer-avatar">
                                            <div class="influencer-details">
                                                <div class="influencer-name">Sadiya A. Suchita</div>
                                                <a href="#" class="influencer-link">https://herlan.com/sadiya_a_suchita</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="influencer-col-data"><span class="fw-semibold">125</span></div>
                                    <div class="influencer-col-data d-none d-lg-flex"><span class="fw-semibold">125000</span></div>
                                    <div class="influencer-col-data d-none d-lg-flex"><span class="fw-semibold">15000</span></div>
                                    <div class="influencer-col-data d-none d-lg-flex"><span class="fw-bold">5000</span></div>
                                    <div class="influencer-col-action d-none d-lg-flex">
                                        <button class="btn btn-dark btn-sm px-3 py-2 rounded-2" style="font-size: 12px; font-weight: 500;">View Details</button>
                                    </div>
                                </div>
                            </div>

                            <div class="card border-0 shadow-sm rounded-3 influencer-item">
                                <div class="influencer-item-content">
                                    <div class="influencer-col-info">
                                        <div class="d-flex align-items-center gap-2 gap-md-3">
                                            <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=100&h=100&fit=crop"
                                                 alt="Sadiya A. Suchita" class="rounded-circle influencer-avatar">
                                            <div class="influencer-details">
                                                <div class="influencer-name">Sadiya A. Suchita</div>
                                                <a href="#" class="influencer-link">https://herlan.com/sadiya_a_suchita</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="influencer-col-data"><span class="fw-semibold">125</span></div>
                                    <div class="influencer-col-data d-none d-lg-flex"><span class="fw-semibold">125000</span></div>
                                    <div class="influencer-col-data d-none d-lg-flex"><span class="fw-semibold">15000</span></div>
                                    <div class="influencer-col-data d-none d-lg-flex"><span class="fw-bold">5000</span></div>
                                    <div class="influencer-col-action d-none d-lg-flex">
                                        <button class="btn btn-dark btn-sm px-3 py-2 rounded-2" style="font-size: 12px; font-weight: 500;">View Details</button>
                                    </div>
                                </div>
                            </div>

                            <div class="card border-0 shadow-sm rounded-3 influencer-item">
                                <div class="influencer-item-content">
                                    <div class="influencer-col-info">
                                        <div class="d-flex align-items-center gap-2 gap-md-3">
                                            <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=100&h=100&fit=crop"
                                                 alt="Sadiya A. Suchita" class="rounded-circle influencer-avatar">
                                            <div class="influencer-details">
                                                <div class="influencer-name">Sadiya A. Suchita</div>
                                                <a href="#" class="influencer-link">https://herlan.com/sadiya_a_suchita</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="influencer-col-data"><span class="fw-semibold">125</span></div>
                                    <div class="influencer-col-data d-none d-lg-flex"><span class="fw-semibold">125000</span></div>
                                    <div class="influencer-col-data d-none d-lg-flex"><span class="fw-semibold">15000</span></div>
                                    <div class="influencer-col-data d-none d-lg-flex"><span class="fw-bold">5000</span></div>
                                    <div class="influencer-col-action d-none d-lg-flex">
                                        <button class="btn btn-dark btn-sm px-3 py-2 rounded-2" style="font-size: 12px; font-weight: 500;">View Details</button>
                                    </div>
                                </div>
                            </div>

                            <div class="card border-0 shadow-sm rounded-3 influencer-item">
                                <div class="influencer-item-content">
                                    <div class="influencer-col-info">
                                        <div class="d-flex align-items-center gap-2 gap-md-3">
                                            <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=100&h=100&fit=crop"
                                                 alt="Sadiya A. Suchita" class="rounded-circle influencer-avatar">
                                            <div class="influencer-details">
                                                <div class="influencer-name">Sadiya A. Suchita</div>
                                                <a href="#" class="influencer-link">https://herlan.com/sadiya_a_suchita</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="influencer-col-data"><span class="fw-semibold">125</span></div>
                                    <div class="influencer-col-data d-none d-lg-flex"><span class="fw-semibold">125000</span></div>
                                    <div class="influencer-col-data d-none d-lg-flex"><span class="fw-semibold">15000</span></div>
                                    <div class="influencer-col-data d-none d-lg-flex"><span class="fw-bold">5000</span></div>
                                    <div class="influencer-col-action d-none d-lg-flex">
                                        <button class="btn btn-dark btn-sm px-3 py-2 rounded-2" style="font-size: 12px; font-weight: 500;">View Details</button>
                                    </div>
                                </div>
                            </div>

                            <div class="card border-0 shadow-sm rounded-3 influencer-item">
                                <div class="influencer-item-content">
                                    <div class="influencer-col-info">
                                        <div class="d-flex align-items-center gap-2 gap-md-3">
                                            <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=100&h=100&fit=crop"
                                                 alt="Sadiya A. Suchita" class="rounded-circle influencer-avatar">
                                            <div class="influencer-details">
                                                <div class="influencer-name">Sadiya A. Suchita</div>
                                                <a href="#" class="influencer-link">https://herlan.com/sadiya_a_suchita</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="influencer-col-data"><span class="fw-semibold">125</span></div>
                                    <div class="influencer-col-data d-none d-lg-flex"><span class="fw-semibold">125000</span></div>
                                    <div class="influencer-col-data d-none d-lg-flex"><span class="fw-semibold">15000</span></div>
                                    <div class="influencer-col-data d-none d-lg-flex"><span class="fw-bold">5000</span></div>
                                    <div class="influencer-col-action d-none d-lg-flex">
                                        <button class="btn btn-dark btn-sm px-3 py-2 rounded-2" style="font-size: 12px; font-weight: 500;">View Details</button>
                                    </div>
                                </div>
                            </div>

                            <div class="card border-0 shadow-sm rounded-3 influencer-item">
                                <div class="influencer-item-content">
                                    <div class="influencer-col-info">
                                        <div class="d-flex align-items-center gap-2 gap-md-3">
                                            <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=100&h=100&fit=crop"
                                                 alt="Sadiya A. Suchita" class="rounded-circle influencer-avatar">
                                            <div class="influencer-details">
                                                <div class="influencer-name">Sadiya A. Suchita</div>
                                                <a href="#" class="influencer-link">https://herlan.com/sadiya_a_suchita</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="influencer-col-data"><span class="fw-semibold">125</span></div>
                                    <div class="influencer-col-data d-none d-lg-flex"><span class="fw-semibold">125000</span></div>
                                    <div class="influencer-col-data d-none d-lg-flex"><span class="fw-semibold">15000</span></div>
                                    <div class="influencer-col-data d-none d-lg-flex"><span class="fw-bold">5000</span></div>
                                    <div class="influencer-col-action d-none d-lg-flex">
                                        <button class="btn btn-dark btn-sm px-3 py-2 rounded-2" style="font-size: 12px; font-weight: 500;">View Details</button>
                                    </div>
                                </div>
                            </div>

                            <div class="card border-0 shadow-sm rounded-3 influencer-item">
                                <div class="influencer-item-content">
                                    <div class="influencer-col-info">
                                        <div class="d-flex align-items-center gap-2 gap-md-3">
                                            <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=100&h=100&fit=crop"
                                                 alt="Sadiya A. Suchita" class="rounded-circle influencer-avatar">
                                            <div class="influencer-details">
                                                <div class="influencer-name">Sadiya A. Suchita</div>
                                                <a href="#" class="influencer-link">https://herlan.com/sadiya_a_suchita</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="influencer-col-data"><span class="fw-semibold">125</span></div>
                                    <div class="influencer-col-data d-none d-lg-flex"><span class="fw-semibold">125000</span></div>
                                    <div class="influencer-col-data d-none d-lg-flex"><span class="fw-semibold">15000</span></div>
                                    <div class="influencer-col-data d-none d-lg-flex"><span class="fw-bold">5000</span></div>
                                    <div class="influencer-col-action d-none d-lg-flex">
                                        <button class="btn btn-dark btn-sm px-3 py-2 rounded-2" style="font-size: 12px; font-weight: 500;">View Details</button>
                                    </div>
                                </div>
                            </div>

                            <div class="card border-0 shadow-sm rounded-3 influencer-item">
                                <div class="influencer-item-content">
                                    <div class="influencer-col-info">
                                        <div class="d-flex align-items-center gap-2 gap-md-3">
                                            <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=100&h=100&fit=crop"
                                                 alt="Sadiya A. Suchita" class="rounded-circle influencer-avatar">
                                            <div class="influencer-details">
                                                <div class="influencer-name">Sadiya A. Suchita</div>
                                                <a href="#" class="influencer-link">https://herlan.com/sadiya_a_suchita</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="influencer-col-data"><span class="fw-semibold">125</span></div>
                                    <div class="influencer-col-data d-none d-lg-flex"><span class="fw-semibold">125000</span></div>
                                    <div class="influencer-col-data d-none d-lg-flex"><span class="fw-semibold">15000</span></div>
                                    <div class="influencer-col-data d-none d-lg-flex"><span class="fw-bold">5000</span></div>
                                    <div class="influencer-col-action d-none d-lg-flex">
                                        <button class="btn btn-dark btn-sm px-3 py-2 rounded-2" style="font-size: 12px; font-weight: 500;">View Details</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Pagination -->
                    <nav aria-label="Influencer list pagination" class="mt-4">
                        <ul class="pagination justify-content-center mb-0">
                            <li class="page-item">
                                <a class="page-link border-0 rounded-2 me-1" href="#" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>
                            <li class="page-item"><a class="page-link border-0 rounded-2 mx-1" href="#">1</a></li>
                            <li class="page-item"><a class="page-link border-0 rounded-2 mx-1" href="#">2</a></li>
                            <li class="page-item active"><a class="page-link border-0 rounded-2 mx-1 bg-dark" href="#">3</a></li>
                            <li class="page-item"><a class="page-link border-0 rounded-2 mx-1" href="#">4</a></li>
                            <li class="page-item"><a class="page-link border-0 rounded-2 mx-1" href="#">5</a></li>
                            <li class="page-item"><a class="page-link border-0 rounded-2 mx-1" href="#">6</a></li>
                            <li class="page-item"><a class="page-link border-0 rounded-2 mx-1" href="#">...</a></li>
                            <li class="page-item">
                                <a class="page-link border-0 rounded-2 ms-1" href="#" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>

                <!-- Your Earnings Tab -->
                <div class="tab-pane fade" id="earnings" role="tabpanel" aria-labelledby="earnings-tab">
                    <div class="card border-0 shadow-sm rounded-3">
                        <div class="card-body p-4 p-md-5">
                            <h2 class="h5 fw-semibold mb-4">Your Earnings</h2>
                            <p class="text-secondary">Earnings content will be added here.</p>
                        </div>
                    </div>
                </div>

                <!-- Edit Profile Tab -->
                <div class="tab-pane fade" id="edit-profile" role="tabpanel" aria-labelledby="edit-profile-tab">
                    <div class="card border-0 shadow-sm rounded-3">
                        <div class="card-body p-4 p-md-5">
                            <h2 class="h5 fw-semibold mb-4">Upload Your Profile Picture</h2>

                            <!-- Profile Picture Upload -->
                            <div class="d-flex flex-column align-items-start mb-4">
                                <div class="bg-light rounded-3 d-flex align-items-center justify-content-center mb-3 upload-box">
                                    <svg class="upload-icon" viewBox="0 0 140 140" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="70" cy="45" r="25" fill="#5DADE2"/>
                                        <path d="M30 110 C30 85, 45 75, 70 75 C95 75, 110 85, 110 110 Z" fill="#5DADE2"/>
                                    </svg>
                                </div>
                                <button class="btn btn-outline-dark rounded-pill upload-btn">Upload</button>
                            </div>

                            <!-- Name Input -->
                            <div class="mb-4">
                                <label class="form-label fw-semibold">Name</label>
                                <input type="text" class="form-control form-control-lg rounded-3 profile-input">
                            </div>

                            <!-- Bio Textarea -->
                            <div class="mb-4">
                                <label class="form-label fw-semibold">Bio</label>
                                <textarea class="form-control form-control-lg rounded-3 profile-textarea" rows="3"></textarea>
                            </div>

                            <!-- Submit Button -->
                            <button class="btn btn-dark rounded-pill px-5 py-3">Save changes</button>
                        </div>
                    </div>
                </div>

                <!-- Bank Details Tab (Desktop Only) -->
                <div class="tab-pane fade" id="bank-details" role="tabpanel" aria-labelledby="bank-details-tab">
{{--                    <div class="card border-0 shadow-sm rounded-3">--}}
{{--                        <div class="card-body p-4 p-md-5">--}}
{{--                            <h2 class="h5 fw-semibold mb-4">Bank Details</h2>--}}
{{--                            <p class="text-secondary">Bank details content will be added here.</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}

                    <div class="bg-white rounded-4 p-4 bank-details-content">
                        <form action="" method="POST" enctype="multipart/form-data" id="influencerBankDetailsForm">
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

        </div>
    </section>

@endsection

<!-- Profile Header Section -->
<div class="influencer-profile-header mb-4">
    <div class="row g-4 align-items-center">
        <div class="col-md-7">
            <div class="d-flex flex-column flex-md-row align-items-center align-items-md-start gap-3">
                <img src="{{ asset(auth()->user()->profile_image ?? 'frontend/images/home/sry.png') }}" alt="Profile Picture" class="influencer-profile-img">
                <div class="text-center text-md-start">
                    <h5 class="fw-bold mb-1">{{ auth()->user()->name ?? 'Influencer Name' }}</h5>
                    <p class="text-muted small mb-2">MODEL & INFLUENCER</p>
                    <div class="d-flex justify-content-center justify-content-md-start gap-2 mb-3">
                        <a href="https://www.tiktok.com/{{ "@".$loggedUser->tiktalk_profile_link ?? '' }}" target="_blank" class="influencer-social-icon"><i class="bi bi-tiktok"></i></a>
                        <a href="https://www.facebook.com/{{ $loggedUser->fb_profile_link ?? '' }}" class="influencer-social-icon"><i class="bi bi-facebook"></i></a>
                        <a href="https://www.instagram.com/{{ $loggedUser->insta_profile_link ?? '' }}" class="influencer-social-icon"><i class="bi bi-instagram"></i></a>
                        <a href="https://www.youtube.com/{{ "@".$loggedUser->youtube_profile_link ?? '' }}" class="influencer-social-icon"><i class="bi bi-youtube"></i></a>
                    </div>
                    <div class="influencer-referral-link">
                        <p class="small fw-semibold mb-1">REFERRAL LINK:</p>
                        <div class="d-flex flex-column flex-sm-row align-items-sm-center justify-content-center justify-content-md-start gap-2">
                            <span class="small text-muted ref-link-url">https://herlan.com/sadiy</span>
                            <button class="btn btn-dark btn-sm rounded-pill px-3 py-1">Copy Link</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-5">
            <div class="d-flex justify-content-center justify-content-lg-end">
                <div class="influencer-rank-card bg-white rounded-3 p-3">
                    <div class="d-flex align-items-center gap-3">
                        <img src="{{ asset('/') }}frontend/images/home/gold-badge.png" alt="Silver Badge" class="influencer-badge-img">
                        <div>
                            <p class="small text-muted mb-0">RANK</p>
                            <h5 class="fw-bold mb-2">Silver</h5>
                            <div class="row g-3">
                                <div class="col-6">
                                    <p class="small text-muted mb-0">AVAILABLE BALANCE</p>
                                    <p class="fw-bold mb-0">&#x9F3;,15,000</p>
                                </div>
                                <div class="col-6">
                                    <p class="small text-muted mb-0">THIS MONTH SOLD</p>
                                    <p class="fw-bold mb-0">50 Products</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Tab Navigation -->
<ul class="nav  influencer-nav-tabs mb-4 d-flex flex-nowrap overflow-auto" role="tablist">
    <li class="nav-item " role="presentation">
        <a class="nav-link {{ request()->is('influencer/dashboard') ? 'active' : '' }}" id="influencer-earnings-tab" href="{{ route('influencer.dashboard') }}"  >Your Earnings</a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link  {{ request()->is('influencer/albums') ? 'active' : '' }}" id="influencer-albums-tab" href="{{ route('influencer.albums') }}"  >Albums</a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link {{ request()->is('influencer/profile') ? 'active' : '' }}" id="influencer-edit-profile-tab" href="{{ route('influencer.profile')}}" >Edit Profile</a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link {{ request()->is('influencer/bank-info') ? 'active' : '' }}" id="influencer-bank-details-tab" href="{{ route('influencer.bank-info')}}" >Bank Details</a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link {{ request()->is('influencer/sell-history') ? 'active' : '' }}" id="influencer-sales-history-tab" href="{{ route('influencer.sell-history')}}" >Sales History</a>
    </li>
</ul>

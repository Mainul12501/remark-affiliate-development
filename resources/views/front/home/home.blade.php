@extends('front.master')

@section('title', 'Home')

@section('body')

    <!-- Hero -->
    <section class="py-5">
        <div class="container">
            <div class="row g-4 justify-content-center">
                <!--            <div class="col-6 col-md-2 hero-img"><img src="{{ asset('frontend') }}/images/home/09.png" alt=""></div>-->
                <!--            <div class="col-6 col-md-2 hero-img"><img src="{{ asset('frontend') }}/images/home/Cream-(8).jpg" alt=""></div>-->
                <!--            <div class="col-6 col-md-2 hero-img"><img src="{{ asset('frontend') }}/images/home/sry.png" alt=""></div>-->
                <!--            <div class="col-6 col-md-2 hero-img"><img src="{{ asset('frontend') }}/images/home/NIOR%20-%20Honey%20Hydration%20Body%20Lotion%20(1).png" alt=""></div>-->
                <!--            <div class="col-6 col-md-2 hero-img"><img src="{{ asset('frontend') }}/images/home/Sunscreen%20(1).png" alt=""></div>-->
                <div class="col-12" ><img src="{{ asset('frontend/images/home/Group%201231.png') }}" alt="banner" class="img-fluid"></div>
            </div>

            <div class="text-center mt-5">
                <h1 class="fw-bold">Become an Affiliate</h1>
                @if(!auth()->check())
                    <div class="d-flex justify-content-center gap-3 mt-4 flex-wrap">
                        <span class="m-t-11">Join as a</span>
                        <select  class="form-select w-auto rounded-pill join-user-type" >
                            <option value="influencer">Influencer</option>
                            <option value="partner">Partner</option>
                        </select>
                        <button class="btn btn-red join-user-btn" style=" max-height: 50px;">Join</button>
                    </div>
                @endif
                <div class="mt-3">
                    <a href="{{ route('front.benefits', ['type' => 'influencer']) }}" class="btn btn-outline-black btn-outline-dark">View Benefits & Earnings</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Dashboard Preview -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-xl-10">
                    <div class="row g-4">
                        <!-- Left Column - Profile & Withdrawal -->
                        <div class="col-lg-4">
                            <!-- Profile Card -->
                            <div class="dashboard-profile-card card bg-white border-0 mb-4 position-relative">
                                <div class="dashboard-profile-img-wrapper">
                                    <img src="{{ asset('frontend/images/home/NIOR%20-%20Honey%20Hydration%20Body%20Lotion%20(1).png') }}" class="dashboard-profile-img" alt="Profile">
                                    <!-- Gold Badge -->
                                    <div class="dashboard-badge-wrapper">
                                        <img src="{{ asset('frontend/images/home/gold-badge.png') }}" alt="Gold Badge" class="dashboard-gold-badge">
                                    </div>
                                </div>
                                <div class="dashboard-profile-info">
                                    <h5 class="dashboard-profile-name">Sadia A. Suchita</h5>
                                    <p class="dashboard-profile-role">Model & Influencer</p>
                                </div>
                            </div>

                            <!-- Last Withdrawal Card -->
                            <div class="dashboard-withdrawal-card">
                                <div class="dashboard-withdrawal-inner">
                                    <h6 class="dashboard-withdrawal-title">LAST WITHDRAWAL</h6>
                                    <div class="dashboard-withdrawal-content">
                                        <p class="dashboard-withdrawal-label">Withdrawal Balance</p>
                                        <h2 class="dashboard-withdrawal-amount">৳25,000</h2>
                                        <div class="dashboard-withdrawal-details">
                                            <span class="dashboard-transfer-badge">By Bank Transfer</span>
                                            <p class="dashboard-date-label">Transaction Date:</p>
                                            <p class="dashboard-date-value">25-08-2025 | 4:03 PM</p>
                                            <p class="dashboard-remaining">Remaining Balance: ৳25,000</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Right Column - Balance & Products -->
                        <div class="col-lg-8">
                            <!-- Balance Card -->
                            <div class="dashboard-balance-card card bg-white border-0">
                                <div class="dashboard-balance-header">
                                    <h5 class="dashboard-balance-title">Available Balance</h5>
                                    <div class="row align-items-center">
                                        <div class="col-md-4">
                                            <h1 class="dashboard-main-balance">৳50,000</h1>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="row g-3">
                                                <div class="col-6">
                                                    <p class="dashboard-stat-label">TOTAL CONVERSION</p>
                                                    <h5 class="dashboard-stat-value">৳10,00,000</h5>
                                                </div>
                                                <div class="col-6">
                                                    <p class="dashboard-stat-label">TOTAL EARNING</p>
                                                    <h5 class="dashboard-stat-value">৳50,000</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Product List -->
                                <div class="dashboard-product-list">
                                    <!-- Product Item 1 -->
                                    <div class="dashboard-product-item">
                                        <div class="dashboard-product-img-wrapper">
                                            <img src="{{ asset('frontend/images/home/sry.png') }}" class="dashboard-product-img" alt="Product">
                                        </div>
                                        <div class="dashboard-product-details">
                                            <p class="dashboard-product-price">NIOR ৳400</p>
                                            <p class="dashboard-product-code">BLAZE-O-40%</p>
                                            <p class="dashboard-product-name">Purple Purifying Face Wash</p>
                                            <p class="dashboard-product-name">Cucumber Quench</p>
                                            <p class="dashboard-product-weight">Net Weight: 250ml</p>
                                        </div>
                                        <div class="dashboard-product-chart">
                                            <div id="chart-1" style="height:50px; width:100%;"></div>
                                        </div>
                                        <div class="dashboard-product-stats">
                                            <p class="dashboard-stat-line"><span class="dashboard-stat-key">Quantity:</span> <span class="dashboard-stat-val">8</span></p>
                                            <p class="dashboard-stat-line"><span class="dashboard-stat-key">Total Sales:</span> <span class="dashboard-stat-val">৳3,600</span></p>
                                            <p class="dashboard-stat-line"><span class="dashboard-stat-key">Earning:</span> <span class="dashboard-stat-val">৳400</span></p>
                                            <p class="dashboard-reward-text">[Reward 10%]</p>
                                        </div>
                                    </div>

                                    <!-- Product Item 2 -->
                                    <div class="dashboard-product-item">
                                        <div class="dashboard-product-img-wrapper">
                                            <img src="{{ asset('frontend/images/home/sry.png') }}" class="dashboard-product-img" alt="Product">
                                        </div>
                                        <div class="dashboard-product-details">
                                            <p class="dashboard-product-price">NIOR ৳400</p>
                                            <p class="dashboard-product-code">BLAZE-O-40%</p>
                                            <p class="dashboard-product-name">Purple Purifying Face Wash</p>
                                            <p class="dashboard-product-name">Cucumber Quench</p>
                                            <p class="dashboard-product-weight">Net Weight: 350ml</p>
                                        </div>
                                        <div class="dashboard-product-chart">
                                            <div id="chart-2" style="height:50px; width:100%;"></div>
                                        </div>
                                        <div class="dashboard-product-stats">
                                            <p class="dashboard-stat-line"><span class="dashboard-stat-key">Quantity:</span> <span class="dashboard-stat-val">8</span></p>
                                            <p class="dashboard-stat-line"><span class="dashboard-stat-key">Total Sales:</span> <span class="dashboard-stat-val">৳3,600</span></p>
                                            <p class="dashboard-stat-line"><span class="dashboard-stat-key">Earning:</span> <span class="dashboard-stat-val">৳400</span></p>
                                            <p class="dashboard-reward-text">[Reward 10%]</p>
                                        </div>
                                    </div>

                                    <!-- Product Item 3 -->
                                    <div class="dashboard-product-item">
                                        <div class="dashboard-product-img-wrapper">
                                            <img src="{{ asset('frontend/images/home/sry.png') }}" class="dashboard-product-img" alt="Product">
                                        </div>
                                        <div class="dashboard-product-details">
                                            <p class="dashboard-product-price">NIOR ৳400</p>
                                            <p class="dashboard-product-code">BLAZE-O-40%</p>
                                            <p class="dashboard-product-name">Purple Purifying Face Wash</p>
                                            <p class="dashboard-product-name">Cucumber Quench</p>
                                            <p class="dashboard-product-weight">Net Weight: 250ml</p>
                                        </div>
                                        <div class="dashboard-product-chart">
                                            <div id="chart-3" style="height:50px; width:100%;"></div>
                                        </div>
                                        <div class="dashboard-product-stats">
                                            <p class="dashboard-stat-line"><span class="dashboard-stat-key">Quantity:</span> <span class="dashboard-stat-val">8</span></p>
                                            <p class="dashboard-stat-line"><span class="dashboard-stat-key">Total Sales:</span> <span class="dashboard-stat-val">৳3,600</span></p>
                                            <p class="dashboard-stat-line"><span class="dashboard-stat-key">Earning:</span> <span class="dashboard-stat-val">৳400</span></p>
                                            <p class="dashboard-reward-text">[Reward 10%]</p>
                                        </div>
                                    </div>

                                    <!-- Product Item 4 -->
                                    <div class="dashboard-product-item">
                                        <div class="dashboard-product-img-wrapper">
                                            <img src="{{ asset('frontend') }}/images/home/sry.png" class="dashboard-product-img" alt="Product">
                                        </div>
                                        <div class="dashboard-product-details">
                                            <p class="dashboard-product-price">NIOR ৳400</p>
                                            <p class="dashboard-product-code">BLAZE-O-40%</p>
                                            <p class="dashboard-product-name">Purple Purifying Face Wash</p>
                                            <p class="dashboard-product-name">Cucumber Quench</p>
                                            <p class="dashboard-product-weight">Net Weight: 250ml</p>
                                        </div>
                                        <div class="dashboard-product-chart">
                                            <div id="chart-4" style="height:50px; width:100%;"></div>
                                        </div>
                                        <div class="dashboard-product-stats">
                                            <p class="dashboard-stat-line"><span class="dashboard-stat-key">Quantity:</span> <span class="dashboard-stat-val">8</span></p>
                                            <p class="dashboard-stat-line"><span class="dashboard-stat-key">Total Sales:</span> <span class="dashboard-stat-val">৳3,600</span></p>
                                            <p class="dashboard-stat-line"><span class="dashboard-stat-key">Earning:</span> <span class="dashboard-stat-val">৳400</span></p>
                                            <p class="dashboard-reward-text">[Reward 10%]</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Steps -->
    <section class="py-5 bg-light">
        <div class="container px-5">
            <div class="row">
                <div class="col-md-10 mx-auto">
                    <h2 class="text-center fw-bold mb-4">Earn in easy 3 steps</h2>
                    <div class="row g-4">
                        <div class="col-md-4">
                            <div class="step-card text-center">
                                <div class="home-easy-steps-number-box mb-3 mx-auto"><span class="text-white " style="">1</span></div>
                                <div><img src="{{ asset('frontend') }}/images/home/sign-up-desktop-user.svg" alt="sign-up-icon"></div>
                                <h5 class="mt-3 text-muted">Sign Up</h5>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="step-card text-center">
                                <div class="home-easy-steps-number-box mb-3 mx-auto"><span class="text-white " style="">2</span></div>
                                <div><img src="{{ asset('frontend') }}/images/home/share.svg" alt="share-icon"></div>
                                <h5 class="mt-3 text-muted">Share</h5>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="step-card text-center">
                                <div class="home-easy-steps-number-box mb-3 mx-auto"><span class="text-white " style="">3</span></div>
                                <div><img src="{{ asset('frontend') }}/images/home/money-bag.svg" alt="earn-icon"></div>
                                <h5 class="mt-3 text-muted">Earn</h5>
                            </div>
                        </div>
                    </div>
                    <div class="text-center mt-4 d-md-none">
                        <a class="btn btn-red btn-danger mt-2">Sign Up Today</a>
                        <a class="btn btn-outline-black btn-outline-dark ms-2 mt-2">View Benefits & Earnings</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Pricing Table -->
    <section class="py-5 bg-light">
        <div class="container px-5">
            <div class="row">
                <div class="col-md-10 mx-auto">
                    <h2 class="text-center fw-bold mb-4">Associate margin from pricing</h2>
                    <div class="my-4 py-5 text-center">
                        <span class="fw-bold pb-2 mx-2 home-price-active-btn active" id="influencerBenifitCardBtn" style="">Influencer Benefits</span>
                        <span class="fw-bold pb-2 mx-2 home-price-active-btn" id="partnerBenifitCardBtn" style="">Partner Benefits</span>

                    </div>
                    <div id="influencerRates">
                        <div class="card card-soft p-4">
                            <table class="table align-middle">
                                <thead>
                                <tr><th>Categories</th><th class="text-end">Benefits (%)</th></tr>
                                </thead>
                                <tbody>
                                <tr><td>Color Cosmetics</td><td class="text-end">10% – 12%</td></tr>
                                <tr><td>Skin Care</td><td class="text-end">8% – 12%</td></tr>
                                <tr><td>Hair Care</td><td class="text-end">8% – 10%</td></tr>
                                <tr><td>Personal Care</td><td class="text-end">8% – 12%</td></tr>
                                <tr><td>Accessories</td><td class="text-end">10%</td></tr>
                                </tbody>
                            </table>
                            <div class="text-center"><a href="{{ route('front.benefits', ['type' => 'influencer']) }}" class="btn btn-outline-black btn-outline-dark">View Details</a></div>
                        </div>
                    </div>
                    <div id="agentRates" class="d-none">
                        <div class="card card-soft p-4">
                            <table class="table align-middle">
                                <thead>
                                <tr><th> Categories</th><th class="text-end">Benefits (%)</th></tr>
                                </thead>
                                <tbody>
                                <tr><td>Color Cosmetics</td><td class="text-end">10% – 12%</td></tr>
                                <tr><td>Skin Care</td><td class="text-end">8% – 12%</td></tr>
                                <tr><td>Hair Care</td><td class="text-end">8% – 10%</td></tr>
                                <tr><td>Personal Care</td><td class="text-end">8% – 12%</td></tr>
                                <tr><td>Accessories</td><td class="text-end">10%</td></tr>
                                </tbody>
                            </table>
                            <div class="text-center"><a href="{{ route('front.benefits', ['type' => 'partner']) }}" class="btn btn-outline-black btn-outline-dark">View Details</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('style')
    <style>
        .product-img-box img {
            max-height: 60px;
            object-fit: contain;
        }
    </style>
@endpush

@push('script')
    <script>
        $(document).on('click', '.join-user-btn', function () {
            let userType = $('.join-user-type').val();
            if (userType == 'influencer')
                window.location.href = "{{ route('auth.influencer-register') }}";
            else if (userType == 'partner')
                window.location.href = "{{ route('auth.partner-register') }}";
            else
                window.location.href = "{{ route('home') }}";
        })

        function renderMiniChart(container, data) {
            Highcharts.chart(container, {
                chart: {
                    type: 'areaspline',
                    backgroundColor: 'transparent',
                    height: 45,
                    margin: [2, 0, 2, 0]
                },
                title: { text: null },
                credits: { enabled: false },
                legend: { enabled: false },
                tooltip: { enabled: false },
                xAxis: {
                    visible: false
                },
                yAxis: {
                    visible: false
                },
                plotOptions: {
                    series: {
                        lineWidth: 2,
                        marker: { enabled: false },
                        fillOpacity: 0.3
                    }
                },
                series: [{
                    data: data,
                    color: '#22c55e' // Tailwind green-500 (matches your design)
                }]
            });
        }

        // Render charts
        renderMiniChart('chart-1', [5, 7, 6, 8, 9, 10, 8, 9, 11, 12]);
        renderMiniChart('chart-2', [3, 4, 5, 6, 7, 6, 8, 9, 8, 10]);
        renderMiniChart('chart-3', [4, 6, 5, 7, 8, 9, 7, 8, 9, 11]);
        renderMiniChart('chart-4', [6, 5, 6, 7, 8, 7, 9, 10, 9, 11]);
    </script>
@endpush

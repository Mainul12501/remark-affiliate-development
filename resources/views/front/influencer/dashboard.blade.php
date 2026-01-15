@extends('front.master')

@section('title', 'Dashboard')

@section('body')

    <!-- Main Content -->
    <div class="influencer-profile-main">
        <div class="container-fluid px-md-4 px-3 py-4 influencer-profile-shell">

            @include('front.influencer.includes.dashboard-common-sections')

            <!-- Tab Contents -->

            <div class="ye-wrapper">
                <!-- Tax Banner -->
                <div class="ye-tax-banner bg-white rounded-3 p-3 mb-3 d-flex align-items-center gap-2">
                    <i class="bi bi-receipt-cutoff"></i>
                    <span>Applicable Tax: <span class="text-danger fw-semibold">7.5%</span>, <a href="#" class="text-dark fw-semibold">Submit TIN</a> and reduce <span class="text-success fw-semibold">2.5%</span></span>
                </div>

                <!-- Earning Summary Panel -->
                <div class="ye-summary-panel bg-white rounded-3 p-3 p-md-4 mb-3">




                    <!-- Filters Row - Desktop -->
                    <div class="row g-3 align-items-end">
                        <div class=" col-lg-7">

                            <!-- Download Statement -->
                            <div class="ye-download mb-3">
                                <button class="btn btn-link text-dark text-decoration-none p-0 d-flex align-items-center gap-2">
                                    <span>Download Your Earning Statement</span>
                                    <i class="bi bi-download"></i>
                                </button>
                            </div>

                            <!-- Earning Summary Title -->
                            <div class="d-flex align-items-center gap-2 mb-3">
                                <h6 class="ye-title fw-semibold mb-0">Earning Summery</h6>
                                <span class="ye-privacy-badge">
                                        <i class="bi bi-lock-fill"></i>
                                        Privacy Protected
                                    </span>
                            </div>

                            <div class="d-flex flex-wrap align-items-center gap-2">
                                <div class="ye-date-field position-relative">
                                    <input type="text" class="form-control ye-date-input" value="1 Jan, 2024" readonly>
                                    <i class="bi bi-calendar3 ye-calendar-icon"></i>
                                </div>
                                <span class="ye-date-to d-none d-md-inline">To</span>
                                <div class="ye-date-field position-relative">
                                    <input type="text" class="form-control ye-date-input" placeholder="Select date" readonly>
                                    <i class="bi bi-calendar3 ye-calendar-icon"></i>
                                </div>
                                <button class="btn btn-dark ye-filter-btn">Filter</button>
                            </div>
                        </div>
                        <div class=" col-lg-5">
                            <!-- Available Balance Card -->
                            <div class="" style="border-radius: 15px; background-color: #00B469;">
                                <h3 class="text-white border-bottom f-s-16 mb-0 py-2 px-2" style="font-size: 16px;">Available Balance</h3>
                                <div class="row px-2">
                                    <div class="col-4 border-end border-white">
                                        <div class="py-2">
                                            <h3 class="earnings-balance-amount me-2 py-2 text-white" style="font-size: 26px;">৳50,000</h3>
                                        </div>
                                    </div>
                                    <div class="col-4 border-end border-white">
                                        <div class="">
                                            <span class="earnings-stat-label-inline text-white f-s-11">TOTAL CONVERSION</span>
                                            <br>
                                            <span class="earnings-stat-value-inline text-white f-s-16">৳10,00,000</span>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="">
                                            <span class="earnings-stat-label-inline text-white f-s-11">TOTAL EARNING</span>
                                            <br>
                                            <span class="earnings-stat-value-inline text-white f-s-16">৳50,00,000</span>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>

                <!-- Main Chart Section - Desktop Only -->
                <div class="ye-chart-panel bg-white rounded-3 p-3 mb-4 d-none d-md-block">
                    <div id="earningsMainChart" class="ye-main-chart"></div>
                </div>

                <!-- Individual Product Earnings -->
                <div class="ye-products-section">
                    <h6 class="ye-products-title fw-semibold mb-3">Individual Product Earnings:</h6>

                    <!-- Product Card 1 -->
                    <div class="ye-product-card bg-white rounded-3 p-3 mb-3">
                        <div class="row g-3 align-items-center">
                            <div class="col-12 col-md-3">
                                <div class="d-flex align-items-center gap-3">
                                    <img src="{{ asset('/') }}frontend/images/influencer/botol.png" alt="Product" class="ye-product-img">
                                    <div class="ye-product-info">
                                        <p class="ye-product-price mb-1"><span class="text-decoration-line-through text-muted">৳500</span> <strong>৳450</strong></p>
                                        <p class="ye-product-brand mb-1">BLAZE O' SKIN</p>
                                        <h6 class="ye-product-name mb-1">Pimple Purifying Face Wash Cucumber Quench</h6>
                                        <p class="ye-product-weight mb-0">Net Weight: 250ml</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5 d-none d-md-block">
                                <div id="productChart1" class="ye-product-chart"></div>
                            </div>
                            <div class="col-md-4 d-none d-md-block">
                                <div class="row text-center">
                                    <div class="col-4">
                                        <p class="ye-metric-label mb-1">Quantity</p>
                                        <p class="ye-metric-value mb-0">8</p>
                                    </div>
                                    <div class="col-4">
                                        <p class="ye-metric-label mb-1">Total Conversion</p>
                                        <p class="ye-metric-value mb-0">৳3,600</p>
                                    </div>
                                    <div class="col-4">
                                        <p class="ye-metric-label mb-1">Revenue</p>
                                        <p class="ye-metric-value mb-0 fw-bold">Tk 400</p>
                                        <p class="ye-metric-reward mb-0">(Reward 10%)</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Product Card 2 -->
                    <div class="ye-product-card bg-white rounded-3 p-3 mb-3">
                        <div class="row g-3 align-items-center">
                            <div class="col-12 col-md-3">
                                <div class="d-flex align-items-center gap-3">
                                    <img src="{{ asset('/') }}frontend/images/influencer/botol.png" alt="Product" class="ye-product-img">
                                    <div class="ye-product-info">
                                        <p class="ye-product-price mb-1"><span class="text-decoration-line-through text-muted">৳500</span> <strong>৳450</strong></p>
                                        <p class="ye-product-brand mb-1">BLAZE O' SKIN</p>
                                        <h6 class="ye-product-name mb-1">Pimple Purifying Face Wash Cucumber Quench</h6>
                                        <p class="ye-product-weight mb-0">Net Weight: 250ml</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5 d-none d-md-block">
                                <div id="productChart2" class="ye-product-chart"></div>
                            </div>
                            <div class="col-md-4 d-none d-md-block">
                                <div class="row text-center">
                                    <div class="col-4">
                                        <p class="ye-metric-label mb-1">Quantity</p>
                                        <p class="ye-metric-value mb-0">8</p>
                                    </div>
                                    <div class="col-4">
                                        <p class="ye-metric-label mb-1">Total Conversion</p>
                                        <p class="ye-metric-value mb-0">৳3,600</p>
                                    </div>
                                    <div class="col-4">
                                        <p class="ye-metric-label mb-1">Revenue</p>
                                        <p class="ye-metric-value mb-0 fw-bold">Tk 400</p>
                                        <p class="ye-metric-reward mb-0">(Reward 10%)</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Product Card 3 -->
                    <div class="ye-product-card bg-white rounded-3 p-3 mb-3">
                        <div class="row g-3 align-items-center">
                            <div class="col-12 col-md-3">
                                <div class="d-flex align-items-center gap-3">
                                    <img src="{{ asset('/') }}frontend/images/influencer/botol.png" alt="Product" class="ye-product-img">
                                    <div class="ye-product-info">
                                        <p class="ye-product-price mb-1"><span class="text-decoration-line-through text-muted">৳500</span> <strong>৳450</strong></p>
                                        <p class="ye-product-brand mb-1">BLAZE O' SKIN</p>
                                        <h6 class="ye-product-name mb-1">Pimple Purifying Face Wash Cucumber Quench</h6>
                                        <p class="ye-product-weight mb-0">Net Weight: 250ml</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5 d-none d-md-block">
                                <div id="productChart3" class="ye-product-chart"></div>
                            </div>
                            <div class="col-md-4 d-none d-md-block">
                                <div class="row text-center">
                                    <div class="col-4">
                                        <p class="ye-metric-label mb-1">Quantity</p>
                                        <p class="ye-metric-value mb-0">8</p>
                                    </div>
                                    <div class="col-4">
                                        <p class="ye-metric-label mb-1">Total Conversion</p>
                                        <p class="ye-metric-value mb-0">৳3,600</p>
                                    </div>
                                    <div class="col-4">
                                        <p class="ye-metric-label mb-1">Revenue</p>
                                        <p class="ye-metric-value mb-0 fw-bold">Tk 400</p>
                                        <p class="ye-metric-reward mb-0">(Reward 10%)</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Product Card 4 -->
                    <div class="ye-product-card bg-white rounded-3 p-3 mb-3">
                        <div class="row g-3 align-items-center">
                            <div class="col-12 col-md-3">
                                <div class="d-flex align-items-center gap-3">
                                    <img src="{{ asset('/') }}frontend/images/influencer/botol.png" alt="Product" class="ye-product-img">
                                    <div class="ye-product-info">
                                        <p class="ye-product-price mb-1"><span class="text-decoration-line-through text-muted">৳500</span> <strong>৳450</strong></p>
                                        <p class="ye-product-brand mb-1">BLAZE O' SKIN</p>
                                        <h6 class="ye-product-name mb-1">Pimple Purifying Face Wash Cucumber Quench</h6>
                                        <p class="ye-product-weight mb-0">Net Weight: 250ml</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5 d-none d-md-block">
                                <div id="productChart4" class="ye-product-chart"></div>
                            </div>
                            <div class="col-md-4 d-none d-md-block">
                                <div class="row text-center">
                                    <div class="col-4">
                                        <p class="ye-metric-label mb-1">Quantity</p>
                                        <p class="ye-metric-value mb-0">8</p>
                                    </div>
                                    <div class="col-4">
                                        <p class="ye-metric-label mb-1">Total Conversion</p>
                                        <p class="ye-metric-value mb-0">৳3,600</p>
                                    </div>
                                    <div class="col-4">
                                        <p class="ye-metric-label mb-1">Revenue</p>
                                        <p class="ye-metric-value mb-0 fw-bold">Tk 400</p>
                                        <p class="ye-metric-reward mb-0">(Reward 10%)</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Product Card 5 -->
                    <div class="ye-product-card bg-white rounded-3 p-3 mb-3">
                        <div class="row g-3 align-items-center">
                            <div class="col-12 col-md-3">
                                <div class="d-flex align-items-center gap-3">
                                    <img src="{{ asset('/') }}frontend/images/influencer/botol.png" alt="Product" class="ye-product-img">
                                    <div class="ye-product-info">
                                        <p class="ye-product-price mb-1"><span class="text-decoration-line-through text-muted">৳500</span> <strong>৳450</strong></p>
                                        <p class="ye-product-brand mb-1">BLAZE O' SKIN</p>
                                        <h6 class="ye-product-name mb-1">Pimple Purifying Face Wash Cucumber Quench</h6>
                                        <p class="ye-product-weight mb-0">Net Weight: 250ml</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5 d-none d-md-block">
                                <div id="productChart5" class="ye-product-chart"></div>
                            </div>
                            <div class="col-md-4 d-none d-md-block">
                                <div class="row text-center">
                                    <div class="col-4">
                                        <p class="ye-metric-label mb-1">Quantity</p>
                                        <p class="ye-metric-value mb-0">8</p>
                                    </div>
                                    <div class="col-4">
                                        <p class="ye-metric-label mb-1">Total Conversion</p>
                                        <p class="ye-metric-value mb-0">৳3,600</p>
                                    </div>
                                    <div class="col-4">
                                        <p class="ye-metric-label mb-1">Revenue</p>
                                        <p class="ye-metric-value mb-0 fw-bold">Tk 400</p>
                                        <p class="ye-metric-reward mb-0">(Reward 10%)</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Pagination -->
                    <nav class="ye-pagination mt-4" aria-label="Pagination">
                        <ul class="pagination justify-content-center mb-0">
                            <li class="page-item">
                                <a class="page-link ye-page-link" href="#"><i class="bi bi-chevron-left"></i></a>
                            </li>
                            <li class="page-item"><a class="page-link ye-page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link ye-page-link" href="#">2</a></li>
                            <li class="page-item active"><a class="page-link ye-page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link ye-page-link" href="#">4</a></li>
                            <li class="page-item"><a class="page-link ye-page-link" href="#">5</a></li>
                            <li class="page-item"><a class="page-link ye-page-link" href="#">6</a></li>
                            <li class="page-item"><a class="page-link ye-page-link" href="#">7</a></li>
                            <li class="page-item"><a class="page-link ye-page-link" href="#">...</a></li>
                            <li class="page-item">
                                <a class="page-link ye-page-link" href="#"><i class="bi bi-chevron-right"></i></a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>



@endsection



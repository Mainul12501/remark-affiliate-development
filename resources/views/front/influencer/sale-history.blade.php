@extends('front.master')

@section('title', 'Sale History')

@section('body')

    <!-- Main Content -->
    <div class="influencer-profile-main">
        <div class="container-fluid px-md-4 px-3 py-4 influencer-profile-shell">

            @include('front.influencer.includes.dashboard-common-sections')

            <div class="sales-history-content">
                <!-- Tax Information Banner -->
                <div class="sales-tax-banner bg-white rounded-3 p-3 mb-4">
                    <div class="d-flex align-items-center gap-2">
                        <i class="bi bi-receipt-cutoff"></i>
                        <p class="mb-0 sales-tax-text">
                            Applicable Tax: <span class="sales-tax-red">7.5%</span>,
                            <a href="#" class="sales-tax-link">Submit TIN</a>
                            and reduce <span class="sales-tax-green">2.5%</span>
                        </p>
                    </div>
                </div>

                <!-- Filter Section -->
                <div class="sales-filter-section bg-white rounded-3 p-3 mb-4">
                    <div class="row g-3 align-items-end">
                        <div class="col-md-4 col-6">
                            <div class="sales-date-input-wrapper position-relative">
                                <input type="date" class="form-control sales-date-input" value="2024-01-01">
                                <i class="bi bi-calendar3 sales-calendar-icon"></i>
                            </div>
                        </div>
                        <div class="col-md-1 col-12 d-none d-md-block text-center">
                            <span class="sales-date-separator">To</span>
                        </div>
                        <div class="col-md-4 col-6">
                            <div class="sales-date-input-wrapper position-relative">
                                <input type="date" class="form-control sales-date-input" value="2024-01-01">
                                <i class="bi bi-calendar3 sales-calendar-icon"></i>
                            </div>
                        </div>
                        <div class="col-md-3 col-12">
                            <button class="btn btn-dark sales-filter-btn w-100">Filter</button>
                        </div>
                    </div>
                </div>

                <!-- Sales Table -->
                <div class="sales-table-wrapper bg-white rounded-3">
                    <div class="table-responsive">
                        <table class="table sales-history-table mb-0">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Order Report</th>
                                <th>is connected</th>
                                <th class="d-none d-lg-table-cell">Affiliate</th>
                                <th class="d-none d-lg-table-cell">key</th>
                                <th class="d-none d-lg-table-cell">Invoice Number</th>
                                <th class="d-none d-lg-table-cell">Date</th>
                                <th class="d-none d-lg-table-cell">Commission</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>Name Here</td>
                                <td>Order Report</td>
                                <td>connected</td>
                                <td class="d-none d-lg-table-cell">Affiliate</td>
                                <td class="d-none d-lg-table-cell">123457</td>
                                <td class="d-none d-lg-table-cell">123457</td>
                                <td class="d-none d-lg-table-cell">12 Apr 2025</td>
                                <td class="d-none d-lg-table-cell">54</td>
                            </tr>
                            <tr>
                                <td>Name Here</td>
                                <td>Order Report</td>
                                <td>connected</td>
                                <td class="d-none d-lg-table-cell">Affiliate</td>
                                <td class="d-none d-lg-table-cell">123457</td>
                                <td class="d-none d-lg-table-cell">123457</td>
                                <td class="d-none d-lg-table-cell">12 Apr 2025</td>
                                <td class="d-none d-lg-table-cell">54</td>
                            </tr>
                            <tr>
                                <td>Name Here</td>
                                <td>Order Report</td>
                                <td>connected</td>
                                <td class="d-none d-lg-table-cell">Affiliate</td>
                                <td class="d-none d-lg-table-cell">123457</td>
                                <td class="d-none d-lg-table-cell">123457</td>
                                <td class="d-none d-lg-table-cell">12 Apr 2025</td>
                                <td class="d-none d-lg-table-cell">54</td>
                            </tr>
                            <tr>
                                <td>Name Here</td>
                                <td>Order Report</td>
                                <td>connected</td>
                                <td class="d-none d-lg-table-cell">Affiliate</td>
                                <td class="d-none d-lg-table-cell">123457</td>
                                <td class="d-none d-lg-table-cell">123457</td>
                                <td class="d-none d-lg-table-cell">12 Apr 2025</td>
                                <td class="d-none d-lg-table-cell">54</td>
                            </tr>
                            <tr>
                                <td>Name Here</td>
                                <td>Order Report</td>
                                <td>connected</td>
                                <td class="d-none d-lg-table-cell">Affiliate</td>
                                <td class="d-none d-lg-table-cell">123457</td>
                                <td class="d-none d-lg-table-cell">123457</td>
                                <td class="d-none d-lg-table-cell">12 Apr 2025</td>
                                <td class="d-none d-lg-table-cell">54</td>
                            </tr>
                            <tr>
                                <td>Name Here</td>
                                <td>Order Report</td>
                                <td>connected</td>
                                <td class="d-none d-lg-table-cell">Affiliate</td>
                                <td class="d-none d-lg-table-cell">123457</td>
                                <td class="d-none d-lg-table-cell">123457</td>
                                <td class="d-none d-lg-table-cell">12 Apr 2025</td>
                                <td class="d-none d-lg-table-cell">54</td>
                            </tr>
                            <tr>
                                <td>Name Here</td>
                                <td>Order Report</td>
                                <td>connected</td>
                                <td class="d-none d-lg-table-cell">Affiliate</td>
                                <td class="d-none d-lg-table-cell">123457</td>
                                <td class="d-none d-lg-table-cell">123457</td>
                                <td class="d-none d-lg-table-cell">12 Apr 2025</td>
                                <td class="d-none d-lg-table-cell">54</td>
                            </tr>
                            <tr>
                                <td>Name Here</td>
                                <td>Order Report</td>
                                <td>connected</td>
                                <td class="d-none d-lg-table-cell">Affiliate</td>
                                <td class="d-none d-lg-table-cell">123457</td>
                                <td class="d-none d-lg-table-cell">123457</td>
                                <td class="d-none d-lg-table-cell">12 Apr 2025</td>
                                <td class="d-none d-lg-table-cell">54</td>
                            </tr>
                            <tr>
                                <td>Name Here</td>
                                <td>Order Report</td>
                                <td>connected</td>
                                <td class="d-none d-lg-table-cell">Affiliate</td>
                                <td class="d-none d-lg-table-cell">123457</td>
                                <td class="d-none d-lg-table-cell">123457</td>
                                <td class="d-none d-lg-table-cell">12 Apr 2025</td>
                                <td class="d-none d-lg-table-cell">54</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    <nav class="sales-pagination-wrapper" aria-label="Sales history pagination">
                        <ul class="pagination justify-content-center mb-0">
                            <li class="page-item">
                                <a class="page-link sales-page-link" href="#" aria-label="Previous">
                                    <i class="bi bi-chevron-left"></i>
                                </a>
                            </li>
                            <li class="page-item"><a class="page-link sales-page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link sales-page-link" href="#">2</a></li>
                            <li class="page-item active"><a class="page-link sales-page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link sales-page-link" href="#">4</a></li>
                            <li class="page-item"><a class="page-link sales-page-link" href="#">5</a></li>
                            <li class="page-item"><a class="page-link sales-page-link" href="#">6</a></li>
                            <li class="page-item"><a class="page-link sales-page-link" href="#">7</a></li>
                            <li class="page-item"><a class="page-link sales-page-link" href="#">...</a></li>
                            <li class="page-item">
                                <a class="page-link sales-page-link" href="#" aria-label="Next">
                                    <i class="bi bi-chevron-right"></i>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>

        </div>
    </div>



@endsection



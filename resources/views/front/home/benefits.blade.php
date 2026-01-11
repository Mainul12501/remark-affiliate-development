@extends('front.master')

@section('title', 'Benefits')

@section('body')

    <!-- Benefits Content -->
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 mx-auto">
                    <h2 class="text-center fw-bold mb-5">Associate margin from pricing</h2>

                    @if($type == 'influencer')
                        <!-- Color Cosmetics -->
                        <div class="category-section">
                            <h3 class="category-title">Color Cosmetics</h3>
                            <div class="brand-row">
                                <span class="brand-name">NIOR</span>
                                <span class="brand-percentage">10%</span>
                            </div>
                            <div class="brand-row">
                                <span class="brand-name">Lily</span>
                                <span class="brand-percentage">10%-12%</span>
                            </div>
                            <div class="brand-row">
                                <span class="brand-name">Herlan</span>
                                <span class="brand-percentage">10%</span>
                            </div>
                            <div class="brand-row">
                                <span class="brand-name">Maxbeu</span>
                                <span class="brand-percentage">10%-12%</span>
                            </div>
                        </div>

                        <!-- Skin Care -->
                        <div class="category-section">
                            <h3 class="category-title">Skin Care</h3>
                            <div class="brand-row">
                                <span class="brand-name">Dermo-U</span>
                                <span class="brand-percentage">10%</span>
                            </div>
                            <div class="brand-row">
                                <span class="brand-name">Lily</span>
                                <span class="brand-percentage">8%-12%</span>
                            </div>
                            <div class="brand-row">
                                <span class="brand-name">NIOR</span>
                                <span class="brand-percentage">10%</span>
                            </div>
                            <div class="brand-row">
                                <span class="brand-name">Skinmynt</span>
                                <span class="brand-percentage">10%</span>
                            </div>
                        </div>

                        <!-- Perfumed Skincare -->
                        <div class="category-section">
                            <h3 class="category-title">Perfumed Skincare</h3>
                            <div class="brand-row">
                                <span class="brand-name">Blaze O Skin</span>
                                <span class="brand-percentage">10%</span>
                            </div>
                        </div>

                        <!-- Medicated Skincare -->
                        <div class="category-section">
                            <h3 class="category-title">Medicated Skincare</h3>
                            <div class="brand-row">
                                <span class="brand-name">Siodil</span>
                                <span class="brand-percentage">8%-10%</span>
                            </div>
                        </div>

                        <!-- Hair Care -->
                        <div class="category-section">
                            <h3 class="category-title">Hair Care</h3>
                            <div class="brand-row">
                                <span class="brand-name">Cavotin</span>
                                <span class="brand-percentage">10%</span>
                            </div>
                            <div class="brand-row">
                                <span class="brand-name">Lily</span>
                                <span class="brand-percentage">8%-10%</span>
                            </div>
                            <div class="brand-row">
                                <span class="brand-name">SIODIL</span>
                                <span class="brand-percentage">10%</span>
                            </div>
                        </div>

                        <!-- Men's Care -->
                        <div class="category-section">
                            <h3 class="category-title">Men's Care</h3>
                            <div class="brand-row">
                                <span class="brand-name">Booty N Beard</span>
                                <span class="brand-percentage">10%</span>
                            </div>
                        </div>

                        <!-- Personal Cleansing -->
                        <div class="category-section">
                            <h3 class="category-title">Personal Cleansing</h3>
                            <div class="brand-row">
                                <span class="brand-name">Acnol</span>
                                <span class="brand-percentage">8%-12%</span>
                            </div>
                            <div class="brand-row">
                                <span class="brand-name">Lily</span>
                                <span class="brand-percentage">8%-10%</span>
                            </div>
                        </div>

                        <!-- Personal Care -->
                        <div class="category-section">
                            <h3 class="category-title">Personal Care</h3>
                            <div class="brand-row">
                                <span class="brand-name">D32 Ion</span>
                                <span class="brand-percentage">10%-12%</span>
                            </div>
                            <div class="brand-row">
                                <span class="brand-name">Olin</span>
                                <span class="brand-percentage">8%</span>
                            </div>
                        </div>

                        <!-- Home Care -->
                        <div class="category-section">
                            <h3 class="category-title">Home Care</h3>
                            <div class="brand-row">
                                <span class="brand-name">Orix</span>
                                <span class="brand-percentage">8%-10%</span>
                            </div>
                            <div class="brand-row">
                                <span class="brand-name">Sunbit</span>
                                <span class="brand-percentage">8%-10%</span>
                            </div>
                            <div class="brand-row">
                                <span class="brand-name">Tylox</span>
                                <span class="brand-percentage">8%</span>
                            </div>
                        </div>

                        <!-- Accessories -->
                        <div class="category-section">
                            <h3 class="category-title">Accessories</h3>
                            <div class="brand-row">
                                <span class="brand-name">Lily Essentials</span>
                                <span class="brand-percentage">10%</span>
                            </div>
                        </div>

                        <!-- Jewelry -->
                        <div class="category-section">
                            <h3 class="category-title">Jewelry</h3>
                            <div class="brand-row">
                                <span class="brand-name">Glorin</span>
                                <span class="brand-percentage">10%</span>
                            </div>
                        </div>

                        <!-- Baby Care -->
                        <div class="category-section">
                            <h3 class="category-title">Baby Care</h3>
                            <div class="brand-row">
                                <span class="brand-name">Little One</span>
                                <span class="brand-percentage">10%</span>
                            </div>
                            <div class="brand-row">
                                <span class="brand-name">Siodil Baby</span>
                                <span class="brand-percentage">10%</span>
                            </div>
                        </div>
                    @elseif($type == 'partner')
                        <!-- Color Cosmetics -->
                        <div class="category-section">
                            <h3 class="category-title">Color Cosmetics</h3>
                            <div class="brand-row">
                                <span class="brand-name">NIOR</span>
                                <span class="brand-percentage">2%</span>
                            </div>
                            <div class="brand-row">
                                <span class="brand-name">Lily</span>
                                <span class="brand-percentage">2%</span>
                            </div>
                            <div class="brand-row">
                                <span class="brand-name">Herlan</span>
                                <span class="brand-percentage">2%</span>
                            </div>
                            <div class="brand-row">
                                <span class="brand-name">Maxbeu</span>
                                <span class="brand-percentage">2%</span>
                            </div>
                        </div>

                        <!-- Skin Care -->
                        <div class="category-section">
                            <h3 class="category-title">Skin Care</h3>
                            <div class="brand-row">
                                <span class="brand-name">Dermo-U</span>
                                <span class="brand-percentage">2%</span>
                            </div>
                            <div class="brand-row">
                                <span class="brand-name">Lily</span>
                                <span class="brand-percentage">2%</span>
                            </div>
                            <div class="brand-row">
                                <span class="brand-name">NIOR</span>
                                <span class="brand-percentage">2%</span>
                            </div>
                            <div class="brand-row">
                                <span class="brand-name">Skinmynt</span>
                                <span class="brand-percentage">2%</span>
                            </div>
                        </div>

                        <!-- Perfumed Skincare -->
                        <div class="category-section">
                            <h3 class="category-title">Perfumed Skincare</h3>
                            <div class="brand-row">
                                <span class="brand-name">Blaze O Skin</span>
                                <span class="brand-percentage">2%</span>
                            </div>
                        </div>

                        <!-- Medicated Skincare -->
                        <div class="category-section">
                            <h3 class="category-title">Medicated Skincare</h3>
                            <div class="brand-row">
                                <span class="brand-name">Siodil</span>
                                <span class="brand-percentage">8%-10%</span>
                            </div>
                        </div>

                        <!-- Hair Care -->
                        <div class="category-section">
                            <h3 class="category-title">Hair Care</h3>
                            <div class="brand-row">
                                <span class="brand-name">Cavotin</span>
                                <span class="brand-percentage">2%</span>
                            </div>
                            <div class="brand-row">
                                <span class="brand-name">Lily</span>
                                <span class="brand-percentage">8%-10%</span>
                            </div>
                            <div class="brand-row">
                                <span class="brand-name">SIODIL</span>
                                <span class="brand-percentage">2%</span>
                            </div>
                        </div>

                        <!-- Men's Care -->
                        <div class="category-section">
                            <h3 class="category-title">Men's Care</h3>
                            <div class="brand-row">
                                <span class="brand-name">Booty N Beard</span>
                                <span class="brand-percentage">10%</span>
                            </div>
                        </div>

                        <!-- Personal Cleansing -->
                        <div class="category-section">
                            <h3 class="category-title">Personal Cleansing</h3>
                            <div class="brand-row">
                                <span class="brand-name">Acnol</span>
                                <span class="brand-percentage">8%-12%</span>
                            </div>
                            <div class="brand-row">
                                <span class="brand-name">Lily</span>
                                <span class="brand-percentage">8%-10%</span>
                            </div>
                        </div>

                        <!-- Personal Care -->
                        <div class="category-section">
                            <h3 class="category-title">Personal Care</h3>
                            <div class="brand-row">
                                <span class="brand-name">D32 Ion</span>
                                <span class="brand-percentage">10%-12%</span>
                            </div>
                            <div class="brand-row">
                                <span class="brand-name">Olin</span>
                                <span class="brand-percentage">2%</span>
                            </div>
                        </div>

                        <!-- Home Care -->
                        <div class="category-section">
                            <h3 class="category-title">Home Care</h3>
                            <div class="brand-row">
                                <span class="brand-name">Orix</span>
                                <span class="brand-percentage">8%-10%</span>
                            </div>
                            <div class="brand-row">
                                <span class="brand-name">Sunbit</span>
                                <span class="brand-percentage">8%-10%</span>
                            </div>
                            <div class="brand-row">
                                <span class="brand-name">Tylox</span>
                                <span class="brand-percentage">2%</span>
                            </div>
                        </div>

                        <!-- Accessories -->
                        <div class="category-section">
                            <h3 class="category-title">Accessories</h3>
                            <div class="brand-row">
                                <span class="brand-name">Lily Essentials</span>
                                <span class="brand-percentage">2%</span>
                            </div>
                        </div>

                        <!-- Jewelry -->
                        <div class="category-section">
                            <h3 class="category-title">Jewelry</h3>
                            <div class="brand-row">
                                <span class="brand-name">Glorin</span>
                                <span class="brand-percentage">2%</span>
                            </div>
                        </div>

                        <!-- Baby Care -->
                        <div class="category-section">
                            <h3 class="category-title">Baby Care</h3>
                            <div class="brand-row">
                                <span class="brand-name">Little One</span>
                                <span class="brand-percentage">2%</span>
                            </div>
                            <div class="brand-row">
                                <span class="brand-name">Siodil Baby</span>
                                <span class="brand-percentage">2%</span>
                            </div>
                        </div>
                    @endif

                    <!-- CTA Button -->
{{--                    <div class="text-center mt-5 dropdown bonous-list-page">--}}
{{--                        <a href="#" class="btn btn-dark btn-lg rounded-pill px-5 py-3 dropdown-toggle" data-bs-toggle="dropdown">--}}
{{--                            Sign Up & Start Earning--}}

{{--                        </a>--}}
{{--                        <ul class="dropdown-menu">--}}
{{--                            <li class="dropdown-item"><a href="" class="nav-link">Sign Up</a></li>--}}
{{--                            <li class="dropdown-item"><a href="" class="nav-link">Sign In</a></li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
                </div>
            </div>
        </div>
    </section>

@endsection

@extends('front.master')

@section('title', 'Influencer Albums')

@section('body')

    <!-- Main Content -->
    <div class="influencer-profile-main">
        <div class="container-fluid px-md-4 px-3 py-4 influencer-profile-shell">

            @include('front.influencer.includes.dashboard-common-sections')

            <div class="influencer-albums-content">
                <div class="influencer-albums-toolbar">
                    <input type="text" class="form-control influencer-albums-search" placeholder="Search Product">
                    <select class="form-select influencer-albums-select">
                        <option selected>Select Category</option>
                        <option>Skincare</option>
                        <option>Makeup</option>
                        <option>Hair Care</option>
                    </select>
                    <button class="btn btn-dark influencer-albums-filter">Filter</button>
                </div>

                <div class="row g-4 influencer-albums-grid">
                    <div class="col-lg-4 col-md-6">
                        <div class="influencer-album-card influencer-album-card-add">
                            <div class="influencer-album-add-wrapper dropdown">
                                <button class="influencer-album-add-icon" type="button" id="albumAddDropdown" data-bs-toggle="dropdown" data-bs-auto-close="true" aria-expanded="false">+</button>
                                <div class="dropdown-menu influencer-album-add-dropdown" aria-labelledby="albumAddDropdown">
                                    <a class="dropdown-item influencer-add-option" href="javascript:void(0)" id="showProductsModal" {{--data-bs-toggle="modal" data-bs-target="#addProductModal"--}}>Upload Product</a>
                                    <a class="dropdown-item influencer-add-option influencer-add-option-link" href="#" data-bs-toggle="modal" data-bs-target="#createAlbumModal">Create Album</a>
                                </div>
                            </div>
                            <p class="mb-0">Use at Least 1 product</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div style="cursor:pointer;" class="influencer-album-card influencer-album-card-collage influencer-album-card-media dropdown">
                            <button class="influencer-album-menu-btn" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-three-dots-vertical"></i>
                            </button>
                            <div class="dropdown-menu influencer-album-dropdown">
                                <div class="px-3 pt-2 text-muted small">REFERRAL LINK:</div>
                                <div class="influencer-album-link-row px-3 pb-2">
                                    <span class="small">https://herlan.com/sadiya_a_suchita</span>
                                    <button class="btn btn-light btn-sm">Copy</button>
                                </div>
                                <a class="dropdown-item" href="#">Edit</a>
                                <a class="dropdown-item" href="#">Remove</a>
                            </div>
                            <div class="influencer-album-collage">
                                <img src="{{ asset('/') }}frontend/images/influencer/Rectangle-301.png" alt="Product">
                                <img src="{{ asset('/') }}frontend/images/influencer/Rectangle-301.png" alt="Product">
                                <img src="{{ asset('/') }}frontend/images/influencer/Rectangle-301.png" alt="Product">
                                <img src="{{ asset('/') }}frontend/images/influencer/Rectangle-301.png" alt="Product">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="influencer-album-card influencer-album-card-media dropdown">
                            <button class="influencer-album-menu-btn" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-three-dots-vertical"></i>
                            </button>
                            <div class="dropdown-menu influencer-album-dropdown">
                                <div class="px-3 pt-2 text-muted small">REFERRAL LINK:</div>
                                <div class="influencer-album-link-row px-3 pb-2">
                                    <span class="small">https://herlan.com/sadiya_a_suchita</span>
                                    <button class="btn btn-light btn-sm">Copy</button>
                                </div>
                                <a class="dropdown-item" href="#">Edit Album</a>
                                <a class="dropdown-item" href="#">Remove</a>
                            </div>
                            <img src="{{ asset('/') }}frontend/images/influencer/Rectangle-301.png" alt="Product" class="influencer-album-img">
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="influencer-album-card influencer-album-card-media dropdown">
                            <button class="influencer-album-menu-btn" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-three-dots-vertical"></i>
                            </button>
                            <div class="dropdown-menu influencer-album-dropdown">
                                <div class="px-3 pt-2 text-muted small">REFERRAL LINK:</div>
                                <div class="influencer-album-link-row px-3 pb-2">
                                    <span class="small">https://herlan.com/sadiya_a_suchita</span>
                                    <button class="btn btn-light btn-sm">Copy</button>
                                </div>
                                <a class="dropdown-item" href="#">Edit</a>
                                <a class="dropdown-item" href="#">Remove</a>
                            </div>
                            <img src="{{ asset('/') }}frontend/images/influencer/Rectangle-301.png" alt="Product" class="influencer-album-img">
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="influencer-album-card influencer-album-card-media dropdown">
                            <button class="influencer-album-menu-btn" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-three-dots-vertical"></i>
                            </button>
                            <div class="dropdown-menu influencer-album-dropdown">
                                <div class="px-3 pt-2 text-muted small">REFERRAL LINK:</div>
                                <div class="influencer-album-link-row px-3 pb-2">
                                    <span class="small">https://herlan.com/sadiya_a_suchita</span>
                                    <button class="btn btn-light btn-sm">Copy</button>
                                </div>
                                <a class="dropdown-item" href="#">Edit</a>
                                <a class="dropdown-item" href="#">Remove</a>
                            </div>
                            <img src="{{ asset('/') }}frontend/images/influencer/Rectangle-301.png" alt="Product" class="influencer-album-img">
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="influencer-album-card influencer-album-card-collage influencer-album-card-media dropdown">
                            <button class="influencer-album-menu-btn" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-three-dots-vertical"></i>
                            </button>
                            <div class="dropdown-menu influencer-album-dropdown">
                                <div class="px-3 pt-2 text-muted small">REFERRAL LINK:</div>
                                <div class="influencer-album-link-row px-3 pb-2">
                                    <span class="small">https://herlan.com/sadiya_a_suchita</span>
                                    <button class="btn btn-light btn-sm">Copy</button>
                                </div>
                                <a class="dropdown-item" href="#">Edit Album</a>
                                <a class="dropdown-item" href="#">Remove</a>
                            </div>
                            <div class="influencer-album-collage influencer-album-collage-two">
                                <img src="{{ asset('/') }}frontend/images/influencer/Rectangle-301.png" alt="Product">
                                <img src="{{ asset('/') }}frontend/images/influencer/Rectangle-301.png" alt="Product">
                            </div>
                        </div>
                    </div>
                </div>

                <nav class="influencer-albums-pagination" aria-label="Albums pagination">
                    <ul class="pagination justify-content-center">
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item active"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">4</a></li>
                        <li class="page-item"><a class="page-link" href="#">5</a></li>
                        <li class="page-item"><a class="page-link" href="#">6</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>

        </div>
    </div>



@endsection

@section('modal')

    <!-- Add Product Modal -->
    <div class="modal fade" id="addProductModal" {{--tabindex="-1" aria-labelledby="addProductModalLabel" aria-hidden="true"--}}>
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable product-modal-dialog">
            <div class="modal-content product-modal-content">
                <div class="modal-header product-modal-header">
                    <h5 class="modal-title product-modal-title" id="addProductModalLabel">Add Product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body product-modal-body" >
                    <!-- Search & Filter Section -->
                    <form action="" id="singleProductModalSearchForm">
                        <div class="product-modal-filters">
                            <input type="text" class="form-control product-modal-search" id="singleProductSearch" placeholder="Search Product">
                            <select class="form-select product-modal-select" id="singleProductCategory">
                                <option selected disabled>Select Category</option>
                                @foreach($productCategories as $productCategory)
                                    <option value="{{ $productCategory->slug }}">{{ $productCategory->name }}</option>
                                @endforeach
                                {{--                            <option value="makeup">Makeup</option>--}}
                                {{--                            <option value="haircare">Hair Care</option>--}}
                                {{--                            <option value="bodycare">Body Care</option>--}}
                            </select>
                            <button type="button" id="singleProductQueryBtn" class="btn product-modal-filter-btn text-white">Filter</button>
                        </div>
                    </form>

                    <div id="productLoader" class="text-center py-3" style="display:none;">
                        <div class="spinner-border text-dark"></div>
                        <div class="small mt-2">Loading products...</div>
                    </div>

                    <!-- Products Grid -->
                    <div class="product-modal-grid" id="singleProductAlbumModalBody">
                        <!-- Product Card 1 -->
                        <div class="product-modal-card">
                            <div class="product-modal-img-wrapper">
                                <img src="{{ asset('/') }}frontend/images/influencer/Rectangle-301.png" alt="Blaze O' Skin" class="product-modal-img">
                                <button class="product-modal-fav-btn">
                                    <i class="bi bi-heart"></i>
                                </button>
                            </div>
                            <div class="product-modal-info">
                                <span class="product-modal-brand product-brand-blaze">Blaze O' Skin</span>
                                <p class="product-modal-name">Berry on Top Hydrating Moisturizing Cream</p>
                                <div class="product-modal-price">
                                    <span class="product-price-current">৳ 600</span>
                                </div>
                            </div>
                        </div>

                        <!-- Product Card 2 -->
                        <div class="product-modal-card">
                            <div class="product-modal-img-wrapper">
                                <img src="{{ asset('/') }}frontend/images/influencer/Rectangle-301.png" alt="Nior" class="product-modal-img">
                                <button class="product-modal-fav-btn">
                                    <i class="bi bi-heart"></i>
                                </button>
                            </div>
                            <div class="product-modal-info">
                                <span class="product-modal-brand product-brand-nior">Nior</span>
                                <p class="product-modal-name">Nior Ultra Hydrating Moisturizer SPF 40 PA++++</p>
                                <div class="product-modal-price">
                                    <span class="product-price-old">৳ 1,000</span>
                                    <span class="product-price-current">৳ 800</span>
                                </div>
                            </div>
                        </div>

                        <!-- Product Card 3 -->
                        <div class="product-modal-card">
                            <div class="product-modal-img-wrapper">
                                <img src="{{ asset('/') }}frontend/images/influencer/Rectangle-301.png" alt="Nior" class="product-modal-img">
                                <button class="product-modal-fav-btn">
                                    <i class="bi bi-heart"></i>
                                </button>
                            </div>
                            <div class="product-modal-info">
                                <span class="product-modal-brand product-brand-nior">Nior</span>
                                <p class="product-modal-name">Nior Aloe Vera 99.99% Moisture Soothing Gel</p>
                                <div class="product-modal-price">
                                    <span class="product-price-old">৳ 590</span>
                                    <span class="product-price-current">৳ 502</span>
                                </div>
                            </div>
                        </div>

                        <!-- Product Card 4 -->
                        <div class="product-modal-card">
                            <div class="product-modal-img-wrapper">
                                <img src="{{ asset('/') }}frontend/images/influencer/Rectangle-301.png" alt="Lily" class="product-modal-img">
                                <button class="product-modal-fav-btn">
                                    <i class="bi bi-heart"></i>
                                </button>
                            </div>
                            <div class="product-modal-info">
                                <span class="product-modal-brand product-brand-lily">Lily</span>
                                <p class="product-modal-name">Lily Buttery Soft Moisturizing Skin Cream 50g</p>
                                <div class="product-modal-price">
                                    <span class="product-price-old">৳ 180</span>
                                    <span class="product-price-current">৳ 162</span>
                                </div>
                            </div>
                        </div>

                        <!-- Product Card 5 -->
                        <div class="product-modal-card">
                            <div class="product-modal-img-wrapper">
                                <img src="{{ asset('/') }}frontend/images/influencer/Rectangle-301.png" alt="Nior" class="product-modal-img">
                                <button class="product-modal-fav-btn">
                                    <i class="bi bi-heart"></i>
                                </button>
                            </div>
                            <div class="product-modal-info">
                                <span class="product-modal-brand product-brand-nior">Nior</span>
                                <p class="product-modal-name">Nior Korean Rose Deep Cleansing Face Wash</p>
                                <div class="product-modal-price">
                                    <span class="product-price-old">৳ 450</span>
                                    <span class="product-price-current">৳ 380</span>
                                </div>
                            </div>
                        </div>

                        <!-- Product Card 6 -->
                        <div class="product-modal-card">
                            <div class="product-modal-img-wrapper">
                                <img src="{{ asset('/') }}frontend/images/influencer/Rectangle-301.png" alt="Nior" class="product-modal-img">
                                <button class="product-modal-fav-btn">
                                    <i class="bi bi-heart"></i>
                                </button>
                            </div>
                            <div class="product-modal-info">
                                <span class="product-modal-brand product-brand-nior">Nior</span>
                                <p class="product-modal-name">Nior Organic Moringa Multi-Purpose Oil</p>
                                <div class="product-modal-price">
                                    <span class="product-price-old">৳ 650</span>
                                    <span class="product-price-current">৳ 550</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Create Album Modal -->
    <div class="modal fade" id="createAlbumModal" tabindex="-1" aria-labelledby="createAlbumModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg create-album-dialog">
            <div class="modal-content create-album-content">
                <div class="modal-header create-album-header">
                    <h5 class="modal-title create-album-title" id="createAlbumModalLabel">Create An Album</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body create-album-body">
                    <div class="create-album-layout">
                        <!-- Left: Upload Image Section -->
                        <div class="create-album-upload-section">
                            <div class="create-album-dropzone" id="albumDropzone">
                                <input type="file" id="albumImageInput" accept="image/jpeg,image/png" hidden>
                                <div class="dropzone-content" id="dropzoneContent">
                                    <div class="dropzone-icon">
                                        <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <circle cx="24" cy="24" r="24" fill="#4A4A4A"/>
                                            <path d="M24 32V16M24 16L18 22M24 16L30 22" stroke="#FFFFFF" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </div>
                                    <p class="dropzone-title">Upload Image</p>
                                    <p class="dropzone-subtitle">JPEG, PNG up to 1MB</p>
                                </div>
                                <div class="dropzone-preview" id="dropzonePreview" style="display: none;">
                                    <img src="" alt="Preview" id="albumPreviewImg">
                                    <button type="button" class="dropzone-remove-btn" id="removeAlbumImage">
                                        <i class="bi bi-x-lg"></i>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Right: Form Section -->
                        <div class="create-album-form-section">
                            <!-- Album Title -->
                            <div class="create-album-field">
                                <label class="create-album-label">Album title</label>
                                <input type="text" class="form-control create-album-input" placeholder="Enter album title">
                            </div>

                            <!-- Add Products -->
                            <div class="create-album-field">
                                <label class="create-album-label">Add Products</label>
                                <div class="create-album-products">
                                    <button type="button" class="create-album-add-product-btn" id="openAlbumProductModal">
                                        <span>+</span>
                                    </button>
                                    <div class="create-album-product-list" id="selectedProductsList">
                                        <!-- Selected products will appear here -->
                                    </div>
                                </div>
                            </div>

                            <!-- Actions -->
                            <div class="create-album-actions">
                                <button type="button" class="btn create-album-submit-btn">Submit</button>
                                <button type="button" class="btn create-album-cancel-btn" data-bs-dismiss="modal">Cancel</button>
                            </div>

                            <!-- Terms -->
                            <p class="create-album-terms">
                                By submitting your content you agree to our <a href="#">Terms & Condition</a>, <a href="#">Privacy</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Album Product Selection Modal -->
    <div class="modal fade" id="albumProductModal" tabindex="-1" aria-labelledby="albumProductModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable product-modal-dialog">
            <div class="modal-content product-modal-content">
                <div class="modal-header product-modal-header">
                    <h5 class="modal-title product-modal-title" id="albumProductModalLabel">Add Product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body product-modal-body" >
                    <!-- Search & Filter Section -->
                    <div class="product-modal-filters">
                        <input type="text" class="form-control product-modal-search" placeholder="Search Product">
                        <select class="form-select product-modal-select">
                            <option selected>Select Category</option>
                            <option value="skincare">Skincare</option>
                            <option value="makeup">Makeup</option>
                            <option value="haircare">Hair Care</option>
                        </select>
                        <button class="btn product-modal-filter-btn">Filter</button>
                    </div>

                    <!-- Products Grid -->
                    <div class="product-modal-grid" id="albumProductModalBody">
                        <div class="product-modal-card album-product-selectable" data-product-id="1" data-product-img="images/influencer/Rectangle-301.png">
                            <div class="product-modal-img-wrapper">
                                <img src="{{ asset('/') }}frontend/images/influencer/Rectangle-301.png" alt="Blaze O' Skin" class="product-modal-img">
                                <button class="product-modal-fav-btn album-select-btn">
                                    <i class="bi bi-heart"></i>
                                </button>
                            </div>
                            <div class="product-modal-info">
                                <span class="product-modal-brand product-brand-blaze">Blaze O' Skin</span>
                                <p class="product-modal-name">Berry on Top Hydrating Moisturizing Cream</p>
                                <div class="product-modal-price">
                                    <span class="product-price-current">৳ 600</span>
                                </div>
                            </div>
                        </div>

                        <div class="product-modal-card album-product-selectable" data-product-id="2" data-product-img="images/influencer/Rectangle-301.png">
                            <div class="product-modal-img-wrapper">
                                <img src="{{ asset('/') }}frontend/images/influencer/Rectangle-301.png" alt="Nior" class="product-modal-img">
                                <button class="product-modal-fav-btn album-select-btn">
                                    <i class="bi bi-heart"></i>
                                </button>
                            </div>
                            <div class="product-modal-info">
                                <span class="product-modal-brand product-brand-nior">Nior</span>
                                <p class="product-modal-name">Nior Ultra Hydrating Moisturizer SPF 40 PA++++</p>
                                <div class="product-modal-price">
                                    <span class="product-price-old">৳ 1,000</span>
                                    <span class="product-price-current">৳ 800</span>
                                </div>
                            </div>
                        </div>

                        <div class="product-modal-card album-product-selectable" data-product-id="3" data-product-img="images/influencer/Rectangle-301.png">
                            <div class="product-modal-img-wrapper">
                                <img src="{{ asset('/') }}frontend/images/influencer/Rectangle-301.png" alt="Nior" class="product-modal-img">
                                <button class="product-modal-fav-btn album-select-btn">
                                    <i class="bi bi-heart"></i>
                                </button>
                            </div>
                            <div class="product-modal-info">
                                <span class="product-modal-brand product-brand-nior">Nior</span>
                                <p class="product-modal-name">Nior Aloe Vera 99.99% Moisture Soothing Gel</p>
                                <div class="product-modal-price">
                                    <span class="product-price-old">৳ 590</span>
                                    <span class="product-price-current">৳ 502</span>
                                </div>
                            </div>
                        </div>

                        <div class="product-modal-card album-product-selectable" data-product-id="4" data-product-img="images/influencer/Rectangle-301.png">
                            <div class="product-modal-img-wrapper">
                                <img src="{{ asset('/') }}frontend/images/influencer/Rectangle-301.png" alt="Lily" class="product-modal-img">
                                <button class="product-modal-fav-btn album-select-btn">
                                    <i class="bi bi-heart"></i>
                                </button>
                            </div>
                            <div class="product-modal-info">
                                <span class="product-modal-brand product-brand-lily">Lily</span>
                                <p class="product-modal-name">Lily Buttery Soft Moisturizing Skin Cream 50g</p>
                                <div class="product-modal-price">
                                    <span class="product-price-old">৳ 180</span>
                                    <span class="product-price-current">৳ 162</span>
                                </div>
                            </div>
                        </div>

                        <div class="product-modal-card album-product-selectable" data-product-id="5" data-product-img="images/influencer/Rectangle-301.png">
                            <div class="product-modal-img-wrapper">
                                <img src="{{ asset('/') }}frontend/images/influencer/Rectangle-301.png" alt="Nior" class="product-modal-img">
                                <button class="product-modal-fav-btn album-select-btn">
                                    <i class="bi bi-heart"></i>
                                </button>
                            </div>
                            <div class="product-modal-info">
                                <span class="product-modal-brand product-brand-nior">Nior</span>
                                <p class="product-modal-name">Nior Korean Rose Deep Cleansing Face Wash</p>
                                <div class="product-modal-price">
                                    <span class="product-price-old">৳ 450</span>
                                    <span class="product-price-current">৳ 380</span>
                                </div>
                            </div>
                        </div>

                        <div class="product-modal-card album-product-selectable" data-product-id="6" data-product-img="images/influencer/Rectangle-301.png">
                            <div class="product-modal-img-wrapper">
                                <img src="{{ asset('/') }}frontend/images/influencer/Rectangle-301.png" alt="Nior" class="product-modal-img">
                                <button class="product-modal-fav-btn album-select-btn">
                                    <i class="bi bi-heart"></i>
                                </button>
                            </div>
                            <div class="product-modal-info">
                                <span class="product-modal-brand product-brand-nior">Nior</span>
                                <p class="product-modal-name">Nior Organic Moringa Multi-Purpose Oil</p>
                                <div class="product-modal-price">
                                    <span class="product-price-old">৳ 650</span>
                                    <span class="product-price-current">৳ 550</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('script')
{{--    single product modal scripts--}}
    <script>
        let page = 1;
        let loading = false;
        let currentQuery = '';
        let currentCategory = '';
        let hasMore = true;
        $(document).on('click', '#showProductsModal', function () {

            page = 1;
            loading = false;
            hasMore = true;
            currentQuery = '';
            currentCategory = '';
            $('#singleProductAlbumModalBody').html('');
            loadProducts();
            $('#addProductModal').modal('show');

            // sendAjaxRequest('get-product-lists?render=1', 'GET').then(function (response) {
                // $('#singleProductAlbumModalBody').append(response);
            // });
        })

        function loadProducts(modalDiv = '#singleProductAlbumModalBody', forAlbum = 0) {
            if (loading || !hasMore) return;
            loading = true;
            // $('#productLoader').show();   // 👈 show loader
            sendAjaxRequest(
                `get-product-lists?render=1&page=${page}&for_album=${forAlbum}&query=${currentQuery}&category=${currentCategory}`,
                'GET'
            ).then(function (html) {
                if ($(modalDiv).find('.no-more-data').length) return;
                if (!html || !html.trim()) {
                    $('#productLoader').hide();
                    loading = false;
                    return;
                }
                loading = false;
                $(modalDiv).append(html);
                page++;
                // $('#productLoader').hide(); // 👈 hide loader


            });
        }

        $('#addProductModal .modal-body').on('scroll', function () {
            let el = this;
            if (el.scrollTop + el.clientHeight >= el.scrollHeight - 50) {
                loadProducts();
            }
        });

        $('#singleProductQueryBtn').on('click', function () {
            // event.preventDefault();
            currentQuery = $('#singleProductSearch').val();
            currentCategory = $('#singleProductCategory').val();
            page = 1;
            hasMore = true;
            $('#singleProductAlbumModalBody').html('');
            loadProducts();
        });
    </script>

{{--    album scripts--}}
    <script>

        $(document).on('click', '#openAlbumProductModal', function () {

            page = 1;
            loading = false;
            hasMore = true;
            currentQuery = '';
            currentCategory = '';
            $('#albumProductModalBody').html('');
            loadProducts('#albumProductModalBody', 1);
            $('#albumProductModal').modal('show');
        })
    </script>
@endpush

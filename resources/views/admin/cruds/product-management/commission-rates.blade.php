@extends('admin.master')
@section('title', 'Product Commission Rates')
@push('styles')
    @include('admin.datatables.datatable-style')
@endpush

@section('content')
    <div class="container-fluid pt-3">
        <div class="d-md-flex d-block align-items-center justify-content-between page-header-breadcrumb mb-3">
            <div class="my-auto">
                <h4 class="mb-sm-0 text-uppercase" style="font-family: 'Bell MT';font-size: 16px"><i class="mdi mdi-checkbox-marked-outline me-2"></i>Commission Rates</h4>
            </div>
            <div class="d-flex my-xl-auto right-content align-items-center">
                <nav>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{url('/admin/dashboard')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Commission Rates</li>
                    </ol>
                </nav>

            </div>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center border-bottom">
                        <h5 class="card-title mb-0">
                            <i class="mdi mdi-view-list me-1"></i> Commission Rate
                        </h5>
                        <a href="javascript:void(0)" class="btn btn-sm btn-outline-primary call-ajax-reload" data-bs-toggle="modal" data-bs-target="#createModal">
                            <i class="mdi mdi-plus-circle me-1"></i> Add Commission Rate
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table  class="table table-bordered text-nowrap w-100" id="brandDataTable">
                                <thead>
                                    <tr>
                                        <td>#</td>
                                        <td>logo</td>
                                        <td>Name</td>
                                        <td>SKU</td>
                                        <td>Type</td>
                                        <td>Rate</td>
                                        <td>Status</td>
                                        <td>Action</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($productCommissionRates as $productCommissionRate)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td><img src="{{ $productCommissionRate->product_image ?? '' }}" style="height: 70px" class="img-fluid w-100" alt="{{ $productCommissionRate->name }} logo"></td>
                                            <td>{{ $productCommissionRate->product_name ?? '' }}</td>
                                            <td>{{ $productCommissionRate->product_sku ?? '' }}</td>
                                            <td>{{ $productCommissionRate->type ?? '' }}</td>
                                            <td>{{ $productCommissionRate->amount ?? 0 }}</td>
                                            <td><span class="badge text-bg-{{ $productCommissionRate->status == 1 ? "success" : 'danger' }}">{{ $productCommissionRate->status == 1 ? "Published" : 'Unpublished' }}</span></td>
                                            <td>
                                                <a href="{{ route('admin.product-commission-rates.edit', $productCommissionRate->id) }}" class="btn btn-outline-primary btn-sm" title="Edit"><i class="fa fa-pencil-alt"></i></a>
                                                <form action="{{ route('admin.product-commission-rates.destroy', $productCommissionRate->id) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-outline-danger btn-sm ms-2 delete-data" title="Delete"><i class="fa fa-trash-alt"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('modal')


    <!-- Modal -->
    <div class="modal fade" id="createModal" >
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form id="createCommissionForm" action="{{ route('admin.product-commission-rates.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header text-white">
                        <h5 class="modal-title" id="createModalLabel">
                            <i class="bi bi-percent me-2"></i>Create Product Commission
                        </h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <!-- Product Selection -->
                        <div class="mb-3">
                            <label for="product_search" class="form-label">
                                Search Product <span class="text-danger">*</span>
                            </label>
                            <div class="position-relative">
                                <input type="text"
                                       class="form-control"
                                       id="product_search"
                                       placeholder="Search by product name or SKU..."
                                       autocomplete="off">
                                <div class="spinner-border spinner-border-sm position-absolute d-none"
                                     id="searchSpinner"
                                     style="right: 10px; top: 12px;">
                                </div>
                            </div>

                            <!-- Search Results Dropdown -->
                            <div class="list-group mt-2 shadow-sm d-none"
                                 id="productSearchResults"
                                 style="max-height: 300px; overflow-y: auto; position: absolute; z-index: 1050; width: calc(100% - 30px);">
                            </div>

                            <small class="text-danger error-product"></small>
                        </div>

                        <!-- Selected Product Display -->
                        <div class="mb-3 d-none" id="selectedProductCard">
                            <label class="form-label">Selected Product</label>
                            <div class="card">
                                <div class="card-body p-3">
                                    <div class="d-flex align-items-center">
                                        <img id="selected_product_image"
                                             src=""
                                             alt="Product"
                                             class="rounded me-3"
                                             style="width: 60px; height: 60px; object-fit: cover;">
                                        <div class="flex-grow-1">
                                            <h6 class="mb-1" id="selected_product_name"></h6>
                                            <small class="text-muted">SKU: <span id="selected_product_sku"></span></small>
                                        </div>
                                        <button type="button" class="btn btn-sm btn-outline-danger" id="clearProduct">
                                            <i class="bi bi-x-lg"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!-- Hidden Inputs -->
                            <input type="hidden" id="product_sku" name="product_sku">
                            <input type="hidden" id="product_name" name="product_name">
                            <input type="hidden" id="product_image" name="product_image">
                        </div>

                        <div class="row">
                            <!-- Commission Type -->
                            <div class="col-md-6 mb-3">
                                <label for="commission_type" class="form-label">
                                    Commission Type <span class="text-danger">*</span>
                                </label>
                                <select class="form-select" id="commission_type" name="commission_type" required>
                                    <option value="">Select Type</option>
                                    <option value="fixed">Fixed Amount</option>
                                    <option value="percentage">Percentage</option>
                                </select>
                                <small class="text-danger error-commission_type"></small>
                            </div>

                            <!-- Amount -->
                            <div class="col-md-6 mb-3">
                                <label for="amount" class="form-label">
                                    Amount <span class="text-danger">*</span>
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text" id="amountPrefix">৳</span>
                                    <input type="number"
                                           class="form-control"
                                           id="amount"
                                           name="amount"
                                           placeholder="Enter amount"
                                           min="0"
                                           step="0.01"
                                           required>
                                </div>
                                <small class="text-muted" id="amountHint">Enter fixed amount in BDT</small>
                                <small class="text-danger error-amount d-block"></small>
                            </div>
                        </div>

                        <!-- Status -->
                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <div class="form-check form-switch">
                                <input class="form-check-input"
                                       type="checkbox"
                                       id="status"
                                       name="status"
                                       value="1"
                                       checked>
                                <label class="form-check-label" for="status">
                                    <span id="statusLabel">Active</span>
                                </label>
                            </div>
                            <small class="text-muted">Enable or disable this commission</small>
                        </div>

                        <!-- Commission Preview -->
                        <div class="alert alert-info d-none" id="commissionPreview">
                            <h6 class="alert-heading mb-2">Commission Preview</h6>
                            <p class="mb-0" id="previewText"></p>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            <i class="bi bi-x-circle me-1"></i>Cancel
                        </button>
                        <button type="submit" class="btn btn-primary" id="saveCommissionBtn">
                            <i class="bi bi-save me-1"></i>Save Commission
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

{{--    edit model--}}
    <div class="modal fade" id="createModal" >
        <div class="modal-dialog modal-lg">
            <div class="modal-content" id="editModalForm">

            </div>
        </div>
    </div>
@endsection

@push('style')
    <style>
        .list-group-item-action:hover {
            background-color: #f8f9fa;
        }

        .product-search-item {
            cursor: pointer;
            transition: all 0.2s;
        }

        .product-search-item:hover {
            background-color: #e9ecef;
            transform: translateX(5px);
        }

        .product-search-item img {
            border: 1px solid #dee2e6;
        }

        #selectedProductCard .card {
            border-color: #0d6efd;
            background-color: #f8f9ff;
        }

        .spinner-border-sm {
            width: 1rem;
            height: 1rem;
        }

        .form-check-input:checked {
            background-color: #198754;
            border-color: #198754;
        }
    </style>
@endpush

@push('scripts')
{{--    <script src="{{asset('backend/build/assets/libs/flatpickr/flatpickr.min.js')}}"></script>--}}
    @include('admin.datatables.datatable-script')
{{--    @include('admin.partials.user.user-index-script')--}}
<script>
    $(document).ready(function () {
        $('#brandDataTable').DataTable();
    });
</script>

{{--    product search and store--}}
<script>
    $(document).ready(function() {
        let searchTimeout;
        let currentPage = 1;
        const perPage = 20;

        // ========================================
        // PRODUCT SEARCH
        // ========================================
        $('#product_search').on('input', function() {
            clearTimeout(searchTimeout);
            const query = $(this).val().trim();

            if (query.length < 2) {
                $('#productSearchResults').addClass('d-none').empty();
                return;
            }

            $('#searchSpinner').removeClass('d-none');

            searchTimeout = setTimeout(() => {
                searchProducts(query);
            }, 500);
        });

        function searchProducts(query) {
            $.ajax({
                url: '{{ route("admin.search-products") }}',
                type: 'GET',
                data: {
                    per_page: perPage,
                    page: currentPage,
                    search: query
                },
                success: function(response) {
                    displaySearchResults(response);
                },
                error: function(xhr) {
                    toastr.error('Failed to search products');
                    console.error('Search error:', xhr);
                },
                complete: function() {
                    $('#searchSpinner').addClass('d-none');
                }
            });
        }

        function displaySearchResults(products) {
            const $results = $('#productSearchResults');
            $results.empty();

            if (!products || products.length === 0) {
                $results.html(`
                <div class="list-group-item text-center text-muted py-3">
                    <i class="bi bi-inbox display-6"></i>
                    <p class="mb-0 mt-2">No products found</p>
                </div>
            `).removeClass('d-none');
                return;
            }

            products.forEach(product => {
                const imageUrl = product.images && product.images.length > 0
                    ? product.images[0].src
                    : 'https://via.placeholder.com/50';

                const price = product.price ? `৳${product.price}` : 'N/A';

                $results.append(`
                <a href="javascript:void(0)"
                   class="list-group-item list-group-item-action product-search-item"
                   data-sku="${product.sku || ''}"
                   data-name="${product.name}"
                   data-image="${imageUrl}"
                   data-price="${product.price || 0}">
                    <div class="d-flex align-items-center">
                        <img src="${imageUrl}"
                             alt="${product.name}"
                             class="rounded me-3"
                             style="width: 50px; height: 50px; object-fit: cover;">
                        <div class="flex-grow-1">
                            <h6 class="mb-1">${product.name}</h6>
                            <small class="text-muted">
                                SKU: ${product.sku || 'N/A'} | Price: ${price}
                            </small>
                        </div>
                        <i class="bi bi-chevron-right text-muted"></i>
                    </div>
                </a>
            `);
            });

            $results.removeClass('d-none');
        }

        // ========================================
        // SELECT PRODUCT
        // ========================================
        $(document).on('click', '.product-search-item', function() {
            const sku = $(this).data('sku');
            const name = $(this).data('name');
            const image = $(this).data('image');
            const price = $(this).data('price');

            // Set hidden inputs
            $('#product_sku').val(sku);
            $('#product_name').val(name);
            $('#product_image').val(image);

            // Display selected product
            $('#selected_product_image').attr('src', image);
            $('#selected_product_name').text(name);
            $('#selected_product_sku').text(sku || 'N/A');

            // Show selected card and hide search results
            $('#selectedProductCard').removeClass('d-none');
            $('#productSearchResults').addClass('d-none');
            $('#product_search').val('');

            // Clear error
            $('.error-product').text('');

            // Update preview if amount exists
            updateCommissionPreview();
        });

        // Clear selected product
        $('#clearProduct').on('click', function() {
            $('#product_sku').val('');
            $('#product_name').val('');
            $('#product_image').val('');
            $('#selectedProductCard').addClass('d-none');
            $('#commissionPreview').addClass('d-none');
        });

        // ========================================
        // COMMISSION TYPE CHANGE
        // ========================================
        $('#commission_type').on('change', function() {
            const type = $(this).val();

            if (type === 'fixed') {
                $('#amountPrefix').text('৳');
                $('#amountHint').text('Enter fixed amount in BDT');
                $('#amount').attr('placeholder', 'Enter fixed amount');
            } else if (type === 'percentage') {
                $('#amountPrefix').text('%');
                $('#amountHint').text('Enter percentage (0-100)');
                $('#amount').attr('placeholder', 'Enter percentage').attr('max', 100);
            }

            $('.error-commission_type').text('');
            updateCommissionPreview();
        });

        // ========================================
        // AMOUNT INPUT
        // ========================================
        $('#amount').on('input', function() {
            const type = $('#commission_type').val();
            let value = parseFloat($(this).val());

            // Validate percentage
            if (type === 'percentage' && value > 100) {
                $(this).val(100);
                value = 100;
            }

            if (value < 0) {
                $(this).val(0);
            }

            $('.error-amount').text('');
            updateCommissionPreview();
        });

        // ========================================
        // STATUS TOGGLE
        // ========================================
        $('#status').on('change', function() {
            if ($(this).is(':checked')) {
                $('#statusLabel').text('Active').removeClass('text-danger').addClass('text-success');
            } else {
                $('#statusLabel').text('Inactive').removeClass('text-success').addClass('text-danger');
            }
        });

        // ========================================
        // COMMISSION PREVIEW
        // ========================================
        function updateCommissionPreview() {
            const type = $('#commission_type').val();
            const amount = parseFloat($('#amount').val()) || 0;
            const productName = $('#product_name').val();

            if (!type || !amount || !productName) {
                $('#commissionPreview').addClass('d-none');
                return;
            }

            let previewText = '';
            if (type === 'fixed') {
                previewText = `Commission of <strong>৳${amount}</strong> will be applied to <strong>${productName}</strong>`;
            } else if (type === 'percentage') {
                previewText = `Commission of <strong>${amount}%</strong> will be applied to <strong>${productName}</strong>`;
            }

            $('#previewText').html(previewText);
            $('#commissionPreview').removeClass('d-none');
        }

        // ========================================
        // FORM VALIDATION & SUBMISSION
        // ========================================
        $('#createCommissionForm').on('submit', function(e) {
            e.preventDefault();

            // Clear all errors
            $('.text-danger').text('');
            let hasError = false;

            // Validate product selection
            if (!$('#product_sku').val()) {
                $('.error-product').text('Please select a product');
                hasError = true;
            }

            // Validate commission type
            const commissionType = $('#commission_type').val();
            if (!commissionType) {
                $('.error-commission_type').text('Please select commission type');
                hasError = true;
            }

            // Validate amount
            const amount = parseFloat($('#amount').val());
            if (!amount || amount <= 0) {
                $('.error-amount').text('Please enter a valid amount');
                hasError = true;
            } else if (commissionType === 'percentage' && amount > 100) {
                $('.error-amount').text('Percentage cannot exceed 100');
                hasError = true;
            }

            if (hasError) {
                toastr.error('Please fix the errors before submitting');
                return false;
            }

            // Prepare form data
            const formData = new FormData(this);
            formData.set('status', $('#status').is(':checked') ? 1 : 0);

            const $submitBtn = $('#saveCommissionBtn');
            const originalText = $submitBtn.html();

            // Show loading
            $submitBtn.prop('disabled', true)
                .html('<span class="spinner-border spinner-border-sm me-1"></span>Saving...');

            // Submit via AJAX
            $.ajax({
                url: '{{ route("admin.product-commission-rates.store") }}',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    if (response.success) {
                        toastr.success(response.message || 'Commission created successfully');
                        $('#createModal').modal('hide');
                        $('#createCommissionForm')[0].reset();
                        resetForm();

                        // Reload table or redirect
                        if (typeof reloadCommissionsTable === 'function') {
                            reloadCommissionsTable();
                        } else {
                            location.reload();
                        }
                    } else {
                        toastr.error(response.message || 'Failed to create commission');
                    }
                },
                error: function(xhr) {
                    if (xhr.status === 422) {
                        const errors = xhr.responseJSON.errors;
                        for (let key in errors) {
                            $(`.error-${key}`).text(errors[key][0]);
                        }
                        toastr.error('Please fix the validation errors');
                    } else {
                        toastr.error('An error occurred. Please try again.');
                    }
                },
                complete: function() {
                    $submitBtn.prop('disabled', false).html(originalText);
                }
            });
        });

        // ========================================
        // RESET FORM
        // ========================================
        function resetForm() {
            $('#createCommissionForm')[0].reset();
            $('#selectedProductCard').addClass('d-none');
            $('#productSearchResults').addClass('d-none').empty();
            $('#commissionPreview').addClass('d-none');
            $('#product_sku, #product_name, #product_image').val('');
            $('.text-danger').text('');
            $('#amountPrefix').text('৳');
            $('#amountHint').text('Enter fixed amount in BDT');
            $('#statusLabel').text('Active');
        }

        // Reset on modal close
        $('#createModal').on('hidden.bs.modal', function() {
            resetForm();
        });

        // Hide search results when clicking outside
        $(document).on('click', function(e) {
            if (!$(e.target).closest('#product_search, #productSearchResults').length) {
                $('#productSearchResults').addClass('d-none');
            }
        });
    });
</script>
@endpush




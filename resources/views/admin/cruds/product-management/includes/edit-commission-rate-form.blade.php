<form id="editCommissionForm" action="{{ route('admin.product-commission-rates.update', $commissionRate->id) }}" enctype="multipart/form-data">
    @csrf
    @method('put')
    <div class="modal-header text-white">
        <h5 class="modal-title" id="createModalLabel">
            <i class="bi bi-percent me-2"></i>Edit Product Commission
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
            <input type="hidden" id="product_sku" name="product_sku" value="{{ $commissionRate->product_sku }}">
            <input type="hidden" id="product_name" name="product_name" value="{{ $commissionRate->product_name }}">
            <input type="hidden" id="product_image" name="product_image" value="{{ $commissionRate->product_image }}">
        </div>

        <div class="row">
            <!-- Commission Type -->
            <div class="col-md-6 mb-3">
                <label for="commission_type" class="form-label">
                    Commission Type <span class="text-danger">*</span>
                </label>
                <select class="form-select" id="commission_type" name="commission_type" required>
                    <option value="">Select Type</option>
                    <option value="fixed" {{ $commissionRate->commission_type == 'fixed' ? 'selected' : '' }}>Fixed Amount</option>
                    <option value="percentage" {{ $commissionRate->commission_type == 'percentage' ? 'selected' : '' }}>Percentage</option>
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
                           value="{{ $commissionRate->amount ?? 0 }}"
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
            <i class="bi bi-save me-1"></i>Update Commission
        </button>
    </div>
</form>

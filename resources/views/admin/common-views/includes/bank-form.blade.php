<form id="editBankForm" enctype="multipart/form-data" method="post" action="{{ route('admin.banks.update', $bank->id) }}">
    @csrf
    @method('PUT')

    <div class="modal-header">
        <h5 class="modal-title" id="editBankModalLabel">
            <i class="bi bi-pencil-square me-2"></i>Edit Bank
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>

    <div class="modal-body">
        <!-- Bank Name -->
        <div class="mb-3">
            <label for="edit_bank_name" class="form-label">
                Bank Name <span class="text-danger">*</span>
            </label>
            <input type="text"
                   class="form-control"
                   id="edit_bank_name"
                   name="name"
                   value="{{ old('name', $bank->name ?? '') }}"
                   placeholder="Enter bank name"
                   required>
            <div class="invalid-feedback">Please enter bank name.</div>
        </div>

        <!-- Bank Slug -->
        <div class="mb-3">
            <label for="edit_bank_slug" class="form-label">
                Slug <span class="text-muted small">(Auto-generated)</span>
            </label>
            <input type="text"
                   class="form-control bg-light"
                   id="edit_bank_slug"
                   name="slug"
                   value="{{ old('slug', $bank->slug ?? '') }}"
                   readonly>
        </div>

        <!-- Current Logo Display -->
        <div class="mb-3">
            <label class="form-label">Current Logo</label>
            <div class="text-center mb-2">
                <img id="edit_current_logo" src="{{ asset($bank->logo) }}" alt="Current Logo" class="img-thumbnail" style="max-height: 100px;">
            </div>
        </div>

        <!-- Bank Logo Update -->
        <div class="mb-3">
            <label for="edit_bank_logo" class="form-label">
                Update Logo <span class="text-muted small">(Optional)</span>
            </label>

            <!-- New Image Preview -->
            <div class="text-center mb-3 d-none" id="edit_logo_preview_container">
                <div class="border rounded p-3 bg-light">
                    <img id="edit_logo_preview" src="" alt="New Logo Preview" class="img-thumbnail" style="max-height: 150px; max-width: 100%;">
                </div>
            </div>

            <input type="file"
                   class="form-control"
                   id="edit_bank_logo"
                   name="logo"
                   accept="image/*">
            <small class="text-muted d-block mt-1">Leave empty to keep current logo</small>
            <div class="invalid-feedback">Please upload a valid image.</div>
        </div>

        <!-- Status -->
        <div class="mb-3">
            <label for="edit_bank_status" class="form-label">Status</label>
            <select class="form-select" id="edit_bank_status" name="status">
                <option value="1">Active</option>
                <option value="0">Inactive</option>
            </select>
        </div>
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
            <i class="bi bi-x-circle me-1"></i>Cancel
        </button>
        <button type="button" class="btn btn-primary" id="updateBankBtn">
            <i class="bi bi-save me-1"></i>Update Bank
        </button>
    </div>
</form>

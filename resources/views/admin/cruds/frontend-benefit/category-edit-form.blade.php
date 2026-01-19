<div class="modal-header">
    <h5 class="modal-title" id="editBankModalLabel">
        <i class="bi bi-bank me-2"></i>Edit
    </h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<form action="{{ route('admin.benefit-categories.update', ['benefit_category' => $category->id]) }}" method="post" id="">
    @csrf
    @method('put')
    <div class="modal-body">
        <!-- Bank Name -->
        <div class="mb-3">
            <label for="editCategory_name" class="form-label">
                Category Name <span class="text-danger">*</span>
            </label>
            <input type="text"
                   class="form-control"
                   id="editCategory_name"
                   name="title"
                   value="{{ $category->title ?? '' }}"
                   placeholder="Enter Category name"
                   required>
            <div class="invalid-feedback">Please enter Category name.</div>
        </div>
        <!-- User Type -->
        <div class="mb-3">
            <label for="user_type" class="form-label">
                User Type <span class="text-danger">*</span>
            </label>
            <select name="user_type" id="user_type" class="form-control" required>
                <option value="influencer" {{ $category->user_type == 'partner' ? 'selected' : '' }}>influencer</option>
                <option value="partner" {{ $category->user_type == 'partner' ? 'selected' : '' }}>partner</option>
            </select>
            <div class="invalid-feedback">Please select User Type.</div>
        </div>


        <!-- Status -->
        <div class="mb-3">
            {{--    <div class="form-check form-switch">--}}
            {{--        <input type="checkbox" role="switch" class="form-check-input" id="status" {{ $category->status ? 'checked' : '' }}/>--}}
            {{--        <label for="status" class="form-check-label">Publication Status</label>--}}
            {{--    </div>--}}
            <div class="custom-toggle-switch align-items-center mb-4">
                <span class="mb-3">Publication Status</span> <br>
                <input type="checkbox" id="editStatus" name="status" {{ $category->status ? 'checked' : '' }} />
                <label for="editStatus" class="label-primary"></label>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
            <i class="bi bi-x-circle me-1"></i>Cancel
        </button>
        <button type="submit" class="btn btn-primary" id="saveBankBtn">
            <i class="bi bi-save me-1"></i>Update Category
        </button>
    </div>
</form>

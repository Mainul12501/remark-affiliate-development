<div class="modal-header">
    <h5 class="modal-title" id="editBankModalLabel">
        <i class="bi bi-bank me-2"></i>Edit
    </h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<form action="{{ route('admin.benefit-lists.update', ['benefit_list' => $benefit->id]) }}" method="post" id="">
    @csrf
    @method('put')
    <div class="modal-body">
        <!-- Category -->
        <div class="mb-3">
            <label for="benefit_list_category_id" class="form-label">
                Category <span class="text-danger">*</span>
            </label>
            <select name="benefit_list_category_id" id="benefit_list_category_id" class="form-control" required>
                @foreach($benefitCategories as $benefitCategory)
                    <option value="{{ $benefitCategory->id }}" {{ $benefitCategory->id == $benefit->id ? 'selected' : '' }}>{{ $benefitCategory->title."($benefitCategory->user_type)" ?? '' }}</option>
                @endforeach
                {{--                                <option value="partner">partner</option>--}}
            </select>
            <div class="invalid-feedback">Please select Category.</div>
        </div>

        <!-- Brand Name -->
        <div class="mb-3">
            <label for="brand_title" class="form-label">
                Brand Name <span class="text-danger">*</span>
            </label>
            <input type="text"
                   class="form-control brand-title"
                   id="brand_title"
                   name="brand_title"
                   placeholder="Enter Brand Name"
                   value="{{ $benefit->brand_title ?? '' }}"
                   required>
            <div class="invalid-feedback">Please enter Brand name.</div>
        </div>

        <!-- Amount -->
        <div class="mb-3">
            <label for="amount" class="form-label">
                Discount Amount <span class="text-danger">*</span>
            </label>
            <input type="text"
                   class="form-control discount-amount"
                   id="amount"
                   name="amount"
                   max="100"
                   value="{{ $benefit->amount ?? 0 }}"
                   placeholder="Enter Discount Amount"
                   required>
            <div class="invalid-feedback">Please enter Discount Amount.</div>
        </div>



        <!-- Status -->
        <div class="mb-3">
            {{--                            <div class="form-check form-switch">--}}
            {{--                                <input type="checkbox" role="switch" class="form-check-input" id="status" checked/>--}}
            {{--                                <label for="status" class="form-check-label">Publication Status</label>--}}
            {{--                            </div>--}}
            <div class="custom-toggle-switch align-items-center mb-4">
                <span class="mb-3">Publication Status</span> <br>
                <input type="checkbox" id="editStatus" name="status" {{ $benefit->status == 1 ? "checked" : '' }} />
                <label for="editStatus" class="label-primary"></label>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
            <i class="bi bi-x-circle me-1"></i>Cancel
        </button>
        <button type="submit" class="btn btn-primary" id="saveBankBtn">
            <i class="bi bi-save me-1"></i>Update Brand Info
        </button>
    </div>
</form>

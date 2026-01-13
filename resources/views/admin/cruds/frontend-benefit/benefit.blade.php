@extends('admin.master')
@section('title', 'Benefit List')
@push('styles')
    @include('admin.datatables.datatable-style')
@endpush

@section('content')
    <div class="container-fluid pt-3">
        <div class="d-md-flex d-block align-items-center justify-content-between page-header-breadcrumb mb-3">
            <div class="my-auto">
                <h4 class="mb-sm-0 text-uppercase" style="font-family: 'Bell MT';font-size: 16px"><i class="mdi mdi-checkbox-marked-outline me-2"></i>Benefit List</h4>
            </div>
            <div class="d-flex my-xl-auto right-content align-items-center">
                <nav>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{url('/admin/dashboard')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Benefit List</li>
                    </ol>
                </nav>

            </div>
        </div>

        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center border-bottom">
                        <h5 class="card-title mb-0">
                            <i class="mdi mdi-view-list me-1"></i> Benefit List
                        </h5>
                        <a href="javascript:void(0)" class="btn btn-sm btn-outline-primary call-ajax-reload" data-bs-toggle="modal" data-bs-target="#createBenefitCategoryModal">
                            <i class="mdi mdi-plus-circle me-1"></i> Create
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table  class="table table-bordered text-nowrap w-100" id="brandDataTable">
                                <thead>
                                    <tr>
                                        <td>#</td>
                                        <td>Category</td>
                                        <td>Title</td>
                                        <td>Amount</td>
                                        <td>Slug</td>
                                        <td>Status</td>
                                        <td>Action</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($benefits as $benefit)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $benefit?->benefitListCategory?->title ?? '' }}</td>
                                            <td>{{ $benefit->brand_title ?? '' }}</td>
                                            <td>{{ $benefit?->amount ?? 0 }}</td>
                                            <td>{{ $benefit?->slug ?? '' }}</td>
                                            <td><span class="badge text-bg-{{ $benefit->status == 1 ? "success" : 'danger' }}">{{ $benefit->status == 1 ? "Published" : 'Unpublished' }}</span></td>
                                            <td>
                                                <a href="{{ route('admin.benefit-lists.edit', ['benefit_list' => $benefit->id, 'render' => 1]) }}" class="btn btn-outline-primary btn-sm edit-data" title="Edit"><i class="fa fa-pencil-alt"></i></a>
                                                <form action="{{ route('admin.benefit-lists.destroy', $benefit->id) }}" method="POST" class="d-inline">
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
    <!-- Create Bank Modal -->
    <div class="modal fade" id="createBenefitCategoryModal" >
        <div class="modal-dialog modal-dialog-centered">

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createBankModalLabel">
                        <i class="bi bi-bank me-2"></i>Create Benefit Info
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="createBankForm" action="{{ route('admin.benefit-lists.store') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="modal-body">
                        <!-- Category -->
                        <div class="mb-3">
                            <label for="benefit_list_category_id" class="form-label">
                                Category <span class="text-danger">*</span>
                            </label>
                            <select name="benefit_list_category_id" id="benefit_list_category_id" class="form-control" required>
                                @foreach($benefitCategories as $benefitCategory)
                                    <option value="{{ $benefitCategory->id }}">{{ $benefitCategory->title." ($benefitCategory->user_type)" ?? '' }}</option>
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
                                   required>
                            <div class="invalid-feedback">Please enter Brand name.</div>
                        </div>

                        <!-- Amount -->
                        <div class="mb-3">
                            <label for="editAmount" class="form-label">
                                Discount Amount <span class="text-danger">*</span>
                            </label>
                            <input type="text"
                                   class="form-control discount-amount"
                                   id="editAmount"
                                   name="amount"
                                   placeholder="Enter Discount Amount"
                                   max="100"
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
                                <input type="checkbox" id="status" name="status" checked />
                                <label for="status" class="label-primary"></label>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            <i class="bi bi-x-circle me-1"></i>Cancel
                        </button>
                        <button type="submit" class="btn btn-primary" id="saveBankBtn">
                            <i class="bi bi-save me-1"></i>Save Category
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit Bank Modal -->
    <div class="modal fade" id="editModal">
        <div class="modal-dialog modal-dialog-centered">

            <div class="modal-content" id="editModelBody">

            </div>
        </div>
    </div>
@endsection

@push('scripts')
{{--    <script src="{{asset('backend/build/assets/libs/flatpickr/flatpickr.min.js')}}"></script>--}}
    @include('admin.datatables.datatable-script')
    @include('admin.includes.toasts')
{{--    @include('admin.partials.user.user-index-script')--}}
<script>
    $(document).ready(function () {
        $('#brandDataTable').DataTable();
    });
</script>
{{--    edit Category--}}
<script>
    $(document).on('click', '.edit-data', function () {
        event.preventDefault();
        let thisElement = $(this);
        $.ajax({
            url: thisElement.attr('href'),
            method: "GET",
            success: function (response) {
                $('#editModelBody').empty().append(response);
                $('#editModal').modal('show');
            },
            error: function (error) {
                showAjaxToast('error', error)
            }
        })
    })
</script>

{{--    validation --}}
<script>
    $(document).ready(function () {

        const brandRegex = /[a-zA-Z]/;
        const maxDiscount = 100;

        // =============================
        // HELPERS
        // =============================
        function showError(input, message) {
            $(input).addClass('is-invalid');
            $(input).closest('.mb-3').find('.invalid-feedback').text(message);
        }

        function clearError(input) {
            $(input).removeClass('is-invalid');
        }

        // =============================
        // LIVE BRAND VALIDATION
        // =============================
        $(document).on('input', '.brand-title', function () {
            const value = $(this).val().trim();

            if (value === '') {
                showError(this, 'Please enter Brand name.');
            }
            else if (!brandRegex.test(value)) {
                showError(this, 'Brand name cannot be numbers only.');
            }
            else {
                clearError(this);
            }
        });

        // =============================
        // LIVE AMOUNT VALIDATION
        // =============================
        $(document).on('input', '.discount-amount', function () {
            let value = $(this).val();

            // numeric only
            value = value.replace(/[^0-9]/g, '');
            $(this).val(value);

            if (value === '') {
                showError(this, 'Please enter Discount Amount.');
            }
            else if (parseInt(value) > maxDiscount) {
                showError(this, 'Discount amount cannot be more than 100.');
            }
            else {
                clearError(this);
            }
        });

        // =============================
        // FORM SUBMIT (CREATE + EDIT)
        // =============================
        $(document).on('submit', 'form', function (e) {

            // only target benefit forms
            if (!$(this).find('.brand-title').length) return;

            let isValid = true;
            const form = $(this);

            // Brand validation
            form.find('.brand-title').each(function () {
                const value = $(this).val().trim();

                if (value === '') {
                    showError(this, 'Please enter Brand name.');
                    isValid = false;
                }
                else if (!brandRegex.test(value)) {
                    showError(this, 'Brand name cannot be numbers only.');
                    isValid = false;
                }
            });

            // Amount validation
            form.find('.discount-amount').each(function () {
                const value = $(this).val();

                if (value === '') {
                    showError(this, 'Please enter Discount Amount.');
                    isValid = false;
                }
                else if (parseInt(value) > maxDiscount) {
                    showError(this, 'Discount amount cannot be more than 100.');
                    isValid = false;
                }
            });

            if (!isValid) {
                e.preventDefault();
            }
        });

    });
</script>




@endpush




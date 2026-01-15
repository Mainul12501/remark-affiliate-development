@extends('admin.master')
@section('title', 'Bank List')
@push('styles')
    @include('admin.datatables.datatable-style')
@endpush

@section('content')
    <div class="container-fluid pt-3">
        <div class="d-md-flex d-block align-items-center justify-content-between page-header-breadcrumb mb-3">
            <div class="my-auto">
                <h4 class="mb-sm-0 text-uppercase" style="font-family: 'Bell MT';font-size: 16px"><i class="mdi mdi-checkbox-marked-outline me-2"></i>bank List</h4>
            </div>
            <div class="d-flex my-xl-auto right-content align-items-center">
                <nav>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{url('/admin/dashboard')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">bank List</li>
                    </ol>
                </nav>

            </div>
        </div>

        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center border-bottom">
                        <h5 class="card-title mb-0">
                            <i class="mdi mdi-view-list me-1"></i> Brand List
                        </h5>
                        <a href="javascript:void(0)" class="btn btn-sm btn-outline-primary call-ajax-reload" data-bs-toggle="modal" data-bs-target="#createBankModal">
                            <i class="mdi mdi-plus-circle me-1"></i> Create Bank
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
                                        <td>Status</td>
                                        <td>Action</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($banks as $bank)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td><img src="{{ asset($bank->logo) }}" style="height: 50px" class="img-fluid" alt="{{ $bank->name }} logo"></td>
                                            <td>{{ $bank->name ?? '' }}</td>
                                            <td><span class="badge text-bg-{{ $bank->status == 1 ? "success" : 'danger' }}">{{ $bank->status == 1 ? "Published" : 'Unpublished' }}</span></td>
                                            <td>
                                                <a href="{{ route('admin.banks.edit', $bank->id) }}" class="btn btn-outline-primary btn-sm edit-bank" title="Edit"><i class="fa fa-pencil-alt"></i></a>
                                                <form action="{{ route('admin.banks.destroy', $bank->id) }}" method="POST" class="d-inline">
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
    <div class="modal fade" id="createBankModal" >
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form id="createBankForm" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="createBankModalLabel">
                            <i class="bi bi-bank me-2"></i>Create Bank
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <!-- Bank Name -->
                        <div class="mb-3">
                            <label for="bank_name" class="form-label">
                                Bank Name <span class="text-danger">*</span>
                            </label>
                            <input type="text"
                                   class="form-control"
                                   id="bank_name"
                                   name="name"
                                   placeholder="Enter bank name"
                                   required>
                            <div class="invalid-feedback">Please enter bank name.</div>
                        </div>

                        <!-- Bank Slug (Auto-generated) -->
                        <div class="mb-3">
                            <label for="bank_slug" class="form-label">
                                Slug <span class="text-muted small">(Auto-generated)</span>
                            </label>
                            <input type="text"
                                   class="form-control bg-light"
                                   id="bank_slug"
                                   name="slug"
                                   placeholder="auto-generated-slug"
                                   readonly>
                            <small class="text-muted">URL-friendly version of the bank name</small>
                        </div>

                        <!-- Bank Logo -->
                        <div class="mb-3">
                            <label for="bank_logo" class="form-label">
                                Bank Logo <span class="text-danger">*</span>
                            </label>

                            <!-- Image Preview -->
                            <div class="text-center mb-3">
                                <div class="bank-logo-preview border rounded p-3 bg-light" id="logoPreviewBox" style="min-height: 150px; display: flex; align-items: center; justify-content: center;">
                                    <div id="logoPlaceholder">
                                        <i class="bi bi-image display-4 text-muted"></i>
                                        <p class="text-muted small mb-0 mt-2">No logo uploaded</p>
                                    </div>
                                    <img id="logoPreview" src="" alt="Bank Logo" class="img-thumbnail d-none" style="max-height: 150px; max-width: 100%;">
                                </div>
                            </div>

                            <input type="file"
                                   class="form-control"
                                   id="bank_logo"
                                   name="logo"
                                   accept="image/*"
                                   required>
                            <small class="text-muted d-block mt-1">Recommended: 200x200px, PNG/JPG, Max 2MB</small>
                            <div class="invalid-feedback">Please upload bank logo.</div>
                        </div>

                        <!-- Status -->
{{--                        <div class="mb-3">--}}
{{--                            <label for="bank_status" class="form-label">Status</label>--}}
{{--                            <select class="form-select" id="bank_status" name="status">--}}
{{--                                <option value="1" selected>Active</option>--}}
{{--                                <option value="0">Inactive</option>--}}
{{--                            </select>--}}
{{--                        </div>--}}
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            <i class="bi bi-x-circle me-1"></i>Cancel
                        </button>
                        <button type="submit" class="btn btn-primary" id="saveBankBtn">
                            <i class="bi bi-save me-1"></i>Save Bank
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit Bank Modal -->
    <div class="modal fade" id="editBankModal" tabindex="-1" aria-labelledby="editBankModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" id="editBrand">

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

{{--    brand create or update--}}
<script>
    $(document).ready(function() {
        // ========================================
        // AUTO-GENERATE SLUG
        // ========================================
        function generateSlug(text) {
            return text
                .toLowerCase()
                .replace(/[^\w\s-]/g, '')
                .replace(/\s+/g, '-')
                .replace(/--+/g, '-')
                .trim();
        }

        // Generate slug for create form
        $('#bank_name').on('input', function() {
            const name = $(this).val();
            const slug = generateSlug(name);
            $('#bank_slug').val(slug);
        });

        // Generate slug for edit form
        $(document).on('input', '#edit_bank_name', function () {
            const name = $(this).val();
            const slug = generateSlug(name);
            $('#edit_bank_slug').val(slug);
        });

        // ========================================
        // IMAGE PREVIEW - CREATE FORM
        // ========================================
        $('#bank_logo').on('change', function(e) {
            const file = e.target.files[0];

            if (file) {
                // Validate file type
                if (!file.type.startsWith('image/')) {
                    showAjaxToast('error', 'Please select a valid image file');
                    $(this).val('');
                    return;
                }

                // Validate file size (2MB)
                if (file.size > 2 * 1024 * 1024) {
                    showAjaxToast('error', 'Image size should not exceed 2MB')
                    $(this).val('');
                    return;
                }

                const reader = new FileReader();
                reader.onload = function(e) {
                    $('#logoPlaceholder').addClass('d-none');
                    $('#logoPreview').attr('src', e.target.result).removeClass('d-none');
                };
                reader.readAsDataURL(file);
            }
        });

        // ========================================
        // IMAGE PREVIEW - EDIT FORM
        // ========================================
        $('#edit_bank_logo').on('change', function(e) {
            const file = e.target.files[0];

            if (file) {
                // Validate file type
                if (!file.type.startsWith('image/')) {
                    showAjaxToast('error', 'Please select a valid image file')
                    $(this).val('');
                    return;
                }

                // Validate file size (2MB)
                if (file.size > 2 * 1024 * 1024) {
                    showAjaxToast('error', 'Image size should not exceed 2MB')
                    $(this).val('');
                    return;
                }

                const reader = new FileReader();
                reader.onload = function(e) {
                    $('#edit_logo_preview').attr('src', e.target.result);
                    $('#edit_logo_preview_container').removeClass('d-none');
                };
                reader.readAsDataURL(file);
            }
        });

        // ========================================
        // CREATE BANK FORM SUBMISSION
        // ========================================
        $('#createBankForm').on('submit', function(e) {
            e.preventDefault();

            // Validate form
            if (!this.checkValidity()) {
                e.stopPropagation();
                $(this).addClass('was-validated');
                return;
            }

            const formData = new FormData(this);
            const submitBtn = $('#saveBankBtn');
            const originalText = submitBtn.html();

            // Show loading state
            submitBtn.prop('disabled', true).html('<span class="spinner-border spinner-border-sm me-1"></span>Saving...');

            $.ajax({
                url: '{{ route("admin.banks.store") }}',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    if (response.status) {
                        showAjaxToast(response.status, response.message);
                        // toastr.success(response.message || 'Bank created successfully');
                        $('#createBankModal').modal('hide');
                        $('#createBankForm')[0].reset();
                        $('#createBankForm').removeClass('was-validated');

                        // Reset image preview
                        $('#logoPlaceholder').removeClass('d-none');
                        $('#logoPreview').addClass('d-none').attr('src', '');

                        // Reload table or add new row
                        // if (typeof reloadBanksTable === 'function') {
                        //     reloadBanksTable();
                        // } else {
                        //     location.reload();
                        // }
                        location.reload();
                    } else {
                        // toastr.error(response.message || 'Failed to create bank');
                        showAjaxToast(response.status, response.message);
                    }
                },
                error: function(xhr) {
                    if (xhr.status === 422) {
                        const errors = xhr.responseJSON.errors;
                        let errorMessage = '';
                        for (let key in errors) {
                            errorMessage += errors[key][0] + '<br>';
                        }
                        showAjaxToast('error', errorMessage)
                    } else {
                        showAjaxToast('error', 'An error occurred. Please try again.')
                    }
                },
                complete: function() {
                    submitBtn.prop('disabled', false).html(originalText);
                }
            });
        });

        // ========================================
        // EDIT BANK - LOAD DATA
        // ========================================
        // window.editBank = function(bankId) {
        //     $.ajax({
        //         url: `/admin/banks/${bankId}/edit`,
        //         type: 'GET',
        //         success: function(response) {
        //             if (response.success) {
        //                 const bank = response.data;
        //
        //                 $('#edit_bank_id').val(bank.id);
        //                 $('#edit_bank_name').val(bank.name);
        //                 $('#edit_bank_slug').val(bank.slug);
        //                 $('#edit_bank_status').val(bank.status);
        //                 $('#edit_current_logo').attr('src', bank.logo_url);
        //                 $('#edit_logo_preview_container').addClass('d-none');
        //
        //                 $('#editBankModal').modal('show');
        //             } else {
        //                 toastr.error('Failed to load bank data');
        //             }
        //         },
        //         error: function() {
        //             toastr.error('An error occurred while loading bank data');
        //         }
        //     });
        // };

        // ========================================
        // UPDATE BANK FORM SUBMISSION
        // ========================================
        $(document).on('click', '#updateBankBtn', function (e) {
            e.preventDefault();

            const form = document.getElementById('editBankForm'); // ✅ DOM element
            const submitBtn = $(this);
            const originalText = submitBtn.html();
            const formUrl = form.action;

            // Bootstrap / HTML5 validation
            if (!form.checkValidity()) {
                e.stopPropagation();
                form.classList.add('was-validated');
                return;
            }

            const formData = new FormData(form);

            submitBtn
                .prop('disabled', true)
                .html('<span class="spinner-border spinner-border-sm me-1"></span>Updating...');

            $.ajax({
                url: formUrl,
                type: 'POST', // Laravel handles PUT via _method
                data: formData,
                processData: false,
                contentType: false,

                success: function (response) {
                    if (response.status) {
                        showAjaxToast('success', response.message || 'Bank updated successfully')
                        $('#editBankModal').modal('hide');
                        form.classList.remove('was-validated');
                        location.reload();
                    } else {
                        showAjaxToast('error', response.message || 'Failed to update bank')
                    }
                },

                error: function (xhr) {
                    if (xhr.status === 422) {
                        let errorMessage = '';
                        const errors = xhr.responseJSON.errors;

                        Object.values(errors).forEach(err => {
                            errorMessage += err[0] + '<br>';
                        });

                        showAjaxToast('error', errorMessage)
                    } else {
                        showAjaxToast('error', 'An error occurred. Please try again.')
                    }
                },

                complete: function () {
                    submitBtn.prop('disabled', false).html(originalText);
                }
            });
        });

        // ========================================
        // RESET FORM ON MODAL CLOSE
        // ========================================
        $('#createBankModal').on('hidden.bs.modal', function() {
            $('#createBankForm')[0].reset();
            $('#createBankForm').removeClass('was-validated');
            $('#logoPlaceholder').removeClass('d-none');
            $('#logoPreview').addClass('d-none').attr('src', '');
        });

        $('#editBankModal').on('hidden.bs.modal', function() {
            $('#editBankForm')[0].reset();
            $('#editBankForm').removeClass('was-validated');
            $('#edit_logo_preview_container').addClass('d-none');
        });
    });
</script>
{{--    edit bank--}}
<script>
    $(document).on('click', '.edit-bank', function () {
        event.preventDefault();
        let thisElement = $(this);
        $.ajax({
            url: thisElement.attr('href'),
            method: "GET",
            success: function (response) {
                $('#editBrand').empty().append(response);
                $('#editBankModal').modal('show');
            },
            error: function (error) {
                showAjaxToast('error', error)
            }
        })
    })
</script>
@endpush




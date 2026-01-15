@extends('admin.master')
@section('title', 'Benefit Category List')
@push('styles')
    @include('admin.datatables.datatable-style')
@endpush

@section('content')
    <div class="container-fluid pt-3">
        <div class="d-md-flex d-block align-items-center justify-content-between page-header-breadcrumb mb-3">
            <div class="my-auto">
                <h4 class="mb-sm-0 text-uppercase" style="font-family: 'Bell MT';font-size: 16px"><i class="mdi mdi-checkbox-marked-outline me-2"></i>Benefit Category List</h4>
            </div>
            <div class="d-flex my-xl-auto right-content align-items-center">
                <nav>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{url('/admin/dashboard')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Benefit Category List</li>
                    </ol>
                </nav>

            </div>
        </div>

        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center border-bottom">
                        <h5 class="card-title mb-0">
                            <i class="mdi mdi-view-list me-1"></i> Benefit Category List
                        </h5>
                        <a href="javascript:void(0)" class="btn btn-sm btn-outline-primary call-ajax-reload" data-bs-toggle="modal" data-bs-target="#createBenefitCategoryModal">
                            <i class="mdi mdi-plus-circle me-1"></i> Create Category
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table  class="table table-bordered text-nowrap w-100" id="brandDataTable">
                                <thead>
                                    <tr>
                                        <td>#</td>
                                        <td>Name</td>
                                        <td>Type</td>
                                        <td>Created By</td>
                                        <td>Status</td>
                                        <td>Action</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($benefitCategories as $benefitCategory)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $benefitCategory->title ?? '' }}</td>
                                            <td>{{ $benefitCategory?->user_type ?? '' }}</td>
                                            <td>{{ $benefitCategory?->createdBy?->name ?? '' }}</td>
                                            <td><span class="badge text-bg-{{ $benefitCategory->status == 1 ? "success" : 'danger' }}">{{ $benefitCategory->status == 1 ? "Published" : 'Unpublished' }}</span></td>
                                            <td>
                                                <a href="{{ route('admin.benefit-categories.edit', ['benefit_category' => $benefitCategory->id, 'render' => 1]) }}" class="btn btn-outline-primary btn-sm edit-data" title="Edit"><i class="fa fa-pencil-alt"></i></a>
                                                <form action="{{ route('admin.benefit-categories.destroy', $benefitCategory->id) }}" method="POST" class="d-inline">
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
                        <i class="bi bi-bank me-2"></i>Create Category
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="createBankForm" action="{{ route('admin.benefit-categories.store') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="modal-body">
                        <!-- Bank Name -->
                        <div class="mb-3">
                            <label for="category_name" class="form-label">
                                Category Name <span class="text-danger">*</span>
                            </label>
                            <input type="text"
                                   class="form-control"
                                   id="category_name"
                                   name="title"
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
                                <option value="influencer">influencer</option>
                                <option value="partner">partner</option>
                            </select>
                            <div class="invalid-feedback">Please select User Type.</div>
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
@endpush




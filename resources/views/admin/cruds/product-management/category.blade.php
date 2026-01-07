@extends('admin.master')
@section('title', 'Categories')
@push('styles')
    @include('admin.datatables.datatable-style')
@endpush

@section('content')
    <div class="container-fluid pt-3">
        <div class="d-md-flex d-block align-items-center justify-content-between page-header-breadcrumb mb-3">
            <div class="my-auto">
                <h4 class="mb-sm-0 text-uppercase" style="font-family: 'Bell MT';font-size: 16px"><i class="mdi mdi-checkbox-marked-outline me-2"></i>Product Category</h4>
            </div>
            <div class="d-flex my-xl-auto right-content align-items-center">
                <nav>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{url('/admin/dashboard')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Product Category</li>
                    </ol>
                </nav>

            </div>
        </div>

        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center border-bottom">
                        <h5 class="card-title mb-0">
                            <i class="mdi mdi-view-list me-1"></i> Category List
                        </h5>
                        <a href="{{ route('admin.categories.create') }}" class="btn btn-sm btn-outline-primary call-ajax-reload">
                            <i class="mdi mdi-plus-circle me-1"></i> Sync Category
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table  class="table table-bordered text-nowrap w-100" id="categoryDataTable">
                                <thead>
                                    <tr>
                                        <td>#</td>
                                        <td>Image</td>
                                        <td>Name</td>
                                        <td>Herlan info</td>
                                        <td>Total Products</td>
                                        <td>Status</td>
                                        <td>Action</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($categories as $category)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td><img src="{{ asset($category->thumb_img) }}" style="height: 50px" class="img-fluid w-100" alt="{{ $category->name }} logo"></td>
                                            <td>{{ $category->name ?? '' }}</td>
                                            <td>
                                                <p>ID: {{ $category->herlan_cat_id ?? '' }}</p>
                                                <p>Slug: {{ $category->herlan_cat_slug ?? '' }}</p>
                                                <p>URI: {{ $category->herlan_cat_uri ?? '' }}</p>
                                            </td>
                                            <td>{{ $category->herlan_cat_total_products ?? 0 }}</td>
                                            <td>{{ $category->status == 1 ? "Published" : 'Unpublished' }}</td>
                                            <td>
{{--                                                <a href="{{ route('admin.brands.edit', $category->id) }}" class="btn btn-outline-primary btn-sm" title="Edit"><i class="fa fa-pencil-alt"></i></a>--}}
                                                <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" class="d-inline">
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

@push('scripts')
{{--    <script src="{{asset('backend/build/assets/libs/flatpickr/flatpickr.min.js')}}"></script>--}}
    @include('admin.datatables.datatable-script')
{{--    @include('admin.partials.user.user-index-script')--}}
<script>
    $(document).ready(function () {
        $('#categoryDataTable').DataTable();
    });
</script>

@endpush




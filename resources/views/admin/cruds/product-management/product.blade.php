@extends('admin.master')
@section('title', 'Products')
@push('styles')
    @include('admin.datatables.datatable-style')

@endpush

@section('content')
    <div class="container-fluid pt-3">
        <div class="d-md-flex d-block align-items-center justify-content-between page-header-breadcrumb mb-3">
            <div class="my-auto">
                <h4 class="mb-sm-0 text-uppercase" style="font-family: 'Bell MT';font-size: 16px"><i class="mdi mdi-checkbox-marked-outline me-2"></i>Products</h4>
            </div>
            <div class="d-flex my-xl-auto right-content align-items-center">
                <nav>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{url('/admin/dashboard')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Products</li>
                    </ol>
                </nav>

            </div>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center border-bottom">
                        <h5 class="card-title mb-0">
                            <i class="mdi mdi-view-list me-1"></i> Product List
                        </h5>
                        <a href="{{ route('admin.products.create') }}" class="btn btn-sm btn-outline-primary">
                            <i class="mdi mdi-plus-circle me-1"></i> Sync Products
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table  class="table table-bordered text-nowrap w-100" id="productDataTable">
                                <thead>
                                    <tr>
                                        <td>#</td>
                                        <td>Images</td>
                                        <td>Name</td>
                                        <td>Price</td>
                                        <td>SKU</td>
                                        <td>Herlan info</td>
                                        <td>Info</td>
                                        <td>Status</td>
                                        <td>Action</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($products as $product)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                @foreach($product->productImages as $productImage)
                                                    <span class="m-2"><img src="{{ asset($productImage->src) }}" style="height: 50px" class="img-fluid" alt="{{ $productImage->title }} image"></span>
                                                @endforeach
                                            </td>
                                            <td>{{ $product->title ?? '' }}</td>
                                            <td>
                                                <p>Regular: {{ $product->regular_price ?? 0 }}</p>
                                                <p>Price: {{ $product->sale_price ?? 0 }}</p>
                                            </td>
                                            <td>{{ $product->sku ?? '' }}</td>
                                            <td>
                                                <p>ID: {{ $product->herlan_product_id ?? '' }}</p>
                                                <p>URI: {{ $product->herlan_product_uri ?? '' }}</p>
                                            </td>
                                            <td>{!! str()->words($product->short_description, 20) ?? '' !!}</td>
                                            <td>{{ $product->status == 1 ? "Published" : 'Unpublished' }}</td>
                                            <td>
                                                <a href="{{ route('admin.products.show', $product->id) }}" class="btn btn-outline-success btn-sm" title="Edit"><i class="fa fa-eye"></i></a>
{{--                                                <a href="{{ route('admin.brands.edit', $product->id) }}" class="btn btn-outline-primary btn-sm" title="Edit"><i class="fa fa-pencil-alt"></i></a>--}}
                                                <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" class="d-inline">
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
        $('#productDataTable').DataTable();
    });
</script>



@endpush




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
                        <a href="{{ route('admin.brands.create') }}" class="btn btn-sm btn-outline-primary call-ajax-reload" data-bs-toggle="modal" data-bs-target="#createModal">
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
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
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
        $('#brandDataTable').DataTable();
    });
</script>

@endpush




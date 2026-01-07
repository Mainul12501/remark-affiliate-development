@extends('admin.master')
@section('title', 'Brands')
@push('styles')
    @include('admin.datatables.datatable-style')
{{--    <link rel="modulepreload" href="{{asset('backend/build/assets/date_time_pickers-CfSDcSmz.js')}}" />--}}
{{--    <link rel="stylesheet" href="{{asset('backend/css/custom.css')}}"/>--}}
{{--    <style>--}}
{{--        div.dataTables_length label{--}}
{{--            margin-left: 15px !important;--}}
{{--        }--}}
{{--        .dataTables_processing {--}}
{{--            display: none !important;--}}
{{--        }--}}
{{--        #userDataTable_wrapper .dataTables_info{--}}
{{--            float: left !important;--}}
{{--            padding-top: 15px !important;--}}
{{--        }--}}
{{--        #userDataTable_wrapper .dataTables_paginate{--}}
{{--            padding-top: 12px !important;--}}
{{--        }--}}
{{--    </style>--}}
@endpush

@section('content')
    <div class="container-fluid pt-3">
        <div class="d-md-flex d-block align-items-center justify-content-between page-header-breadcrumb mb-3">
            <div class="my-auto">
                <h4 class="mb-sm-0 text-uppercase" style="font-family: 'Bell MT';font-size: 16px"><i class="mdi mdi-checkbox-marked-outline me-2"></i>Brands</h4>
            </div>
            <div class="d-flex my-xl-auto right-content align-items-center">
                <nav>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{url('/admin/dashboard')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Brands</li>
                    </ol>
                </nav>

            </div>
        </div>
{{--        <div class="row mb-4">--}}
{{--            <div class="col-xl-7 mx-auto">--}}
{{--                <div class="card">--}}
{{--                    <div class="card-body">--}}
{{--                        <form id="filter_form" class="form-inline justify-content-center">--}}
{{--                            <div class="row">--}}
{{--                                <div class="col-md-4">--}}
{{--                                    <div class="input-group">--}}
{{--                                        <span class="input-group-text text-muted"><i class="ri-calendar-line"></i></span>--}}
{{--                                        <input type="text" name="from_date"  max="{{date('Y-m-d H:i:s')}}"  class="form-control py-2" id="from_date" placeholder="From date">--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="col-md-4">--}}
{{--                                    <div class="input-group">--}}
{{--                                        <span class="input-group-text text-muted"><i class="ri-calendar-line"></i></span>--}}
{{--                                        <input type="text" name="to_date"  max="{{date('Y-m-d H:i:s')}}"  class="form-control py-2" id="to_date" placeholder="To date">--}}
{{--                                    </div>--}}
{{--                                </div>--}}

{{--                                <div class="col-md-3">--}}
{{--                                    <div class="btn-group" role="group" aria-label="Filter actions">--}}
{{--                                        <button type="submit" class="btn btn-outline-primary " id="filterBtn" title="Filter">--}}
{{--                                            <i class="ri-search-line"></i> Filter--}}
{{--                                        </button>--}}
{{--                                        <button type="button" class="btn btn-outline-secondary  ajax_reload" id="resetBtn" title="Refresh">--}}
{{--                                            <i class="ri-refresh-line"></i>--}}
{{--                                        </button>--}}
{{--                                    </div>--}}
{{--                                </div>--}}

{{--                            </div>--}}
{{--                        </form>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}

        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center border-bottom">
                        <h5 class="card-title mb-0">
                            <i class="mdi mdi-view-list me-1"></i> Brand List
                        </h5>
                        <a href="{{ route('admin.brands.create') }}" class="btn btn-sm btn-outline-primary call-ajax-reload">
                            <i class="mdi mdi-plus-circle me-1"></i> Sync Brand
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
                                        <td>Herlan info</td>
                                        <td>Note</td>
                                        <td>Status</td>
                                        <td>Action</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($brands as $brand)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td><img src="{{ asset($brand->logo) }}" style="height: 70px" class="img-fluid w-100" alt="{{ $brand->name }} logo"></td>
                                            <td>{{ $brand->name ?? '' }}</td>
                                            <td>
                                                <p>ID: {{ $brand->herlan_brand_id ?? '' }}</p>
                                                <p>Slug: {{ $brand->herlan_brand_slug ?? '' }}</p>
                                            </td>
                                            <td>{{ $brand->note ?? '' }}</td>
                                            <td>{{ $brand->status == 1 ? "Published" : 'Unpublished' }}</td>
                                            <td>
{{--                                                <a href="{{ route('admin.brands.edit', $brand->id) }}" class="btn btn-outline-primary btn-sm" title="Edit"><i class="fa fa-pencil-alt"></i></a>--}}
                                                <form action="{{ route('admin.brands.destroy', $brand->id) }}" method="POST" class="d-inline">
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
        $('#brandDataTable').DataTable();
    });
</script>

@endpush




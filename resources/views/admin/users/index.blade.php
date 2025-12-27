@extends('admin.master')
@section('title','User')
@push('styles')
    @include('admin.datatables.datatable-style')
    <link rel="modulepreload" href="{{asset('backend/build/assets/date_time_pickers-CfSDcSmz.js')}}" />
    <link rel="stylesheet" href="{{asset('backend/css/custom.css')}}"/>
    <style>
        div.dataTables_length label{
            margin-left: 15px !important;
        }
        .dataTables_processing {
            display: none !important;
        }
        #userDataTable_wrapper .dataTables_info{
            float: left !important;
            padding-top: 15px !important;
        }
        #userDataTable_wrapper .dataTables_paginate{
            padding-top: 12px !important;
        }
    </style>
@endpush

@section('content')
    <div class="container-fluid">

        <div class="d-md-flex d-block align-items-center justify-content-between page-header-breadcrumb mb-5">
            <div class="my-auto">
                <h4 class="mb-sm-0 text-uppercase" style="font-family: 'Bell MT';font-size: 16px"><i class="mdi mdi-checkbox-marked-outline me-2"></i>Users</h4>
            </div>
            <div class="d-flex my-xl-auto right-content align-items-center">
                <nav>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{url('/admin/dashboard')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Users</li>
                    </ol>
                </nav>

            </div>
        </div>

        <div class="row mb-4">
            <div class="col-xl-7 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <form id="filter_form" class="form-inline justify-content-center">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <span class="input-group-text text-muted"><i class="ri-calendar-line"></i></span>
                                        <input type="text" name="from_date"  max="{{date('Y-m-d H:i:s')}}"  class="form-control py-2" id="from_date" placeholder="From date">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <span class="input-group-text text-muted"><i class="ri-calendar-line"></i></span>
                                        <input type="text" name="to_date"  max="{{date('Y-m-d H:i:s')}}"  class="form-control py-2" id="to_date" placeholder="To date">
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="btn-group" role="group" aria-label="Filter actions">
                                        <button type="submit" class="btn btn-outline-primary rounded-0" id="filterBtn" title="Filter">
                                            <i class="ri-search-line"></i> Filter
                                        </button>
                                        <button type="button" class="btn btn-outline-secondary rounded-0  ajax_reload" id="resetBtn" title="Refresh">
                                            <i class="ri-refresh-line"></i>
                                        </button>
                                    </div>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center border-bottom">
                        <h5 class="card-title mb-0">
                            <i class="mdi mdi-view-list me-1"></i> User List
                        </h5>
                        <a href="{{ route('users.create') }}" class="btn btn-sm btn-outline-primary">
                            <i class="mdi mdi-plus-circle me-1"></i> Create
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table  class="table table-bordered text-nowrap w-100" id="userDataTable"></table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{asset('backend/build/assets/libs/flatpickr/flatpickr.min.js')}}"></script>
    @include('admin.datatables.datatable-script')
    @include('admin.partials.user.user-index-script')
@endpush

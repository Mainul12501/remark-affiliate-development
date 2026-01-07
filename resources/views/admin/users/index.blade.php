@extends('admin.master')
@section('title','User')
@push('styles')
    @include('admin.datatables.datatable-style')
    <link rel="modulepreload" href="{{asset('backend/build/assets/date_time_pickers-CfSDcSmz.js')}}" />
    <link rel="stylesheet" href="{{asset('backend/css/custom.css')}}"/>
    <style>
        /* Bottom info + pagination same line */
        .dt-container .dt-info,
        .dt-container .dt-paging {
            display: inline-flex;
            align-items: center;
        }

        /* Wrap both in one row */
        .dt-container {
            position: relative;
        }

        /* Info (Showing...) left */
        .dt-container .dt-info {
            float: left;
        }

        /* Pagination right */
        .dt-container .dt-paging {
            float: right;
        }
    </style>
@endpush

@section('content')
    <div class="container-fluid pt-3">
        <div class="d-md-flex d-block align-items-center justify-content-between page-header-breadcrumb mb-4">
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
                            <table  class="table table-bordered mb-3 w-100" id="userDataTable">
                                <thead>
                                    <tr>
                                        <td>Image</td>
                                        <td>Name</td>
                                        <td>Email</td>
                                        <td>Mobile</td>
                                        <td>Approved_by</td>
                                        <td>Status</td>
                                        <td>Created_at</td>
                                        <td>Action</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($rows as $key=>$row)
                                        <tr>
                                            <td>
                                                <img src="{{ asset($row->profile_image) }}" alt="User Image" class="rounded-circle" style="width: 50px; height: 50px;">
                                            </td>
                                            <td>{{ $row->name }}</td>
                                            <td>{{ $row->email }}</td>
                                            <td>{{ $row->mobile}}</td>
                                            <td>{{ $row->approved_by }}</td>
                                            <td>
                                                @if($row->approve_status === 1)
                                                    <span class="badge bg-outline-success px-2">Active</span>
                                                @elseif($row->approve_status === 0)
                                                    <span class="badge bg-outline-danger px-2">Inactive</span>
                                                @endif
                                            </td>
                                            <td>{{ $row->created_at->format('Y-m-d')??''}}</td>
                                            <td class="text-center">
                                                <a href="{{ route('users.show', $row->id) }}" class="btn btn-sm btn-outline-secondary me-1" title="View">
                                                    <i class="ri-eye-line"></i>
                                                </a>
                                                <a href="{{ route('users.edit', $row->id) }}" class="btn btn-sm btn-outline-primary me-1" title="Edit">
                                                    <i class="ri-pencil-line"></i>
                                                </a>
                                                <form action="{{ route('users.destroy', $row->id) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-outline-danger" title="Delete" onclick="return confirm('Are you sure you want to delete this user?')">
                                                        <i class="ri-delete-bin-line"></i>
                                                    </button>
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
    <script src="{{asset('backend/build/assets/libs/flatpickr/flatpickr.min.js')}}"></script>
    @include('admin.datatables.datatable-script')
    <script>
        $(document).ready(function () {
            $('#userDataTable').DataTable({
                dom: 'QBfrtip',
                searchBuilder: true,
                responsive: true,
                buttons: ['copy', 'csv','excel'],

                language: {
                    searchBuilder: {
                        title: {
                            0: 'Condition search filter',
                            _: 'Custom Search Conditions (%d)'
                        },
                        value: 'Option',
                        valueJoiner: 'et'
                    }
                },
                customSearchOptions: {
                    title: 'Condition search filter'
                },
            });

            $('.dt-buttons .btn').addClass('mb-3 rounded-0 btn-sm');
            $('.dt-buttons').addClass('gap-2');
        });
    </script>
@endpush

@extends('admin.master')
@section('title', 'Dashboard')
@section('content')
    <div class="container my-4">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-8 col-sm-10">
                <div class="card text-center shadow-sm border-0">
                    <div class="card-body py-4">
                        <h3 class="mb-2 text-dark">
                            <i class="mdi mdi-account me-2"></i>
                            Hi, welcome back {{ Auth::user()->name ?? '' }}!
                        </h3>
                        <h2 class="text-muted small mb-0">We're glad to have you back.</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection




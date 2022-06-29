@extends('user.dashboard.layout.app')
@section('title')
    Dashboard
@endsection
@section('content')
    <div class="row gx-2 gx-lg-3">
        <div class="col-sm-6 col-lg-4 mb-3 mb-lg-5">
            <!-- Card -->
            <div class="card h-100">
                <div class="card-body">
                    <h6 class="card-subtitle mb-2">Profile Impression</h6>

                    <div class="row align-items-center gx-2">
                        <div class="col">
                            <span class="js-counter display-4 text-dark" data-value="24">0</span>
                            <span class="text-body font-size-sm ml-1">Time</span>
                        </div>
                    </div>
                    <!-- End Row -->
                </div>
            </div>
            <!-- End Card -->
        </div>

        <div class="col-sm-6 col-lg-4 mb-3 mb-lg-5">
            <!-- Card -->
            <div class="card h-100">
                <div class="card-body">
                    <h6 class="card-subtitle mb-2">Today Profile Impression</h6>

                    <div class="row align-items-center gx-2">
                        <div class="col">
                            <span class="js-counter display-4 text-dark" data-value="12">0</span>
                            <span class="text-body font-size-sm ml-1">Time</span>
                        </div>
                    </div>
                    <!-- End Row -->
                </div>
            </div>
            <!-- End Card -->
        </div>

        <div class="col-sm-6 col-lg-4 mb-3 mb-lg-5">
            <!-- Card -->
            <div class="card h-100">
                <div class="card-body">
                    <h6 class="card-subtitle mb-2">Active card</h6>

                    <div class="row align-items-center gx-2">
                        <div class="col">
                            <span class="js-counter display-4 text-dark"
                                data-value="0">{{ Auth::user()->cardOrder()->count() }} </span>
                            <span class="text-body font-size-sm ml-1">Card</span>
                        </div>
                    </div>
                    <!-- End Row -->
                </div>
            </div>
            <!-- End Card -->
        </div>
    </div>
    <div class="row">
        <x-order-status />
        <div class="col-md-4">
            <div class="card mb-3 mb-lg-5">
                <div class="card-header">
                    <h2 class="card-header-title h5">Recent Activities</h2>
                </div>
                <div class="card-body card-body-height card-body-centered">
                    <img class="avatar avatar-xxl mb-3" src="{{ asset('assets/svg/illustrations/yelling.svg') }}"
                        alt="Image Description">
                    <p class="card-text">No data to show</p>
                    <a class="btn btn-sm btn-white" href="{{ route('user.order.index') }}">Order Card today</a>
                </div>
            </div>
        </div>

    </div>
@endsection

@extends('admin.dashboard.layout.app')
@section('title')
    Dashboard
@endsection
@section('content')
    <div class="row gx-2 gx-lg-3">
        <div class="col-sm-6 col-lg-4 mb-3 mb-lg-5">
            <div class="card h-100">
                <div class="card-body">
                    <h6 class="card-subtitle mb-2">Total users</h6>

                    <div class="row align-items-center gx-2">
                        <div class="col">
                            <span class="js-counter display-4 text-dark"
                                data-value="{{ $users->count() }}">{{ $users->count() }}</span>
                            <span class="text-body font-size-sm ml-1">Time</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-4 mb-3 mb-lg-5">
            <div class="card h-100">
                <div class="card-body">
                    <h6 class="card-subtitle mb-2">Pending Users</h6>

                    <div class="row align-items-center gx-2">
                        <div class="col">
                            <span class="js-counter display-4 text-dark"
                                data-value="{{ $users->where('status', 'pending')->count() }}">{{ $users->where('status', 'pending')->count() }}</span>
                            <span class="text-body font-size-sm ml-1">Time</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-4 mb-3 mb-lg-5">
            <div class="card h-100">
                <div class="card-body">
                    <h6 class="card-subtitle mb-2">Active Users</h6>

                    <div class="row align-items-center gx-2">
                        <div class="col">
                            <span class="js-counter display-4 text-dark"
                                data-value="{{ $users->where('status', 'active')->count() }}">{{ $users->where('status', 'active')->count() }}</span>
                            <span class="text-body font-size-sm ml-1">Card</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-4 mb-3 mb-lg-5">
            <div class="card h-100">
                <div class="card-body">
                    <h6 class="card-subtitle mb-2">Total Orders</h6>

                    <div class="row align-items-center gx-2">
                        <div class="col">
                            <span class="js-counter display-4 text-dark"
                                data-value="{{ $orders->count() }}">{{ $orders->count() }}</span>
                            <span class="text-body font-size-sm ml-1">Card</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-4 mb-3 mb-lg-5">
            <div class="card h-100">
                <div class="card-body">
                    <h6 class="card-subtitle mb-2">Pending Orders</h6>

                    <div class="row align-items-center gx-2">
                        <div class="col">
                            <span class="js-counter display-4 text-dark"
                                data-value="{{ $orders->where('status', 'pending')->count() }}">{{ $orders->where('status', 'pending')->count() }}</span>
                            <span class="text-body font-size-sm ml-1">Card</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-4 mb-3 mb-lg-5">
            <div class="card h-100">
                <div class="card-body">
                    <h6 class="card-subtitle mb-2">Pending Orders</h6>

                    <div class="row align-items-center gx-2">
                        <div class="col">
                            <span class="js-counter display-4 text-dark"
                                data-value="{{ $orders->where('status', 'shipped')->count() }}">{{ $orders->where('status', 'shipped')->count() }}</span>
                            <span class="text-body font-size-sm ml-1">Card</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-4 mb-3 mb-lg-5">
            <div class="card h-100">
                <div class="card-body">
                    <h6 class="card-subtitle mb-2">Stock</h6>

                    <div class="row align-items-center gx-2">
                        <div class="col">
                            <span class="js-counter display-4 text-dark" data-value="0">{{  $orders->count() }}</span>
                            <span class="text-body font-size-sm ml-1">Cards Solid</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-4 mb-3 mb-lg-5">
            <div class="card h-100">
                <div class="card-body">
                    <h6 class="card-subtitle mb-2">Cards Purchase Amount</h6>

                    <div class="row align-items-center gx-2">
                        <div class="col">
                            <span class="js-counter display-4 text-dark" data-value="{{ number_format($amount,2) }}">$ {{ number_format($amount,2) }}</span>
                            <span class="text-body font-size-sm ml-1"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 mb-3 mb-lg-5">
            <!-- Card -->
            <div class="card h-100">
                <!-- Header -->
                <div class="card-header">
                    <h5 class="card-header-title">Import data into Front Dashboard</h5>
                </div>
                <!-- End Header -->

                <!-- Body -->
                <div class="card-body">
                    <p>Quick Admin Access.</p>
                    <hr>
                    <ul class="list-group list-group-flush list-group-no-gutters">
                        <li class="list-group-item py-3">
                            <div class="media">
                                <div class="media-body">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h5 class="mb-0">All Users</h5>
                                            <span class="d-block font-size-sm">Users</span>
                                        </div>

                                        <div class="col-auto">
                                            <a class="btn btn-sm btn-primary"
                                                href="{{ route('admin.dashboard.users') }}">
                                                Go to Users Section<i class="tio-open-in-new ml-1"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <!-- End Row -->
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item py-3">
                            <div class="media">
                                <div class="media-body">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h5 class="mb-0">All Orders</h5>
                                            <span class="d-block font-size-sm">Order</span>
                                        </div>

                                        <div class="col-auto">
                                            <a class="btn btn-sm btn-primary"
                                                href="{{ route('admin.dashboard.orders') }}">
                                                Go to Orders Section<i class="tio-open-in-new ml-1"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <!-- End Row -->
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <!-- End Body -->
            </div>
            <!-- End Card -->
        </div>
        <div class="col-lg-6 mb-3 mb-lg-5">
            <!-- Card -->
            <div class="card h-100">
                <!-- Header -->
                <div class="card-header">
                    <h5 class="card-header-title">Update Stock</h5>
                </div>
                <!-- End Header -->

                <!-- Body -->
                <div class="card-body">
                    <p>Add more Stock in system.</p>
                    <h3 class="card-title">Current Stock: <span
                            class="text-success display-2">{{ $admin->stock }}</span></h3>
                    <hr>
                    <form action="{{ route('admin.dashboard.stock.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="qty">Add more Stock into System</label>
                                    <input type="number" name="qty" id="qty" class="form-control"
                                        placeholder="Add more Cards into Stock eg: 20">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <input type="submit" value="Update Stock" class="btn btn-md btn-primary">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- End Body -->
            </div>
            <!-- End Card -->
        </div>
    </div>
@endsection

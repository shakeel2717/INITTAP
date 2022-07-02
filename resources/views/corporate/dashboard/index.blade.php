@extends('corporate.layout.app')
@section('title')
    Dashboard
@endsection
@section('content')
    <div class="row gx-2 gx-lg-3">
        <div class="col-sm-6 col-lg-4 mb-3 mb-lg-5">
            <div class="card h-100">
                <div class="card-body">
                    <h6 class="card-subtitle mb-2">Total Users</h6>

                    <div class="row align-items-center gx-2">
                        <div class="col">
                            <span
                                class="js-counter display-4 text-dark">{{ $users->count() }}</span>
                            <span class="text-body font-size-sm ml-1">Users</span>
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
                            <span
                                class="js-counter display-4 text-dark">{{ $users->where('status','active')->count() }}</span>
                            <span class="text-body font-size-sm ml-1">Users</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-4 mb-3 mb-lg-5">
            <div class="card h-100">
                <div class="card-body">
                    <h6 class="card-subtitle mb-2">In Active Users</h6>

                    <div class="row align-items-center gx-2">
                        <div class="col">
                            <span
                                class="js-counter display-4 text-dark">{{ $users->where('status','deactivated')->count() }}</span>
                            <span class="text-body font-size-sm ml-1">Users</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

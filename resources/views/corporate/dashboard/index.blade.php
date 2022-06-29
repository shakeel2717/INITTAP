@extends('corporate.layout.app')
@section('title')
    Dashboard
@endsection
@section('content')
    <div class="row gx-2 gx-lg-3">
        <div class="col-sm-6 col-lg-4 mb-3 mb-lg-5">
            <div class="card h-100">
                <div class="card-body">
                    <h6 class="card-subtitle mb-2">Available Balance</h6>

                    <div class="row align-items-center gx-2">
                        <div class="col">
                            <span
                                class="js-counter display-4 text-dark">{{ number_format(balance(session('corporate')->id), 2) }}</span>
                            <span class="text-body font-size-sm ml-1">USD</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-4 mb-3 mb-lg-5">
            <div class="card h-100">
                <div class="card-body">
                    <h6 class="card-subtitle mb-2">Total Deposit</h6>

                    <div class="row align-items-center gx-2">
                        <div class="col">
                            <span
                                class="js-counter display-4 text-dark">{{ number_format(totalDeposit(session('corporate')->id), 2) }}</span>
                            <span class="text-body font-size-sm ml-1">USD</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-4 mb-3 mb-lg-5">
            <div class="card h-100">
                <div class="card-body">
                    <h6 class="card-subtitle mb-2">Spend on Cards</h6>

                    <div class="row align-items-center gx-2">
                        <div class="col">
                            <span
                                class="js-counter display-4 text-dark">{{ number_format(totalSpend(session('corporate')->id), 2) }}</span>
                            <span class="text-body font-size-sm ml-1">USD</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row gx-2 gx-lg-3">
        <div class="col-sm-6 col-lg-4 mb-3 mb-lg-5">
            <div class="card h-100">
                <div class="card-body">
                    <h6 class="card-subtitle mb-2">Total Users</h6>

                    <div class="row align-items-center gx-2">
                        <div class="col">
                            <span
                                class="js-counter display-4 text-dark">0</span>
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
                                class="js-counter display-4 text-dark">0</span>
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
                                class="js-counter display-4 text-dark">0</span>
                            <span class="text-body font-size-sm ml-1">Users</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

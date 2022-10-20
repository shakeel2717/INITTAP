@extends('user.dashboard.layout.app')
@section('title')
Affiliate System
@endsection
@section('content')
<div class="row gx-2 gx-lg-3">
    <div class="col-sm-6 col-lg-4 mb-3 mb-lg-5">
        <!-- Card -->
        <div class="card h-100">
            <div class="card-body">
                <h6 class="card-subtitle mb-2">Available Balance</h6>

                <div class="row align-items-center gx-2">
                    <div class="col">
                        <span class="js-counter display-4 text-dark" data-value="24">${{ number_format(referCommission(auth()->user()->id),2) }}</span>
                        <span class="text-body font-size-sm ml-1">USD</span>
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
                <h6 class="card-subtitle mb-2">Total Active Refers</h6>

                <div class="row align-items-center gx-2">
                    <div class="col">
                        <span class="js-counter display-4" data-value="24">{{ referCount(auth()->user()->id)->count() }}</span>
                        <span class="text-body font-size-sm ml-1">Refer(s)</span>
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
                <h6 class="card-subtitle mb-2">Total Withdraw</h6>

                <div class="row align-items-center gx-2">
                    <div class="col">
                        <span class="js-counter display-4" data-value="24">${{ number_format(0,2) }}</span>
                        <span class="text-body font-size-sm ml-1">USD</span>
                    </div>
                </div>
                <!-- End Row -->
            </div>
        </div>
        <!-- End Card -->
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card card-lg mb-3 mb-lg-5">
            <div class="card-body text-center">
                <div class="w-50 mx-auto mb-4">
                    <img class="img-fluid" src="{{ asset('assets/marketing.png') }}" alt="Image Description" width="250">
                </div>

                <div class="mb-3">
                    <h3>Copy your Refer LINK</h3>
                    <p>Copy and share your Refer Link to your friends and family, you will get paid once anyone buy INITTAP Card.
                    </p>
                </div>

                <div class="my-2">
                    <div class="form-group w-50 mx-auto">
                        <div class="input-group mb-3">
                            <input type="text" id="referLink" class="form-control" placeholder="Copy Your Refer Link" aria-label="Copy Your Refer Link" aria-describedby="referButton" value="{{ route('register',['refer' => auth()->user()->username]) }}" readonly>
                            <div class="input-group-append">
                                <button onclick="copyToClipboard();" class="btn btn-outline-secondary" type="button" id="referButton clickToCopy"><i class="tio-copy"></i></button>
                            </div>
                        </div>
                    </div>
                </div>


                <a class="btn btn-primary" id="clickToCopy" href="http://127.0.0.1:8000/user/order/index">Copy Refer Link</a>
            </div>
        </div>
    </div>
</div>
@endsection
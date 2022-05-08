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
                            <span class="js-counter display-4 text-dark" data-value="56">@Auth::user()->cardOrder()->count()</span>
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
        @if (Auth::user()->cardOrder()->count() < 1)
            <div class="col-md-4">
                <div class="card card-lg mb-3 mb-lg-5">
                    <div class="card-body text-center">
                        <div class="w-50 mx-auto mb-4">
                            <img class="img-fluid" src="{{ asset('assets/img/nocard.svg') }}" alt="Image Description"
                                width="250">
                        </div>

                        <div class="mb-3">
                            <h3>No Card Found!</h3>
                            <p>You don't have any Active Card in your Profile, Please order 1 card to start using our
                                service.
                            </p>
                        </div>

                        <a class="btn btn-primary" href="{{ route('user.order.index') }}">Order Card now</a>
                    </div>
                </div>
            </div>
        @elseif (Auth::user()->cardOrder()->count() > 0)
            @if (Auth::user()->cardOrder[0]->status == 'pending')
                <div class="col-md-4">
                    <div class="card card-lg mb-3 mb-lg-5">
                        <div class="card-body text-center">
                            <div class="w-50 mx-auto mb-4">
                                <img class="img-fluid" src="{{ asset('assets/img/truck.png') }}"
                                    alt="Image Description" width="150">
                            </div>

                            <div class="mb-3">
                                <h3>Your Card is on the way!</h3>
                                <p>you can activate the card once your recieve in your address you provide us while placing
                                    order to card.
                                </p>
                            </div>

                            <a class="btn btn-primary" href="#">Contact us</a>
                        </div>
                    </div>
                </div>
            @elseif (Auth::user()->cardOrder[0]->status == 'shipped')
                <div class="col-md-4">
                    <div class="card card-lg mb-3 mb-lg-5">
                        <div class="card-body text-center">
                            <div class="w-50 mx-auto mb-4">
                                <img class="img-fluid" src="{{ asset('assets/img/shipped.png') }}"
                                    alt="Image Description" width="150">
                            </div>

                            <div class="mb-3">
                                <h3>Your Card Delivered!</h3>
                                <p>you can activate the card once your recieve in your address you provide us while placing
                                    order to card.
                                </p>
                            </div>

                            <a class="btn btn-primary" href="{{ route('user.public.edit') }}">Manage Profile</a>
                        </div>
                    </div>
                </div>
            @elseif (Auth::user()->cardOrder[0]->status == 'complete')
                <div class="col-md-4">
                    <div class="card card-lg mb-3 mb-lg-5">
                        <div class="card-body text-center">
                            <div class="w-50 mx-auto mb-4">
                                <img class="img-fluid" src="{{ asset('assets/img/complete.svg') }}"
                                    alt="Image Description" width="300">
                            </div>

                            <div class="mb-3">
                                <h3>Your Card is Active!</h3>
                                <p>You can change and update your public profile record anytime
                                </p>
                            </div>

                            <a class="btn btn-primary" href="{{ route('user.public.single') }}">View Profile</a>
                        </div>
                    </div>
                </div>
            @elseif (Auth::user()->cardOrder[0]->status == 'initiate')
                <div class="col-md-4">
                    <div class="card card-lg mb-3 mb-lg-5">
                        <div class="card-body text-center">
                            <div class="w-50 mx-auto mb-4">
                                <img class="img-fluid" src="{{ asset('assets/img/complete.svg') }}"
                                    alt="Image Description" width="300">
                            </div>

                            <div class="mb-3">
                                <h3>Waiting Payment...!</h3>
                                <p>Your Order Placed, Please wait for the payment confirmation.
                                </p>
                            </div>

                            <a class="btn btn-primary" href="{{ route('user.public.single') }}">View Profile</a>
                        </div>
                    </div>
                </div>
            @endif
        @endif
        <div class="col-md-4">
            <div class="card card-lg mb-3 mb-lg-5">
                <div class="card-body text-center">
                    <div class="w-50 mx-auto mb-4">
                        <img class="img-fluid" src="{{ asset('assets/img/qr-code.png') }}" alt="QR Code Download"
                            width="160">
                    </div>
                    <div class="mb-3">
                        <h3>Download Your QR!</h3>
                        <p>You can Download your {{ env('APP_NAME') }} Public Profile QR Code
                        </p>
                    </div>
                    <a class="btn btn-primary" href="{{ route('user.public.qr.download') }}">Download now</a>
                </div>
            </div>
        </div>
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

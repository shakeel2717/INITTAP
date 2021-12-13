@extends('user.dashboard.layout.app')
@section('title')
    Order a new Card
@endsection
@section('content')
    <div class="row gx-2 gx-lg-3">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">Update Your Shipping Address</h3>
                    <hr>
                    <p>Update your Address before Place an order for any card, After fill the Address Form, Click on the
                        following update Address info button to save your Address, if you need any help, feel free to
                        contact us.</p>
                    <div class="row">
                        <div class="col-md-12">
                            <form action="{{ route('user.profile.address.update') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <x-input type="text" name="name" class="form-control" placeholder="Full Name"
                                                value="{{ $address->name }}" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <x-input type="text" name="address" class="form-control"
                                                placeholder="Full Address" value="{{ $address->address }}" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <x-input type="text" name="city" class="form-control"
                                                placeholder="Type City Name" value="{{ $address->city }}" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <x-input type="text" name="zip" class="form-control form-control-lg"
                                                placeholder="Enter Zip Code" value="{{ $address->zip }}" />
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="country">Select Country</label>
                                            <x-cities />
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary">Update Address Info</button>
                                        </div>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">Your Selected Card</h2>
                    <hr>
                    <div class="row">
                        <div class="col">
                            <p>Preview of your Card</p>
                            {{-- <img class="card-back-image" src="{{ asset('assets/img/card/') }}/{{ $card->img }}-back.png" alt="Selected Card">
                            <h2 class="cards-title">Shakeel Ahmad</h2>
                            <p class="cards-desg">CEO</p> --}}
                            <div class="card-box">
                                <div class="card-left">
                                    <img src="{{ asset('assets/img/card/man.png') }}" alt="Profile Picture">
                                </div>
                                <div class="card-right">
                                    <img src="{{ asset('assets/img/brand/logo-light.svg') }}" alt="Logo">
                                    <h2>Shakeel Ahmad</h2>
                                    <h4>Website Designer</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <a href="{{ route('user.order.index') }}" class="btn btn-lg btn-block btn-white">Change the Card</a>
                        </div>
                        <div class="col-md-6">
                            <a href="" class="btn btn-lg btn-block btn-primary">Proceed to Checkout</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('user.dashboard.layout.app')
@section('title')
    Order a new Card
@endsection
@section('content')
    <div class="row gx-2 gx-lg-3">
        <div class="col-md-12">
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
                                            <x-input type="text" name="name" class="form-control"
                                                placeholder="Full Name" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <x-input type="text" name="address" class="form-control"
                                                placeholder="Full Address" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <x-input type="text" name="city" class="form-control"
                                                placeholder="Type City Name" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <x-input type="text" name="zip" class="form-control form-control-lg"
                                                placeholder="Enter Zip Code" />
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="country">Select Country</label>
                                            <x-cities />
                                        </div>
                                    </div>
                                    <input type="hidden" name="order_id" value="{{ $card->id }}">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary">Update Address & Continue <i
                                                    class="tio-arrow-large-forward"></i> </button>
                                        </div>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

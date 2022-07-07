@extends('corporate.layout.app')
@section('title')
    Card Order
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-8 mb-3 mb-lg-0 mx-auto">
            <div class="card mb-3 mb-lg-5">
                <div class="card-header">
                    <h4 class="card-header-title">Card Ordering for Employee / User</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('corporate.dashboard.cards.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="user_id">Select User</label>
                                    <select name="user_id" id="user_id" class="form-control">
                                        <option value="">Select User</option>
                                        @foreach ($users as $user)
                                            <option value="{{ $user->id }}">{{ $user->username }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="pricing_id">Select Card</label>
                                    <select name="pricing_id" id="pricing_id" class="form-control">
                                        <option value="">Select User</option>
                                        @foreach ($cards as $card)
                                            <option value="{{ $card->id }}">{{ $card->title }} |
                                                {{ $card->category }} |
                                                $ {{ number_format($card->price_corporate, 2) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <x-input name="user_name" type="text" placeholder="Enter User's Full Name."
                                    value="{{ old('user_name') }}" />
                            </div>
                            <div class="col-md-6">
                                <x-input name="user_address" type="text" placeholder="Enter User's Adddress."
                                    value="{{ old('user_address') }}" />
                            </div>
                            <div class="col-md-6">
                                <x-input name="user_city" type="text" placeholder="Enter User's City."
                                    value="{{ old('user_city') }}" />
                            </div>
                            <div class="col-md-6">
                                <x-input name="user_zip" type="text" placeholder="Enter User's Zip."
                                    value="{{ old('user_zip') }}" />
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="country">Select Country</label>
                                    <x-cities />
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-lg btn-block btn-primary">Proceed to Card
                                        Customization</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

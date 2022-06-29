@if (!$cardOrder)
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
@elseif ($cardOrder)
    @if ($cardOrder->status == 'pending')
        <div class="col-md-4">
            <div class="card card-lg mb-3 mb-lg-5">
                <div class="card-body text-center">
                    <div class="w-50 mx-auto mb-4">
                        <img class="img-fluid" src="{{ asset('assets/img/truck.png') }}" alt="Image Description"
                            width="150">
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
    @elseif ($cardOrder->status == 'shipped')
        <div class="col-md-4">
            <div class="card card-lg mb-3 mb-lg-5">
                <div class="card-body text-center">
                    <div class="w-50 mx-auto mb-4">
                        <img class="img-fluid" src="{{ asset('assets/img/shipped.png') }}" alt="Image Description"
                            width="150">
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
    @elseif ($cardOrder->status == 'complete')
        <div class="col-md-4">
            <div class="card card-lg mb-3 mb-lg-5">
                <div class="card-body text-center">
                    <div class="w-50 mx-auto mb-4">
                        <img class="img-fluid" src="{{ asset('assets/img/complete.svg') }}" alt="Image Description"
                            width="300">
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
    @elseif ($cardOrder->status == 'initiate')
        <div class="col-md-4">
            <div class="card card-lg mb-3 mb-lg-5">
                <div class="card-body text-center">
                    <div class="w-50 mx-auto mb-4">
                        <img class="img-fluid" src="{{ asset('assets/img/complete.svg') }}" alt="Image Description"
                            width="300">
                    </div>

                    <div class="mb-3">
                        <h3>Waiting Payment...!</h3>
                        <p>Your Order Placed, Please wait for the payment confirmation.
                        </p>
                    </div>
                    <form action="{{ route('api.attempt') }}" method="POST">
                        @csrf
                        <input type="hidden" name="price" value="{{ $cardOrder->pricing->price }}">
                        <input type="hidden" name="payment_type" value="{{ $cardOrder->payment_type }}">
                        <input type="hidden" name="type" value="{{ $cardOrder->type }}">
                        <button class="btn btn-primary" type="submit">Pay Now</button>
                    </form>
                </div>
            </div>
        </div>
    @endif
@endif
@if ($cardOrder == true && $cardOrder->status != 'initiate')
    <div class="col-md-4">
        <div class="card card-lg mb-3 mb-lg-5">
            <div class="card-body text-center">
                <div class="w-50 mx-auto mb-4">
                    <img class="img-fluid" src="{{ asset('assets/img/qr-code.png') }}" alt="QR Code Download"
                        width="160">
                </div>
                <div class="mb-3">
                    <h3>Download Your QR Code</h3>
                    <p>You can Download your {{ env('APP_NAME') }} Public Profile QR Code
                    </p>
                </div>
                <a class="btn btn-primary" href="{{ route('user.public.qr.download') }}">Download now</a>
            </div>
        </div>
    </div>
@endif

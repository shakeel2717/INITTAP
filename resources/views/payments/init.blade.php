@extends('errors.layout.app')
@section('title')
    Payment Confirmed
@endsection
@section('content')
    <div class="footer-height-offset d-flex justify-content-center align-items-center flex-column">
        <div class="row align-items-sm-center w-100">
            <div class="col-sm-6">
                <div class="text-center text-sm-right mr-sm-4 mb-5 mb-sm-0">
                    <img class="w-60 w-sm-100 mx-auto" src="{{ asset('assets/img/check.png') }}" alt="Image Description"
                        style="max-width: 15rem;">
                </div>
            </div>

            <div class="col-sm-6 col-md-4 text-center text-sm-left">
                <h1 class="display-1 mb-0 text-primary">Redirecting...</h1>
                <p class="lead">Please wait, while we are redirecting you to Payment Page</p>
                <form action="{!! $data->params->hppUrl !!}" method="POST">
                    <input type="hidden" name="referenceId" id="referenceId" value="{{ $data->params->referenceId }}">
                    <input type="hidden" name="hppRequestId" id="hppRequestId" value="{{ $data->params->hppRequestId }}">
                    <button type="submit" id="checkout-button" class="btn btn-primary">Redirect now</button>
                </form>
            </div>
        </div>
    </div>
@endsection

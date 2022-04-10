@extends('errors.layout.app')
@section('title')
    Payment Confirmed
@endsection
@section('content')
    <div class="footer-height-offset d-flex justify-content-center align-items-center flex-column">
        <div class="row align-items-sm-center w-100">

            <div class="col-md-8 text-center text-sm-left mx-auto">
                <img class="w-60 w-sm-100 mx-auto" src="{{ asset('assets/img/gateway.jpg') }}" alt="Image Description"
                    style="max-width: 15rem;">
                <h1 class="display-1 mb-0 text-primary">Redirecting...</h1>
                <p class="lead">Please wait, while we are redirecting you to Payment Page</p>
                <form action="{!! $data->params->hppUrl !!}" method="POST" id="gatewayForm">
                    <input type="hidden" name="referenceId" id="referenceId" value="{{ $data->params->referenceId }}">
                    <input type="hidden" name="hppRequestId" id="hppRequestId" value="{{ $data->params->hppRequestId }}">
                    <button type="submit" id="checkout-button" class="btn btn-primary">Redirect now</button>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('footer')
    <script>
        $(document).ready(function() {
            setTimeout(function() {
                $('#gatewayForm').submit();
            }, 5000);
        });
    </script>
@endsection

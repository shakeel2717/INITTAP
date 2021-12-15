@extends('errors.layout.app')
@section('title')
    Payment Confirmed
@endsection
@section('content')
<div class="footer-height-offset d-flex justify-content-center align-items-center flex-column">
    <div class="row align-items-sm-center w-100">
      <div class="col-sm-6">
        <div class="text-center text-sm-right mr-sm-4 mb-5 mb-sm-0">
          <img class="w-60 w-sm-100 mx-auto" src="{{ asset('assets/img/close.png') }}" alt="Image Description" style="max-width: 15rem;">
        </div>
      </div>

      <div class="col-sm-6 col-md-4 text-center text-sm-left">
        <h1 class="display-1 mb-0 text-primary">Failed</h1>
        <p class="lead">Sorry, But Your payment is Failed.</p>
        <a class="btn btn-primary" href="{{ route('user.dashboard.index') }}">Back to Dashboard</a>
      </div>
    </div>
  </div>
@endsection
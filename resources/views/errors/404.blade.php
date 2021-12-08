@extends('errors.layout.app')
@section('title')
    Page not Found
@endsection
@section('content')
<div class="footer-height-offset d-flex justify-content-center align-items-center flex-column">
    <div class="row align-items-sm-center w-100">
      <div class="col-sm-6">
        <div class="text-center text-sm-right mr-sm-4 mb-5 mb-sm-0">
          <img class="w-60 w-sm-100 mx-auto" src="./assets/svg/illustrations/think.svg" alt="Image Description" style="max-width: 15rem;">
        </div>
      </div>

      <div class="col-sm-6 col-md-4 text-center text-sm-left">
        <h1 class="display-1 mb-0">404</h1>
        <p class="lead">Sorry, the page you're looking for cannot be found.</p>
        <a class="btn btn-primary" href="{{ route('dashboard') }}">Back to Dashboard</a>
      </div>
    </div>
  </div>
@endsection
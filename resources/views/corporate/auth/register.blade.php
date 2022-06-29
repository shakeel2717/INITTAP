@extends('auth.layout.app')
@section('title')
    Registration Page
@endsection
@section('form')
    <form class="js-validate" method="POST" action="{{ route('corporate.auth.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="text-center">
            <div class="mb-5">
                <h1 class="display-4 text-warning">Corporate Registration</h1>
                <div class="mb-5">
                    <p>Already have an Account <a href="{{ route('corporate.auth.login') }}">Sign In
                            here</a></p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <x-input name="name" type="text" placeholder="Enter Business Name." value="{{ old('name') }}" />
            </div>
            <div class="col-md-6">
                <x-input name="phone" type="text" placeholder="Enter Business Phone." value="{{ old('phone') }}" />
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <x-input name="address" type="text" placeholder="Enter Business Address."
                    value="{{ old('address') }}" />
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <x-input name="document" type="file" placeholder="Upload Business Document." value="" />
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <x-input name="email" type="email" placeholder="Enter Business Email." value="{{ old('email') }}" />
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <x-input name="password" type="password" placeholder="Enter Business Password."
                    value="{{ old('password') }}" />
            </div>
        </div>
        <div class="form-group">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="termsCheckbox" name="remember">
                <label class="custom-control-label text-muted" for="termsCheckbox"> I Agree to the Terms and
                    Conditions</label>
            </div>
        </div>
        <button type="submit" class="btn btn-lg btn-block btn-primary">Create Corporate Account</button>
    </form>
@endsection

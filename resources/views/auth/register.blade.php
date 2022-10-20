@extends('auth.layout.app')
@section('title')
Create Account
@endsection
@section('form')
<form class="js-validate" method="POST" action="{{ route('register') }}">
    @csrf
    <div class="text-center">
        <div class="mb-5">
            <h1 class="display-4">Create your account</h1>
            <p>Already have an Account? <a href="{{ route('login') }}">Sign in
                    here</a></p>
        </div>

        <x-social-login />

        <span class="divider text-muted mb-4">OR</span>
    </div>
    <div class="row">
        <div class="col-md-6">
            <x-input name="name" type="text" placeholder="Full Name" value="{{ old('name') }}" />
        </div>
        <div class="col-md-6">
            <x-input name="username" type="text" placeholder="Username" value="{{ old('username') }}" />
        </div>
    </div>
    <x-input name="email" type="email" placeholder="Email Address" value="{{ old('email') }}" />
    <x-input name="mobile" type="text" placeholder="Mobile Number" value="{{ old('mobile') }}" />
    @if ($sponsor != "default")
    <x-input name="sponsor" type="text" placeholder="Your Sponsor" value="{{ old('sponsor', $sponsor) }}" attribute="readonly" />
    @endif
    <div class="row">
        <div class="col-6">
            <x-input name="password" type="password" placeholder="Type Password." />
        </div>
        <div class="col-6">
            <x-input name="password_confirmation" type="password" placeholder="Confirm Password." />
        </div>
    </div>

    <div class="form-group">
        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="termsCheckbox" name="terms" required>
            <label class="custom-control-label text-muted" for="termsCheckbox"> I Agree to the Terms and Services</label>
        </div>
    </div>
    <button type="submit" class="btn btn-lg btn-block btn-primary">Create Account</button>
</form>
@endsection
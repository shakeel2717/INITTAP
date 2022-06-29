@extends('auth.layout.app')
@section('title')
    Login Page
@endsection
@section('form')
    <form class="js-validate" method="POST" action="{{ route('corporate.auth.login.req') }}" enctype="multipart/form-data">
        @csrf
        <div class="text-center">
            <div class="mb-5">
                <h1 class="display-4">Sign in</h1>
                <p>Don't have an account yet? <a href="{{ route('corporate.auth.create') }}">Sign up
                        here</a></p>
            </div>
        </div>
        <div class="text-center">
            <div class="mb-5">
                <h1 class="display-4 text-warning">Corporate Login</h1>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <x-input name="email" type="email" placeholder="Enter Business Email." value="{{ old('email') }}" />
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <x-input name="password" type="password" placeholder="Enter Business Password." value="{{ old('password') }}" />
            </div>
        </div>
        <div class="form-group">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="termsCheckbox" name="remember">
                <label class="custom-control-label text-muted" for="termsCheckbox"> Stay Logged In</label>
            </div>
        </div>
        <button type="submit" class="btn btn-lg btn-block btn-primary">Sign In</button>
    </form>
@endsection

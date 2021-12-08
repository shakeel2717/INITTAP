@extends('auth.layout.app')
@section('title')
    Login Page
@endsection
@section('form')
    <form class="js-validate" method="POST" action="{{ route('login') }}">
        @csrf
        <div class="text-center">
            <div class="mb-5">
                <h1 class="display-4">Sign in</h1>
                <p>Don't have an account yet? <a href="{{ route('register') }}">Sign up
                        here</a></p>
            </div>

            <x-social-login />

            <span class="divider text-muted mb-4">OR</span>
        </div>
        <x-input name="email" type="email" placeholder="Enter Email." value="{{ old('email') }}" />
        <x-input name="password" type="password" placeholder="Type Password." />

        <div class="form-group">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="termsCheckbox" name="remember">
                <label class="custom-control-label text-muted" for="termsCheckbox"> Remember
                    me</label>
            </div>
        </div>
        <button type="submit" class="btn btn-lg btn-block btn-primary">Sign in</button>
        <hr>
        <p>Forgot Password? <a href="{{ route('password.request') }}">Click to Reset</a></p>
    </form>
@endsection

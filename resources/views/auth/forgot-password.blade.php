@extends('auth.layout.app')
@section('title')
    Login Page
@endsection
@section('form')
    <form class="js-validate" method="POST" action="{{ route('password.email') }}">
        @csrf
        <div class="text-center">
            <div class="mb-5">
                <h1 class="display-4">Forgot password?</h1>
                <p>Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one. </p>
            </div>
        </div>
        <x-input name="email" type="email" placeholder="Enter Email." value="{{ old('email') }}" attribute="required autofocus" />

        <button type="submit" class="btn btn-lg btn-block btn-primary">Email Password Reset Link</button>
    </form>
@endsection

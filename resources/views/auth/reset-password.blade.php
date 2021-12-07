@extends('auth.layout.app')
@section('title')
    Reset Password
@endsection
@section('form')
    <form class="js-validate" method="POST" action="{{ route('password.update') }}">
        @csrf
        <div class="text-center">
            <div class="mb-5">
                <h1 class="display-4">Reset Password</h1>
            </div>
        </div>
        <x-input name="email" type="email" placeholder="Email" value="{{ old('email', $request->email) }}" />
        <input type="hidden" name="token" value="{{ $request->route('token') }}">
        <x-input name="password" type="password" placeholder="New Password." />
        <x-input name="password_confirmation" type="password" placeholder="Confirm Password." />

        <button type="submit" class="btn btn-lg btn-block btn-primary">Reset Password</button>
        <hr>
        <p>Forgot Password? <a href="{{ route('password.request') }}">Click to Reset</a></p>
    </form>
@endsection

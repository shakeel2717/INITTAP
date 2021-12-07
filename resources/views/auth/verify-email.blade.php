@extends('auth.layout.app')
@section('title')
    Verify Email Address
@endsection
@section('form')
    <div class="text-center">
        <div class="mb-4">
            <img class="avatar avatar-xxl avatar-4by3" src="{{ asset('assets/svg/illustrations/click.svg') }}"
                alt="Image Description">
        </div>

        <h1 class="display-4">Verify your email</h1>

        <p class="mb-1 text-left">Thanks for signing up! Before getting started, could you verify your email address by
            clicking on the link we just emailed to you? If you didn't receive the email, we will gladly send you another.
        </p>

        <div class="mt-4 mb-3">
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf
                <button type="submit" class="btn btn-primary btn-wide">Resend Verification Email</button>
            </form>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn btn-sm btn-secondery mt-3">Log Out</button>
            </form>
        </div>
    </div>
@endsection

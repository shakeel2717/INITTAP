@extends('auth.layout.app')
@section('title')
    Login Page
@endsection
@section('form')
    <form class="js-validate" method="POST" action="{{ route('admin.login.req') }}">
        @csrf
        <div class="text-center">
            <div class="mb-5">
                <h1 class="display-4 text-warning">Admin Sign in</h1>
            </div>
        </div>
        <x-input name="username" type="text" placeholder="Enter Admin Username." value="{{ old('username') }}" />
        <x-input name="password" type="password" placeholder="Type Password." />

        <div class="form-group">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="termsCheckbox" name="remember">
                <label class="custom-control-label text-muted" for="termsCheckbox"> Remember
                    me</label>
            </div>
        </div>
        <button type="submit" class="btn btn-lg btn-block btn-primary">Sign in</button>
    </form>
@endsection

@extends('user.dashboard.layout.app')
@section('title')
    Dashboard
@endsection
@section('content')
    <div class="row gx-2 gx-lg-3">
        <div class="col-md-8 mx-auto">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">Edit your Accont Password</h3>
                    <hr>
                    <form action="{{ route('user.profile.password.update') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <x-input name="password" type="password" label="New Password" placeholder="Type your new Password" />
                                    <x-input name="password_confirmation" type="password" label="Confirm Password" placeholder="Confirm Password" />
                                    <input type="submit" value="Update Profile Record" class="btn btn-primary btn-lg">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

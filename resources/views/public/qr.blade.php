@extends('public.layout.app')
@section('title')
    {{ $user->profile->title }}
@endsection
@section('content')
    <div class="row justify-content-md-center">
        <div class="col-12 col-md-8 mt-4">

            <div class="profile-cover">
                <div class="profile-cover-img-wrapper">
                    <img id="profileCoverImg" class="profile-cover-img" src="{{ asset('assets/img/cover.png') }}"
                        alt="Image Description">
                </div>
            </div>
            <div class="text-center mb-5 mt-5 mt-md-3">
                <label class="avatar avatar-xxl avatar-border-lg avatar-uploader profile-cover-avatar" for="avatarUploader">
                    <img id="avatarImg" class="avatar-img" src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(150)->generate(route('user.public.profile', ['username' => $user->username]))) !!}" alt="QR Code">
                </label>
                <h1 class="page-header-title">{{ $user->profile->title }} <i class="tio-verified tio-lg text-primary"
                    data-toggle="tooltip" data-placement="top" title="" data-original-title="Activated"></i></h1>
                <hr>
                <a class="btn btn-primary btn-lg" href="{{ route('user.dashboard.index') }}">Go Back</a>
            </div>
        </div>
    </div>
@endsection

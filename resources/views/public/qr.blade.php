@extends('public.layout.app')
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
            </div>
        </div>
    </div>
@endsection

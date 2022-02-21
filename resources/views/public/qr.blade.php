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
                <!-- Avatar -->
                <label class="avatar avatar-xxl avatar-circle avatar-border-lg avatar-uploader profile-cover-avatar"
                    for="avatarUploader">
                    <img id="avatarImg" class="avatar-img"
                        src="{{ $user->avatar != '' ? asset('assets/profiles/') . '/' . $user->avatar : asset('assets/img/160x160/img1.jpg') }}"
                        alt="Image Description">
                </label>
                <!-- End Avatar -->

                <h1 class="page-header-title">{{ $user->profile->title }} <i class="tio-verified tio-lg text-primary"
                        data-toggle="tooltip" data-placement="top" title="" data-original-title="Activated"></i></h1>

                <!-- List -->
                <ul class="list-inline list-inline-m-1">
                    <li class="list-inline-item">
                        <i class="tio-poi-user mr-1"></i>
                        <span>{{ $user->profile->designation ?? 'Designation' }}</span>
                    </li>

                    <li class="list-inline-item">
                        <i class="tio-poi-outlined mr-1"></i>
                        <a href="#">{{ $user->profile->city }},</a>
                        <a href="#">{{ $user->profile->country }}</a>
                    </li>

                    <li class="list-inline-item">
                        <i class="tio-date-range mr-1"></i>
                        <span>{{ $user->created_at }}</span>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <img id="avatarImg" class="avatar-img mx-auto"
                            src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(150)->generate(route('user.public.profile', ['username' => $user->username]))) !!}"
                            alt="QR Code">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

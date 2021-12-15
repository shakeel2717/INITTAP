@extends('user.dashboard.layout.app')
@section('title')
    Public Profile
@endsection
@section('content')
    <div class="row justify-content-lg-center">
        <div class="col-lg-8">
            <!-- Profile Cover -->
            <div class="profile-cover">
                <div class="profile-cover-img-wrapper">
                    <img id="profileCoverImg" class="profile-cover-img" src="{{ asset('assets/img/cover.png') }}"
                        alt="Image Description">
                    {{-- <div class="profile-cover-content profile-cover-btn">
                        <div class="custom-file-btn">
                            <label class="custom-file-btn-label btn btn-sm btn-white" for="profileCoverUplaoder">
                                <i class="tio-add-photo"></i>
                                <span class="d-none d-sm-inline-block ml-1">Update Cover Photo</span>
                            </label>
                        </div>
                    </div> --}}
                </div>
            </div>
            <!-- End Profile Cover -->

            <!-- Profile Header -->
            <div class="text-center mb-5">
                <!-- Avatar -->
                <label class="avatar avatar-xxl avatar-circle avatar-border-lg avatar-uploader profile-cover-avatar"
                    for="avatarUploader">
                    <img id="avatarImg" class="avatar-img" src="{{ asset('assets/img/160x160/img1.jpg') }}"
                        alt="Image Description">
                </label>
                <!-- End Avatar -->

                <h1 class="page-header-title">{{ Auth::user()->profile->title }} <i
                        class="tio-verified tio-lg text-primary" data-toggle="tooltip" data-placement="top" title=""
                        data-original-title="Activated"></i></h1>

                <!-- List -->
                <ul class="list-inline list-inline-m-1">
                    <li class="list-inline-item">
                        <i class="tio-poi-user mr-1"></i>
                        <span>{{ Auth::user()->profile->designation }}</span>
                    </li>

                    <li class="list-inline-item">
                        <i class="tio-poi-outlined mr-1"></i>
                        <a href="#">{{ Auth::user()->profile->city }},</a>
                        <a href="#">{{ Auth::user()->profile->country }}</a>
                    </li>

                    <li class="list-inline-item">
                        <i class="tio-date-range mr-1"></i>
                        <span>{{ Auth::user()->created_at }}</span>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card shadow-lg card-body mb-2">
                        <h5>About</h5>
                        <p>{{ Auth::user()->profile->about }}</p>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card shadow-lg card-body mb-2">
                        <h5>Address</h5>
                        <p>{{ Auth::user()->profile->address }}, {{ Auth::user()->profile->city }}
                            {{ Auth::user()->profile->country }}</p>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card shadow-lg card-body mb-2">
                        <h5>Social Networks </h5>
                        <div class="row p-2">
                            <a href="#" class="display-3"><i class="tio-facebook-square"></i></a>
                            <a href="#" class="display-3"><i class="tio-instagram"></i></a>
                            <a href="#" class="display-3"><i class="tio-twitter"></i></a>
                            <a href="#" class="display-3"><i class="tio-youtube"></i></a>
                            <a href="#" class="display-3"><i class="tio-linkedin-square"></i></a>
                            <a href="#" class="display-3"><i class="tio-skype"></i></a>
                            <a href="#" class="display-3"><i class="tio-pinterest-circle"></i></a>
                            <a href="#" class="display-3"><i class="tio-whatsapp"></i></a>
                            <a href="#" class="display-3"><i class="tio-github"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card shadow-lg card-body mb-2">
                        <h5>Contact Info </h5>
                        <ul class="list-group list-group-flush list-group-no-gutters">
                            <li class="list-group-item py-3">
                                <div class="media">
                                    <div class="mt-1 mr-3 display-4 d-flex justify-content-start align-items-center">
                                        <i class="tio-call-talking"></i>
                                        <h2 class="ml-4 mb-0">+923001212130</h2>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item py-3">
                                <div class="media">
                                    <div class="mt-1 mr-3 display-4 d-flex justify-content-start align-items-center">
                                        <i class="tio-website"></i>
                                        <h2 class="ml-4 mb-0">www.asanwebs.com</h2>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item py-3">
                                <div class="media">
                                    <div class="mt-1 mr-3 display-4 d-flex justify-content-start align-items-center">
                                        <i class="tio-online"></i>
                                        <h2 class="ml-4 mb-0">www.asanwebs.com</h2>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

@extends('public.layout.app')
@section('title')
    {{ $user->profile->title }}
@endsection
@section('content')
    <div class="row justify-content-md-center">
        <div class="col-12 col-md-8 mt-4">

            <div class="profile-cover">
                <div class="profile-cover-img-wrapper">
                    <img id="profileCoverImg" class="profile-cover-img" src="{{ asset('assets/brand/profile-cover.jpg') }}"
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

                <h1 class="page-header-title">{{ $user->profile->title }} 
                    @if ($user->cardOrder()->count() >= 1 && $user->cardOrder->status != 'initiate')
                    <i class="tio-verified tio-lg text-primary"
                        data-toggle="tooltip" data-placement="top" title="" data-original-title="Activated"></i>
                    @endif
                </h1>
                       
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


            <hr>
            @if ($user->cardOrder()->count() >= 1 && $user->cardOrder->status != 'initiate')
            <div class="row">
                <div class="col-12">
                    <div class="card shadow-lg card-body mb-2">
                    
                        <a href="{{ route('user.public.profile.save', ['username' => $user->username]) }}"
                            class="btn btn-block btn-dark btn-lg"><i class="tio-user-add"></i> Save Contact</a>
                    
                    </div>
                </div>
            </div>
            @endif
            <div class="row">
                <div class="col-12">
                    <div class="card shadow-lg card-body mb-2">
                        <h5>About </h5>
                        <p>{{ $user->profile->about }}</p>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card shadow-lg card-body mb-2">
                        <h5>Address </h5>
                        <p>{{ $user->profile->address }}, {{ $user->profile->city }}
                            {{ $user->profile->country }}</p>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card shadow-lg card-body mb-2">
                        <h5>Social Networks </h5>
                        <div class="row p-2">
                            @foreach ($user->social as $social)
                                <a target="_blank" href="{{ $social->url }}" class="display-3"><i
                                        class="{{ $social->icon }}"></i></a>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card shadow-lg card-body mb-2">
                        <h5>Contact Info </h5>
                        <ul class="list-group list-group-flush list-group-no-gutters">
                            @if ($user->websites->count() > 0)
                                @forelse ($user->websites as $website)
                                    <li class="list-group-item py-3">
                                        <div class="media">
                                            <a href="{{ $website->website }}">
                                                <div
                                                    class="mt-1 mr-3 display-4 d-flex justify-content-start align-items-center">
                                                    <i class="tio-website"></i>
                                                    <h2 class="ml-4 mb-0">{{ $website->website }}</h2>
                                                </div>
                                            </a>
                                        </div>
                                    </li>
                                @empty
                                    <div class="text-center">
                                        <h5>No Social media Account Found</h5>
                                    </div>
                                @endforelse
                            @endif
                            @if ($user->phones->count() > 0)
                                @foreach ($user->phones as $phone)
                                    <li class="list-group-item py-3" >
                                        <div class="media">
                                            <a href="tel:{{ $phone->phone }}">
                                                <div
                                                    class="mt-1 mr-3 display-4 d-flex justify-content-start align-items-center">
                                                    <i class="tio-call-talking"></i>
                                                    <h2 class="ml-4 mb-0" >{{ $phone->phone }}</h2>
                                                </div>
                                            </a>
                                        </div>
                                    </li>
                                @endforeach
                            @endif
                            @if ($user->emails->count() > 0)
                                @foreach ($user->emails as $email)
                                    <li class="list-group-item py-3">
                                        <div class="media">
                                            <div
                                                class="mt-1 mr-3 display-4 d-flex justify-content-start align-items-center">
                                                <i class="tio-online"></i>
                                                <h2 class="ml-4 mb-0">{{ $email->email }}</h2>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

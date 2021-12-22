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
                    <img id="avatarImg" class="avatar-img"
                        src="{{ Auth::user()->avatar != '' ? asset('assets/profiles/') . '/' . Auth::user()->avatar : asset('assets/img/160x160/img1.jpg') }}"
                        alt="Image Description">
                </label>
                <!-- End Avatar -->

                <h1 class="page-header-title">{{ Auth::user()->profile->title }} <i class="tio-verified tio-lg text-primary"
                        data-toggle="tooltip" data-placement="top" title="" data-original-title="Activated"></i></h1>

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
                        <h5>Address <a href="javascript;" data-toggle="modal" data-target="#exampleModalTopCover"> <i
                                    class="tio-edit"></i> Edit</a> </h5>
                        <p>{{ Auth::user()->profile->address }}, {{ Auth::user()->profile->city }}
                            {{ Auth::user()->profile->country }}</p>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card shadow-lg card-body mb-2">
                        <h5>Social Networks </h5>
                        <div class="row p-2">
                            @foreach (Auth::user()->social as $social)
                                <a target="_blank" href="{{ $social->url }}" class="display-3"><i
                                        class="{{ $social->icon }}"></i></a>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card shadow-lg card-body mb-2">
                        <h5>Contact Info</h5>
                        <ul class="list-group list-group-flush list-group-no-gutters">
                            @if (Auth::user()->websites->count() > 0)
                                @forelse (Auth::user()->websites as $website)
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
                            @if (Auth::user()->phones->count() > 0)
                                @foreach (Auth::user()->phones as $phone)
                                    <li class="list-group-item py-3">
                                        <div class="media">
                                            <div
                                                class="mt-1 mr-3 display-4 d-flex justify-content-start align-items-center">
                                                <i class="tio-call-talking"></i>
                                                <h2 class="ml-4 mb-0">{{ $phone->phone }}</h2>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            @endif
                            @if (Auth::user()->emails->count() > 0)
                                @foreach (Auth::user()->emails as $email)
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

    <!-- Modal -->
    <div id="exampleModalTopCover" class="modal fade" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalTopCoverTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <!-- Header -->
                <div class="modal-top-cover bg-dark text-center">
                    <figure class="position-absolute right-0 bottom-0 left-0" style="margin-bottom: -1px;">
                        <svg preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                            viewBox="0 0 1920 100.1">
                            <path fill="#fff" d="M0,0c0,0,934.4,93.4,1920,0v100.1H0L0,0z" />
                        </svg>
                    </figure>

                    <div class="modal-close">
                        <button type="button" class="btn btn-icon btn-sm btn-ghost-light" data-dismiss="modal"
                            aria-label="Close">
                            <svg width="16" height="16" viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg">
                                <path fill="currentColor"
                                    d="M11.5,9.5l5-5c0.2-0.2,0.2-0.6-0.1-0.9l-1-1c-0.3-0.3-0.7-0.3-0.9-0.1l-5,5l-5-5C4.3,2.3,3.9,2.4,3.6,2.6l-1,1 C2.4,3.9,2.3,4.3,2.5,4.5l5,5l-5,5c-0.2,0.2-0.2,0.6,0.1,0.9l1,1c0.3,0.3,0.7,0.3,0.9,0.1l5-5l5,5c0.2,0.2,0.6,0.2,0.9-0.1l1-1 c0.3-0.3,0.3-0.7,0.1-0.9L11.5,9.5z" />
                            </svg>
                        </button>
                    </div>
                </div>
                <!-- End Header -->

                <div class="modal-top-cover-icon">
                    <span class="icon icon-lg icon-light icon-circle icon-centered shadow-soft">
                        <i class="tio-receipt-outlined"></i>
                    </span>
                </div>

                <div class="modal-body">
                    <form action="{{ route('user.public.addressEdit') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <input type="text" name="address" id="address" class="form-control"
                                        value="{{ Auth::user()->profile->address }}">
                                </div>
                                <div class="form-group">
                                    <label for="city">City</label>
                                    <input type="text" name="city" id="city" class="form-control"
                                        value="{{ Auth::user()->profile->city }}">
                                </div>
                                <div class="form-group">
                                    <label for="country">Country ({{ Auth::user()->profile->country }})</label>
                                    <x-cities />
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-block">Update Public Address</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal -->
@endsection

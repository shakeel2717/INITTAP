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
                        <span>{{ \Carbon\Carbon::createFromTimeStamp(strtotime(Auth::user()->updated_at))->diffForHumans() }}</span>
                        <a href="javascript;" data-toggle="modal" data-target="#main"> <i class="tio-edit"></i>
                            Edit</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card shadow-lg card-body mb-2">
                        <h5>About <a href="javascript;" data-toggle="modal" data-target="#about"> <i
                                    class="tio-edit"></i> Edit</a></h5>
                        <p>{{ Auth::user()->profile->about }}</p>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card shadow-lg card-body mb-2">
                        <h5>Address <a href="javascript;" data-toggle="modal" data-target="#Address"> <i
                                    class="tio-edit"></i> Edit</a> </h5>
                        <p>{{ Auth::user()->profile->address }}, {{ Auth::user()->profile->city }}
                            {{ Auth::user()->profile->country }}</p>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card shadow-lg card-body mb-2">
                        <h5>Social Networks <a href="javascript;" data-toggle="modal" data-target="#Social"> <i
                                    class="tio-edit"></i> Edit</a></h5>
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
                        <h5>Contact Info <a href="javascript;" data-toggle="modal" data-target="#contact"> <i
                                    class="tio-edit"></i> Edit</a></h5>
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
    <div id="Address" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="AddressTitle" aria-hidden="true">
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
    <!-- Modal -->
    <div id="Social" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="SocialTitle" aria-hidden="true">
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
                    @foreach (Auth::user()->social as $social)
                        <form action="{{ route('user.public.socialEdit') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="hidden" name="social_id" id="social_id" class="form-control"
                                            value="{{ $social->id }}">
                                        <label for="link">{{ Str::ucfirst($social->name) }} Link Edit</label>
                                        <input type="text" name="link" id="link" class="form-control"
                                            value="{{ $social->url }}">
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-block">Update
                                            {{ Str::ucfirst($social->name) }} Accounts
                                            Link</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    @endforeach
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal -->
    <!-- Modal -->
    <div id="contact" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="contactTitle" aria-hidden="true">
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
                    @if (Auth::user()->websites->count() > 0)
                        @foreach (Auth::user()->websites as $website)
                            <form action="{{ route('user.public.websiteEdit') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="hidden" name="website_id" id="website_id" class="form-control"
                                                value="{{ $website->id }}">
                                            <label for="link">Link Edit</label>
                                            <input type="text" name="link" id="link" class="form-control"
                                                value="{{ $website->website }}">
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary btn-block">Update Info</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        @endforeach
                    @endif
                    @if (Auth::user()->phones->count() > 0)
                        @foreach (Auth::user()->phones as $phone)
                            <form action="{{ route('user.public.phoneEdit') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="hidden" name="phone_id" id="phone_id" class="form-control"
                                                value="{{ $phone->id }}">
                                            <label for="phone">Phone Number</label>
                                            <input type="text" name="phone" id="phone" class="form-control"
                                                value="{{ $phone->phone }}">
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary btn-block">Update Info</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        @endforeach
                    @endif
                    @if (Auth::user()->emails->count() > 0)
                        @foreach (Auth::user()->emails as $email)
                            <form action="{{ route('user.public.emailEdit') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="hidden" name="email_id" id="email_id" class="form-control"
                                                value="{{ $phone->id }}">
                                            <label for="email">Email</label>
                                            <input type="email" name="email" id="email" class="form-control"
                                                value="{{ $email->email }}">
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary btn-block">Update Info</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        @endforeach
                    @endif
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal -->

    <!-- Modal -->
    <div id="about" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="aboutTitle" aria-hidden="true">
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
                    <form action="{{ route('user.public.aboutEdit') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="about">About</label>
                                    <textarea name="about" id="about" cols="30" rows="10"
                                        class="form-control">{{ Auth::user()->profile->about }}</textarea>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-block">Update About Info</button>
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

    <!-- Modal -->
    <div id="main" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mainTitle" aria-hidden="true">
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
                    <form action="{{ route('user.public.mainEdit') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" name="title" id="title" class="form-control"
                                        value="{{ Auth::user()->profile->title }}">
                                </div>
                                <div class="form-group">
                                    <label for="designation">Designation</label>
                                    <input type="text" name="designation" id="designation" class="form-control"
                                        value="{{ Auth::user()->profile->designation }}">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-block">Update About Info</button>
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

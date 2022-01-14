@extends('admin.dashboard.layout.app')
@section('title')
    Dashboard
@endsection
@section('content')
    <div class="row">
        <div class="col-md-8 mx-auto text-center mb-4">
            <img src="{{ asset('assets/img/profile.svg') }}" alt="Profile Edit" width="350">
        </div>
        <div class="col-md-8 mx-auto">
            <div id="addUserStepFormContent">
                <form action="{{ route('admin.dashboard.userPublicStore',['id' => $user->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div id="addUserStepProfile" class="card card-lg active">
                        <div class="card-body">
                            <div class="row form-group d-flex justify-content-center">
                                <div class="d-flex align-items-center">
                                    <!-- Avatar -->
                                    <label class="avatar avatar-xl avatar-circle avatar-uploader mr-5" for="avatarUploader">
                                        <img id="avatarImg" class="avatar-img"
                                            src="{{ Auth::user()->avatar != '' ? asset('assets/profiles/') . '/' . Auth::user()->avatar : asset('assets/img/160x160/img1.jpg') }}"
                                            alt="Image Description">

                                        <input type="file" class="js-file-attach avatar-uploader-input" id="avatarUploader"
                                            data-hs-file-attach-options='{
                                                "textTarget": "#avatarImg",
                                                "mode": "image",
                                                "targetAttr": "src",
                                                "resetTarget": ".js-file-attach-reset-img",
                                                "resetImg": "{{ asset('assets/img/160x160/img1.jpg') }}",
                                                "allowTypes": [".png", ".jpeg", ".jpg"]
                                            }' name="profile">

                                        <span class="avatar-uploader-trigger">
                                            <i class="tio-edit avatar-uploader-icon shadow-soft"></i>
                                        </span>
                                    </label>
                                    <!-- End Avatar -->

                                    <button type="button" class="js-file-attach-reset-img btn btn-white">Delete</button>
                                </div>
                            </div>
                            <div class="row form-group">
                                <label for="firstNameLabel" class="col-sm-3 col-form-label input-label">Full name <i
                                        class="tio-help-outlined text-body ml-1" data-toggle="tooltip" data-placement="top"
                                        title="" data-original-title="Displayed on public forums"></i>
                                </label>
                                <div class="col-sm-9">
                                    <div class="input-group input-group-sm-down-break">
                                        <input type="text" class="form-control" name="firstName" id="firstNameLabel"
                                            placeholder="First Name" value="{{ auth()->user()->name }}">
                                    </div>
                                </div>
                            </div>
                            <!-- Form Group -->
                            <div class="js-add-field row form-group" data-hs-add-field-options='{
                                                                                "template": "#addAddressFieldEgTemplate",
                                                                                "container": "#addAddressFieldEgContainer",
                                                                                "defaultCreated": 0
                                                                            }'>
                                <label for="email" class="col-sm-3 col-form-label input-label">Public Email
                                    Address</span></label>

                                <div class="col-sm-9">
                                    <input type="email" class="form-control" name="email" id="email"
                                        placeholder="Public Email Address" aria-label="Public Email Address">

                                    <!-- Container For Input Field -->
                                    <div id="addAddressFieldEgContainer"></div>

                                    <a href="javascript:;"
                                        class="js-create-field form-link btn btn-sm btn-no-focus btn-ghost-primary">
                                        <i class="tio-add"></i> Add more Email address
                                    </a>
                                </div>
                            </div>
                            <!-- End Form Group -->

                            <!-- Add Phone Input Field -->
                            <div id="addAddressFieldEgTemplate" style="display: none;">
                                <div class="input-group-add-field">
                                    <input type="email" class="form-control" data-name="email"
                                        placeholder="Public Email Address" aria-label="Public Email Address">

                                    <a class="js-delete-field input-group-add-field-delete" href="javascript:;">
                                        <i class="tio-clear"></i>
                                    </a>
                                </div>
                            </div>
                            <!-- End Add Phone Input Field -->





                            <!-- Form Group -->
                            <div class="js-add-field row form-group" data-hs-add-field-options='{
                                                                                            "template": "#addPhoneFieldEgTemplate",
                                                                                            "container": "#addPhoneFieldEgContainer",
                                                                                            "defaultCreated": 0
                                                                                        }'>
                                <label for="phone" class="col-sm-3 col-form-label input-label">Public Phone
                                    Number</span></label>

                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="phone" id="phone"
                                        placeholder="Public Phone Number" aria-label="Public Phone Number">

                                    <!-- Container For Input Field -->
                                    <div id="addPhoneFieldEgContainer"></div>

                                    <a href="javascript:;"
                                        class="js-create-field form-link btn btn-sm btn-no-focus btn-ghost-primary">
                                        <i class="tio-add"></i> Add more Phone Numbers
                                    </a>
                                </div>
                            </div>
                            <!-- End Form Group -->

                            <!-- Add Phone Input Field -->
                            <div id="addPhoneFieldEgTemplate" style="display: none;">
                                <div class="input-group-add-field">
                                    <input type="text" class="form-control" data-name="phone"
                                        placeholder="Public Phone Number" aria-label="Public Phone Number">

                                    <a class="js-delete-field input-group-add-field-delete" href="javascript:;">
                                        <i class="tio-clear"></i>
                                    </a>
                                </div>
                            </div>
                            <!-- End Add Phone Input Field -->







                            <!-- Form Group -->
                            <div class="js-add-field row form-group" data-hs-add-field-options='{
                                                                                    "template": "#addwebsiteFieldEgTemplate",
                                                                                    "container": "#addwebsiteFieldEgContainer",
                                                                                    "defaultCreated": 0
                                                                                }'>
                                <label for="website" class="col-sm-3 col-form-label input-label">Public website
                                    </span></label>

                                <div class="col-sm-9">
                                    <input type="url" class="form-control" name="website" id="website"
                                        placeholder="Public website" aria-label="Public website">

                                    <!-- Container For Input Field -->
                                    <div id="addwebsiteFieldEgContainer"></div>

                                    <a href="javascript:;"
                                        class="js-create-field form-link btn btn-sm btn-no-focus btn-ghost-primary">
                                        <i class="tio-add"></i> Add more websites
                                    </a>
                                </div>
                            </div>
                            <!-- End Form Group -->

                            <!-- Add website Input Field -->
                            <div id="addwebsiteFieldEgTemplate" style="display: none;">
                                <div class="input-group-add-field">
                                    <input type="url" class="form-control" data-name="website"
                                        placeholder="Public website" aria-label="Public website">

                                    <a class="js-delete-field input-group-add-field-delete" href="javascript:;">
                                        <i class="tio-clear"></i>
                                    </a>
                                </div>
                            </div>
                            <!-- End Add website Input Field -->



                        </div>
                        <div class="card-footer d-flex justify-content-between align-items-center">
                            <a class="btn btn-primary" data-toggle="modal" data-target="#exampleModalTopCover"> Add Social
                                Media Accounts </a>
                            <button type="submit" class="btn btn-primary"> Update Profile </button>
                        </div>
                    </div>
                </form>
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
                        <i class="tio-user-add"></i>
                    </span>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.dashboard.userPublicSocial',['id' => $user->id]) }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="social">Select Social Type</label>
                                    <select class="js-select2-custom custom-select" size="1" style="opacity: 0;"
                                        data-hs-select2-options='{
                                                                                                                              "placeholder": "Select wallet"
                                                                                                                            }'
                                        name="social">
                                        <option value="facebook" selected
                                            data-option-template='<span class="d-flex align-items-center"><i class="tio-facebook-square"></i><span>Facebook</span></span>'>
                                            Facebook
                                        </option>
                                        <option value="instagram"
                                            data-option-template='<span class="d-flex align-items-center"><i class="tio-instagram"></i><span>Instagram</span></span>'>
                                            Instagram
                                        </option>
                                        <option value="twitter"
                                            data-option-template='<span class="d-flex align-items-center"><i class="tio-twitter"></i><span>Twitter</span></span>'>
                                            Twitter
                                        </option>
                                        <option value="youtube"
                                            data-option-template='<span class="d-flex align-items-center"><i class="tio-youtube"></i><span>Youtube</span></span>'>
                                            Youtube
                                        </option>
                                        <option value="linkedin"
                                            data-option-template='<span class="d-flex align-items-center"><i class="tio-linkedin-square"></i><span>Linkedin</span></span>'>
                                            Linkedin
                                        </option>
                                        <option value="skype"
                                            data-option-template='<span class="d-flex align-items-center"><i class="tio-skype"></i><span>Skype</span></span>'>
                                            Skype
                                        </option>
                                        <option value="whatsapp"
                                            data-option-template='<span class="d-flex align-items-center"><i class="tio-whatsapp"></i><span>Whatsapp</span></span>'>
                                            Whatsapp
                                        </option>
                                        <option value="github"
                                            data-option-template='<span class="d-flex align-items-center"><i class="tio-github"></i><span>Github</span></span>'>
                                            Github
                                        </option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="link">Social Account Link</label>
                                    <input type="text" name="link" id="link" class="form-control" placeholder="Type Username Only">
                                </div>
                                <div class="form-group">
                                    <input type="submit" value="Type your social media Username"
                                        class="btn btn-primary btn-block">
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
@section('footer')
    <script src="{{ asset('assets/vendor/hs-file-attach/dist/hs-file-attach.min.js') }}"></script>
    <script>
        $(document).on('ready', function() {
            // INITIALIZATION OF CUSTOM FILE
            // =======================================================
            $('.js-file-attach').each(function() {
                var customFile = new HSFileAttach($(this)).init();
            });
        });
    </script>
@endsection

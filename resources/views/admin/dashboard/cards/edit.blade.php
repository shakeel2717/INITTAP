@extends('admin.dashboard.layout.app')
@section('title')
    All Users
@endsection
@section('content')
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div id="addUserStepFormContent">
                <form action="{{ route('admin.dashboard.cards.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div id="addUserStepProfile" class="card card-lg shadow-lg">
                        <div class="card-body">
                            <div class="row form-group d-flex justify-content-center">
                                <div class="d-flex align-items-center">
                                    <!-- Avatar -->
                                    <label class="avatar avatar-xl avatar-square avatar-uploader mr-5" for="avatarUploader">
                                        <img id="avatarImg" class="avatar-img"
                                            src="{{ asset('assets/img/160x160/img1.jpg') }}"
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
                                <label for="title" class="col-sm-3 col-form-label input-label">Card Title <i
                                        class="tio-help-outlined text-body ml-1"></i>
                                </label>
                                <div class="col-sm-9">
                                    <div class="input-group input-group-sm-down-break">
                                        <input type="text" class="form-control" name="title" id="title"
                                            placeholder="Card Title">
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group">
                                <label for="type" class="col-sm-3 col-form-label input-label">Card Type <i
                                        class="tio-help-outlined text-body ml-1"></i>
                                </label>
                                <div class="col-sm-9">
                                    <div class="input-group input-group-sm-down-break">
                                        <input type="text" class="form-control" name="type" id="type"
                                            placeholder="Card Type">
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group">
                                <label for="type" class="col-sm-3 col-form-label input-label">Card Price <i
                                        class="tio-help-outlined text-body ml-1"></i>
                                </label>
                                <div class="col-sm-9">
                                    <div class="input-group input-group-sm-down-break">
                                        <input type="text" class="form-control" name="price" id="price"
                                            placeholder="Card Price">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-end ">
                            <button type="submit" class="btn btn-primary"> Add Card in System <i class="tio-checkmark-square"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
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

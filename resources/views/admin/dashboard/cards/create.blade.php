@extends('admin.dashboard.layout.app')
@section('title')
    Add New Card
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
                                            src="{{ asset('assets/img/160x160/img1.jpg') }}" alt="Image Description">

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
                                <label for="title" class="col-sm-3 col-form-label input-label">Card Title
                                </label>
                                <div class="col-sm-9">
                                    <div class="input-group input-group-sm-down-break">
                                        <input type="text" class="form-control" name="title" id="title"
                                            placeholder="Card Title">
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group">
                                <label for="description" class="col-sm-3 col-form-label input-label">Card Description
                                </label>
                                <div class="col-sm-9">
                                    <div class="input-group input-group-sm-down-break">
                                        <textarea name="description" id="description" cols="30" rows="10"
                                            class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group">
                                <label for="category" class="col-sm-3 col-form-label input-label">Card Category
                                </label>
                                <div class="col-sm-9">
                                    <div class="input-group input-group-sm-down-break">
                                        <select name="category" id="category" class="form-control">
                                            <option value="plastic">Plastic</option>
                                            <option value="wood">Wood</option>
                                            <option value="metal">Metal</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group">
                                <label for="type" class="col-sm-3 col-form-label input-label">Card Price </label>
                                <div class="col-sm-9">
                                    <div class="input-group input-group-sm-down-break">
                                        <input type="text" class="form-control" name="price" id="price"
                                            placeholder="Card Price">
                                    </div>
                                </div>
                            </div>




                            <!-- Form Group -->
                            <div class="js-add-field row form-group" data-hs-add-field-options='{
                                                                "template": "#addAddressFieldEgTemplate",
                                                                "container": "#addAddressFieldEgContainer",
                                                                "defaultCreated": 0
                                                            }'>
                                <label for="email" class="col-sm-3 col-form-label input-label">Add Features</span></label>

                                <div class="col-sm-9">
                                    <input type="feature" class="form-control" data-name="feature" name="feature"
                                        id="feature" placeholder="Add Features List" aria-label="Add Features List">

                                    <!-- Container For Input Field -->
                                    <div id="addAddressFieldEgContainer"></div>

                                    <a href="javascript:;"
                                        class="js-create-field form-link btn btn-sm btn-no-focus btn-ghost-primary">
                                        <i class="tio-add"></i> Add more Features
                                    </a>
                                </div>
                            </div>
                            <!-- End Form Group -->

                            <!-- Add Phone Input Field -->
                            <div id="addAddressFieldEgTemplate" style="display: none;">
                                <div class="input-group-add-field">
                                    <input type="feature" class="form-control" data-name="feature" name="feature"
                                        id="feature" placeholder="Add Features List" aria-label="Add Features List">

                                    <a class="js-delete-field input-group-add-field-delete" href="javascript:;">
                                        <i class="tio-clear"></i>
                                    </a>
                                </div>
                            </div>
                            <!-- End Add Phone Input Field -->
                        </div>
                        <div class="card-footer d-flex justify-content-end ">
                            <button type="submit" class="btn btn-primary"> Add Card in System <i
                                    class="tio-checkmark-square"></i></button>
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
    <script>
        $(document).on('ready', function() {
            // INITIALIZATION OF HS-ADD-FIELD
            // =======================================================
            $('.js-add-field').each(function() {
                new HSAddField($(this)).init();
            });
        });
    </script>
@endsection

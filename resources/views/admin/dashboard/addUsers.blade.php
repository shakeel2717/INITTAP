@extends('admin.dashboard.layout.app')
@section('title')
    Add a User
@endsection
@section('content')
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div id="addUserStepFormContent">
                <form action="{{ route('admin.dashboard.addUsersReq') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div id="addUserStepProfile" class="card card-lg shadow-lg">
                        <div class="card-body">
                            <div class="row form-group">
                                <label for="name" class="col-sm-3 col-form-label input-label">Full name
                                </label>
                                <div class="col-sm-9">
                                    <div class="input-group input-group-sm-down-break">
                                        <input type="text" class="form-control" name="name" id="name"
                                            placeholder="Full name">
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group">
                                <label for="email" class="col-sm-3 col-form-label input-label">Email
                                </label>
                                <div class="col-sm-9">
                                    <div class="input-group input-group-sm-down-break">
                                        <input type="email" class="form-control" name="email" id="email"
                                            placeholder="Email">
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group">
                                <label for="username" class="col-sm-3 col-form-label input-label">Username
                                </label>
                                <div class="col-sm-9">
                                    <div class="input-group input-group-sm-down-break">
                                        <input type="text" class="form-control" name="username" id="username"
                                            placeholder="Username">
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group">
                                <label for="password" class="col-sm-3 col-form-label input-label">Password
                                </label>
                                <div class="col-sm-9">
                                    <div class="input-group input-group-sm-down-break">
                                        <input type="password" class="form-control" name="password" id="password"
                                            placeholder="Password">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-end ">
                            <button type="submit" class="btn btn-primary"> Add new User <i
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
@endsection

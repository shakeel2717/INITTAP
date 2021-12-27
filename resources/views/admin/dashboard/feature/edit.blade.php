@extends('admin.dashboard.layout.app')
@section('title')
    Edit Feature
@endsection
@section('content')
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div id="addUserStepFormContent">
                <form action="{{ route('admin.dashboard.feature.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div id="addUserStepProfile" class="card card-lg shadow-lg">
                        <div class="card-body">
                            <div class="row form-group">
                                <label for="value" class="col-sm-3 col-form-label input-label">Feature Value
                                </label>
                                <div class="col-sm-9">
                                    <div class="input-group input-group-sm-down-break">
                                        <input type="hidden" name="feature_id" value="{{ $feature->id }}">
                                        <input type="text" class="form-control" name="value" id="value"
                                            placeholder="Feature Value" value="{{ $feature->value }}">
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="card-footer d-flex justify-content-end ">
                            <button type="submit" class="btn btn-primary"> Update Feature <i
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

@extends('admin.dashboard.layout.app')
@section('title')
    All Users
@endsection
@section('content')
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div id="addUserStepFormContent">
                <form action="{{ route('admin.dashboard.cards.update',['card' => $pricing->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div id="addUserStepProfile" class="card card-lg shadow-lg">
                        <div class="card-body">
                            <div class="row form-group">
                                <label for="title" class="col-sm-3 col-form-label input-label">Card Title
                                </label>
                                <div class="col-sm-9">
                                    <div class="input-group input-group-sm-down-break">
                                        <input type="text" class="form-control" name="title" id="title"
                                            placeholder="Card Title" value="{{ $pricing->title ?? old('title') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group">
                                <label for="description" class="col-sm-3 col-form-label input-label">Card Description
                                </label>
                                <div class="col-sm-9">
                                    <div class="input-group input-group-sm-down-break">
                                        <textarea name="description" id="description" cols="30" rows="10"
                                            class="form-control">{{ $pricing->description ?? old('description') }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group">
                                <label for="category" class="col-sm-3 col-form-label input-label">Card Category {{ $pricing->category }}
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
                                            placeholder="Card Price" value="{{ $pricing->price ?? old('price') }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-end ">
                            <button type="submit" class="btn btn-primary"> Update Card <i
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

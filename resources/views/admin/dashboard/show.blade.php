@extends('admin.dashboard.layout.app')
@section('title')
    {{ $user->name }} Address
@endsection
@section('content')
    <div id="addUserStepProfile" class="card card-lg active">
        <!-- Body -->
        <div class="card-body">
            <form action="{{ route('admin.dashboard.userUpdate') }}" method="POST">
                @csrf
                <!-- Form Group -->
                <div class="row form-group">
                    <label for="firstNameLabel" class="col-sm-3 col-form-label input-label">Full name <i
                            class="tio-help-outlined text-body ml-1" data-toggle="tooltip" data-placement="top" title=""
                            data-original-title="This is Shippment Legal name, user Enter it when placing Card Order"></i></label>

                    <div class="col-sm-9">
                        <div class="input-group input-group-sm-down-break">
                            <input type="text" name="name" class="form-control" value="{{ $user->name }}">
                        </div>
                    </div>
                </div>
                <!-- End Form Group -->

                <!-- Form Group -->
                <div class="row form-group">
                    <label for="emailLabel" class="col-sm-3 col-form-label input-label">Email</label>

                    <div class="col-sm-9">
                        <input type="email" name="email" class="form-control" value="{{ $user->email }}">
                    </div>
                </div>
                <!-- End Form Group -->

                <!-- Form Group -->
                <div class="js-add-field row form-group" data-hs-add-field-options="{
                                          &quot;template&quot;: &quot;#addPhoneFieldTemplate&quot;,
                                          &quot;container&quot;: &quot;#addPhoneFieldContainer&quot;,
                                          &quot;defaultCreated&quot;: 0
                                        }">
                    <label for="phoneLabel" class="col-sm-3 col-form-label input-label">Address </label>

                    <div class="col-sm-9">
                        <div class="input-group input-group-sm-down-break align-items-center">
                            <input type="text" name="address" class="form-control" value="{{ $user->profile->address }}">
                        </div>
                    </div>
                </div>
                <!-- End Form Group -->
                <!-- Form Group -->
                <div class="row form-group">
                    <label for="organizationLabel" class="col-sm-3 col-form-label input-label">City</label>

                    <div class="col-sm-9">
                        <input type="text" name="city" class="form-control" value="{{ $user->profile->city }}">
                    </div>
                </div>
                <!-- End Form Group -->

                <!-- Form Group -->
                <div class="row form-group">
                    <label for="departmentLabel" class="col-sm-3 col-form-label input-label">zip</label>

                    <div class="col-sm-9">
                        <input type="text" name="zip" class="form-control" value="{{ $user->profile->zip }}">
                    </div>
                </div>
                <!-- End Form Group -->

                <!-- Form Group -->
                <div class="row form-group">
                    <label for="departmentLabel" class="col-sm-3 col-form-label input-label">Country</label>

                    <div class="col-sm-9">
                        <input type="text" name="country" class="form-control" value="{{ $user->profile->country }}">
                    </div>
                </div>
                <!-- End Form Group -->

                <!-- Form Group -->
                <div class="row form-group">
                    <label for="departmentLabel" class="col-sm-3 col-form-label input-label">Designation</label>

                    <div class="col-sm-9">
                        <input type="text" name="designation" class="form-control" value="{{ $user->profile->designation }}">
                    </div>
                </div>
                <!-- End Form Group -->

                <!-- Form Group -->
                <div class="row form-group">
                    <label for="departmentLabel" class="col-sm-3 col-form-label input-label">About</label>

                    <div class="col-sm-9">
                        <textarea name="about" id="about" class="form-control" cols="30" rows="10">{{ $user->profile->about }}</textarea>
                    </div>
                </div>
                <input type="hidden" name="user_id" value="{{ $user->id }}">
                <!-- End Form Group -->


                <!-- Form Group -->
                <div class="row form-group text-right">
                    <div class="col-12">
                        <input type="submit" class="btn btn-primary btn-lg" value="Update Record">
                    </div>
                </div>
                <!-- End Form Group -->
            </form>
        </div>
        <!-- End Body -->
    </div>
@endsection

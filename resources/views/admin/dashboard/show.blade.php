@extends('admin.dashboard.layout.app')
@section('title')
    All Users
@endsection
@section('content')
    <div id="addUserStepProfile" class="card card-lg active">
        <!-- Body -->
        <div class="card-body">
            <!-- Form Group -->
            <div class="row form-group">
                <label for="firstNameLabel" class="col-sm-3 col-form-label input-label">Full name <i
                        class="tio-help-outlined text-body ml-1" data-toggle="tooltip" data-placement="top" title=""
                        data-original-title="This is Shippment Legal name, user Enter it when placing Card Order"></i></label>

                <div class="col-sm-9">
                    <div class="input-group input-group-sm-down-break">
                        <input type="text" class="form-control" value="{{ $user->name }}">
                    </div>
                </div>
            </div>
            <!-- End Form Group -->

            <!-- Form Group -->
            <div class="row form-group">
                <label for="emailLabel" class="col-sm-3 col-form-label input-label">Email</label>

                <div class="col-sm-9">
                    <input type="email" class="form-control" value="{{ $user->email }}">
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
                        <input type="email" class="form-control" value="{{ $user->address[0]->address }}">
                    </div>
                </div>
            </div>
            <!-- End Form Group -->
            <!-- Form Group -->
            <div class="row form-group">
                <label for="organizationLabel" class="col-sm-3 col-form-label input-label">City</label>

                <div class="col-sm-9">
                    <input type="email" class="form-control" value="{{ $user->address[0]->city }}">
                </div>
            </div>
            <!-- End Form Group -->

            <!-- Form Group -->
            <div class="row form-group">
                <label for="departmentLabel" class="col-sm-3 col-form-label input-label">zip</label>

                <div class="col-sm-9">
                    <input type="email" class="form-control" value="{{ $user->address[0]->zip }}">
                </div>
            </div>
            <!-- End Form Group -->

            <!-- Form Group -->
            <div class="row form-group">
                <label for="departmentLabel" class="col-sm-3 col-form-label input-label">Country</label>

                <div class="col-sm-9">
                    <input type="email" class="form-control" value="{{ $user->address[0]->country }}">
                </div>
            </div>
            <!-- End Form Group -->

        </div>
        <!-- End Body -->
    </div>
@endsection

@extends('user.dashboard.layout.app')
@section('title')
    Dashboard
@endsection
@section('content')
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div id="addUserStepFormContent">
                <form action="{{ route('user.public.store') }}" method="POST">
                    @csrf
                    <div id="addUserStepProfile" class="card card-lg active">
                        <div class="card-body">
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
                        <div class="card-footer d-flex justify-content-end align-items-center">
                            <button type="submit" class="btn btn-primary"> Update Profile </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

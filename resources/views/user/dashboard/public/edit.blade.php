@extends('user.dashboard.layout.app')
@section('title')
    Dashboard
@endsection
@section('content')
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div id="addUserStepFormContent">
                <!-- Card -->
                <div id="addUserStepProfile" class="card card-lg active">
                    <!-- Body -->
                    <div class="card-body">

                        <!-- Form Group -->
                        <div class="row form-group">
                            <label for="firstNameLabel" class="col-sm-3 col-form-label input-label">Full name <i
                                    class="tio-help-outlined text-body ml-1" data-toggle="tooltip" data-placement="top"
                                    title="" data-original-title="Displayed on public forums, such as Front."></i></label>

                            <div class="col-sm-9">
                                <div class="input-group input-group-sm-down-break">
                                    <input type="text" class="form-control" name="firstName" id="firstNameLabel"
                                        placeholder="Clarice" aria-label="Clarice">
                                    <input type="text" class="form-control" name="lastName" id="lastNameLabel"
                                        placeholder="Boone" aria-label="Boone">
                                </div>
                            </div>
                        </div>
                        <!-- End Form Group -->

                        <!-- Form Group -->
                        <div class="row form-group">
                            <label for="emailLabel" class="col-sm-3 col-form-label input-label">Email</label>

                            <div class="col-sm-9">
                                <input type="email" class="form-control" name="email" id="emailLabel"
                                    placeholder="clarice@example.com" aria-label="clarice@example.com">
                            </div>
                        </div>
                        <!-- End Form Group -->

                        <!-- Form Group -->
                        <div class="js-add-field row form-group" data-hs-add-field-options="{
                            &quot;template&quot;: &quot;#addPhoneFieldTemplate&quot;,
                            &quot;container&quot;: &quot;#addPhoneFieldContainer&quot;,
                            &quot;defaultCreated&quot;: 0
                          }">
                            <label for="phoneLabel" class="col-sm-3 col-form-label input-label">Phone <span
                                    class="input-label-secondary">(Optional)</span></label>

                            <div class="col-sm-9">
                                <div class="input-group input-group-sm-down-break align-items-center">
                                    <input type="text" class="js-masked-input form-control" name="phone" id="phoneLabel"
                                        placeholder="+x(xxx)xxx-xx-xx" aria-label="+x(xxx)xxx-xx-xx" data-hs-mask-options="{
                                   &quot;template&quot;: &quot;+0(000)000-00-00&quot;
                                 }" maxlength="16">

                                    <div class="input-group-append">
                                        <!-- Select -->
                                        <div class="select2-custom">
                                            <select class="js-select2-custom custom-select select2-hidden-accessible"
                                                size="1" style="opacity: 0;" name="phoneSelect" data-hs-select2-options="{
                                      &quot;minimumResultsForSearch&quot;: &quot;Infinity&quot;,
                                      &quot;dropdownAutoWidth&quot;: true,
                                      &quot;width&quot;: &quot;6rem&quot;
                                    }" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                                <option value="Mobile" selected="" data-select2-id="3">Mobile</option>
                                                <option value="Home" data-select2-id="4">Home</option>
                                                <option value="Work" data-select2-id="5">Work</option>
                                                <option value="Fax" data-select2-id="6">Fax</option>
                                                <option value="Direct" data-select2-id="7">Direct</option>
                                            </select><span class="select2 select2-container select2-container--default"
                                                dir="ltr" data-select2-id="2" style="width: 6rem;"><span
                                                    class="selection"><span class="select2-selection custom-select"
                                                        role="combobox" aria-haspopup="true" aria-expanded="false"
                                                        tabindex="0" aria-disabled="false"
                                                        aria-labelledby="select2-phoneSelect-k1-container"><span
                                                            class="select2-selection__rendered"
                                                            id="select2-phoneSelect-k1-container" role="textbox"
                                                            aria-readonly="true"
                                                            title="Mobile"><span>Mobile</span></span><span
                                                            class="select2-selection__arrow" role="presentation"><b
                                                                role="presentation"></b></span></span></span><span
                                                    class="dropdown-wrapper" aria-hidden="true"></span></span>
                                            <!-- End Select -->
                                        </div>
                                    </div>
                                </div>

                                <!-- Container For Input Field -->
                                <div id="addPhoneFieldContainer"></div>

                                <a class="js-create-field form-link btn btn-sm btn-no-focus btn-ghost-primary"
                                    href="javascript:;">
                                    <i class="tio-add"></i> Add phone
                                </a>
                            </div>
                        </div>
                        <!-- End Form Group -->

                        <!-- Add Phone Input Field -->
                        <div id="addAddressFieldTemplate" style="display: none;">
                            <div class="input-group-add-field">
                                <input type="text" class="form-control" data-name="addressLine" placeholder="Your address"
                                    aria-label="Your address">

                                <a class="js-delete-field input-group-add-field-delete" href="javascript:;">
                                    <i class="tio-clear"></i>
                                </a>
                            </div>
                        </div>
                        <!-- End Add Phone Input Field -->

                        <!-- Add Phone Input Field -->
                        <div id="addPhoneFieldTemplate" class="input-group-add-field" style="display: none;">
                            <div class="input-group input-group-sm-down-break align-items-center">
                                <input type="text" class="js-masked-input form-control" data-name="additionlPhone"
                                    placeholder="+x(xxx)xxx-xx-xx" aria-label="+x(xxx)xxx-xx-xx" data-hs-mask-options="{
                                 &quot;template&quot;: &quot;+0(000)000-00-00&quot;
                               }" maxlength="16">

                                <div class="input-group-append">
                                    <!-- Select -->
                                    <div class="select2-custom">
                                        <select class="js-select2-custom-dynamic custom-select" size="1" style="opacity: 0;"
                                            data-name="additionlPhoneSelect" data-hs-select2-options="{
                                    &quot;minimumResultsForSearch&quot;: &quot;Infinity&quot;,
                                    &quot;dropdownAutoWidth&quot;: true,
                                    &quot;width&quot;: &quot;6rem&quot;
                                  }">
                                            <option value="Mobile" selected="">Mobile</option>
                                            <option value="Home">Home</option>
                                            <option value="Work">Work</option>
                                            <option value="Fax">Fax</option>
                                            <option value="Direct">Direct</option>
                                        </select>
                                    </div>
                                    <!-- End Select -->
                                </div>
                            </div>

                            <a class="js-delete-field input-group-add-field-delete" href="javascript:;">
                                <i class="tio-clear"></i>
                            </a>
                        </div>
                        <!-- End Add Phone Input Field -->

                        <!-- Form Group -->
                        <div class="row form-group">
                            <label for="organizationLabel" class="col-sm-3 col-form-label input-label">Organization</label>

                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="organization" id="organizationLabel"
                                    placeholder="Htmlstream" aria-label="Htmlstream">
                            </div>
                        </div>
                        <!-- End Form Group -->

                        <!-- Form Group -->
                        <div class="row form-group">
                            <label for="departmentLabel" class="col-sm-3 col-form-label input-label">Department</label>

                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="department" id="departmentLabel"
                                    placeholder="Human resources" aria-label="Human resources">
                            </div>
                        </div>
                        <!-- End Form Group -->

                        <!-- Form Group -->
                        <div class="row">
                            <label class="col-sm-3 col-form-label input-label">Account type</label>

                            <div class="col-sm-9">
                                <div class="input-group input-group-sm-down-break">
                                    <!-- Custom Radio -->
                                    <div class="form-control">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" name="userAccountTypeRadio"
                                                id="userAccountTypeRadio1">
                                            <label class="custom-control-label"
                                                for="userAccountTypeRadio1">Individual</label>
                                        </div>
                                    </div>
                                    <!-- End Custom Radio -->

                                    <!-- Custom Radio -->
                                    <div class="form-control">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" name="userAccountTypeRadio"
                                                id="userAccountTypeRadio2">
                                            <label class="custom-control-label" for="userAccountTypeRadio2">Company</label>
                                        </div>
                                    </div>
                                    <!-- End Custom Radio -->
                                </div>
                            </div>
                        </div>
                        <!-- End Form Group -->
                    </div>
                    <!-- End Body -->

                    <!-- Footer -->
                    <div class="card-footer d-flex justify-content-end align-items-center">
                        <button type="button" class="btn btn-primary" data-hs-step-form-next-options="{
                              &quot;targetSelector&quot;: &quot;#addUserStepBillingAddress&quot;
                            }">
                            Next <i class="tio-chevron-right"></i>
                        </button>
                    </div>
                    <!-- End Footer -->
                </div>
                <!-- End Card -->

                <div id="addUserStepBillingAddress" class="card card-lg" style="display: none;">
                    <!-- Body -->
                    <div class="card-body">
                        <!-- Form Group -->
                        <div class="row form-group">
                            <label for="locationLabel" class="col-sm-3 col-form-label input-label">Location</label>

                            <div class="col-sm-9">
                                <!-- Select -->
                                <div class="mb-3">
                                    <select class="js-select2-custom custom-select select2-hidden-accessible" size="1"
                                        style="opacity: 0;" id="locationLabel" data-hs-select2-options="{
                                    &quot;placeholder&quot;: &quot;Select country&quot;,
                                    &quot;searchInputPlaceholder&quot;: &quot;Search a country&quot;
                                  }" data-select2-id="locationLabel" tabindex="-1" aria-hidden="true">
                                        <option label="empty" data-select2-id="9"></option>
                                        <option value="AF"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/af.svg&quot; alt=&quot;Afghanistan Flag&quot; /><span class=&quot;text-truncate&quot;>Afghanistan</span></span>"
                                            data-select2-id="10">Afghanistan</option>
                                        <option value="AX"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/ax.svg&quot; alt=&quot;Aland Islands Flag&quot; /><span class=&quot;text-truncate&quot;>Aland Islands</span></span>"
                                            data-select2-id="11">Aland Islands</option>
                                        <option value="AL"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/al.svg&quot; alt=&quot;Albania Flag&quot; /><span class=&quot;text-truncate&quot;>Albania</span></span>"
                                            data-select2-id="12">Albania</option>
                                        <option value="DZ"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/dz.svg&quot; alt=&quot;Algeria Flag&quot; /><span class=&quot;text-truncate&quot;>Algeria</span></span>"
                                            data-select2-id="13">Algeria</option>
                                        <option value="AS"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/as.svg&quot; alt=&quot;American Samoa Flag&quot; /><span class=&quot;text-truncate&quot;>American Samoa</span></span>"
                                            data-select2-id="14">American Samoa</option>
                                        <option value="AD"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/ad.svg&quot; alt=&quot;Andorra Flag&quot; /><span class=&quot;text-truncate&quot;>Andorra</span></span>"
                                            data-select2-id="15">Andorra</option>
                                        <option value="AO"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/ao.svg&quot; alt=&quot;Angola Flag&quot; /><span class=&quot;text-truncate&quot;>Angola</span></span>"
                                            data-select2-id="16">Angola</option>
                                        <option value="AI"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/ai.svg&quot; alt=&quot;Anguilla Flag&quot; /><span class=&quot;text-truncate&quot;>Anguilla</span></span>"
                                            data-select2-id="17">Anguilla</option>
                                        <option value="AG"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/ag.svg&quot; alt=&quot;Antigua and Barbuda Flag&quot; /><span class=&quot;text-truncate&quot;>Antigua and Barbuda</span></span>"
                                            data-select2-id="18">Antigua and Barbuda</option>
                                        <option value="AR"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/ar.svg&quot; alt=&quot;Argentina Flag&quot; /><span class=&quot;text-truncate&quot;>Argentina</span></span>"
                                            data-select2-id="19">Argentina</option>
                                        <option value="AM"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/am.svg&quot; alt=&quot;Armenia Flag&quot; /><span class=&quot;text-truncate&quot;>Armenia</span></span>"
                                            data-select2-id="20">Armenia</option>
                                        <option value="AW"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/aw.svg&quot; alt=&quot;Aruba Flag&quot; /><span class=&quot;text-truncate&quot;>Aruba</span></span>"
                                            data-select2-id="21">Aruba</option>
                                        <option value="AU"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/au.svg&quot; alt=&quot;Australia Flag&quot; /><span class=&quot;text-truncate&quot;>Australia</span></span>"
                                            data-select2-id="22">Australia</option>
                                        <option value="AT"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/at.svg&quot; alt=&quot;Austria Flag&quot; /><span class=&quot;text-truncate&quot;>Austria</span></span>"
                                            data-select2-id="23">Austria</option>
                                        <option value="AZ"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/az.svg&quot; alt=&quot;Azerbaijan Flag&quot; /><span class=&quot;text-truncate&quot;>Azerbaijan</span></span>"
                                            data-select2-id="24">Azerbaijan</option>
                                        <option value="BS"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/bs.svg&quot; alt=&quot;Bahamas Flag&quot; /><span class=&quot;text-truncate&quot;>Bahamas</span></span>"
                                            data-select2-id="25">Bahamas</option>
                                        <option value="BH"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/bh.svg&quot; alt=&quot;Bahrain Flag&quot; /><span class=&quot;text-truncate&quot;>Bahrain</span></span>"
                                            data-select2-id="26">Bahrain</option>
                                        <option value="BD"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/bd.svg&quot; alt=&quot;Bangladesh Flag&quot; /><span class=&quot;text-truncate&quot;>Bangladesh</span></span>"
                                            data-select2-id="27">Bangladesh</option>
                                        <option value="BB"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/bb.svg&quot; alt=&quot;Barbados Flag&quot; /><span class=&quot;text-truncate&quot;>Barbados</span></span>"
                                            data-select2-id="28">Barbados</option>
                                        <option value="BY"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/by.svg&quot; alt=&quot;Belarus Flag&quot; /><span class=&quot;text-truncate&quot;>Belarus</span></span>"
                                            data-select2-id="29">Belarus</option>
                                        <option value="BE"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/be.svg&quot; alt=&quot;Belgium Flag&quot; /><span class=&quot;text-truncate&quot;>Belgium</span></span>"
                                            data-select2-id="30">Belgium</option>
                                        <option value="BZ"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/bz.svg&quot; alt=&quot;Belize Flag&quot; /><span class=&quot;text-truncate&quot;>Belize</span></span>"
                                            data-select2-id="31">Belize</option>
                                        <option value="BJ"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/bj.svg&quot; alt=&quot;Benin Flag&quot; /><span class=&quot;text-truncate&quot;>Benin</span></span>"
                                            data-select2-id="32">Benin</option>
                                        <option value="BM"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/bm.svg&quot; alt=&quot;Bermuda Flag&quot; /><span class=&quot;text-truncate&quot;>Bermuda</span></span>"
                                            data-select2-id="33">Bermuda</option>
                                        <option value="BT"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/bt.svg&quot; alt=&quot;Bhutan Flag&quot; /><span class=&quot;text-truncate&quot;>Bhutan</span></span>"
                                            data-select2-id="34">Bhutan</option>
                                        <option value="BO"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/bo.svg&quot; alt=&quot;Bolivia (Plurinational State of) Flag&quot; /><span class=&quot;text-truncate&quot;>Bolivia (Plurinational State of)</span></span>"
                                            data-select2-id="35">Bolivia (Plurinational State of)</option>
                                        <option value="BQ"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/bq.svg&quot; alt=&quot;Bonaire, Sint Eustatius and Saba Flag&quot; /><span class=&quot;text-truncate&quot;>Bonaire, Sint Eustatius and Saba</span></span>"
                                            data-select2-id="36">Bonaire, Sint Eustatius and Saba</option>
                                        <option value="BA"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/ba.svg&quot; alt=&quot;Bosnia and Herzegovina Flag&quot; /><span class=&quot;text-truncate&quot;>Bosnia and Herzegovina</span></span>"
                                            data-select2-id="37">Bosnia and Herzegovina</option>
                                        <option value="BW"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/bw.svg&quot; alt=&quot;Botswana Flag&quot; /><span class=&quot;text-truncate&quot;>Botswana</span></span>"
                                            data-select2-id="38">Botswana</option>
                                        <option value="BR"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/br.svg&quot; alt=&quot;Brazil Flag&quot; /><span class=&quot;text-truncate&quot;>Brazil</span></span>"
                                            data-select2-id="39">Brazil</option>
                                        <option value="IO"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/io.svg&quot; alt=&quot;British Indian Ocean Territory Flag&quot; /><span class=&quot;text-truncate&quot;>British Indian Ocean Territory</span></span>"
                                            data-select2-id="40">British Indian Ocean Territory</option>
                                        <option value="BN"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/bn.svg&quot; alt=&quot;Brunei Darussalam Flag&quot; /><span class=&quot;text-truncate&quot;>Brunei Darussalam</span></span>"
                                            data-select2-id="41">Brunei Darussalam</option>
                                        <option value="BG"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/bg.svg&quot; alt=&quot;Bulgaria Flag&quot; /><span class=&quot;text-truncate&quot;>Bulgaria</span></span>"
                                            data-select2-id="42">Bulgaria</option>
                                        <option value="BF"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/bf.svg&quot; alt=&quot;Burkina Faso Flag&quot; /><span class=&quot;text-truncate&quot;>Burkina Faso</span></span>"
                                            data-select2-id="43">Burkina Faso</option>
                                        <option value="BI"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/bi.svg&quot; alt=&quot;Burundi Flag&quot; /><span class=&quot;text-truncate&quot;>Burundi</span></span>"
                                            data-select2-id="44">Burundi</option>
                                        <option value="CV"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/cv.svg&quot; alt=&quot;Cabo Verde Flag&quot; /><span class=&quot;text-truncate&quot;>Cabo Verde</span></span>"
                                            data-select2-id="45">Cabo Verde</option>
                                        <option value="KH"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/kh.svg&quot; alt=&quot;Cambodia Flag&quot; /><span class=&quot;text-truncate&quot;>Cambodia</span></span>"
                                            data-select2-id="46">Cambodia</option>
                                        <option value="CM"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/cm.svg&quot; alt=&quot;Cameroon Flag&quot; /><span class=&quot;text-truncate&quot;>Cameroon</span></span>"
                                            data-select2-id="47">Cameroon</option>
                                        <option value="CA"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/ca.svg&quot; alt=&quot;Canada Flag&quot; /><span class=&quot;text-truncate&quot;>Canada</span></span>"
                                            data-select2-id="48">Canada</option>
                                        <option value="KY"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/ky.svg&quot; alt=&quot;Cayman Islands Flag&quot; /><span class=&quot;text-truncate&quot;>Cayman Islands</span></span>"
                                            data-select2-id="49">Cayman Islands</option>
                                        <option value="CF"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/cf.svg&quot; alt=&quot;Central African Republic Flag&quot; /><span class=&quot;text-truncate&quot;>Central African Republic</span></span>"
                                            data-select2-id="50">Central African Republic</option>
                                        <option value="TD"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/td.svg&quot; alt=&quot;Chad Flag&quot; /><span class=&quot;text-truncate&quot;>Chad</span></span>"
                                            data-select2-id="51">Chad</option>
                                        <option value="CL"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/cl.svg&quot; alt=&quot;Chile Flag&quot; /><span class=&quot;text-truncate&quot;>Chile</span></span>"
                                            data-select2-id="52">Chile</option>
                                        <option value="CN"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/cn.svg&quot; alt=&quot;China Flag&quot; /><span class=&quot;text-truncate&quot;>China</span></span>"
                                            data-select2-id="53">China</option>
                                        <option value="CX"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/cx.svg&quot; alt=&quot;Christmas Island Flag&quot; /><span class=&quot;text-truncate&quot;>Christmas Island</span></span>"
                                            data-select2-id="54">Christmas Island</option>
                                        <option value="CC"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/cc.svg&quot; alt=&quot;Cocos (Keeling) Islands Flag&quot; /><span class=&quot;text-truncate&quot;>Cocos (Keeling) Islands</span></span>"
                                            data-select2-id="55">Cocos (Keeling) Islands</option>
                                        <option value="CO"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/co.svg&quot; alt=&quot;Colombia Flag&quot; /><span class=&quot;text-truncate&quot;>Colombia</span></span>"
                                            data-select2-id="56">Colombia</option>
                                        <option value="KM"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/km.svg&quot; alt=&quot;Comoros Flag&quot; /><span class=&quot;text-truncate&quot;>Comoros</span></span>"
                                            data-select2-id="57">Comoros</option>
                                        <option value="CK"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/ck.svg&quot; alt=&quot;Cook Islands Flag&quot; /><span class=&quot;text-truncate&quot;>Cook Islands</span></span>"
                                            data-select2-id="58">Cook Islands</option>
                                        <option value="CR"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/cr.svg&quot; alt=&quot;Costa Rica Flag&quot; /><span class=&quot;text-truncate&quot;>Costa Rica</span></span>"
                                            data-select2-id="59">Costa Rica</option>
                                        <option value="HR"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/hr.svg&quot; alt=&quot;Croatia Flag&quot; /><span class=&quot;text-truncate&quot;>Croatia</span></span>"
                                            data-select2-id="60">Croatia</option>
                                        <option value="CU"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/cu.svg&quot; alt=&quot;Cuba Flag&quot; /><span class=&quot;text-truncate&quot;>Cuba</span></span>"
                                            data-select2-id="61">Cuba</option>
                                        <option value="CW"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/cw.svg&quot; alt=&quot;Curaçao Flag&quot; /><span class=&quot;text-truncate&quot;>Curaçao</span></span>"
                                            data-select2-id="62">Curaçao</option>
                                        <option value="CY"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/cy.svg&quot; alt=&quot;Cyprus Flag&quot; /><span class=&quot;text-truncate&quot;>Cyprus</span></span>"
                                            data-select2-id="63">Cyprus</option>
                                        <option value="CZ"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/cz.svg&quot; alt=&quot;Czech Republic Flag&quot; /><span class=&quot;text-truncate&quot;>Czech Republic</span></span>"
                                            data-select2-id="64">Czech Republic</option>
                                        <option value="CI"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/ci.svg&quot; alt=Côte d'Ivoire Flag&quot; /><span class=&quot;text-truncate&quot;>Côte d'Ivoire</span></span>"
                                            data-select2-id="65">Côte d'Ivoire</option>
                                        <option value="CD"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/cd.svg&quot; alt=&quot;Democratic Republic of the Congo Flag&quot; /><span class=&quot;text-truncate&quot;>Democratic Republic of the Congo</span></span>"
                                            data-select2-id="66">Democratic Republic of the Congo</option>
                                        <option value="DK"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/dk.svg&quot; alt=&quot;Denmark Flag&quot; /><span class=&quot;text-truncate&quot;>Denmark</span></span>"
                                            data-select2-id="67">Denmark</option>
                                        <option value="DJ"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/dj.svg&quot; alt=&quot;Djibouti Flag&quot; /><span class=&quot;text-truncate&quot;>Djibouti</span></span>"
                                            data-select2-id="68">Djibouti</option>
                                        <option value="DM"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/dm.svg&quot; alt=&quot;Dominica Flag&quot; /><span class=&quot;text-truncate&quot;>Dominica</span></span>"
                                            data-select2-id="69">Dominica</option>
                                        <option value="DO"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/do.svg&quot; alt=&quot;Dominican Republic Flag&quot; /><span class=&quot;text-truncate&quot;>Dominican Republic</span></span>"
                                            data-select2-id="70">Dominican Republic</option>
                                        <option value="EC"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/ec.svg&quot; alt=&quot;Ecuador Flag&quot; /><span class=&quot;text-truncate&quot;>Ecuador</span></span>"
                                            data-select2-id="71">Ecuador</option>
                                        <option value="EG"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/eg.svg&quot; alt=&quot;Egypt Flag&quot; /><span class=&quot;text-truncate&quot;>Egypt</span></span>"
                                            data-select2-id="72">Egypt</option>
                                        <option value="SV"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/sv.svg&quot; alt=&quot;El Salvador Flag&quot; /><span class=&quot;text-truncate&quot;>El Salvador</span></span>"
                                            data-select2-id="73">El Salvador</option>
                                        <option value="GB-ENG"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/gb-eng.svg&quot; alt=&quot;England Flag&quot; /><span class=&quot;text-truncate&quot;>England</span></span>"
                                            data-select2-id="74">England</option>
                                        <option value="GQ"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/gq.svg&quot; alt=&quot;Equatorial Guinea Flag&quot; /><span class=&quot;text-truncate&quot;>Equatorial Guinea</span></span>"
                                            data-select2-id="75">Equatorial Guinea</option>
                                        <option value="ER"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/er.svg&quot; alt=&quot;Eritrea Flag&quot; /><span class=&quot;text-truncate&quot;>Eritrea</span></span>"
                                            data-select2-id="76">Eritrea</option>
                                        <option value="EE"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/ee.svg&quot; alt=&quot;Estonia Flag&quot; /><span class=&quot;text-truncate&quot;>Estonia</span></span>"
                                            data-select2-id="77">Estonia</option>
                                        <option value="ET"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/et.svg&quot; alt=&quot;Ethiopia Flag&quot; /><span class=&quot;text-truncate&quot;>Ethiopia</span></span>"
                                            data-select2-id="78">Ethiopia</option>
                                        <option value="FK"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/fk.svg&quot; alt=&quot;Falkland Islands Flag&quot; /><span class=&quot;text-truncate&quot;>Falkland Islands</span></span>"
                                            data-select2-id="79">Falkland Islands</option>
                                        <option value="FO"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/fo.svg&quot; alt=&quot;Faroe Islands Flag&quot; /><span class=&quot;text-truncate&quot;>Faroe Islands</span></span>"
                                            data-select2-id="80">Faroe Islands</option>
                                        <option value="FM"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/fm.svg&quot; alt=&quot;Federated States of Micronesia Flag&quot; /><span class=&quot;text-truncate&quot;>Federated States of Micronesia</span></span>"
                                            data-select2-id="81">Federated States of Micronesia</option>
                                        <option value="FJ"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/fj.svg&quot; alt=&quot;Fiji Flag&quot; /><span class=&quot;text-truncate&quot;>Fiji</span></span>"
                                            data-select2-id="82">Fiji</option>
                                        <option value="FI"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/fi.svg&quot; alt=&quot;Finland Flag&quot; /><span class=&quot;text-truncate&quot;>Finland</span></span>"
                                            data-select2-id="83">Finland</option>
                                        <option value="FR"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/fr.svg&quot; alt=&quot;France Flag&quot; /><span class=&quot;text-truncate&quot;>France</span></span>"
                                            data-select2-id="84">France</option>
                                        <option value="GF"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/gf.svg&quot; alt=&quot;French Guiana Flag&quot; /><span class=&quot;text-truncate&quot;>French Guiana</span></span>"
                                            data-select2-id="85">French Guiana</option>
                                        <option value="PF"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/pf.svg&quot; alt=&quot;French Polynesia Flag&quot; /><span class=&quot;text-truncate&quot;>French Polynesia</span></span>"
                                            data-select2-id="86">French Polynesia</option>
                                        <option value="TF"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/tf.svg&quot; alt=&quot;French Southern Territories Flag&quot; /><span class=&quot;text-truncate&quot;>French Southern Territories</span></span>"
                                            data-select2-id="87">French Southern Territories</option>
                                        <option value="GA"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/ga.svg&quot; alt=&quot;Gabon Flag&quot; /><span class=&quot;text-truncate&quot;>Gabon</span></span>"
                                            data-select2-id="88">Gabon</option>
                                        <option value="GM"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/gm.svg&quot; alt=&quot;Gambia Flag&quot; /><span class=&quot;text-truncate&quot;>Gambia</span></span>"
                                            data-select2-id="89">Gambia</option>
                                        <option value="GE"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/ge.svg&quot; alt=&quot;Georgia Flag&quot; /><span class=&quot;text-truncate&quot;>Georgia</span></span>"
                                            data-select2-id="90">Georgia</option>
                                        <option value="DE"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/de.svg&quot; alt=&quot;Germany Flag&quot; /><span class=&quot;text-truncate&quot;>Germany</span></span>"
                                            data-select2-id="91">Germany</option>
                                        <option value="GH"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/gh.svg&quot; alt=&quot;Ghana Flag&quot; /><span class=&quot;text-truncate&quot;>Ghana</span></span>"
                                            data-select2-id="92">Ghana</option>
                                        <option value="GI"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/gi.svg&quot; alt=&quot;Gibraltar Flag&quot; /><span class=&quot;text-truncate&quot;>Gibraltar</span></span>"
                                            data-select2-id="93">Gibraltar</option>
                                        <option value="GR"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/gr.svg&quot; alt=&quot;Greece Flag&quot; /><span class=&quot;text-truncate&quot;>Greece</span></span>"
                                            data-select2-id="94">Greece</option>
                                        <option value="GL"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/gl.svg&quot; alt=&quot;Greenland Flag&quot; /><span class=&quot;text-truncate&quot;>Greenland</span></span>"
                                            data-select2-id="95">Greenland</option>
                                        <option value="GD"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/gd.svg&quot; alt=&quot;Grenada Flag&quot; /><span class=&quot;text-truncate&quot;>Grenada</span></span>"
                                            data-select2-id="96">Grenada</option>
                                        <option value="GP"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/gp.svg&quot; alt=&quot;Guadeloupe Flag&quot; /><span class=&quot;text-truncate&quot;>Guadeloupe</span></span>"
                                            data-select2-id="97">Guadeloupe</option>
                                        <option value="GU"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/gu.svg&quot; alt=&quot;Guam Flag&quot; /><span class=&quot;text-truncate&quot;>Guam</span></span>"
                                            data-select2-id="98">Guam</option>
                                        <option value="GT"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/gt.svg&quot; alt=&quot;Guatemala Flag&quot; /><span class=&quot;text-truncate&quot;>Guatemala</span></span>"
                                            data-select2-id="99">Guatemala</option>
                                        <option value="GG"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/gg.svg&quot; alt=&quot;Guernsey Flag&quot; /><span class=&quot;text-truncate&quot;>Guernsey</span></span>"
                                            data-select2-id="100">Guernsey</option>
                                        <option value="GN"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/gn.svg&quot; alt=&quot;Guinea Flag&quot; /><span class=&quot;text-truncate&quot;>Guinea</span></span>"
                                            data-select2-id="101">Guinea</option>
                                        <option value="GW"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/gw.svg&quot; alt=&quot;Guinea-Bissau Flag&quot; /><span class=&quot;text-truncate&quot;>Guinea-Bissau</span></span>"
                                            data-select2-id="102">Guinea-Bissau</option>
                                        <option value="GY"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/gy.svg&quot; alt=&quot;Guyana Flag&quot; /><span class=&quot;text-truncate&quot;>Guyana</span></span>"
                                            data-select2-id="103">Guyana</option>
                                        <option value="HT"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/ht.svg&quot; alt=&quot;Haiti Flag&quot; /><span class=&quot;text-truncate&quot;>Haiti</span></span>"
                                            data-select2-id="104">Haiti</option>
                                        <option value="VA"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/va.svg&quot; alt=&quot;Holy See Flag&quot; /><span class=&quot;text-truncate&quot;>Holy See</span></span>"
                                            data-select2-id="105">Holy See</option>
                                        <option value="HN"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/hn.svg&quot; alt=&quot;Honduras Flag&quot; /><span class=&quot;text-truncate&quot;>Honduras</span></span>"
                                            data-select2-id="106">Honduras</option>
                                        <option value="HK"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/hk.svg&quot; alt=&quot;Hong Kong Flag&quot; /><span class=&quot;text-truncate&quot;>Hong Kong</span></span>"
                                            data-select2-id="107">Hong Kong</option>
                                        <option value="HU"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/hu.svg&quot; alt=&quot;Hungary Flag&quot; /><span class=&quot;text-truncate&quot;>Hungary</span></span>"
                                            data-select2-id="108">Hungary</option>
                                        <option value="IS"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/is.svg&quot; alt=&quot;Iceland Flag&quot; /><span class=&quot;text-truncate&quot;>Iceland</span></span>"
                                            data-select2-id="109">Iceland</option>
                                        <option value="IN"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/in.svg&quot; alt=&quot;India Flag&quot; /><span class=&quot;text-truncate&quot;>India</span></span>"
                                            data-select2-id="110">India</option>
                                        <option value="ID"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/id.svg&quot; alt=&quot;Indonesia Flag&quot; /><span class=&quot;text-truncate&quot;>Indonesia</span></span>"
                                            data-select2-id="111">Indonesia</option>
                                        <option value="IR"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/ir.svg&quot; alt=&quot;Iran (Islamic Republic of) Flag&quot; /><span class=&quot;text-truncate&quot;>Iran (Islamic Republic of)</span></span>"
                                            data-select2-id="112">Iran (Islamic Republic of)</option>
                                        <option value="IQ"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/iq.svg&quot; alt=&quot;Iraq Flag&quot; /><span class=&quot;text-truncate&quot;>Iraq</span></span>"
                                            data-select2-id="113">Iraq</option>
                                        <option value="IE"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/ie.svg&quot; alt=&quot;Ireland Flag&quot; /><span class=&quot;text-truncate&quot;>Ireland</span></span>"
                                            data-select2-id="114">Ireland</option>
                                        <option value="IM"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/im.svg&quot; alt=&quot;Isle of Man Flag&quot; /><span class=&quot;text-truncate&quot;>Isle of Man</span></span>"
                                            data-select2-id="115">Isle of Man</option>
                                        <option value="IL"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/il.svg&quot; alt=&quot;Israel Flag&quot; /><span class=&quot;text-truncate&quot;>Israel</span></span>"
                                            data-select2-id="116">Israel</option>
                                        <option value="IT"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/it.svg&quot; alt=&quot;Italy Flag&quot; /><span class=&quot;text-truncate&quot;>Italy</span></span>"
                                            data-select2-id="117">Italy</option>
                                        <option value="JM"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/jm.svg&quot; alt=&quot;Jamaica Flag&quot; /><span class=&quot;text-truncate&quot;>Jamaica</span></span>"
                                            data-select2-id="118">Jamaica</option>
                                        <option value="JP"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/jp.svg&quot; alt=&quot;Japan Flag&quot; /><span class=&quot;text-truncate&quot;>Japan</span></span>"
                                            data-select2-id="119">Japan</option>
                                        <option value="JE"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/je.svg&quot; alt=&quot;Jersey Flag&quot; /><span class=&quot;text-truncate&quot;>Jersey</span></span>"
                                            data-select2-id="120">Jersey</option>
                                        <option value="JO"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/jo.svg&quot; alt=&quot;Jordan Flag&quot; /><span class=&quot;text-truncate&quot;>Jordan</span></span>"
                                            data-select2-id="121">Jordan</option>
                                        <option value="KZ"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/kz.svg&quot; alt=&quot;Kazakhstan Flag&quot; /><span class=&quot;text-truncate&quot;>Kazakhstan</span></span>"
                                            data-select2-id="122">Kazakhstan</option>
                                        <option value="KE"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/ke.svg&quot; alt=&quot;Kenya Flag&quot; /><span class=&quot;text-truncate&quot;>Kenya</span></span>"
                                            data-select2-id="123">Kenya</option>
                                        <option value="KI"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/ki.svg&quot; alt=&quot;Kiribati Flag&quot; /><span class=&quot;text-truncate&quot;>Kiribati</span></span>"
                                            data-select2-id="124">Kiribati</option>
                                        <option value="KW"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/kw.svg&quot; alt=&quot;Kuwait Flag&quot; /><span class=&quot;text-truncate&quot;>Kuwait</span></span>"
                                            data-select2-id="125">Kuwait</option>
                                        <option value="KG"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/kg.svg&quot; alt=&quot;Kyrgyzstan Flag&quot; /><span class=&quot;text-truncate&quot;>Kyrgyzstan</span></span>"
                                            data-select2-id="126">Kyrgyzstan</option>
                                        <option value="LA"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/la.svg&quot; alt=&quot;Laos Flag&quot; /><span class=&quot;text-truncate&quot;>Laos</span></span>"
                                            data-select2-id="127">Laos</option>
                                        <option value="LV"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/lv.svg&quot; alt=&quot;Latvia Flag&quot; /><span class=&quot;text-truncate&quot;>Latvia</span></span>"
                                            data-select2-id="128">Latvia</option>
                                        <option value="LB"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/lb.svg&quot; alt=&quot;Lebanon Flag&quot; /><span class=&quot;text-truncate&quot;>Lebanon</span></span>"
                                            data-select2-id="129">Lebanon</option>
                                        <option value="LS"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/ls.svg&quot; alt=&quot;Lesotho Flag&quot; /><span class=&quot;text-truncate&quot;>Lesotho</span></span>"
                                            data-select2-id="130">Lesotho</option>
                                        <option value="LR"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/lr.svg&quot; alt=&quot;Liberia Flag&quot; /><span class=&quot;text-truncate&quot;>Liberia</span></span>"
                                            data-select2-id="131">Liberia</option>
                                        <option value="LY"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/ly.svg&quot; alt=&quot;Libya Flag&quot; /><span class=&quot;text-truncate&quot;>Libya</span></span>"
                                            data-select2-id="132">Libya</option>
                                        <option value="LI"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/li.svg&quot; alt=&quot;Liechtenstein Flag&quot; /><span class=&quot;text-truncate&quot;>Liechtenstein</span></span>"
                                            data-select2-id="133">Liechtenstein</option>
                                        <option value="LT"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/lt.svg&quot; alt=&quot;Lithuania Flag&quot; /><span class=&quot;text-truncate&quot;>Lithuania</span></span>"
                                            data-select2-id="134">Lithuania</option>
                                        <option value="LU"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/lu.svg&quot; alt=&quot;Luxembourg Flag&quot; /><span class=&quot;text-truncate&quot;>Luxembourg</span></span>"
                                            data-select2-id="135">Luxembourg</option>
                                        <option value="MO"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/mo.svg&quot; alt=&quot;Macau Flag&quot; /><span class=&quot;text-truncate&quot;>Macau</span></span>"
                                            data-select2-id="136">Macau</option>
                                        <option value="MG"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/mg.svg&quot; alt=&quot;Madagascar Flag&quot; /><span class=&quot;text-truncate&quot;>Madagascar</span></span>"
                                            data-select2-id="137">Madagascar</option>
                                        <option value="MW"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/mw.svg&quot; alt=&quot;Malawi Flag&quot; /><span class=&quot;text-truncate&quot;>Malawi</span></span>"
                                            data-select2-id="138">Malawi</option>
                                        <option value="MY"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/my.svg&quot; alt=&quot;Malaysia Flag&quot; /><span class=&quot;text-truncate&quot;>Malaysia</span></span>"
                                            data-select2-id="139">Malaysia</option>
                                        <option value="MV"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/mv.svg&quot; alt=&quot;Maldives Flag&quot; /><span class=&quot;text-truncate&quot;>Maldives</span></span>"
                                            data-select2-id="140">Maldives</option>
                                        <option value="ML"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/ml.svg&quot; alt=&quot;Mali Flag&quot; /><span class=&quot;text-truncate&quot;>Mali</span></span>"
                                            data-select2-id="141">Mali</option>
                                        <option value="MT"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/mt.svg&quot; alt=&quot;Malta Flag&quot; /><span class=&quot;text-truncate&quot;>Malta</span></span>"
                                            data-select2-id="142">Malta</option>
                                        <option value="MH"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/mh.svg&quot; alt=&quot;Marshall Islands Flag&quot; /><span class=&quot;text-truncate&quot;>Marshall Islands</span></span>"
                                            data-select2-id="143">Marshall Islands</option>
                                        <option value="MQ"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/mq.svg&quot; alt=&quot;Martinique Flag&quot; /><span class=&quot;text-truncate&quot;>Martinique</span></span>"
                                            data-select2-id="144">Martinique</option>
                                        <option value="MR"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/mr.svg&quot; alt=&quot;Mauritania Flag&quot; /><span class=&quot;text-truncate&quot;>Mauritania</span></span>"
                                            data-select2-id="145">Mauritania</option>
                                        <option value="MU"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/mu.svg&quot; alt=&quot;Mauritius Flag&quot; /><span class=&quot;text-truncate&quot;>Mauritius</span></span>"
                                            data-select2-id="146">Mauritius</option>
                                        <option value="YT"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/yt.svg&quot; alt=&quot;Mayotte Flag&quot; /><span class=&quot;text-truncate&quot;>Mayotte</span></span>"
                                            data-select2-id="147">Mayotte</option>
                                        <option value="MX"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/mx.svg&quot; alt=&quot;Mexico Flag&quot; /><span class=&quot;text-truncate&quot;>Mexico</span></span>"
                                            data-select2-id="148">Mexico</option>
                                        <option value="MD"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/md.svg&quot; alt=&quot;Moldova Flag&quot; /><span class=&quot;text-truncate&quot;>Moldova</span></span>"
                                            data-select2-id="149">Moldova</option>
                                        <option value="MC"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/mc.svg&quot; alt=&quot;Monaco Flag&quot; /><span class=&quot;text-truncate&quot;>Monaco</span></span>"
                                            data-select2-id="150">Monaco</option>
                                        <option value="MN"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/mn.svg&quot; alt=&quot;Mongolia Flag&quot; /><span class=&quot;text-truncate&quot;>Mongolia</span></span>"
                                            data-select2-id="151">Mongolia</option>
                                        <option value="ME"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/me.svg&quot; alt=&quot;Montenegro Flag&quot; /><span class=&quot;text-truncate&quot;>Montenegro</span></span>"
                                            data-select2-id="152">Montenegro</option>
                                        <option value="MS"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/ms.svg&quot; alt=&quot;Montserrat Flag&quot; /><span class=&quot;text-truncate&quot;>Montserrat</span></span>"
                                            data-select2-id="153">Montserrat</option>
                                        <option value="MA"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/ma.svg&quot; alt=&quot;Morocco Flag&quot; /><span class=&quot;text-truncate&quot;>Morocco</span></span>"
                                            data-select2-id="154">Morocco</option>
                                        <option value="MZ"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/mz.svg&quot; alt=&quot;Mozambique Flag&quot; /><span class=&quot;text-truncate&quot;>Mozambique</span></span>"
                                            data-select2-id="155">Mozambique</option>
                                        <option value="MM"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/mm.svg&quot; alt=&quot;Myanmar Flag&quot; /><span class=&quot;text-truncate&quot;>Myanmar</span></span>"
                                            data-select2-id="156">Myanmar</option>
                                        <option value="NA"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/na.svg&quot; alt=&quot;Namibia Flag&quot; /><span class=&quot;text-truncate&quot;>Namibia</span></span>"
                                            data-select2-id="157">Namibia</option>
                                        <option value="NR"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/nr.svg&quot; alt=&quot;Nauru Flag&quot; /><span class=&quot;text-truncate&quot;>Nauru</span></span>"
                                            data-select2-id="158">Nauru</option>
                                        <option value="NP"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/np.svg&quot; alt=&quot;Nepal Flag&quot; /><span class=&quot;text-truncate&quot;>Nepal</span></span>"
                                            data-select2-id="159">Nepal</option>
                                        <option value="NL"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/nl.svg&quot; alt=&quot;Netherlands Flag&quot; /><span class=&quot;text-truncate&quot;>Netherlands</span></span>"
                                            data-select2-id="160">Netherlands</option>
                                        <option value="NC"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/nc.svg&quot; &quot;alt=&quot;New Caledonia Flag&quot; /><span class=&quot;text-truncate&quot;>New Caledonia</span></span>"
                                            data-select2-id="161">New Caledonia</option>
                                        <option value="NZ"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/nz.svg&quot; alt=&quot;New Zealand Flag&quot; /><span class=&quot;text-truncate&quot;>New Zealand</span></span>"
                                            data-select2-id="162">New Zealand</option>
                                        <option value="NI"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/ni.svg&quot; alt=&quot;Nicaragua Flag&quot; /><span class=&quot;text-truncate&quot;>Nicaragua</span></span>"
                                            data-select2-id="163">Nicaragua</option>
                                        <option value="NE"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/ne.svg&quot; alt=&quot;Niger Flag&quot; /><span class=&quot;text-truncate&quot;>Niger</span></span>"
                                            data-select2-id="164">Niger</option>
                                        <option value="NG"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/ng.svg&quot; alt=&quot;Nigeria Flag&quot; /><span class=&quot;text-truncate&quot;>Nigeria</span></span>"
                                            data-select2-id="165">Nigeria</option>
                                        <option value="NU"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/nu.svg&quot; alt=&quot;Niue Flag&quot; /><span class=&quot;text-truncate&quot;>Niue</span></span>"
                                            data-select2-id="166">Niue</option>
                                        <option value="NF"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/nf.svg&quot; alt=&quot;Norfolk Island Flag&quot; /><span class=&quot;text-truncate&quot;>Norfolk Island</span></span>"
                                            data-select2-id="167">Norfolk Island</option>
                                        <option value="KP"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/kp.svg&quot; alt=&quot;North Korea Flag&quot; /><span class=&quot;text-truncate&quot;>North Korea</span></span>"
                                            data-select2-id="168">North Korea</option>
                                        <option value="MK"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/mk.svg&quot; alt=&quot;North Macedonia Flag&quot; /><span class=&quot;text-truncate&quot;>North Macedonia</span></span>"
                                            data-select2-id="169">North Macedonia</option>
                                        <option value="GB-NIR"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/gb-nir.svg&quot; alt=&quot;Northern Ireland Flag&quot; /><span class=&quot;text-truncate&quot;>Northern Ireland</span></span>"
                                            data-select2-id="170">Northern Ireland</option>
                                        <option value="MP"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/mp.svg&quot; alt=&quot;Northern Markna Islands Flag&quot; /><span class=&quot;text-truncate&quot;>Northern Markna Islands</span></span>"
                                            data-select2-id="171">Northern Markna Islands</option>
                                        <option value="NO"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/no.svg&quot; alt=&quot;Norway Flag&quot; /><span class=&quot;text-truncate&quot;>Norway</span></span>"
                                            data-select2-id="172">Norway</option>
                                        <option value="OM"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/om.svg&quot; alt=&quot;Oman Flag&quot; /><span class=&quot;text-truncate&quot;>Oman</span></span>"
                                            data-select2-id="173">Oman</option>
                                        <option value="PK"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/pk.svg&quot; alt=&quot;Pakistan Flag&quot; /><span class=&quot;text-truncate&quot;>Pakistan</span></span>"
                                            data-select2-id="174">Pakistan</option>
                                        <option value="PW"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/pw.svg&quot; alt=&quot;Palau Flag&quot; /><span class=&quot;text-truncate&quot;>Palau</span></span>"
                                            data-select2-id="175">Palau</option>
                                        <option value="PA"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/pa.svg&quot; alt=&quot;Panama Flag&quot; /><span class=&quot;text-truncate&quot;>Panama</span></span>"
                                            data-select2-id="176">Panama</option>
                                        <option value="PG"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/pg.svg&quot; alt=&quot;Papua New Guinea Flag&quot; /><span class=&quot;text-truncate&quot;>Papua New Guinea</span></span>"
                                            data-select2-id="177">Papua New Guinea</option>
                                        <option value="PY"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/py.svg&quot; alt=&quot;Paraguay Flag&quot; /><span class=&quot;text-truncate&quot;>Paraguay</span></span>"
                                            data-select2-id="178">Paraguay</option>
                                        <option value="PE"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/pe.svg&quot; alt=&quot;Peru Flag&quot; /><span class=&quot;text-truncate&quot;>Peru</span></span>"
                                            data-select2-id="179">Peru</option>
                                        <option value="PH"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/ph.svg&quot; alt=&quot;Philippines Flag&quot; /><span class=&quot;text-truncate&quot;>Philippines</span></span>"
                                            data-select2-id="180">Philippines</option>
                                        <option value="PN"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/pn.svg&quot; alt=&quot;Pitcairn Flag&quot; /><span class=&quot;text-truncate&quot;>Pitcairn</span></span>"
                                            data-select2-id="181">Pitcairn</option>
                                        <option value="PL"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/pl.svg&quot; alt=&quot;Poland Flag&quot; /><span class=&quot;text-truncate&quot;>Poland</span></span>"
                                            data-select2-id="182">Poland</option>
                                        <option value="PT"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/pt.svg&quot; alt=&quot;Portugal Flag&quot; /><span class=&quot;text-truncate&quot;>Portugal</span></span>"
                                            data-select2-id="183">Portugal</option>
                                        <option value="PR"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/pr.svg&quot; alt=&quot;Puerto Rico Flag&quot; /><span class=&quot;text-truncate&quot;>Puerto Rico</span></span>"
                                            data-select2-id="184">Puerto Rico</option>
                                        <option value="QA"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/qa.svg&quot; alt=&quot;Qatar Flag&quot; /><span class=&quot;text-truncate&quot;>Qatar</span></span>"
                                            data-select2-id="185">Qatar</option>
                                        <option value="CG"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/cg.svg&quot; alt=&quot;Republic of the Congo Flag&quot; /><span class=&quot;text-truncate&quot;>Republic of the Congo</span></span>"
                                            data-select2-id="186">Republic of the Congo</option>
                                        <option value="RO"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/ro.svg&quot; alt=&quot;Romania Flag&quot; /><span class=&quot;text-truncate&quot;>Romania</span></span>"
                                            data-select2-id="187">Romania</option>
                                        <option value="RU"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/ru.svg&quot; alt=&quot;Russia Flag&quot; /><span class=&quot;text-truncate&quot;>Russia</span></span>"
                                            data-select2-id="188">Russia</option>
                                        <option value="RW"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/rw.svg&quot; alt=&quot;Rwanda Flag&quot; /><span class=&quot;text-truncate&quot;>Rwanda</span></span>"
                                            data-select2-id="189">Rwanda</option>
                                        <option value="RE"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/re.svg&quot; alt=&quot;Réunion Flag&quot; /><span class=&quot;text-truncate&quot;>Réunion</span></span>"
                                            data-select2-id="190">Réunion</option>
                                        <option value="BL"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/bl.svg&quot; alt=&quot;Saint Barthélemy Flag&quot; /><span class=&quot;text-truncate&quot;>Saint Barthélemy</span></span>"
                                            data-select2-id="191">Saint Barthélemy</option>
                                        <option value="SH"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/sh.svg&quot; alt=&quot;Saint Helena, Ascension and Tristan da Cunha Flag&quot; /><span class=&quot;text-truncate&quot;>Saint Helena, Ascension and Tristan da Cunha</span></span>"
                                            data-select2-id="192">Saint Helena, Ascension and Tristan da Cunha</option>
                                        <option value="KN"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/kn.svg&quot; alt=&quot;Saint Kitts and Nevis Flag&quot; /><span class=&quot;text-truncate&quot;>Saint Kitts and Nevis</span></span>"
                                            data-select2-id="193">Saint Kitts and Nevis</option>
                                        <option value="LC"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/lc.svg&quot; alt=&quot;Saint Lucia Flag&quot; /><span class=&quot;text-truncate&quot;>Saint Lucia</span></span>"
                                            data-select2-id="194">Saint Lucia</option>
                                        <option value="MF"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/mf.svg&quot; alt=&quot;Saint Martin Flag&quot; /><span class=&quot;text-truncate&quot;>Saint Martin</span></span>"
                                            data-select2-id="195">Saint Martin</option>
                                        <option value="PM"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/pm.svg&quot; alt=&quot;Saint Pierre and Miquelon Flag&quot; /><span class=&quot;text-truncate&quot;>Saint Pierre and Miquelon</span></span>"
                                            data-select2-id="196">Saint Pierre and Miquelon</option>
                                        <option value="VC"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/vc.svg&quot; alt=&quot;Saint Vincent and the Grenadines Flag&quot; /><span class=&quot;text-truncate&quot;>Saint Vincent and the Grenadines</span></span>"
                                            data-select2-id="197">Saint Vincent and the Grenadines</option>
                                        <option value="WS"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/ws.svg&quot; alt=&quot;Samoa Flag&quot; /><span class=&quot;text-truncate&quot;>Samoa</span></span>"
                                            data-select2-id="198">Samoa</option>
                                        <option value="SM"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/sm.svg&quot; &quot;alt=&quot;San Marino Flag&quot; /><span class=&quot;text-truncate&quot;>San Marino</span></span>"
                                            data-select2-id="199">San Marino</option>
                                        <option value="ST"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/st.svg&quot; &quot;alt=&quot;Sao Tome and Principe Flag&quot; /><span class=&quot;text-truncate&quot;>Sao Tome and Principe</span></span>"
                                            data-select2-id="200">Sao Tome and Principe</option>
                                        <option value="SA"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/sa.svg&quot; alt=&quot;Saudi Arabia Flag&quot; /><span class=&quot;text-truncate&quot;>Saudi Arabia</span></span>"
                                            data-select2-id="201">Saudi Arabia</option>
                                        <option value="GB-SCT"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/gb-sct.svg&quot; alt=&quot;Scotland Flag&quot; /><span class=&quot;text-truncate&quot;>Scotland</span></span>"
                                            data-select2-id="202">Scotland</option>
                                        <option value="SN"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/sn.svg&quot; alt=&quot;Senegal Flag&quot; /><span class=&quot;text-truncate&quot;>Senegal</span></span>"
                                            data-select2-id="203">Senegal</option>
                                        <option value="RS"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/rs.svg&quot; alt=&quot;Serbia Flag&quot; /><span class=&quot;text-truncate&quot;>Serbia</span></span>"
                                            data-select2-id="204">Serbia</option>
                                        <option value="SC"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/sc.svg&quot; alt=&quot;Seychelles Flag&quot; /><span class=&quot;text-truncate&quot;>Seychelles</span></span>"
                                            data-select2-id="205">Seychelles</option>
                                        <option value="SL"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/sl.svg&quot; alt=&quot;Sierra Leone Flag&quot; /><span class=&quot;text-truncate&quot;>Sierra Leone</span></span>"
                                            data-select2-id="206">Sierra Leone</option>
                                        <option value="SG"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/sg.svg&quot; alt=&quot;Singapore Flag&quot; /><span class=&quot;text-truncate&quot;>Singapore</span></span>"
                                            data-select2-id="207">Singapore</option>
                                        <option value="SX"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/sx.svg&quot; alt=&quot;Sint Maarten Flag&quot; /><span class=&quot;text-truncate&quot;>Sint Maarten</span></span>"
                                            data-select2-id="208">Sint Maarten</option>
                                        <option value="SK"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/sk.svg&quot; alt=&quot;Slovakia Flag&quot; /><span class=&quot;text-truncate&quot;>Slovakia</span></span>"
                                            data-select2-id="209">Slovakia</option>
                                        <option value="SI"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/si.svg&quot; alt=&quot;Slovenia Flag&quot; /><span class=&quot;text-truncate&quot;>Slovenia</span></span>"
                                            data-select2-id="210">Slovenia</option>
                                        <option value="SB"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/sb.svg&quot; alt=&quot;Solomon Islands Flag&quot; /><span class=&quot;text-truncate&quot;>Solomon Islands</span></span>"
                                            data-select2-id="211">Solomon Islands</option>
                                        <option value="SO"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/so.svg&quot; alt=&quot;Somalia Flag&quot; /><span class=&quot;text-truncate&quot;>Somalia</span></span>"
                                            data-select2-id="212">Somalia</option>
                                        <option value="ZA"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/za.svg&quot; alt=&quot;South Africa Flag&quot; /><span class=&quot;text-truncate&quot;>South Africa</span></span>"
                                            data-select2-id="213">South Africa</option>
                                        <option value="GS"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/gs.svg&quot; alt=&quot;South Georgia and the South Sandwich Islands Flag&quot; /><span class=&quot;text-truncate&quot;>South Georgia and the South Sandwich Islands</span></span>"
                                            data-select2-id="214">South Georgia and the South Sandwich Islands</option>
                                        <option value="KR"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/kr.svg&quot; alt=&quot;South Korea Flag&quot; /><span class=&quot;text-truncate&quot;>South Korea</span></span>"
                                            data-select2-id="215">South Korea</option>
                                        <option value="SS"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/ss.svg&quot; alt=&quot;South Sudan Flag&quot; /><span class=&quot;text-truncate&quot;>South Sudan</span></span>"
                                            data-select2-id="216">South Sudan</option>
                                        <option value="ES"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/es.svg&quot; alt=&quot;Spain Flag&quot; /><span class=&quot;text-truncate&quot;>Spain</span></span>"
                                            data-select2-id="217">Spain</option>
                                        <option value="LK"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/lk.svg&quot; &quot;alt=&quot;Sri Lanka Flag&quot; /><span class=&quot;text-truncate&quot;>Sri Lanka</span></span>"
                                            data-select2-id="218">Sri Lanka</option>
                                        <option value="PS"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/ps.svg&quot; alt=&quot;State of Palestine Flag&quot; /><span class=&quot;text-truncate&quot;>State of Palestine</span></span>"
                                            data-select2-id="219">State of Palestine</option>
                                        <option value="SD"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/sd.svg&quot; alt=&quot;Sudan Flag&quot; /><span class=&quot;text-truncate&quot;>Sudan</span></span>"
                                            data-select2-id="220">Sudan</option>
                                        <option value="SR"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/sr.svg&quot; alt=&quot;Suriname Flag&quot; /><span class=&quot;text-truncate&quot;>Suriname</span></span>"
                                            data-select2-id="221">Suriname</option>
                                        <option value="SJ"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/sj.svg&quot; alt=&quot;Svalbard and Jan Mayen Flag&quot; /><span class=&quot;text-truncate&quot;>Svalbard and Jan Mayen</span></span>"
                                            data-select2-id="222">Svalbard and Jan Mayen</option>
                                        <option value="SZ"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/sz.svg&quot; alt=&quot;Swaziland Flag&quot; /><span class=&quot;text-truncate&quot;>Swaziland</span></span>"
                                            data-select2-id="223">Swaziland</option>
                                        <option value="SE"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/se.svg&quot; alt=&quot;Sweden Flag&quot; /><span class=&quot;text-truncate&quot;>Sweden</span></span>"
                                            data-select2-id="224">Sweden</option>
                                        <option value="CH"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/ch.svg&quot; alt=&quot;Switzerland Flag&quot; /><span class=&quot;text-truncate&quot;>Switzerland</span></span>"
                                            data-select2-id="225">Switzerland</option>
                                        <option value="SY"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/sy.svg&quot; alt=&quot;Syrian Arab Republic Flag&quot; /><span class=&quot;text-truncate&quot;>Syrian Arab Republic</span></span>"
                                            data-select2-id="226">Syrian Arab Republic</option>
                                        <option value="TW"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/tw.svg&quot; alt=&quot;Taiwan Flag&quot; /><span class=&quot;text-truncate&quot;>Taiwan</span></span>"
                                            data-select2-id="227">Taiwan</option>
                                        <option value="TJ"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/tj.svg&quot; alt=&quot;Tajikistan Flag&quot; /><span class=&quot;text-truncate&quot;>Tajikistan</span></span>"
                                            data-select2-id="228">Tajikistan</option>
                                        <option value="TZ"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/tz.svg&quot; alt=&quot;Tanzania Flag&quot; /><span class=&quot;text-truncate&quot;>Tanzania</span></span>"
                                            data-select2-id="229">Tanzania</option>
                                        <option value="TH"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/th.svg&quot; alt=&quot;Thailand Flag&quot; /><span class=&quot;text-truncate&quot;>Thailand</span></span>"
                                            data-select2-id="230">Thailand</option>
                                        <option value="TL"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/tl.svg&quot; alt=&quot;Timor-Leste Flag&quot; /><span class=&quot;text-truncate&quot;>Timor-Leste</span></span>"
                                            data-select2-id="231">Timor-Leste</option>
                                        <option value="TG"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/tg.svg&quot; alt=&quot;Togo Flag&quot; /><span class=&quot;text-truncate&quot;>Togo</span></span>"
                                            data-select2-id="232">Togo</option>
                                        <option value="TK"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/tk.svg&quot; alt=&quot;Tokelau Flag&quot; /><span class=&quot;text-truncate&quot;>Tokelau</span></span>"
                                            data-select2-id="233">Tokelau</option>
                                        <option value="TO"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/to.svg&quot; alt=&quot;Tonga Flag&quot; /><span class=&quot;text-truncate&quot;>Tonga</span></span>"
                                            data-select2-id="234">Tonga</option>
                                        <option value="TT"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/tt.svg&quot; alt=&quot;Trinidad and Tobago Flag&quot; /><span class=&quot;text-truncate&quot;>Trinidad and Tobago</span></span>"
                                            data-select2-id="235">Trinidad and Tobago</option>
                                        <option value="TN"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/tn.svg&quot; alt=&quot;Tunisia Flag&quot; /><span class=&quot;text-truncate&quot;>Tunisia</span></span>"
                                            data-select2-id="236">Tunisia</option>
                                        <option value="TR"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/tr.svg&quot; alt=&quot;Turkey Flag&quot; /><span class=&quot;text-truncate&quot;>Turkey</span></span>"
                                            data-select2-id="237">Turkey</option>
                                        <option value="TM"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/tm.svg&quot; alt=&quot;Turkmenistan Flag&quot; /><span class=&quot;text-truncate&quot;>Turkmenistan</span></span>"
                                            data-select2-id="238">Turkmenistan</option>
                                        <option value="TC"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/tc.svg&quot; alt=&quot;Turks and Caicos Islands Flag&quot; /><span class=&quot;text-truncate&quot;>Turks and Caicos Islands</span></span>"
                                            data-select2-id="239">Turks and Caicos Islands</option>
                                        <option value="TV"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/tv.svg&quot; alt=&quot;Tuvalu Flag&quot; /><span class=&quot;text-truncate&quot;>Tuvalu</span></span>"
                                            data-select2-id="240">Tuvalu</option>
                                        <option value="UG"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/ug.svg&quot; alt=&quot;Uganda Flag&quot; /><span class=&quot;text-truncate&quot;>Uganda</span></span>"
                                            data-select2-id="241">Uganda</option>
                                        <option value="UA"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/ua.svg&quot; alt=&quot;Ukraine Flag&quot; /><span class=&quot;text-truncate&quot;>Ukraine</span></span>"
                                            data-select2-id="242">Ukraine</option>
                                        <option value="AE"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/ae.svg&quot; alt=&quot;United Arab Emirates Flag&quot; /><span class=&quot;text-truncate&quot;>United Arab Emirates</span></span>"
                                            data-select2-id="243">United Arab Emirates</option>
                                        <option value="GB" selected=""
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/gb.svg&quot; alt=&quot;United Kingdom Flag&quot; /><span class=&quot;text-truncate&quot;>United Kingdom</span></span>"
                                            data-select2-id="244">United Kingdom</option>
                                        <option value="UM"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/um.svg&quot; alt=&quot;United States Minor Outlying Islands Flag&quot; /><span class=&quot;text-truncate&quot;>United States Minor Outlying Islands</span></span>"
                                            data-select2-id="245">United States Minor Outlying Islands</option>
                                        <option value="US"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/us.svg&quot; alt=&quot;United States of America Flag&quot; /><span class=&quot;text-truncate&quot;>United States of America</span></span>"
                                            data-select2-id="246">United States of America</option>
                                        <option value="UY"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/uy.svg&quot; alt=&quot;Uruguay Flag&quot; /><span class=&quot;text-truncate&quot;>Uruguay</span></span>"
                                            data-select2-id="247">Uruguay</option>
                                        <option value="UZ"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/uz.svg&quot; alt=&quot;Uzbekistan Flag&quot; /><span class=&quot;text-truncate&quot;>Uzbekistan</span></span>"
                                            data-select2-id="248">Uzbekistan</option>
                                        <option value="VU"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/vu.svg&quot; alt=&quot;Vanuatu Flag&quot; /><span class=&quot;text-truncate&quot;>Vanuatu</span></span>"
                                            data-select2-id="249">Vanuatu</option>
                                        <option value="VE"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/ve.svg&quot; alt=&quot;Venezuela (Bolivarian Republic of) Flag&quot; /><span class=&quot;text-truncate&quot;>Venezuela (Bolivarian Republic of)</span></span>"
                                            data-select2-id="250">Venezuela (Bolivarian Republic of)</option>
                                        <option value="VN"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/vn.svg&quot; alt=&quot;Vietnam Flag&quot; /><span class=&quot;text-truncate&quot;>Vietnam</span></span>"
                                            data-select2-id="251">Vietnam</option>
                                        <option value="VG"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/vg.svg&quot; alt=&quot;Virgin Islands (British) Flag&quot; /><span class=&quot;text-truncate&quot;>Virgin Islands (British)</span></span>"
                                            data-select2-id="252">Virgin Islands (British)</option>
                                        <option value="VI"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/vi.svg&quot; alt=&quot;Virgin Islands (U.S.) Flag&quot; /><span class=&quot;text-truncate&quot;>Virgin Islands (U.S.)</span></span>"
                                            data-select2-id="253">Virgin Islands (U.S.)</option>
                                        <option value="GB-WLS"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/gb-wls.svg&quot; alt=&quot;Wales Flag&quot; /><span class=&quot;text-truncate&quot;>Wales</span></span>"
                                            data-select2-id="254">Wales</option>
                                        <option value="WF"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/wf.svg&quot; alt=&quot;Wallis and Futuna Flag&quot; /><span class=&quot;text-truncate&quot;>Wallis and Futuna</span></span>"
                                            data-select2-id="255">Wallis and Futuna</option>
                                        <option value="EH"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/eh.svg&quot; alt=&quot;Western Sahara Flag&quot; /><span class=&quot;text-truncate&quot;>Western Sahara</span></span>"
                                            data-select2-id="256">Western Sahara</option>
                                        <option value="YE"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/ye.svg&quot; alt=&quot;Yemen Flag&quot; /><span class=&quot;text-truncate&quot;>Yemen</span></span>"
                                            data-select2-id="257">Yemen</option>
                                        <option value="ZM"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/zm.svg&quot; alt=&quot;Zambia Flag&quot; /><span class=&quot;text-truncate&quot;>Zambia</span></span>"
                                            data-select2-id="258">Zambia</option>
                                        <option value="ZW"
                                            data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle mr-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/zw.svg&quot; alt=&quot;Zimbabwe Flag&quot; /><span class=&quot;text-truncate&quot;>Zimbabwe</span></span>"
                                            data-select2-id="259">Zimbabwe</option>
                                    </select><span class="select2 select2-container select2-container--default" dir="ltr"
                                        data-select2-id="8" style="width: 100%;"><span class="selection"><span
                                                class="select2-selection custom-select" role="combobox" aria-haspopup="true"
                                                aria-expanded="false" tabindex="0" aria-disabled="false"
                                                aria-labelledby="select2-locationLabel-container"><span
                                                    class="select2-selection__rendered" id="select2-locationLabel-container"
                                                    role="textbox" aria-readonly="true" title="United Kingdom"><span
                                                        class="d-flex align-items-center"><img
                                                            class="avatar avatar-xss avatar-circle mr-2"
                                                            src="./assets/vendor/flag-icon-css/flags/1x1/gb.svg"
                                                            alt="United Kingdom Flag"><span class="text-truncate">United
                                                            Kingdom</span></span></span><span
                                                    class="select2-selection__arrow" role="presentation"><b
                                                        role="presentation"></b></span></span></span><span
                                            class="dropdown-wrapper" aria-hidden="true"></span></span>
                                </div>
                                <!-- End Select -->

                                <div class="mb-3">
                                    <input type="text" class="form-control" name="city" id="cityLabel" placeholder="City"
                                        aria-label="City">
                                </div>

                                <input type="text" class="form-control" name="state" id="stateLabel" placeholder="State"
                                    aria-label="State">
                            </div>
                        </div>
                        <!-- End Form Group -->

                        <!-- Form Group -->
                        <div class="row form-group">
                            <label for="addressLine1Label" class="col-sm-3 col-form-label input-label">Address line
                                1</label>

                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="addressLine1" id="addressLine1Label"
                                    placeholder="Your address" aria-label="Your address">
                            </div>
                        </div>
                        <!-- End Form Group -->

                        <!-- Form Group -->
                        <div class="js-add-field row form-group" data-hs-add-field-options="{
                            &quot;template&quot;: &quot;#addAddressFieldTemplate&quot;,
                            &quot;container&quot;: &quot;#addAddressFieldContainer&quot;,
                            &quot;defaultCreated&quot;: 0
                          }">
                            <label for="addressLine2Label" class="col-sm-3 col-form-label input-label">Address line 2 <span
                                    class="input-label-secondary">(Optional)</span></label>

                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="addressLine2" id="addressLine2Label"
                                    placeholder="Your address" aria-label="Your address">

                                <!-- Container For Input Field -->
                                <div id="addAddressFieldContainer"></div>

                                <a href="javascript:;"
                                    class="js-create-field form-link btn btn-sm btn-no-focus btn-ghost-primary">
                                    <i class="tio-add"></i> Add address
                                </a>
                            </div>
                        </div>
                        <!-- End Form Group -->

                        <!-- Form Group -->
                        <div class="row">
                            <label for="zipCodeLabel" class="col-sm-3 col-form-label input-label">Zip code <i
                                    class="tio-help-outlined text-body ml-1" data-toggle="tooltip" data-placement="top"
                                    title="" data-original-title="You can find your code in a postal address."></i></label>

                            <div class="col-sm-9">
                                <input type="text" class="js-masked-input form-control" name="zipCode" id="zipCodeLabel"
                                    placeholder="Your zip code" aria-label="Your zip code" data-hs-mask-options="{
                                 &quot;template&quot;: &quot;AA0 0AA&quot;
                               }" maxlength="7">
                            </div>
                        </div>
                        <!-- End Form Group -->
                    </div>
                    <!-- End Body -->

                    <!-- Footer -->
                    <div class="card-footer d-flex align-items-center">
                        <button type="button" class="btn btn-ghost-secondary" data-hs-step-form-prev-options="{
                         &quot;targetSelector&quot;: &quot;#addUserStepProfile&quot;
                       }">
                            <i class="tio-chevron-left"></i> Previous step
                        </button>

                        <div class="ml-auto">
                            <button type="button" class="btn btn-primary" data-hs-step-form-next-options="{
                                &quot;targetSelector&quot;: &quot;#addUserStepConfirmation&quot;
                              }">
                                Next <i class="tio-chevron-right"></i>
                            </button>
                        </div>
                    </div>
                    <!-- End Footer -->
                </div>

                <div id="addUserStepConfirmation" class="card card-lg" style="display: none;">
                    <!-- Profile Cover -->
                    <div class="profile-cover">
                        <div class="profile-cover-img-wrapper">
                            <img class="profile-cover-img" src="./assets/img/1920x400/img1.jpg" alt="Image Description">
                        </div>
                    </div>
                    <!-- End Profile Cover -->

                    <!-- Avatar -->
                    <div class="avatar avatar-xxl avatar-circle avatar-border-lg profile-cover-avatar">
                        <img class="avatar-img" src="./assets/img/160x160/img9.jpg" alt="Image Description">
                    </div>
                    <!-- End Avatar -->

                    <!-- Body -->
                    <div class="card-body">
                        <dl class="row">
                            <dt class="col-sm-6 text-sm-right">Full name:</dt>
                            <dd class="col-sm-6">Ella Lauda</dd>

                            <dt class="col-sm-6 text-sm-right">Email:</dt>
                            <dd class="col-sm-6">ella@example.com</dd>

                            <dt class="col-sm-6 text-sm-right">Phone:</dt>
                            <dd class="col-sm-6">+1 (609) 972-22-22</dd>

                            <dt class="col-sm-6 text-sm-right">Organization:</dt>
                            <dd class="col-sm-6">Htmlstream</dd>

                            <dt class="col-sm-6 text-sm-right">Department:</dt>
                            <dd class="col-sm-6">-</dd>

                            <dt class="col-sm-6 text-sm-right">Account type:</dt>
                            <dd class="col-sm-6">Individual</dd>

                            <dt class="col-sm-6 text-sm-right">Country:</dt>
                            <dd class="col-sm-6"><img class="avatar avatar-xss avatar-circle mr-1"
                                    src="./assets/vendor/flag-icon-css/flags/1x1/gb.svg" alt="Great Britain Flag"> United
                                Kingdom</dd>

                            <dt class="col-sm-6 text-sm-right">City:</dt>
                            <dd class="col-sm-6">London</dd>

                            <dt class="col-sm-6 text-sm-right">State:</dt>
                            <dd class="col-sm-6">-</dd>

                            <dt class="col-sm-6 text-sm-right">Address line 1:</dt>
                            <dd class="col-sm-6">45 Roker Terrace, Latheronwheel</dd>

                            <dt class="col-sm-6 text-sm-right">Address line 2:</dt>
                            <dd class="col-sm-6">-</dd>

                            <dt class="col-sm-6 text-sm-right">Zip code:</dt>
                            <dd class="col-sm-6">KW5 8NW</dd>
                        </dl>
                        <!-- End Row -->
                    </div>
                    <!-- End Body -->

                    <!-- Footer -->
                    <div class="card-footer d-sm-flex align-items-sm-center">
                        <button type="button" class="btn btn-ghost-secondary mb-2 mb-sm-0" data-hs-step-form-prev-options="{
                         &quot;targetSelector&quot;: &quot;#addUserStepBillingAddress&quot;
                       }">
                            <i class="tio-chevron-left"></i> Previous step
                        </button>

                        <div class="ml-auto">
                            <button type="button" class="btn btn-white mr-2">Save in drafts</button>
                            <button id="addUserFinishBtn" type="button" class="btn btn-primary">Add user</button>
                        </div>
                    </div>
                    <!-- End Footer -->
                </div>
            </div>
        </div>
    </div>
@endsection

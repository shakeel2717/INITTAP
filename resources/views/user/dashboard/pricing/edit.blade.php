@extends('user.dashboard.layout.app')
@section('title')
    Order a new Card
@endsection
@section('content')
    <div class="row gx-2 gx-lg-3">
        <div class="col-md-12 col-lg-10 mx-auto">
            <div class="card ">
                <div class="card-body">
                    <h2 class="card-title">Your Selected Card {{ url('api/payment/success') }}</h2>
                    <hr>
                    <div class="row text-center">
                        <div class="col-md-8 mx-auto">
                            <p>Preview of your Card</p>
                            <div class="card-box">
                                <div class="card-left">
                                    <img src="{{ asset('assets/img/card/man.png') }}" alt="Profile Picture">
                                </div>
                                <div class="card-right">
                                    <img src="{{ asset('assets/img/brand/logo-light.svg') }}" alt="Logo">
                                    <h2 id="heading" class="display-4">{{ Auth::user()->name }}</h2>
                                    <h4 id="desg" class="display-4">Designation</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <form action="{{ route('api.success') }}" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-8 mx-auto">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="card_name">Card Type</label>
                                            <!-- Select2 -->
                                            <select id="type" name="type" class="js-select2-custom custom-select" size="1"
                                                style="opacity: 0;" data-hs-select2-options='{
                                                                            "placeholder": "Select wallet"
                                                                            }'>
                                                <option value="inittap" selected>
                                                    INITTAP branded card
                                                </option>
                                                <option value="custom">
                                                    Custom Branded Card
                                                </option>
                                            </select>
                                            <!-- End Select2 -->
                                        </div>
                                        <div class="row form-group d-none justify-content-center" id="custom">
                                            <div class="d-flex align-items-center">
                                                <!-- Avatar -->
                                                <label class="avatar avatar-xl avatar-circle avatar-uploader mr-5"
                                                    for="avatarUploader">
                                                    <img id="avatarImg" class="avatar-img"
                                                        src="{{ Auth::user()->avatar != '' ? asset('assets/profiles/') . '/' . Auth::user()->avatar : asset('assets/img/160x160/img1.jpg') }}"
                                                        alt="Image Description">

                                                    <input type="file" class="js-file-attach avatar-uploader-input"
                                                        id="avatarUploader" data-hs-file-attach-options='{
                                                                            "textTarget": "#avatarImg",
                                                                            "mode": "image",
                                                                            "targetAttr": "src",
                                                                            "resetTarget": ".js-file-attach-reset-img",
                                                                            "resetImg": "{{ asset('assets/img/160x160/img1.jpg') }}",
                                                                            "allowTypes": [".png", ".jpeg", ".jpg"]
                                                                        }' name="custom">

                                                    <span class="avatar-uploader-trigger">
                                                        <i class="tio-edit avatar-uploader-icon shadow-soft"></i>
                                                    </span>
                                                </label>
                                                <!-- End Avatar -->

                                                <button type="button"
                                                    class="js-file-attach-reset-img btn btn-white">Delete</button>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="card_name">Card Name</label>
                                            <input type="text" class="form-control" id="card_name" name="card_name"
                                                placeholder="Enter Card Name" value="{{ Auth::user()->name }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="designation">Designation</label>
                                            <input type="text" class="form-control" id="designation" name="designation"
                                                placeholder="Enter Card Name" value="Designation">
                                        </div>
                                        <div class="form-group">
                                            <label for="designation">About / Tag Line</label>
                                            <textarea name="about" id="about" cols="30" rows="10" class="form-control"
                                                placeholder="Type Your Tagline, or About You!"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8 mx-auto">
                                <div class="row">
                                    <div class="col-md-6">
                                        <a href="{{ route('user.order.index') }}"
                                            class="btn btn-lg btn-block btn-white">Change the Card</a>
                                    </div>
                                    <div class="col-md-6">
                                        {{-- <form action="{{ $data->params->hppUrl }}" method="POST"> --}}
                                        <input type="hidden" name="referenceId" id="referenceId"
                                            value="{{ $data->params->referenceId }}">
                                        <input type="hidden" name="hppRequestId" id="hppRequestId"
                                            value="{{ $data->params->hppRequestId }}">
                                        <button type="submit" class="btn btn-lg btn-block btn-primary">Proceed to
                                            Checkout</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('footer')
    <script>
        $(document).ready(function() {
            // $('#custom').addClass('d-none');
            $('#type').change(function() {
                $("#custom").toggleClass('d-none');
            });

            $("#card_name").on("input", function() {
                var heading = $(this).val();
                if (heading == "") {
                    $("#heading").text("{{ Auth::user()->name }}");
                } else {
                    $("#heading").text(heading);
                }
            });

            $("#designation").on("input", function() {
                var desg = $(this).val();
                if (desg == "") {
                    $("#desg").text("Accountant");
                } else {
                    $("#desg").text(desg);
                }
            });

            var csrf = $('meta[name="csrf-token"]').attr('content');


            // if user stop writing in the form
            $("#card_name").on("blur", function() {
                var heading = $("#card_name").val();
                var desg = $("#designation").val();
                var about = $("#about").val();
                // running the ajax function
                // ajaxFunction(heading, desg, about);
            });
            $("#designation").on("blur", function() {
                var heading = $("#card_name").val();
                var desg = $("#designation").val();
                var about = $("#about").val();
                // running the ajax function
                // ajaxFunction(heading, desg, about);
            });
            $("#about").on("blur", function() {
                var heading = $("#card_name").val();
                var desg = $("#designation").val();
                var about = $("#about").val();
                // running the ajax function
                // ajaxFunction(heading, desg, about);
            });
            // creating ajax function
            // function ajaxFunction(heading, desg, about) {
            //     $.ajax({
            //         url: "{{ route('store') }}",
            //         method: "POST",
            //         data: {
            //             _token: csrf,
            //             heading: heading,
            //             desg: desg,
            //             about: about,
            //         },
            //         success: function(data) {
            //             console.log(data);
            //         }
            //     });
            // }
        });
    </script>
    <script src="{{ asset('assets/vendor/hs-file-attach/dist/hs-file-attach.min.js') }}"></script>
    <script>
        $(document).on('ready', function() {
            $('.js-file-attach').each(function() {
                var customFile = new HSFileAttach($(this)).init();
            });
        });
    </script>
@endsection

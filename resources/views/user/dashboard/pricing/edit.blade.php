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
                    <div class="row">
                        <div class="mx-auto text-center">
                            <p>Preview of your Card</p>
                            <div class="mx-auto nfc-card">
                                <div class="card-group shadow-lg">
                                    <div class="card border">
                                        <div
                                            class="card-body d-flex flex-column justify-content-between align-items-center">
                                            <div class="first">
                                                <h4 id="heading" class="card-title">{{ Auth::user()->name }}</h4>
                                                <h5 id="desg" class="card-title" style="color:gold">Designation</h5>
                                                <img class="img-fluid" src="{{ asset('assets/img/hr.svg') }}"
                                                    alt="H Row" width="100%">
                                            </div>
                                            <div class="second">
                                                <img class="img-fluid"
                                                    src="https://chart.googleapis.com/chart?chs=100x100&cht=qr&chl={{ route('user.public.profile', ['username' => Auth::user()->username]) }}&chld=L|1&choe=UTF-8, 'QrCode.png', 'image/png' }}"
                                                    alt="QR Code">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card border-0" style="background-color:black">
                                        <div class="card-body d-flex justify-content-center align-items-center">
                                            <img src="{{ asset('assets/img/brand/logo-gold.svg') }}" alt="Logo"
                                                width="80%">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
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
                                                                                                            }'
                                                        name="custom">

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
                                            <label for="card_name">Card Title</label>
                                            <input type="text" class="form-control" id="card_name" name="card_name"
                                                placeholder="Enter Card Title" value="{{ Auth::user()->name }}">
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
                                        <button type="submit" id="checkout-button" class="btn btn-lg btn-block btn-primary">Proceed to
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
            $('#checkout-button').prop('disabled', true);
            // $('#custom').addClass('d-none');
            $('#type').change(function() {
                $("#custom").toggleClass('d-none');
            });

            $("#card_name").on("input", function() {
                var heading = $(this).val();
                if (heading == "") {
                    $("#heading").text("{{ Auth::user()->name }}");
                    // checkout button active again
                    $('#checkout-button').prop('disabled', false);
                } else {
                    $("#heading").text(heading);
                }
            });

            $("#designation").on("input", function() {
                var desg = $(this).val();
                if (desg == "") {
                    $("#desg").text("Accountant");
                    $('#checkout-button').prop('disabled', false);
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
                $('#checkout-button').prop('disabled', false);
                // running the ajax function
                // ajaxFunction(heading, desg, about);
            });
            $("#designation").on("blur", function() {
                var heading = $("#card_name").val();
                var desg = $("#designation").val();
                var about = $("#about").val();
                $('#checkout-button').prop('disabled', false);
                // running the ajax function
                // ajaxFunction(heading, desg, about);
            });
            $("#about").on("blur", function() {
                var heading = $("#card_name").val();
                var desg = $("#designation").val();
                var about = $("#about").val();
                $('#checkout-button').prop('disabled', false);
                // running the ajax function
                // ajaxFunction(heading, desg, about);
            });
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

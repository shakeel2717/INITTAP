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
                                    <h2 id="heading">{{ Auth::user()->name }}</h2>
                                    <h4 id="desg">Designation</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8 mx-auto">
                            <form action="#" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
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
                                    </div>
                                </div>
                            </form>
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
                                    <form action="{{ $data->params->hppUrl }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="referenceId" id="referenceId"
                                            value="{{ $data->params->referenceId }}">
                                        <input type="hidden" name="hppRequestId" id="hppRequestId"
                                            value="{{ $data->params->hppRequestId }}">
                                        <button type="submit" class="btn btn-lg btn-block btn-primary">Proceed to
                                            Checkout</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('footer')
    <script>
        $(document).ready(function() {
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


            // if user stop writing in the form
            $("#card_name").on("blur", function() {
                var heading = $("#card_name").val();
                var desg = $("#designation").val();
                // running the ajax function
                ajaxFunction(heading, desg);
            });
            $("#designation").on("blur", function() {
                var heading = $("#card_name").val();
                var desg = $("#designation").val();
                // running the ajax function
                ajaxFunction(heading, desg);
            });
            // creating ajax function
            function ajaxFunction(heading, desg) {
                $.ajax({
                    url: "{{ route('store') }}",
                    method: "POST",
                    data: {
                        heading: heading,
                        desg: desg,
                    },
                    success: function(data) {
                        console.log(data);
                    }
                });
            }
        });
    </script>
@endsection

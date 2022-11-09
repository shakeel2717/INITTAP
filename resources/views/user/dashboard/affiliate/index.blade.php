@extends('user.dashboard.layout.app')
@section('title')
Affiliate System
@endsection
@section('content')
<div class="row gx-2 gx-lg-3">
    <div class="col-sm-6 col-lg-4 mb-3 mb-lg-5">
        <!-- Card -->
        <div class="card h-100">
            <div class="card-body">
                <h6 class="card-subtitle mb-2">Available Balance</h6>

                <div class="row align-items-center gx-2">
                    <div class="col">
                        <span class="js-counter display-4 text-dark" data-value="24">${{ number_format(referCommission(auth()->user()->id),2) }}</span>
                        <span class="text-body font-size-sm ml-1">USD</span>
                    </div>
                </div>
                <!-- End Row -->
            </div>
        </div>
        <!-- End Card -->
    </div>
    <div class="col-sm-6 col-lg-4 mb-3 mb-lg-5">
        <!-- Card -->
        <div class="card h-100">
            <div class="card-body">
                <h6 class="card-subtitle mb-2">Total Active Refers</h6>

                <div class="row align-items-center gx-2">
                    <div class="col">
                        <span class="js-counter display-4" data-value="24">{{ referCount(auth()->user()->id)->count() }}</span>
                        <span class="text-body font-size-sm ml-1">Refer(s)</span>
                    </div>
                </div>
                <!-- End Row -->
            </div>
        </div>
        <!-- End Card -->
    </div>
    <div class="col-sm-6 col-lg-4 mb-3 mb-lg-5">
        <!-- Card -->
        <div class="card h-100">
            <div class="card-body">
                <h6 class="card-subtitle mb-2">Total Withdraw</h6>

                <div class="row align-items-center gx-2">
                    <div class="col">
                        <span class="js-counter display-4" data-value="24">${{ number_format(0,2) }}</span>
                        <span class="text-body font-size-sm ml-1">USD</span>
                    </div>
                </div>
                <!-- End Row -->
            </div>
        </div>
        <!-- End Card -->
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card card-lg mb-3 mb-lg-5">
            <div class="card-body text-center">
                <div class="w-50 mx-auto mb-4">
                    <img class="img-fluid" src="{{ asset('assets/marketing.png') }}" alt="Image Description" width="250">
                </div>

                <div class="mb-3">
                    <h3>Copy your Refer LINK</h3>
                    <p>Copy and share your Refer Link to your friends and family, you will get paid once anyone buy INITTAP Card.
                    </p>
                </div>

                <div class="my-2">
                    <div class="form-group w-50 mx-auto">
                        <div class="input-group mb-3">
                            <input type="text" id="referLink" class="form-control" placeholder="Copy Your Refer Link" aria-label="Copy Your Refer Link" aria-describedby="referButton" value="{{ route('register',['refer' => auth()->user()->username]) }}" readonly>
                            <div class="input-group-append">
                                <button onclick="copyToClipboard();" class="btn btn-outline-secondary" type="button" id="referButton clickToCopy"><i class="tio-copy"></i></button>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- <a class="btn btn-primary" id="clickToCopy" href="http://127.0.0.1:8000/user/order/index">Copy Refer Link</a> -->
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="card card-lg mb-3 mb-lg-5">
            <div class="card-body text-center">
                <div class="w-50 mx-auto mb-4">
                    <img class="img-fluid" src="{{ asset('assets/finance.png') }}" alt="Image Description" width="250">
                </div>

                <div class="mb-3">
                    <h3>Add/Update your Payment Profile</h3>
                </div>

                <form action="{{ route('user.payment.store') }}" method="POST">
                    @csrf

                    <div class="my-2">
                        <div class="w-75 mx-auto">
                            <div class="form-group text-left">
                                <label for="type">Account Type <span class="text-uppercase text-primary">Selected: {{ auth()->user()->userPayment->type ?? "" }}</span></label>
                                <select name="type" id="type" class="form-control">
                                    <option value="paypal">Paypal</option>
                                    <option value="payoneer">Payoneer</option>
                                    <option value="skrill">Skrill</option>
                                </select>
                            </div>
                            <div class="form-group text-left">
                                <label for="title">Account Title</label>
                                <input type="text" name="title" id="title" class="form-control" value="{{ auth()->user()->userPayment->title ?? '' }}">
                            </div>
                            <div class="form-group text-left">
                                <label for="account">Account Email</label>
                                <input type="email" name="account" id="account" class="form-control" value="{{ auth()->user()->userPayment->account ?? '' }}">
                            </div>
                            <div class="form-group text-left">
                                <label for="phone">Phone Number</label>
                                <input type="text" name="phone" id="phone" class="form-control" value="{{ auth()->user()->userPayment->phone ?? '' }}">
                            </div>
                            <div class="form-group text-left">
                                <button type="submit" class="btn btn-primary">Update Payment Record</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-lg mb-3 mb-lg-5">
                    <div class="card-body text-center">
                        <div class="w-50 mx-auto mb-4">
                            <img class="img-fluid" src="{{ asset('assets/refers.png') }}" alt="Image Description" width="250">
                        </div>

                        <div class="mb-3">
                            <h3>Refer Report</h3>
                        </div>
                        <div class="tablerecord">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Join Date</th>
                                        <th scope="col">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($refers as $refer)
                                    <tr>
                                        <th>{{ $loop->iteration }}</th>
                                        <th>{{ $refer->name }}</th>
                                        <th>{{ $refer->email }}</th>
                                        <th>{{ $refer->created_at->diffForHumans() }}</th>
                                        <th>{{ ucfirst($refer->status) }}</th>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card card-lg mb-3 mb-lg-5">
                    <div class="card-body text-center">
                        <div class="w-50 mx-auto mb-4">
                            <img class="img-fluid" src="{{ asset('assets/money.png') }}" alt="Image Description" width="250">
                        </div>

                        <div class="mb-3">
                            <h3>Commission Transactions</h3>
                        </div>
                        <div class="tablerecord">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Type</th>
                                        <th scope="col">Amount</th>
                                        <th scope="col">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($commissions as $transaction)
                                    <tr>
                                        <th>{{ $loop->iteration }}</th>
                                        <td>{{ $transaction->created_at->diffForHumans() }}</td>
                                        <td><strong>{{ $transaction->type }}</strong></td>
                                        <td><strong>${{ number_format($transaction->amount,2) }}</strong></td>
                                        <td>{{ $transaction->status ? "Approved" : "Pending" }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
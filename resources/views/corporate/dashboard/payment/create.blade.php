@extends('corporate.layout.app')
@section('title')
    Dashboard
@endsection
@section('content')
    <div class="row gx-2 gx-lg-3 mb-5">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-content-between border-bottom">
                    <h4 class="card-header-title">Corporation / Business Account</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md mb-4 mb-md-0">
                            <div class="mb-4">
                                <span class="card-subtitle">Your plan (billed yearly):</span>
                                <h3>Corporation Subscription
                                    (${{ number_format(siteConfig('corporate_subscription_fees'), 2) }}
                                    USD)</h3>
                            </div>

                            <div>
                                <span class="card-subtitle">Due Payment</span>
                                <h1 class="text-danger">
                                    ${{ number_format(siteConfig('corporate_subscription_fees'), 2) }}
                                    USD</h1>
                            </div>
                            <hr>
                            <div class="d-grid d-sm-flex gap-3">
                                <form action="{{ route('corporate.dashboard.payments.store') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="method">Select Payment Method</label>
                                        <select name="payment_type" class="form-control" size="1">
                                            <option value="MWALLET_ACCOUNT">
                                                EVCPlus/ZAAD/SAHAL
                                            </option>
                                            <option value="MWALLET_BANKACCOUNT">
                                                Salaam Bank
                                            </option>
                                            <option value="CREDIT_CARD" selected>
                                                CREDIT CARD
                                            </option>
                                            @if (env('APP_ENV') == 'local')
                                                )
                                                <option value="sandbox">
                                                    Sand Box
                                                </option>
                                            @endif
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary w-100 w-sm-auto">Pay Due Now</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

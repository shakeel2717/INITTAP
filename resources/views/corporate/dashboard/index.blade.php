@extends('corporate.layout.app')
@section('title')
    Dashboard
@endsection
@section('content')
    <div class="row gx-2 gx-lg-3 mb-5">
        <div class="col-md-12">
            <div class="card">
                <!-- Header -->
                <div class="card-header card-header-content-between border-bottom">
                    <h4 class="card-header-title">Corporation / Business Account</h4>
                </div>
                <!-- End Header -->

                <!-- Body -->
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
                        </div>
                        <!-- End Col -->

                        <div class="col-md-auto">
                            <div class="d-grid d-sm-flex gap-3">
                                <button type="button" class="btn btn-primary w-100 w-sm-auto" data-bs-toggle="modal"
                                    data-bs-target="#accountUpdatePlanModal">Make Payment</button>
                            </div>
                        </div>
                        <!-- End Col -->
                    </div>
                    <!-- End Row -->
                </div>
                <!-- End Body -->
            </div>
        </div>
    </div>

    <div class="row gx-2 gx-lg-3">
        <div class="col-sm-6 col-lg-4 mb-3 mb-lg-5">
            <div class="card h-100">
                <div class="card-body">
                    <h6 class="card-subtitle mb-2">Total Users</h6>

                    <div class="row align-items-center gx-2">
                        <div class="col">
                            <span class="js-counter display-4 text-dark">{{ $users->count() }}</span>
                            <span class="text-body font-size-sm ml-1">Users</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-4 mb-3 mb-lg-5">
            <div class="card h-100">
                <div class="card-body">
                    <h6 class="card-subtitle mb-2">Active Users</h6>

                    <div class="row align-items-center gx-2">
                        <div class="col">
                            <span
                                class="js-counter display-4 text-dark">{{ $users->where('status', 'active')->count() }}</span>
                            <span class="text-body font-size-sm ml-1">Users</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-4 mb-3 mb-lg-5">
            <div class="card h-100">
                <div class="card-body">
                    <h6 class="card-subtitle mb-2">In Active Users</h6>

                    <div class="row align-items-center gx-2">
                        <div class="col">
                            <span
                                class="js-counter display-4 text-dark">{{ $users->where('status', 'deactivated')->count() }}</span>
                            <span class="text-body font-size-sm ml-1">Users</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row gx-2 gx-lg-3 mb-5">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-header-title">Order history</h4>
                </div>
                <div class="table-responsive position-relative">
                    <table class="table table-borderless table-thead-bordered table-nowrap table-align-middle card-table">
                        <thead class="thead-light">
                            <tr>
                                <th>Reference</th>
                                <th>Status</th>
                                <th>Amount</th>
                                <th>Updated</th>
                                <th>Invoice</th>
                                <th></th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td><a href="#">#3682303</a></td>
                                <td><span class="badge bg-soft-warning text-warning">Pending</span></td>
                                <td>$264</td>
                                <td>22/04/2020</td>
                                <td><a class="btn btn-white btn-sm" href="#"><i
                                            class="bi-file-earmark-arrow-down-fill me-1"></i> PDF</a></td>
                                <td>
                                    <a class="btn btn-white btn-sm" href="javascript:;" data-bs-toggle="modal"
                                        data-bs-target="#accountInvoiceReceiptModal"><i class="bi-eye-fill me-1"></i> Quick
                                        view</a>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

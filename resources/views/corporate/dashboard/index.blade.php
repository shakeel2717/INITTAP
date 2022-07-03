@extends('corporate.layout.app')
@section('title')
    Dashboard
@endsection
@section('content')
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
                                <h3>Subscription
                                    @if (balance(session('corporate')->id) < 0)
                                        <span class="text-danger">In-Active</span>
                                    @else
                                        <span class="text-success">Active</span>
                                    @endif
                                    (${{ number_format(siteConfig('corporate_subscription_fees'), 2) }}
                                    USD)
                                </h3>
                            </div>

                            <div>
                                <span class="card-subtitle">Your Balance</span>
                                <h1 class="text-primary">
                                    ${{ number_format(balance(session('corporate')->id), 2) }}
                                    USD</h1>
                            </div>

                            @if (balance(session('corporate')->id) < 0)
                                <div>
                                    <span class="card-subtitle">Due Payment</span>
                                    <h1 class="text-danger">
                                        ${{ number_format(duePayment(session('corporate')->id), 2) }}
                                        USD</h1>
                                </div>
                            @endif
                        </div>
                        @if (balance(session('corporate')->id) < 0)
                            <div class="col-md-auto">
                                <div class="d-grid d-sm-flex gap-3">
                                    <a href="{{ route('corporate.dashboard.payments.create') }}" type="button"
                                        class="btn btn-primary w-100 w-sm-auto" data-bs-toggle="modal"
                                        data-bs-target="#accountUpdatePlanModal">Make Payment</a>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row gx-2 gx-lg-3 mb-5">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-header-title">Recent Transactions</h4>
                </div>
                <div class="table-responsive position-relative">
                    <table class="table table-borderless table-thead-bordered table-nowrap table-align-middle card-table">
                        <thead class="thead-light">
                            <tr>
                                <th>Type</th>
                                <th>Status</th>
                                <th>Amount</th>
                                <th>Updated</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($subscriptions as $subscription)
                                <tr>
                                    <td><a href="#">{{ $subscription->type }}</a></td>
                                    <td><span
                                            class="badge bg-soft-{{ $subscription->status == false ? 'warning' : 'success' }} text-{{ $subscription->status == false ? 'warning' : 'success' }}">{{ $subscription->status == false ? 'Pending' : 'Active' }}</span>
                                    </td>
                                    <td>${{ number_format($subscription->amount, 2) }}</td>
                                    <td>{{ $subscription->updated_at }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center">No data found</td>
                                </tr>
                            @endforelse

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

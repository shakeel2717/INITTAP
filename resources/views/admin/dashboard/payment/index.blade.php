@extends('admin.dashboard.layout.app')
@section('title')
    All Payment Transactions
@endsection
@section('content')
    <div class="card">
        <div class="card-header">
            <h2 class="card-title">All Payment Transactions</h2>
        </div>
        <div class="card-body">
            <div class="row justify-content-between align-items-center flex-grow-1">
                <div class="col-12 mb-3 mb-lg-0">
                    <table class="table table-borderless table-thead-bordered">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">Payment ID</th>
                                <th scope="col">Description</th>
                                <th scope="col">Amount</th>
                                <th scope="col">Call Back URL</th>
                                <th scope="col">HPP Token</th>
                                <th scope="col">HRDF</th>
                                <th scope="col">Create Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($payments as $payment)
                                <tr>
                                    <td>{{ $payment->payment_id }}</td>
                                    <td>{{ $payment->description }}</td>
                                    <td>{{ number_format($payment->amount,2) }}</td>
                                    <td>{{ $payment->callbackurl }}</td>
                                    <td>{{ $payment->hppResultToken }}</td>
                                    <td>{{ $payment->HRDF }}</td>
                                    <td>{{ $payment->created_at }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td>No Record Found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

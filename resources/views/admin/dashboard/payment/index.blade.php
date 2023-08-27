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
                                <th scope="col">User ID</th>
                                <th scope="col">Corporate ID ID</th>
                                <th scope="col">Description</th>
                                <th scope="col">Amount</th>
                                <th scope="col">Status</th>
                                <th scope="col">TransactionId</th>
                                <th scope="col">Response Message</th>
                                <th scope="col">Create Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($payments as $payment)
                                <tr>
                                    <td>{{ $payment->id }}</td>
                                    <td>{{ $payment->user_id }}</td>
                                    <td>{{ $payment->corporate_id }}</td>
                                    <td>{{ $payment->description }}</td>
                                    <td>{{ number_format($payment->amount,2) }}</td>
                                    <td>{{ $payment->status }}</td>
                                    <td>{{ $payment->m_transactionId }}</td>
                                    <td>{{ $payment->responseMsg }}</td>
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

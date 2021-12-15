@extends('admin.dashboard.layout.app')
@section('title')
    All Users
@endsection
@section('content')
    <div class="card">
        <div class="card-header">
            <h2 class="card-title">All Users</h2>
        </div>
        <div class="card-body">
            <div class="row justify-content-between align-items-center flex-grow-1">
                <div class="col-12 mb-3 mb-lg-0">
                    <table class="table table-borderless table-thead-bordered">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">User Name</th>
                                <th scope="col">User Email</th>
                                <th scope="col">Card Price</th>
                                <th scope="col">Card Title</th>
                                <th scope="col">Card Designation</th>
                                <th scope="col">Order Status</th>
                                <th scope="col">Order Date</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($cardOrders as $order)
                                <tr>
                                    <td>{{ $order->user->name }}</td>
                                    <td>{{ $order->user->email }}</td>
                                    <td>{{ $order->pricing->price }}</td>
                                    <td>{{ $order->card_title }}</td>
                                    <td>{{ $order->card_designation }}</td>
                                    <td><span class="badge badge-primary">{{ Str::ucfirst($order->status) }}</span></td>
                                    <td>{{ $order->created_at }}</td>
                                    <td>
                                        <form action="{{ route('admin.dashboard.order.update', ['id' => $order->id]) }}"
                                            method="POST">
                                            @csrf
                                            <div class="row">
                                                <div class="form-group">
                                                    <select name="status" id="status" class="form-control">
                                                        <option value="">Select Status</option>
                                                        <option value="pending">Pending</option>
                                                        <option value="shipped">Shipped</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <button type="submit" class="btn ml-2 btn-primary">Action</button>
                                                </div>
                                            </div>
                                        </form>
                                    </td>
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

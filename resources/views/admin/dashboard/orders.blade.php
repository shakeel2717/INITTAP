@extends('admin.dashboard.layout.app')
@section('title')
    All Orders
@endsection
@section('content')
    <div class="card">
        <div class="card-header">
            <h2 class="card-title">All Orders</h2>
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
                                <th scope="col">Status</th>
                                <th scope="col">Order Date</th>
                                <th scope="col">Action</th>
                                <th scope="col">Type</th>
                                <th scope="col">Logo</th>
                                <th scope="col">QR SVG</th>
                                <th scope="col">QR EPS</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($cardOrders as $order)
                                <tr>
                                    <td>{{ $order->user->name }}</td>
                                    <td>{{ $order->user->email }}</td>
                                    @if ($order->user->corporate_id == null)
                                        <td>${{ number_format($order->pricing->price, 2) }}</td>
                                    @else
                                        <td>${{ number_format($order->pricing->price_corporate, 2) }}</td>
                                    @endif
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
                                    @if ($order->type != 'inittap')
                                        <td><span class="badge badge-primary">{{ Str::ucfirst($order->type) }}</span></td>
                                        <td>
                                            <a href="{{ asset('logo/') . '/' . $order->logo }}">
                                                <img class="avatar" src="{{ asset('logo/') . '/' . $order->logo }}"
                                                    alt="Custom logo Image">
                                            </a>
                                        </td>
                                    @else
                                        <td>INITTAP</td>
                                        <td>INITTAP</td>
                                    @endif
                                    <td><a
                                            href="{{ route('admin.dashboard.order.qrDownload', ['format' => 'svg', 'user' => $order->user->id]) }}"><i
                                                class="tio-download display-4"></i></a></td>
                                    <td><a
                                            href="{{ route('admin.dashboard.order.qrDownload', ['format' => 'eps', 'user' => $order->user->id]) }}"><i
                                                class="tio-download display-4"></i></a></td>
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

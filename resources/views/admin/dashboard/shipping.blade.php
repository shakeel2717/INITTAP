@extends('admin.dashboard.layout.app')
@section('title')
    All Users Shipping Address
@endsection
@section('content')
    <div class="card">
        <div class="card-header">
            <h2 class="card-title">All Users Shipping Address</h2>
        </div>
        <div class="card-body">
            <div class="row justify-content-between align-items-center flex-grow-1">
                <div class="col-12 mb-3 mb-lg-0">
                    <table class="table table-borderless table-thead-bordered">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">User Email</th>
                                <th scope="col">Full Name</th>
                                <th scope="col">Address</th>
                                <th scope="col">City</th>
                                <th scope="col">Zip</th>
                                <th scope="col">Country</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($addresses as $address)
                                <tr>
                                    <td>{{ $address->user->email ?? ' ' }}</td>
                                    <td>{{ $address->name }}</td>
                                    <td>{{ $address->address }}</td>
                                    <td>{{ $address->city }}</td>
                                    <td>{{ $address->zip }}</td>
                                    <td>{{ $address->country }}</td>
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

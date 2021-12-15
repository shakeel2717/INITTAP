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
                                <th scope="col">Full Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Password</th>
                                <th scope="col">Status</th>
                                <th scope="col">Join Date</th>
                                <th scope="col">Shipping Address</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($users as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>Password Protected</td>
                                    <td>{{ $user->status }}</td>
                                    <td>{{ $user->created_at }}</td>
                                    <td><a href="{{ route('admin.dashboard.userShow', ['id' => $user->id]) }}"
                                            class="btn btn-sm btn-primary">View Address</a></td>
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

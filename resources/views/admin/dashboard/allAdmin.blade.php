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
                                <th scope="col">Username</th>
                                <th scope="col">Password</th>
                                <th scope="col">Create Date</th>
                                <th scope="col">Edit Admin</th>
                                <th scope="col">Delete Admin</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($admins as $admin)
                                <tr>
                                    <td>{{ $admin->username }}</td>
                                    <td>Password Protected</td>
                                    <td>{{ $admin->created_at }}</td>
                                    <td>
                                        <a href="{{ route('admin.dashboard.editAdmin', ['id' => $admin->id]) }}"
                                            class="btn btn-sm btn-primary">Edit Admin</a>
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.dashboard.deleteAdmin', ['id' => $admin->id]) }}"
                                            class="btn btn-sm btn-danger">Delete Admin</a>
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

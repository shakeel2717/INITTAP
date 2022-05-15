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
                                <th scope="col">Mobile Number</th>
                                <th scope="col">Password</th>
                                <th scope="col">Status</th>
                                <th scope="col">Join Date</th>
                                <th scope="col">Profle Link</th>
                                <th scope="col">Shipping Address</th>
                                <th scope="col">Edit</th>
                                <th scope="col">View Profile</th>
                                <th scope="col">QR SVG</th>
                                <th scope="col">QR EPS</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($users as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->mobile }}</td>
                                    <td>Password Protected</td>
                                    <td>{{ $user->status }}</td>
                                    <td>{{ $user->created_at }}</td>
                                    <td>
                                        <div class="input-group input-group-merge">
                                            <input type="text" id="iconExample" class="form-control"
                                                value="{{ route('user.public.profile', ['username' => $user->username]) }}">

                                            <a class="js-clipboard input-group-append" href="javascript:;"
                                                data-hs-clipboard-options='{
                                                                "contentTarget": "#iconExample",
                                                                "classChangeTarget": "#iconExampleLinkIcon",
                                                                "defaultClass": "tio-copy",
                                                                "successClass": "tio-done"
                                                            }'>
                                                <span class="input-group-text">
                                                    <span id="iconExampleLinkIcon" class="tio-copy"></span>
                                                </span>
                                            </a>
                                        </div>
                                    </td>
                                    <td><a href="{{ route('admin.dashboard.userShow', ['id' => $user->id]) }}"
                                            class="btn btn-sm btn-primary">View Address</a></td>
                                    <td><a href="{{ route('admin.dashboard.userEdit', ['id' => $user->id]) }}"
                                            class="btn btn-sm btn-primary">Edit User</a></td>
                                    <td><a target="_blank"
                                            href="{{ route('user.public.profile', ['username' => $user->username]) }}"
                                            class="btn btn-sm btn-primary">View Profile</a></td>
                                    <td><a
                                            href="{{ route('admin.dashboard.order.qrDownload', ['format' => 'svg', 'user' => $user->id]) }}"><i
                                                class="tio-download display-4"></i></a></td>
                                    <td><a
                                            href="{{ route('admin.dashboard.order.qrDownload', ['format' => 'eps', 'user' => $user->id]) }}"><i
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

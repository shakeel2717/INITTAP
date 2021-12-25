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
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                <th scope="col">Type</th>
                                <th scope="col">Price</th>
                                <th scope="col">status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($pricings as $pricing)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $pricing->title }}</td>
                                    <td>{{ $pricing->type }}</td>
                                    <td>{{ $pricing->price }}</td>
                                    <td>{{ Str::ucfirst($pricing->status) }}</td>
                                    <td>
                                        <a href="{{ route('admin.dashboard.cards.edit', ['card' => $pricing->id]) }}"
                                            class="btn btn-sm btn-primary">Edit</a>
                                        @if ($pricing->status == 'active')
                                            <a href="{{ route('admin.dashboard.cards.pause', ['card' => $pricing->id]) }}"
                                                class="btn btn-sm btn-danger">Pause</a>
                                        @elseif ($pricing->status == 'inactive')
                                            <a href="{{ route('admin.dashboard.cards.active', ['card' => $pricing->id]) }}"
                                                class="btn btn-sm btn-success">Activate</a>
                                        @endif
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
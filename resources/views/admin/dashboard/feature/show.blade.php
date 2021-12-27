@extends('admin.dashboard.layout.app')
@section('title')
    All Cards
@endsection
@section('content')
    <div class="card">
        <div class="card-header">
            <h2 class="card-title">All Cards</h2>
        </div>
        <div class="card-body">
            <div class="row justify-content-between align-items-center flex-grow-1">
                <div class="col-12 mb-3 mb-lg-0">
                    <table class="table table-borderless table-thead-bordered">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Feature</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($features as $feature)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $feature->value }}</td>
                                    <td>
                                        <a href="{{ route('admin.dashboard.feature.delete', ['feature' => $feature->id]) }}"
                                            class="btn btn-sm btn-danger">Delete</a>
                                        <a href="{{ route('admin.dashboard.feature.edit', ['feature' => $feature->id]) }}"
                                            class="btn btn-sm btn-primary">Edit</a>
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

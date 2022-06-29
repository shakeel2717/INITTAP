@extends('corporate.layout.app')
@section('title')
    All Users
@endsection
@section('globalButton')
    <div class="col-sm-auto">
        <a class="btn btn-primary" href="{{ route('corporate.dashboard.users.create') }}">
            <i class="text-white tio-user mr-1"></i> Add new User
        </a>
    </div>
@endsection
@section('content')
    <div class="card">
        <div class="card-header">
            <h2 class="card-title">All Users</h2>
        </div>
        <div class="card-body">
            <livewire:corporate.all-user/>
        </div>
    </div>
@endsection

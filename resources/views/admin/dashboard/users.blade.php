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
            <livewire:admin.all-user />
        </div>
    </div>
@endsection

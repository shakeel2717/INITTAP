@extends('admin.dashboard.layout.app')
@section('title')
    All Corporate Accounts
@endsection
@section('content')
    <div class="card">
        <div class="card-header">
            <h2 class="card-title">All Corporate Accounts</h2>
        </div>
        <div class="card-body">
            <livewire:admin.all-corporate/>
        </div>
    </div>
@endsection

@extends('admin.dashboard.layout.app')
@section('title')
    All Admin Accounts
@endsection
@section('content')
    <div class="card">
        <div class="card-header">
            <h2 class="card-title">All Admin Accounts</h2>
        </div>
        <div class="card-body">
            <div class="row justify-content-between align-items-center flex-grow-1">
                <div class="col-12 mb-3 mb-lg-0">
                    <livewire:admin.all-admin/>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('corporate.layout.app')
@section('title')
    All Transactions
@endsection
@section('globalButton')
    <div class="col-sm-auto">
        <a class="btn btn-primary" href="{{ route('corporate.dashboard.index.index') }}">
            <i class="text-white tio-user mr-1"></i> Go to Dashboard
        </a>
    </div>
@endsection
@section('content')
    <div class="card">
        <div class="card-header">
            <h2 class="card-title">All Transactions Report</h2>
        </div>
        <div class="card-body">
            <livewire:corporate.all-payment/>
        </div>
    </div>
@endsection

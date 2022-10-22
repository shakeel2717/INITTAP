@extends('admin.dashboard.layout.app')
@section('title')
Affiliate System
@endsection
@section('content')
<div class="card">
    <div class="card-header">
        <h2 class="card-title">Affiliate Withdrawal System</h2>
    </div>
    <div class="card-body">
        <livewire:admin.all-affiliate />
    </div>
</div>
@endsection
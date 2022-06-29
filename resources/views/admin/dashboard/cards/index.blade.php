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
                    <livewire:admin.all-card/>
                </div>
            </div>
        </div>
    </div>
@endsection

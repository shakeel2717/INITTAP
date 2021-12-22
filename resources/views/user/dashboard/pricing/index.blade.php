@extends('user.dashboard.layout.app')
@section('title')
    Order a new Card
@endsection
@section('content')
    <div class="row gx-2 gx-lg-3">
        @foreach ($price as $card)
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">{{ $card->title }} $ {{ number_format($card->price, 2) }}</h3>
                        <hr>
                        <div class="card-image w-100 text-center">
                            <img src="{{ asset('assets/cards/') }}/{{ $card->img }}" alt="">
                        </div>
                        <hr>
                        <h3 class="card-title">{{ $card->type }}</h3>
                        <hr>
                        <a href="{{ route('user.order.show', ['card' => $card->id]) }}"
                            class="btn btn-primary btn-block btn-primary btn-lg">Order now</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection

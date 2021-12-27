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
                        {{-- <hr> --}}
                        <div class="card-image w-100 text-center">
                            <img class="card-img-top" src="{{ asset('assets/cards/') }}/{{ $card->img }}" alt="">
                        </div>
                        <hr>
                        <h3 class="card-title text-center">{{ $card->title }} $ {{ number_format($card->price, 2) }}</h3>
                        <h2 class="card-title text-center text-primary display-3">${{ number_format($card->price, 2) }}
                            <span class="display-4">{{ ucfirst($card->category) }}</span>
                        </h2>
                        <hr>
                        <div class="features ml-2 mb-3">
                            @foreach ($card->features as $feature)
                                <p class="card-text"><i class="tio-checkmark-circle text-success"></i>
                                    {{ $feature->value }}</p>
                            @endforeach
                        </div>
                        <a href="{{ route('user.order.show', ['card' => $card->id]) }}"
                            class="btn btn-primary btn-block btn-primary btn-lg">Order now</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection

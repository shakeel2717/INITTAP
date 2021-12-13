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
                        <h3 class="card-title">{{ $card->title }} $ {{ number_format($card->price,2) }}</h3>
                        <hr>
                        <div class="card-image w-100 text-center">
                            <img src="{{ asset('assets/img/card/')}}/{{ $card->img }}.png" alt="">
                        </div>
                        <hr>
                        <h3 class="card-title">{{ $card->type }}</h3>
                        <hr>
                        <form action="{{ $data->params->hppUrl }}" method="POST">
                            @csrf
                            <input type="hidden" name="referenceId" id="referenceId" value="{{ $data->params->referenceId }}">
                            <input type="hidden" name="hppRequestId" id="hppRequestId" value="{{ $data->params->hppRequestId }}">
                            <button type="submit" class="btn btn-primary btn-block btn-primary btn-lg">Order now</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection

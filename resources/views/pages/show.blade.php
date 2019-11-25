@extends('layout.app')

@section('content')
  <h1>Ponuda usluga</h1>
    <div class="card-deck">
    <div class="card">
      <img class="card-img-top" src="/images/{{$treatment->image}}" alt="">
      <div class="card-body">
        <h5 class="card-title">{{$treatment->name}}</h5>
        <p class="card-text">{{$treatment->description}}</p>
      </div>
      <div class="card-footer">
        <span class="text-muted">Cena: {{$treatment->price}} RSD</span>
      </div>
    </div>
  </div>
@endsection

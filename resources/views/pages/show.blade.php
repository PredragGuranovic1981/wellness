@extends('layout.app')

@section('content')
  <div class="row mt-5">
    <div class="col-md-6">
      <ul class="list-group">
        <li class="list-group-item"><img class="card-img-top" src="/storage/treatment_images/{{$treatment->image}}" alt="{{$treatment->name}}"></li>
      </ul>
    </div>
    <div class="col-md-6">
      <ul class="list-group">
        <li class="list-group-item"><h5 class="card-title">{{$treatment->name}}</h5></li>
        <li class="list-group-item"><p class="card-text">{{$treatment->description}}</p></li>
        <li class="list-group-item"><span class="text-muted">Cena: {{$treatment->price}} RSD</span></li>
      </ul>
    </div>
    <p>Ukoliko zelite da rezervisete tretman registrujte se <a href="/register">ovde</a>.</p>
  </div>
@endsection

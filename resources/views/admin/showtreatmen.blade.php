@extends('layouts.app')

@section('content')
  <h1>Ponuda usluga</h1>
  @foreach ($treatments->chunk(3) as $chunk)
  <div>
    <div class="card-group mb-5">
      @foreach($chunk as $treatment)
    <div class="card col- col-sm-4 col-md-4 col-lg-4 col-xl-4">
      <img class="card-img-top" src="images/{{$treatment->image}}" alt="">
      <div class="card-body">
        <h5 class="card-title">{{$treatment->name}}</h5>
        <p class="card-text">{{$treatment->description}}</p>
      </div>
      <div class="card-footer">
        <span class="text-muted">Cena: {{$treatment->price}} RSD</span>
        <a href="admin/services/{{$treatment->id}}" class="btn btn-primary">Azuriraj</a>
      </div>
    </div>
    @endforeach
  </div>
</div>
@endforeach
@endsection

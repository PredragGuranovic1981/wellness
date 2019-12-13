@extends('layout.app')

@section('content')
  <h3>Ponuda usluga</h3>
  @foreach ($treatments->chunk(3) as $chunk)
    <div class="card-group mb-5">
      @foreach($chunk as $treatment)
    <div class="col- col-sm-4 col-md-4 col-lg-4 col-xl-4">
      <a href="show/{{$treatment->id}}"><img class="card-img-top" src="storage/treatment_images/{{$treatment->image}}" alt="{{$treatment->name}}"></a>
      <div class="card-body">
        <h5 class="card-title">{{$treatment->name}}</h5>
        <!-- <p class="card-text">{{$treatment->description}}</p> -->
      </div>
      <div class="card-footer">
        <span class="text-muted">Cena: {{$treatment->price}} RSD</span>
      </div>
    </div>
    @endforeach
</div>
@endforeach
@endsection

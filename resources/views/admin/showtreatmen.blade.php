@extends('layouts.app')

@section('content')
  <h3>Ponuda usluga</h3>
  @foreach ($treatments->chunk(3) as $chunk)
  <div>
    <div class="card-group mb-5">
      @foreach($chunk as $treatment)
    <div class="card col- col-sm-4 col-md-4 col-lg-4 col-xl-4">
      <img class="card-img-top" src="storage/treatment_images/{{$treatment->image}}" alt="">
      <div class="card-body">
        <h5 class="card-title">{{$treatment->name}}</h5>
        <p class="card-text">{{$treatment->description}}</p>
      </div>
      <div class="card-footer mb-2">
        <span class="text-muted">Cena: {{$treatment->price}} RSD</span>
      </div>
      <a href="admin/services/{{$treatment->id}}/edit" class="btn btn-primary">Azuriraj</a>
      {!! Form::open(['action' => ['AdminTreatmentsController@destroy', $treatment->id], 'method' =>'POST', 'class' => 'mt-1']) !!}
        {{ Form::hidden('_method', 'DELETE') }}
        {{ Form::Submit('Obrisi tretman', ['class' => 'btn btn-outline-danger btn-block']) }}
      {!! Form::close() !!}
    </div>
    @endforeach
  </div>
</div>
@endforeach
@endsection

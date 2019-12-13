@extends('layouts.app')

@section('content')
<div class="container">
  <h3>Azuriraj tretman</h3>
  {!! Form::open(['action' => ['AdminTreatmentsController@update', $treatment->id], 'method' =>'POST','files' => true]) !!}
  <div class="form-group">
    <div class="form-group">
      {{Form::label('name', 'Upisite naziv tretmana:')}}
      {{ Form::input('text', 'name', $treatment->name, ['class' => 'form-control']) }}
    </div>
    <div class="form-group">
      {{Form::label('image', 'Unesite sliku:')}}
      {{ Form::file('image') }}
    </div>
    <div class="form-group">
      {{Form::label('description', 'Opisite tretman:')}}
      {{ Form::textarea('description', $treatment->description, ['class' => 'form-control']) }}
    </div>
    <div class="form-group">
      {{Form::label('price', 'Unesite cenu tretmana:')}}
      {{ Form::input('number', 'price', $treatment->price, ['class' => 'form-control']) }}
    </div>
      {{ Form::hidden('_method', 'PUT') }}
      {{ Form::submit('Potvrdi', ['class' => 'btn btn-primary']) }}
  </div>

  {!! Form::close() !!}
</div>
  @endsection

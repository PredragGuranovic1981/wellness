@extends('layouts.app')

@section('content')
<div class="container">
  <h3>Kreiraj novi tretman</h3>
  {!! Form::open(['action' => 'AdminTreatmentsController@store', 'method' =>'POST','files' => true]) !!}
  <div class="form-group">
    <div class="form-group">
      {{Form::label('name', 'Upisite naziv tretmana:')}}
      {{ Form::input('text', 'name', null, ['class' => 'form-control']) }}
    </div>
    <div class="form-group">
      {{Form::label('image', 'Unesite sliku:')}}
      {{ Form::file('image') }}
    </div>
    <div class="form-group">
      {{Form::label('description', 'Opisite tretman:')}}
      {{ Form::textarea('description', null, ['class' => 'form-control']) }}
    </div>
    <div class="form-group">
      {{Form::label('price', 'Unesite cenu tretmana:')}}
      {{ Form::input('number', 'price', null, ['class' => 'form-control']) }}
    </div>
      {{ Form::submit('Potvrdi', ['class' => 'btn btn-primary']) }}
  </div>

  {!! Form::close() !!}
</div>
  @endsection

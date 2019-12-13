@extends('layouts.app')

@section('content')
<div class="container">
  <h3>Kreiraj novog radnika</h3>
  {!! Form::open(['action' => 'EmployesController@store', 'method' =>'POST']) !!}
  <div class="form-group">
    <div class="form-group">
      {{ Form::select('treatment_id', $name, null, ['class' => 'form-control', 'placeholder' => 'Izaberite tretman']) }}
    </div>
    <div class="form-group">
      {{Form::label('frist_name', 'Unesite ime:')}}
      {{ Form::input('text', 'first_name', null, ['class' => 'form-control']) }}
    </div>
    <div class="form-group">
      {{Form::label('last_name', 'Unesite prezime:')}}
      {{ Form::input('text', 'last_name', null, ['class' => 'form-control']) }}
    </div>
      {{ Form::submit('Potvrdi', ['class' => 'btn btn-primary']) }}
  </div>

  {!! Form::close() !!}
</div>
  @endsection

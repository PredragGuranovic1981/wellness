@extends('layouts.app')

@section('content')
<div class="container">
  <h3>Azuriraj zaposlenog</h3>
  {!! Form::open(['action' => ['EmployesController@update', $employe->id], 'method' =>'POST']) !!}
  <div class="form-group">
    <div class="form-group">
      {{ Form::select('treatment_id', $treatment, ['name' => 'treatments','class' => 'form-control', 'placeholder' => 'Izaberite tretman']) }}
    </div>
    <div class="form-group">
      {{Form::label('frist_name', 'Unesite ime:')}}
      {{ Form::input('text', 'first_name', $employe->first_name, ['class' => 'form-control']) }}
    </div>
    <div class="form-group">
      {{Form::label('last_name', 'Unesite prezime:')}}
      {{ Form::input('text', 'last_name', $employe->last_name, ['class' => 'form-control']) }}
    </div>
      {{ Form::hidden('_method', 'PUT') }}
      {{ Form::submit('Potvrdi', ['class' => 'btn btn-primary']) }}
  </div>

  {!! Form::close() !!}
</div>
  @endsection

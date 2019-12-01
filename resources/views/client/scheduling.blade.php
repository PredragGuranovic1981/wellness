@extends('layouts.app')

@section('content')
<div class="container">
  <h1>Zakazivanje</h1>
  {!! Form::open(['action' => 'ReservationsController@store', 'method' =>'POST']) !!}
  <div class="form-group">
    <div class="form-group">
      {{Form::label('treatment_id', 'Unesite tretman:')}}
      {{ Form::select('treatment_id', $name, null, ['class' => 'form-control', 'placeholder' => 'Izaberite tretman']) }}
    </div>
    <div class="form-group">
      {{Form::label('user_id', 'Korisnik:')}}
      {{ Form::select('user_id', $user, null, ['class' => 'form-control']) }}
      <!-- {{ Form::select('user_id', $user, ['name' => 'users','class' => 'form-control', 'placeholder' => 'Izaberite tretman']) }} -->
    </div>
    <div class="form-group">
      {{Form::label('schedule', 'Unesite datum i vreme:')}}
      {{ Form::input('dateTime-local', 'schedule', null, ['class' => 'form-control']) }}
    </div>
      {{ Form::submit('Potvrdi', ['class' => 'btn btn-primary']) }}
  </div>

  {!! Form::close() !!}
</div>
  @endsection

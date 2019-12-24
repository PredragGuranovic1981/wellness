@extends('layouts.app')

@section('content')
<div class="container">
  <h3>Zakazivanje</h3>
  {!! Form::open(['action' => 'ReservationsController@store', 'method' =>'POST']) !!}
  <div class="form-group">
    <div class="form-group invisible">
      <!-- {{Form::label('user_id', 'Unesite tretman:')}}
      {{ Form::select('user_id', $user, null,  ['class' => 'form-control']) }} -->
      {{ Form::input('text', 'user_id', auth()->user()->id, ['class' => 'form-control']) }}
    </div>
    <div class="form-group">
      {{Form::label('treatment_id', 'Unesite tretman:')}}
      {{ Form::select('treatment_id', $name, null, ['class' => 'form-control', 'placeholder' => 'Izaberite tretman']) }}
    </div>
    <div class="form-group">
      {{Form::label('schedule_date', 'Unesite datum:')}}
      {{ Form::input('d-m-Y', 'schedule_date', null, ['class' => 'form-control', 'id' => 'dateTimepicker']) }}
      <!-- {{Form::date('d-m-Y H:i', strtotime($name), ['class' => 'form-control'])}} -->
      <script>
          $('#dateTimepicker').datepicker({
              uiLibrary: 'bootstrap4',
              format: 'yy/mm/dd',
              autoclose: true,
              todayHighlight: true

          });
      </script>
    </div>
    <div class="form-group">
      {{Form::label('schedule_time', 'Unesite vreme:')}}
      {{ Form::input('', 'schedule_time', null, ['class' => 'form-control', 'id' => 'dateTimepicker1']) }}
      <!-- {{Form::date('d-m-Y H:i', strtotime($name), ['class' => 'form-control'])}} -->
      <script>
          $('#dateTimepicker1').timepicker({
              uiLibrary: 'bootstrap4',
              modal: true,
              footer: true
          });
      </script>
    </div>
      {{ Form::submit('Potvrdi', ['class' => 'btn btn-primary']) }}
  </div>

  {!! Form::close() !!}
</div>
  @endsection

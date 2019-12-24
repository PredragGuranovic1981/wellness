@extends('layouts.app')

@section('content')
<div class="container">
  <h3>Sve rezervacije</h3>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Korisnik</th>
        <th>Datum</th>
        <th>Vreme</th>
        <th></th>
      </tr>
    </thead>
    @foreach($reservations as $reservation)
    <tr>
      <td>{{$reservation->name}}</td>
      <td>{{date('d-m-Y', strtotime($reservation->schedule_date))}}</td>
      <td>{{$reservation->schedule_time}}</td>
      <td>{!! Form::open(['action' => ['AdminReservationsController@destroy', $reservation->id], 'method' =>'POST']) !!}
      {{ Form::hidden('_method', 'DELETE') }}
      {{ Form::Submit('Obrisi rezervaciju', ['class' => 'btn btn-danger']) }}
      {!! Form::close() !!}</td>
    </tr>
  @endforeach
  </table>
</div>
  @endsection

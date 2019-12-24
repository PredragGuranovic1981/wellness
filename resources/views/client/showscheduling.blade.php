@extends('layouts.app')

@section('content')
<div class="container">
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Tretman</th>
        <th>Datum</th>
        <th>Vreme</th>
        <th></th>
      </tr>
    </thead>
    <p>Raspored zakazivanja</p>
    @foreach($reservations as $reservation)
    <tr>
      <td>{{$reservation->name}}</td>
      <td>{{date('d-m-Y', strtotime($reservation->schedule_date))}}</td>
      <td>{{$reservation->schedule_time}}</td>
      <td>{!! Form::open(['action' => ['ReservationsController@destroy', $reservation->id], 'method' =>'POST']) !!}
      {{ Form::hidden('_method', 'DELETE') }}
      {{ Form::Submit('Otkazi rezervaciju', ['class' => 'btn btn-danger']) }}
      {!! Form::close() !!}</td>
    </tr>
  @endforeach
  </table>
</div>

@endsection

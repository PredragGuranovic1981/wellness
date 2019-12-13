@extends('layouts.app')

@section('content')
<div class="container">
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Tretman</th>
        <th>Datum</th>
        <th>Vreme</th>
      </tr>
    </thead>
    <p>Raspored zakazivanja</p>
    @foreach($reservations as $reservation)
    <tr>
      <td>{{$reservation->name}}</td>
      <td>{{date('d-m-Y', strtotime($reservation->schedule_date))}}</td>
      <td>{{$reservation->schedule_time}}</td>
    </tr>
  @endforeach
  </table>
</div>

@endsection

@extends('layouts.app')

@section('content')
<div class="container">
  <p>Raspored zakazivanja</p>
  @foreach($reservs as $reserve)
  <div class="card">
  <div class="card-body">
    <p>Tretman: {{$reserve->name}}</p>
    <p>Vreme: {{$reserve->schedule}}</p>
  </div>
</div>
@endforeach
</div>
  @endsection

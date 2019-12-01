@extends('layouts.app')

@section('content')
<div class="container">
  <p>Raspored zakazivanja</p>
  <div class="card">
  <div class="card-body">
    <span>Tretman: {{$reserve->schedule}}</span>
  </div>
</div>
</div>
  @endsection

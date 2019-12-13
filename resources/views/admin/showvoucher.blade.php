@extends('layouts.app')

@section('content')
<h3>Vaučeri</h3>
@if (count($vouchers)>0)
    @foreach ($vouchers as $voucher)
       <ul class="list-group mt-1">
       <li class="list-group-item">Ime: {{$voucher->name}}</li>
       <li class="list-group-item">Email: {{$voucher->email}}</li>
       <li class="list-group-item">Telefon: {{$voucher->phone}}</li>
       <li class="list-group-item">Ime korisnika vaučera: {{$voucher->name_user}}</li>
       <li class="list-group-item">Adresa korisnika vaučera: {{$voucher->address_user}}</li>
       <li class="list-group-item">
        {!! Form::open(['action' => ['VouchersController@destroy', $voucher->id], 'method' =>'POST', 'class' => 'mt-3']) !!}
          {{ Form::hidden('_method', 'DELETE') }}
          {{ Form::Submit('Obrisite vaučer', ['class' => 'btn btn-danger']) }}
        {!! Form::close() !!}</li>
       </ul>
    @endforeach
@endif
@endsection

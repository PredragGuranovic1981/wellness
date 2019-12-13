@extends('layouts.app')

@section('content')
<div class="container">
  <h3>Poklon vaučer</h3>
  <p>Sve iz naše ponude može biti deo poklon vaučera. Vaše je da pogledate šta nudimo, odaberete shodno količini novca koji želite da izdvojite i pozovete nas na telefon ili naručite vaučer putem forme za poručivanje vaučera koji su Vam na raspolaganju.</p>
  <div class="container pt-5">
    {!! Form::open(['action' => 'VouchersController@store', 'method' =>'POST']) !!}
    <div class="form-group">
      <div class="form-group">
        {{Form::label('name', 'Ime i prezime naručioca vaučera:')}}
        {{ Form::input('text', 'name', null, ['class' => 'form-control']) }}
      </div>
      <div class="form-group">
        {{Form::label('email', 'Email naručioca vaučera:')}}
        {{ Form::input('text', 'email', null, ['class' => 'form-control']) }}
      </div>
      <div class="form-group">
        {{Form::label('phone', 'Telefon naručioca vaučera:')}}
        {{ Form::input('tel', 'phone', null, ['class' => 'form-control']) }}
      </div>
      <div class="form-group">
        {{Form::label('name_user', 'Ime i prezime korisnika vaučera:')}}
        {{ Form::input('text', 'name_user', null, ['class' => 'form-control']) }}
      </div>
      <div class="form-group">
        {{Form::label('address_user', 'Adreasa korisnika vaučera:')}}
        {{ Form::input('text', 'address_user', null, ['class' => 'form-control']) }}
      </div>
        {{ Form::submit('Potvrdi', ['class' => 'btn btn-primary']) }}
    </div>

    {!! Form::close() !!}
  </div>

</div>
  @endsection

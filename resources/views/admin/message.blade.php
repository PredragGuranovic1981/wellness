@extends('layouts.app')

@section('content')
<h1>Poruke</h1>
@if (count($messages)>0)
    @foreach ($messages as $message)
       <ul class="list-group mt-1">
       <li class="list-group-item">Ime: {{$message->name}}</li>
       <li class="list-group-item">Email: {{$message->email}}</li>
       <li class="list-group-item">Poruka: {{$message->message}}</li>
       <li class="list-group-item">
        {!! Form::open(['action' => ['MessageController@destroy', $message->id], 'method' =>'POST', 'class' => 'mt-3']) !!}
          {{ Form::hidden('_method', 'DELETE') }}
          {{ Form::Submit('Obrisite poruku', ['class' => 'btn btn-danger']) }}
        {!! Form::close() !!}</li>
       </ul>
    @endforeach
@endif
@endsection

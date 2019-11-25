@extends('layout.app')

@section('content')
  <h1>Galerija</h1>
  @foreach($users as $user)
    <ul class="list-group">
      <li class="list-group-item">{{$user->name}} {{$user->email}}</li>
    </ul>
  @endforeach
@endsection

@extends('layouts.app')

@section('content')
  <h1>Zaposleni</h1>
  <?php $brojac = 1; ?>
    <div class="container">
      <table class="table table-striped">
        <thead>
          <tr>
            <th></th>
            <th>Ime</th>
            <th>Prezime</th>
            <th>Zaduzenja</th>
            <th></th>
            <th></th>
          </tr>
        </thead>
        @foreach($employes as $employe)
        <tr>
          <td><?php echo $brojac++ ?></td>
          <td>{{$employe->first_name}}</td>
          <td>{{$employe->last_name}}</td>
          <td>{{$employe->name}}</td>
          <td><a href="admin/{{$employe->id}}/edit" class="btn btn-primary">Azuriraj</a></td>
          <td>{!! Form::open(['action' => ['EmployesController@destroy', $employe->id], 'method' =>'POST']) !!}
          {{ Form::hidden('_method', 'DELETE') }}
          {{ Form::Submit('Obrisi', ['class' => 'btn btn-danger']) }}
          {!! Form::close() !!}</td>
        </tr>
        @endforeach
      </table>
    </div>
@endsection

@extends('layout.app')

@section('content')
<hr>
  <div class="row mt-2">
    <div class="col-lg-6">
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2830.953980873337!2d20.40913961570799!3d44.80212648539541!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x475a6f92363f1881%3A0x550c0955fccddcc2!2z0KHQsNCy0YHQutC4INC90LDRgdC40L8gNywg0JHQtdC-0LPRgNCw0LQgMTEwNzA!5e0!3m2!1ssr!2srs!4v1575192516822!5m2!1ssr!2srs" width="550" height="500" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
    </div>
    <div class="col-lg-6">
      <h3>Kontaktirajte nas!</h3>
        {!! Form::open(['action' => 'MessageController@store', 'method' =>'POST']) !!}
        <div class="form-group">
          <div class="form-group">
            {{Form::label('name', 'Upisite Vase ime i prezime')}}
            {{Form::text('name', '', ['class' => 'form-control','placeholder' => 'Upravo ovde'])}}
          </div>
          <div class="form-group">
            {{Form::label('email', 'Upisite Vas e-mail')}}
            {{Form::text('email', '', ['class' => 'form-control', 'placeholder' => 'U ovom formatu: example@gmail.com'])}}
          </div>
          <div class="form-group">
            {{Form::label('message', 'Upisite Vasu poruku')}}
            {{Form::textarea('message', '', ['class' => 'form-control','placeholder' => 'Ovde upisite Vasu poruku'])}}
          </div>
        </div>
        <div class="d-flex justify-content-between">
            {{Form::submit('Posalji!', ['class' => 'btn btn-primary'])}}
            {{Form::reset('Ponisti!', ['class' => 'btn btn-danger'])}}
        </div>
        {!! Form::close() !!}
      </div>
  </div>
  <hr>
  <div class="row">
    <div class="col-md-4">
      <h4>O nama</h4>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
    </div>
    <div class="col-md-4">
      <h4>Kontakt</h4>
      <address class="">
        <strong><i class="fas fa-phone"> 011 111 1111</i></strong>
        <hr>
        <strong><i class="fas fa-envelope"> welnesspa@gmail.com</i></strong>
        <hr>
        <strong><i class="fas fa-road"> Savski nasip 7, Novi Beograd</i></strong>
      </address>
    </div>
    <div class="col-md-4">
      <h4>Radno vreme:</h4>
      <strong><span>od ponedeljka do nedelje:</span></strong><p> 10:00 - 20:00</p>
    </div>
  </div>
@endsection

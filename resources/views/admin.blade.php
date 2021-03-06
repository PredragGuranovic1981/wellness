@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{auth()->user()->name}}</div>
                <div class="card-body">
                  @if(auth()->user()->is_admin == 1)
                    <p>Imate admin privilegije.</p>
                  @else
                  <div class="panel-heading">Obican korisnik</div>
                  @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

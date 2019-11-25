@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
                <div class="card-body">
                  @if(auth()->user()->is_admin == 1)
                  <!-- <a href="{{url('admin/routes')}}">Admin</a> -->
                  @include('inc.adminNavbar')
                  @else
                  <div class="panel-heading">Obican korisnik</div>
                  @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

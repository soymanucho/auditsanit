@extends('layouts.app')

@section('title')
  Perfil
@endsection


@section('content-header')
  <h1>Perfil de @isset($person->name)
    {{$person->name}}
  @else
    {{$user->name}}
  @endisset</h1>


@endsection

@section('content')

  <div class="panel-body">
    @include('errors.errors')
    <div class="box box-success">
      <div class="box-header with-border">
        <h3 class="box-title">Datos del perfil</h3>
      </div>
      <form method="POST" class="form-horizontal" name='editProfile'>
        {{ method_field('post') }}
        @include('user._fields')
      </form>

    </div>
  </div>




@endsection

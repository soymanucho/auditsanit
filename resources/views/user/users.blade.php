@extends('layouts.app')

@section('title')
  Usuarios
@endsection


@section('content')

  <h1>Usuarios</h1>
  <a class="float-right btn btn-success btn-lg" href="{!! route('invite') !!}">Invitar</a>
  <br>
  @include('user.datatable')

@endsection

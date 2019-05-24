@extends('layouts.app')

@section('title')
  Tipos de Modulos
@endsection


@section('content')

  <h1>Tipos de Modulos</h1>
    <a class=" btn btn-success btn-lg" href="{!! route('new-moduletype') !!}">Nueva</a>
  <br>
  @include('moduletypes.datatable')

@endsection

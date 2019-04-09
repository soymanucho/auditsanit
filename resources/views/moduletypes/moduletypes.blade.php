@extends('layouts.app')

@section('title')
  Tipos de Modulos
@endsection


@section('content')

  <h1>Tipos de Modulos</h1>
  {{-- <a class="float-right btn btn-success btn-lg" href="/admin/productos/agregar">Nuevo</a> --}}
  <br>
  @include('moduletypes.datatable')

@endsection

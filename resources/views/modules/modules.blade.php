@extends('layouts.app')

@section('title')
  Modulos
@endsection


@section('content')

  <h1>Modulos</h1>
  {{-- <a class="float-right btn btn-success btn-lg" href="/admin/productos/agregar">Nuevo</a> --}}
  <br>
  @include('modules.datatable')

@endsection

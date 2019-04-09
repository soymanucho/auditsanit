@extends('layouts.app')

@section('title')
  Categorias de Modulos
@endsection


@section('content')

  <h1>Categorias de Modulos</h1>
  {{-- <a class="float-right btn btn-success btn-lg" href="/admin/productos/agregar">Nuevo</a> --}}
  <br>
  @include('modulecategories.datatable')

@endsection

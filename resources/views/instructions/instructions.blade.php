@extends('layouts.app')

@section('title')
  Instrucciones
@endsection


@section('content')

  <h1>Instrucciones</h1>
  {{-- <a class="float-right btn btn-success btn-lg" href="/admin/productos/agregar">Nuevo</a> --}}
  <br>
  @include('instructions.datatable')

@endsection

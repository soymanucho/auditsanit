@extends('layouts.app')

@section('title')
  Objetivos
@endsection


@section('content')

  <h1>Objetivos</h1>
  {{-- <a class="float-right btn btn-success btn-lg" href="/admin/productos/agregar">Nuevo</a> --}}
  <br>
  @include('objectives.datatable')

@endsection

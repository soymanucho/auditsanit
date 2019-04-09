@extends('layouts.app')

@section('title')
  Recomendaciones
@endsection


@section('content')

  <h1>Recomendaciones</h1>
  {{-- <a class="float-right btn btn-success btn-lg" href="/admin/productos/agregar">Nuevo</a> --}}
  <br>
  @include('recommendations.datatable')

@endsection

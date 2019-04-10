@extends('layouts.app')

@section('title')
  Estados de Auditoria
@endsection


@section('content')

  <h1>Estados de Auditoria</h1>
  {{-- <a class="float-right btn btn-success btn-lg" href="/admin/productos/agregar">Nuevo</a> --}}
  <br>
  @include('statuses.datatable')

@endsection

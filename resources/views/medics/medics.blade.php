@extends('layouts.app')

@section('title')
  Medicos
@endsection


@section('content')

  <h1>Medicos</h1>
  <a class="float-right btn btn-success btn-lg" href="{!! route('export-medics') !!}">Exportar</a>
  {{-- <a class="float-right btn btn-success btn-lg" href="/admin/productos/agregar">Nuevo</a> --}}
  <br>
  @include('medics.datatable')

@endsection

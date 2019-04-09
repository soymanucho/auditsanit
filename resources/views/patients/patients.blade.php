@extends('layouts.app')

@section('title')
  Pacientes
@endsection


@section('content')

  <h1>Pacientes</h1>
  {{-- <a class="float-right btn btn-success btn-lg" href="/admin/productos/agregar">Nuevo</a> --}}
  <br>
  @include('patients.datatable')

@endsection

@extends('layouts.app')

@section('title')
  Auditores
@endsection


@section('content')

  <h1>Auditores</h1>
  {{-- <a class="float-right btn btn-success btn-lg" href="/admin/productos/agregar">Nuevo</a> --}}
  <br>
  @include('auditors.datatable')

@endsection

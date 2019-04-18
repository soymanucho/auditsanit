@extends('layouts.app')

@section('title')
  Auditorías
@endsection


@section('content')

  <h1>Auditorías</h1>

  <a class="float-right btn bg-navy btn-lg" href="{!! route('export-audits') !!}">Exportar</a>
  <a class="float-right btn btn-success btn-lg" href="{!! route('new-audit') !!}">Crear nueva</a>
  <br>

  @include('audits.datatable')

@endsection

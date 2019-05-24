@extends('layouts.app')

@section('title')
  Afiliados
@endsection


@section('content')

  <h1>Afiliados</h1>
  <a class="float-right btn bg-navy btn-lg" href="{!! route('export-patients') !!}">Exportar</a>
  <a class="float-right btn btn-success btn-lg" href="{!! route('new-patients') !!}">Nuevo</a>
  <br>
  @include('patients.datatable')

@endsection

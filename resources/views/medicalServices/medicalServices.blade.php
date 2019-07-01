@extends('layouts.app')

@section('title')
  Prestaciones
@endsection


@section('content')

  <h1>Asignaciones</h1>

  <br>

  @include('medicalServices.datatable')

@endsection

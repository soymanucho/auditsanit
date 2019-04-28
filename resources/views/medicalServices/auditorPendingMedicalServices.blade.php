@extends('layouts.app')

@section('title')
  Auditorías
@endsection


@section('content')

  <h1>Mis auditorias pendientes</h1>


  @include('medicalServices.auditorPendingDatatable')

@endsection

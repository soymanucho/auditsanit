@extends('layouts.app')

@section('title')
  Prestaciones
@endsection


@section('content')

  <h1>Prestaciones</h1>

  <br>

  @include('medicalServices.datatable')

@endsection

@extends('layouts.app')

@section('title')
  Auditorías
@endsection


@section('content')

  <h1>Auditorías</h1>

  @include('audits.datatable')

@endsection

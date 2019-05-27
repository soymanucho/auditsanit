@extends('layouts.app')

@section('title')
  Tipos de prestaciones
@endsection

@section('breadcrumb-items')
  <li><a href="{!! route('home') !!}"><i class="fa "></i> Inicio</a></li>

@endsection

@section('content')

  <h1>Tipos de prestaciones</h1>
  <a class="float-right btn btn-success btn-lg" href="{!! route('new-serviceType') !!}">Nueva</a>
  <br>
  @include('serviceTypes.datatable')

@endsection

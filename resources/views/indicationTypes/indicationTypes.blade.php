@extends('layouts.app')

@section('title')
  Tipo de Indicaciones
@endsection

@section('breadcrumb-items')
  <li><a href="{!! route('home') !!}"><i class="fa "></i> Inicio</a></li>

@endsection

@section('content')

  <h1>Tipos de Indicaciones</h1>
  <a class="float-right btn btn-success btn-lg" href="{!! route('new-indicationType') !!}">Nueva</a>
  <br>
  @include('indicationTypes.datatable')

@endsection

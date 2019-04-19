@extends('layouts.app')

@section('title')
  Tipo de Diagnosticos
@endsection

@section('breadcrumb-items')
  <li><a href="{!! route('home') !!}"><i class="fa "></i> Inicio</a></li>

@endsection

@section('content')

  <h1>Tipos de Diagnosticos</h1>
  <a class="float-right btn btn-success btn-lg" href="{!! route('new-diagnosisType') !!}">Nueva</a>
  <br>
  @include('diagnosisTypes.datatable')

@endsection

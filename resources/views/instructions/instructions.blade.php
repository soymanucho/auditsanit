@extends('layouts.app')

@section('title')
  Método de trabajo empleado
@endsection

@section('breadcrumb-items')
  <li><a href="{!! route('home') !!}"><i class="fa "></i> Inicio</a></li>

@endsection

@section('content')

  <h1>Método de trabajo empleado</h1>
  <a class="float-right btn btn-success btn-lg" href="{!! route('new-instructions') !!}">Nuevo</a>
  <br>
  @include('instructions.datatable')

@endsection

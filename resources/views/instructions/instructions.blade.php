@extends('layouts.app')

@section('title')
  Instrucciones
@endsection

@section('breadcrumb-items')
  <li><a href="{!! route('home') !!}"><i class="fa "></i> Inicio</a></li>

@endsection

@section('content')

  <h1>Instrucciones</h1>
  <a class="float-right btn btn-success btn-lg" href="{!! route('new-instructions') !!}">Nueva</a>
  <br>
  @include('instructions.datatable')

@endsection

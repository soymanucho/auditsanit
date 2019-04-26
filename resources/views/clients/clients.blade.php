@extends('layouts.app')

@section('title')
  Clientes
@endsection

@section('breadcrumb-items')
  <li><a href="{!! route('home') !!}"><i class="fa "></i> Inicio</a></li>

@endsection

@section('content')

  <h1>Clientes</h1>
  <a class="float-right btn btn-success btn-lg" href="{!! route('new-clients') !!}">Nuevo</a>
  <br>
  @include('clients.datatable')

@endsection

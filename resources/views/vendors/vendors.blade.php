@extends('layouts.app')

@section('title')
  Prestadores
@endsection

@section('breadcrumb-items')
  <li><a href="{!! route('home') !!}"><i class="fa "></i> Inicio</a></li>

@endsection

@section('content')

  <h1>Prestadores</h1>
  <a class="float-right btn btn-success btn-lg" href="{!! route('new-vendors') !!}">Nuevo</a>
  <br>
  @include('vendors.datatable')

@endsection

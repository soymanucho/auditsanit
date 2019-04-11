@extends('layouts.app')

@section('title')
  Objetivos
@endsection

@section('breadcrumb-items')
  <li><a href="{!! route('home') !!}"><i class="fa "></i> Inicio</a></li>

@endsection

@section('content')

  <h1>Objetivos</h1>
  <a class="float-right btn btn-success btn-lg" href="{!! route('new-objectives') !!}">Nueva</a>
  <br>
  @include('objectives.datatable')

@endsection

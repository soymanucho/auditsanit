@extends('layouts.app')

@section('title')
  Recomendaciones
@endsection


@section('content')

  <h1>Recomendaciones</h1>
    <a class="float-right btn btn-success btn-lg" href="{!! route('new-recommendations') !!}">Nueva</a>
  <br>
  @include('recommendations.datatable')

@endsection

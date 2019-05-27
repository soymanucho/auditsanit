@extends('layouts.app')

@section('title')
  Estados de Auditoria
@endsection


@section('content')

  <h1>Estados de Auditoria
    {{-- <a class=" btn btn-success btn-lg" href="{!! route('new-status') !!}">Nueva</a> --}}
  </h1>
  <br>
  @include('statuses.datatable')

@endsection

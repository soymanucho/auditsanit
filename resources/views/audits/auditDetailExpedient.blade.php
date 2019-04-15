@extends('layouts.app')

@section('title')
  Auditoría
@endsection


@section('content-header')
  <h1>Auditoría n° {{$audit->id}}</h1>


@endsection

@section('content')
  <a class="float-right btn btn-app" href="{!! route('audit-detail-patient',compact('audit')) !!}">Ver detalles del paciente</a>
  <i class="glyphicon glyphicon-menu-right"></i>
  <a class="float-right btn btn-app disabled" href="{!! route('audit-detail-expedient',compact('audit')) !!}">Ir a los diagnosticos e indicaciones</a>
  <i class="glyphicon glyphicon-menu-right"></i>
  <a class="float-right btn btn-app" href="{!! route('audit-detail-result',compact('audit')) !!}">Ver resultados de la auditoría</a>
  <i class="glyphicon glyphicon-menu-right"></i>
  <a class="float-right btn btn-app" href="{!! route('audit-detail-history',compact('audit')) !!}">Ver el historial de estados</a>
<br>
<div class="box box-widget">
  <div class="box-header with-border">

  @include('audits.auditheader')

  {{-- @include('audits.auditpatient') --}}

  @include('audits.auditexpedientdata')

  {{-- @include('audits.auditresult') --}}

  {{-- @include('audits.audithistory') --}}

  </div>
 @include('audits.auditscomments')
</div>



@endsection

@extends('layouts.app')

@section('title')
  Auditoría
@endsection


@section('content-header')
  <h1>Auditoría n° {{$audit->id}}</h1>


@endsection

@section('content')
  <div class="btn-group">
  <a class="float-right btn bg-navy" href="{!! route('audit-detail-patient',compact('audit')) !!}">   Detalles del paciente</a>

  <a class="float-right btn bg-navy " href="{!! route('audit-detail-expedient',compact('audit')) !!}"><i class="glyphicon glyphicon-menu-right"></i>    Diagnósticos e indicaciones</a>

  <a class="float-right btn bg-navy " href="{!! route('audit-detail-objectives',compact('audit')) !!}"><i class="glyphicon glyphicon-menu-right"></i>   Objetivos e instrucciones</a>

  <a class="float-right btn bg-navy " href="{!! route('audit-detail-auditor',compact('audit')) !!}"><i class="glyphicon glyphicon-menu-right"></i>    Informe</a>

  <a class="float-right btn bg-navy " href="{!! route('audit-detail-conclution',compact('audit')) !!}"><i class="glyphicon glyphicon-menu-right"></i>   Conclusión y recomendaciones</a>

  <a class="float-right btn bg-navy disabled" href="{!! route('audit-detail-history',compact('audit')) !!}"><i class="glyphicon glyphicon-menu-right"></i>    Historial de estados</a>
  </div>
<br>
<div class="box box-widget">
  <div class="box-header with-border">

  @include('audits.auditheader')

  {{-- @include('audits.auditpatient') --}}

  {{-- @include('audits.auditexpedientdata') --}}

  {{-- @include('audits.auditresult') --}}

  @include('audits.audithistory')

  </div>
 @include('audits.auditscomments')
</div>



@endsection

@extends('layouts.app')

@section('title')
  Auditoría
@endsection


@section('content-header')
  <h1>Auditoría n° {{$audit->id}}</h1>


@endsection

@section('content')
  <div class="row">
    <div class="btn-group" style="width:100%">
      <a class="col-lg-2 col-sm-12 col-md-6 btn bg-navy " href="{!! route('audit-detail-patient',compact('audit')) !!}">Detalles del paciente</a>

      <a class="col-lg-2 col-sm-12 col-md-6 btn bg-navy " href="{!! route('audit-detail-expedient',compact('audit')) !!}"><i class="glyphicon glyphicon-menu-right"></i>    Diagnósticos e indicaciones</a>

      <a class="col-lg-2 col-sm-12 col-md-6 btn bg-navy " href="{!! route('audit-detail-objectives',compact('audit')) !!}"><i class="glyphicon glyphicon-menu-right"></i>   Objetivos e instrucciones</a>

      <a class="col-lg-2 col-sm-12 col-md-6 btn bg-navy " href="{!! route('audit-detail-auditor',compact('audit')) !!}"><i class="glyphicon glyphicon-menu-right"></i>    Informe</a>

      <a class="col-lg-2 col-sm-12 col-md-6 btn bg-navy " href="{!! route('audit-detail-conclution',compact('audit')) !!}"><i class="glyphicon glyphicon-menu-right"></i>   Conclusión y recomendaciones</a>

      <a class="col-lg-2 col-sm-12 col-md-6 btn bg-navy " href="{!! route('audit-detail-history',compact('audit')) !!}"><i class="glyphicon glyphicon-menu-right"></i>    Historial de estados</a>

      <a class="col-lg-12 col-sm-12 col-md-12 btn bg-blue disabled" href="{!! route('audit-detail-resume',compact('audit')) !!}"><i class="glyphicon glyphicon-menu-right"></i>    Resumen</a>
    </div>
  </div>
<br>
<div class="box box-widget">
  <div class="box-header with-border">

  @include('audits.auditheader')

  @include('audits.patient.auditpatient')

  @include('audits.expedient.auditexpedientdata')

  @include('audits.objective.auditobjectives')

  @include('audits.report.auditauditor')

  @include('audits.conclution.auditconclution')

  @include('audits.history.audithistory')


  </div>
 @include('audits.auditscomments')
</div>



@endsection

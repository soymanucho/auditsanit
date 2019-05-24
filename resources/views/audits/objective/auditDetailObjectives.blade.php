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
      @can ('audit-read-patient')
        <a class="col-lg-2 col-sm-12 col-md-6 btn bg-navy" href="{!! route('audit-detail-patient',compact('audit')) !!}">Detalles del paciente</a>
      @endcan
      @can ('audit-read-expedient')
        <a class="col-lg-2 col-sm-12 col-md-6 btn bg-navy " href="{!! route('audit-detail-expedient',compact('audit')) !!}"><i class="glyphicon glyphicon-menu-right"></i>    Diagnósticos e indicaciones</a>
      @endcan
      @can ('audit-read-objectives')
        <a class="col-lg-2 col-sm-12 col-md-6 btn bg-navy disabled" href="{!! route('audit-detail-objectives',compact('audit')) !!}"><i class="glyphicon glyphicon-menu-right"></i>   Objetivos e instrucciones</a>
      @endcan
      @can ('audit-read-report')
        <a class="col-lg-2 col-sm-12 col-md-6 btn bg-navy " href="{!! route('audit-detail-auditor',compact('audit')) !!}"><i class="glyphicon glyphicon-menu-right"></i>    Informe</a>
      @endcan
      @can ('audit-read-conclution')
        <a class="col-lg-2 col-sm-12 col-md-6 btn bg-navy " href="{!! route('audit-detail-conclution',compact('audit')) !!}"><i class="glyphicon glyphicon-menu-right"></i>   Conclusión y recomendaciones</a>
      @endcan
      @can ('audit-read-history')
        <a class="col-lg-2 col-sm-12 col-md-6 btn bg-navy " href="{!! route('audit-detail-history',compact('audit')) !!}"><i class="glyphicon glyphicon-menu-right"></i>    Historial de estados</a>
      @endcan
      @can ('audit-read-resume')
        <a class="col-lg-12 col-sm-12 col-md-12 btn bg-blue" href="{!! route('audit-detail-resume',compact('audit')) !!}"><i class="glyphicon glyphicon-menu-right"></i>    Resumen</a>
      @endcan
    </div>
  </div>
<br>
<div class="box box-widget">
  <div class="box-header with-border">

  @include('audits.auditheader')

  {{-- @include('audits.auditpatient') --}}

  {{-- @include('audits.auditexpedientdata') --}}

  @include('audits.objective.auditobjectives')

  {{-- @include('audits.audithistory') --}}

  </div>
 @include('audits.auditscomments')
</div>



@endsection

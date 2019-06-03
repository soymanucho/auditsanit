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
      <a class="col-lg-2 col-sm-12 col-md-6 btn bg-navy " href="{!! route('audit-detail-patient',compact('audit')) !!}">Detalles del paciente</a>
    @endcan
    @can ('audit-read-expedient')
      <a class="col-lg-2 col-sm-12 col-md-6 btn bg-navy " href="{!! route('audit-detail-expedient',compact('audit')) !!}"><i class="glyphicon glyphicon-menu-right"></i>    Diagnósticos e indicaciones</a>
    @endcan
    @can ('audit-read-objectives')
      <a class="col-lg-2 col-sm-12 col-md-6 btn bg-navy " href="{!! route('audit-detail-objectives',compact('audit')) !!}"><i class="glyphicon glyphicon-menu-right"></i>   Objetivos e instrucciones</a>
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
      <a class="col-lg-12 col-sm-12 col-md-12 btn bg-blue disabled" href="{!! route('audit-detail-resume',compact('audit')) !!}"><i class="glyphicon glyphicon-menu-right"></i>    Resumen</a>
    @endcan
  </div>
</div>
<br>
{{-- <div class="box box-widget">
  <div class="box-header"> --}}

  {{-- @include('audits.auditheader')

  @include('audits.patient.auditpatient')

  @include('audits.expedient.auditexpedientdata')

  @include('audits.objective.auditobjectives')

  @include('audits.report.auditauditor')

  @include('audits.conclution.auditconclution')

  @include('audits.history.audithistory') --}}


<!-- Main content -->
<section class="invoice" style="page-break-before: auto">
  <!-- title row -->

@include('audits.resume.resumeBody')

  <!-- this row will not appear when printing -->
  <div class="row no-print">
    <div class="col-xs-12 no-print">
      <a href="{!! route('audit-resume-print',compact('audit')) !!}" target="_blank" class="btn btn-default pull-right"><i class="fa fa-print"></i> Imprimir</a>

      {{-- <button type="button" class="btn btn-primary pull-right" style="margin-right: 5px;">
        <i class="fa fa-download"></i> Generar PDF
      </button> --}}
        </div>
        <br>
        <br>

      <div class="col-xs-12 no-print">
      @can ('audit-edit-resume')
        <form action="{!! route('update-status-audit',['audit'=>$audit,'status'=>$audit->currentStatus()]) !!}" method="post">
              {{ csrf_field() }}
              @role('Administrador')
                <input type="submit" class="form-control btn btn-danger " @if ($audit->currentStatus()->id <= 4) style="display:none" @endif  @if ($audit->currentStatus()->id > 5) disabled  @endif name="updateStatus" value="Guardar y finalizar">
              @endrole

        </form>
      @endcan
    </div>
  </div>
</section>
<!-- /.content -->
<div class="clearfix"></div>



  {{-- </div>
 @include('audits.auditscomments')
</div> --}}



@endsection

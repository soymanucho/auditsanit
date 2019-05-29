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
<section class="invoice">
  <!-- title row -->
  <div class="row">
    <div class="col-xs-12">
      <h2 class="page-header">
        <i class="fa fa-globe"></i> Auditoría sanitaria nº {{$audit->id}}
        <small class="pull-right">Fecha: {{$audit->created_at}}</small>
      </h2>
    </div>
    <!-- /.col -->
  </div>
  <!-- info row -->
  <div class="row invoice-info">
    <div class="col-sm-4 invoice-col">
      <strong>Datos del afiliado</strong>
      <address>
        {{$audit->expedient->patient->person->surname}}, {{$audit->expedient->patient->person->name}}<br>
        DNI {{$audit->expedient->patient->person->dni}}<br>
        Dirección: {{$audit->expedient->patient->person->address->street}} {{$audit->expedient->patient->person->address->number}}, {{$audit->expedient->patient->person->address->location->name}} ({{$audit->expedient->patient->person->address->location->province->name}})<br>
        Edad: {{$audit->expedient->patient->person->age()}}<br>
        Género: @isset($audit->expedient->patient->person->gender)
          {{$audit->expedient->patient->person->gender->name}}
        @else
          Indefinido
        @endisset
      </address>
    </div>
    <!-- /.col -->
    <div class="col-sm-4 invoice-col">
      <strong>Diagnósticos:</strong>
      <address>
        {{-- <strong>John Doe</strong><br> --}}
        @foreach ($audit->expedient->diagnoses as $diagnosis)
            {{$diagnosis->diagnosisType->name}}<br>
        @endforeach
      </address>
    </div>
    <!-- /.col -->
    <div class="col-sm-4 invoice-col">
      <strong>Indicaciones - Médico (Cant. sesiones):</strong>
      <address>
        {{-- <strong>John Doe</strong><br> --}}
        @foreach ($audit->expedient->indications as $indication)
            {{$indication->indicationType->name}} - {{$indication->medic->person->fullName()}} ({{$indication->numberOfSesions}} sesiones)<br>
        @endforeach
      </address>
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->

  <!-- Table row -->
  <div class="row">
    @foreach ($audit->expedient->expedientModules as $expedientModule )



      <div class="col-xs-12 table-responsive">
        <h4>{{$expedientModule->module->moduleType->name}} - {{$expedientModule->module->moduleCategory->name}}</h4>
        <table class="table table-striped">
          <thead>
          <tr>
            <th>Prestación</th>
            <th>Prestador</th>
            <th>Auditor</th>
          </tr>
          </thead>
          <tbody>
            @foreach ($expedientModule->medicalServices as $medicalService)
              <tr>
                <td>{{$medicalService->service->serviceType->name}}</td>
                <td>{{$medicalService->service->vendor->name}} @isset($medicalService->service->vendor->address)
                  ({{$medicalService->service->vendor->address->street}} {{$medicalService->service->vendor->address->number}})
                @endisset </td>
                <td>{{$medicalService->auditor->person->name}} {{$medicalService->auditor->person->surname}}</td>
              </tr>
            @endforeach
          </tbody>
        </table>
          @foreach ($expedientModule->medicalServices as $medicalService)
        <h4>Informe del auditor {{$medicalService->auditor->person->name}} para {{$medicalService->service->serviceType->name}}</h4>
        <div class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
          {!!$medicalService->report!!}
        </div>
          @endforeach
      </div>

    @endforeach
    <!-- /.col -->
  </div>
  <!-- /.row -->

  <div class="row">
    <!-- accepted payments column -->
    <div class="col-xs-12">
      <p class="lead">Conclusión de la coordinadora:</p>
      {{-- <img src="../../dist/img/credit/visa.png" alt="Visa">
      <img src="../../dist/img/credit/mastercard.png" alt="Mastercard">
      <img src="../../dist/img/credit/american-express.png" alt="American Express">
      <img src="../../dist/img/credit/paypal2.png" alt="Paypal"> --}}

      <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
        {{$audit->conclution}}
      </p>
    </div>
    <!-- /.col -->
    <div class="col-xs-12">
      <p class="lead">Recomendaciones de la coordinadora:</p>

      <div class="table-responsive">
        <table class="table">
          @foreach ($audit->recommendations as $recommendation)
            <tr>
              <th> - {{$recommendation->name }}</th>
            </tr>
          @endforeach
        </table>
      </div>
    </div>

    <!-- /.col -->
  </div>
  <!-- /.row -->

  <!-- this row will not appear when printing -->
  <div class="row no-print">
    <div class="col-xs-12">
      {{-- <a href="{!! route('audit-resume-print',compact('audit')) !!}" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Imprimir</a> --}}
      {{-- <button type="button" class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit Payment
      </button>
      <button type="button" class="btn btn-primary pull-right" style="margin-right: 5px;">
        <i class="fa fa-download"></i> Generate PDF
      </button> --}}
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

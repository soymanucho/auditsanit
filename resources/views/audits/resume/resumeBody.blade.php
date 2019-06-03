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

    <div class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
      {!!$audit->conclution!!}
    </div>
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

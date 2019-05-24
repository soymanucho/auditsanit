<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Auditoria sanitaria</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <!-- Font Awesome -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.4.5/css/AdminLTE.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body onload="window.print();">
<div class="wrapper">
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
        Datos del afiliado
        <address>
          <strong>{{$audit->expedient->patient->person->surname}}, {{$audit->expedient->patient->person->name}}</strong><br>
          DNI {{$audit->expedient->patient->person->dni}}<br>
          Dirección: {{$audit->expedient->patient->person->address->street}} {{$audit->expedient->patient->person->address->number}}, {{$audit->expedient->patient->person->address->location->name}} ({{$audit->expedient->patient->person->address->location->province->name}})<br>
          Edad: {{$audit->expedient->patient->person->age()}}<br>
          Género: {{$audit->expedient->patient->person->gender->name}}
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
        <strong>Indicaciones:</strong>
        <address>
          {{-- <strong>John Doe</strong><br> --}}
          @foreach ($audit->expedient->indications as $indication)
              {{$indication->indicationType->name}} ({{$indication->numberOfSesions}} sesiones)<br>
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
                  <td>{{$medicalService->service->vendor->name}} ({{$medicalService->service->vendor->address->street}} {{$medicalService->service->vendor->address->number}})</td>
                  <td>{{$medicalService->auditor->person->name}} {{$medicalService->auditor->person->surname}}</td>
                </tr>
              @endforeach
            </tbody>
          </table>
          <h4>Informe del auditor</h4>
          <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
            {{$audit->report}}
          </p>
        </div>
      @endforeach
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <div class="row">
      <!-- accepted payments column -->
      <div class="col-xs-6">
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
      <div class="col-xs-6">
        <p class="lead">Modulos recomendados</p>

        <div class="table-responsive">
          <table class="table">
            <tr>
              <th style="width:50%">Módulo:</th>
              <th style="width:50%">Precio:</th>
            </tr>
            @foreach ($audit->expedient->expedientModules as $expedientModule )
              <tr>
                {{-- <td>{{$expedientModule->recommendedModule->moduleType->name}}</td>
                <td>${{$expedientModule->recommendedModule->moduleType->price}}</td> --}}
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
        <a href="{!! route('audit-resume-print',compact('audit')) !!}" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
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

  <!-- /.content -->
</div>
<!-- ./wrapper -->
</body>
</html>
{{--  --}}

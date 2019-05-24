 @include('errors.errors')
<div class="box box-success">
  <div class="box-header with-border">
    <h3 class="box-title">
      <i class="fa fa-user"></i> Datos del paciente
        @isset($audit->expedient->patient->person->name)
          <strong>
            {{$audit->expedient->patient->person->name}} {{$audit->expedient->patient->person->surname}}
          </strong>
        @endisset
    </h3>
    @can ('audit-edit-patient')
      <a class="btn btn-warning btn-xs" href="{!! route('edit-patients',['patient'=>$audit->expedient->patient]) !!}">Editar</a>
    @endcan
    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
      </button>
    </div>
  </div>
   <!-- /.box-header -->

  <form name='showPatient'>
    <div class="box-body">
        @include('audits.patient.auditPatientDetail_fields')
      </div>
    <div class="box-footer">

    </div>
  </form>
  <!-- /.box-body -->
</div>

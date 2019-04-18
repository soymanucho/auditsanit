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
    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
      </button>
    </div>
  </div>
   <!-- /.box-header -->

  <form method="POST" class="form-horizontal" name='newPatient'>
    {{ method_field('post') }}
    <div class="box-body">
        @include('audits.auditPatientDetail_fields')
    </div>
    <div class="box-footer">
      <a class="btn btn-danger" href="{{ URL::previous()}}">Volver</a>
      <input class="btn btn-primary" type="submit" value="Guardar" name="submit"/>
    </div>
  </form>
  <!-- /.box-body -->
</div>

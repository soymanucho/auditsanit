@extends('layouts.app')

@section('title')
  Auditoría
@endsection


@section('content-header')
  <h1>Auditoría</h1>


@endsection

@section('content')
  <div class="row">

  <div class="col-md-3 col-sm-6 col-xs-12">
    <div class="info-box bg-red">
      <span class="info-box-icon"><i class="fa fa-comments-o"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">Estado</span>
        @if (isset($audit->currentStatus()->name))
        <span class="info-box-number">{{$audit->currentStatus()->name}}</span>
        @endif

        <div class="progress">
          <div class="progress-bar" style="width: 70%"></div>
        </div>
            <span class="progress-description">
              70% Increase in 30 Days
            </span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <div class="col-md-3 col-sm-6 col-xs-12">
    <div class="info-box bg-aqua">
      <span class="info-box-icon"><i class="fa fa-comments-o"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">Obra social</span>
        @if (isset($audit->expedient->client->companyName))
        <span class="info-box-number">{{$audit->expedient->client->companyName}}</span>
        @endif

        <div class="progress">
          <div class="progress-bar" style="width: 70%"></div>
        </div>
            <span class="progress-description">
              70% Increase in 30 Days
            </span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  </div>


  <div class="box box-success">
    <div class="box-header with-border">
      <h3 class="box-title">Datos del paciente</h3>
    </div>
     <!-- /.box-header -->
    <div class="box-body">
      <form role="form">
        <div class="form-group">
          <label>Nombre</label>
          <input class="form-control input" type="text" value="{{$audit->expedient->patient->person->name}}" placeholder=".input-lg">
        </div>
        <div class="form-group">
          <label>Apellido</label>
          <input class="form-control input" type="text" value="{{$audit->expedient->patient->person->surname}}" placeholder=".input-lg">
        </div>
      </form>
    </div>
    <div class="box-body">
      <form role="form">
        <div class="form-group">
          <label>Diagnosticos</label>
          <textarea class="form-control" rows="10" placeholder="Comenzar a escribir acá...">{{$audit->conclution}}</textarea>
        </div>
      </form>
    </div>
    <!-- /.box-body -->
  </div>



{{-- <div class="row">
  <div class="col-md-12">
    <div class="box box-info">
      <div class="box-header">
        <h3 class="box-title">Resultados de la auditoría
          <small>editado por </small>
        </h3>
        <!-- tools box -->
        <div class="pull-right box-tools">
          <button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip"
                  title="Collapse">
            <i class="fa fa-minus"></i></button>
          <button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip"
                  title="Remove">
            <i class="fa fa-times"></i></button>
        </div>
        <!-- /. tools -->
      </div>

      <!-- /.box-header -->
      <div class="box-body pad">
        <form>
          <div class="form-group">
            <label>Conclusión</label>
            <textarea class="form-control" rows="10" placeholder="Comenzar a escribir acá...">{{$audit->conclution}}</textarea>
          </div>
              <label>Informe</label>
              <textarea id="editor1" name="editor1" rows="10" cols="80">
                {{$audit->report}}
              </textarea>
        </form>
      </div>
    </div>
  </div>
</div> --}}

<div class="row">
  @foreach ($audit->auditors() as $auditor)
  <!-- /.col -->
  <div class="col-md-4">
    <!-- Widget: user widget style 1 -->
    <div class="box box-widget widget-user">
      <!-- Add the bg color to the header using any of the bg-* classes -->
      <div class="widget-user-header bg-aqua-active">
        <h3 class="widget-user-username">{{$auditor->person->name}} {{$auditor->person->surname}}</h3>
        <h5 class="widget-user-desc">{{$auditor->user->email}}</h5>
      </div>
      <div class="widget-user-image">
        <img class="img-circle" src="/img/avatar.svg" alt="User Avatar">
      </div>
      <div class="box-footer">
        <div class="row">
          <div class="col-sm-6 border-right">
            <div class="description-block">
              <h5 class="description-header">{{$auditor->vendors->count()}}</h5>
              <span class="description-text">Prestadores auditados</span>
            </div>
            <!-- /.description-block -->
          </div>
          <!-- /.col -->
          <div class="col-sm-6 border-right">
            <div class="description-block">
              <h5 class="description-header">{{$auditor->person->address->street}},{{$auditor->person->address->number}}</h5>
              <span class="description-text">{{$auditor->person->address->location->name}}</span>
            </div>
            <!-- /.description-block -->
          </div>
        </div>
        <!-- /.row -->
      </div>
    </div>
    <!-- /.widget-user -->
  </div>
  <!-- /.col -->
  @endforeach
  <!-- /.col -->
</div>



@endsection

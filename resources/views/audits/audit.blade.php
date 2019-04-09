@extends('layouts.app')

@section('title')
  Auditoría
@endsection


@section('content')

  <h1>Auditoría</h1>

  <div class="row">
    @foreach ($audit->auditors() as $auditor)
    <!-- /.col -->
    <div class="col-md-2">
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
                <h5 class="description-header">{{$auditor->person->address->location->name}}</h5>
                <span class="description-text">{{$auditor->person->address->street}},{{$auditor->person->address->number}}</span>
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



<div class="col-md-12">
  <div class="box box-info">
    <div class="box-header">
      <h3 class="box-title">CK Editor
        <small>Advanced and full of features</small>
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
            <textarea id="editor1" name="editor1" rows="10" cols="80">
              {{$audit->conclution}}
            </textarea>
      </form>
    </div>
  </div>
</div>

{{-- <div class="box box-warning">
  <div class="box-header with-border">
    <h3 class="box-title">General Elements</h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <form role="form">
      <div class="form-group">
        <label>Textarea</label>
        <textarea class="form-control" rows="3" placeholder="Enter ..."></textarea>
      </div>

    </form>
  </div>
  <!-- /.box-body -->
</div> --}}

@endsection

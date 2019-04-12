@extends('layouts.app')

@section('title')
  Auditoría
@endsection


@section('content-header')
  <h1>Auditoría n° {{$audit->id}}</h1>


@endsection

@section('content')

<div class="box box-widget">
  <div class="box-header with-border">
    <div class="row">

      <div class="col-md-4 col-sm-6 col-xs-12">
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
      <div class="col-md-4 col-sm-6 col-xs-12">
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

  @include('audits.auditpatient')

  @include('audits.auditexpedientdata')

  @include('audits.auditresult')

  @include('audits.audithistory')

  </div>
 @include('audits.auditscomments')
</div>



@endsection

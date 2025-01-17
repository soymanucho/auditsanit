<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.bundle.min.js"></script>
@extends('layouts.app')

@section('title')
  Inicio
@endsection


@section('content-header')

    <h1>
      Inicio
      <small>Panel de control</small>
    </h1>
    <ol class="breadcrumb">
      <li class="active">Inicio</li>
    </ol>
@endsection

@section('content')
<div class="row">

  <div class="col-lg-4 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-green">
      <div class="inner">
        <h3>{{$auditsCount}}</h3>

        <p>Total de auditorías</p>
      </div>
      <div class="icon">
        <i class="ion ion-pie-graph"></i>
      </div>
      <a href="{!! route('show-audits') !!}" class="small-box-footer">
        {{-- Ver todas <i class="fa fa-arrow-circle-right"></i> --}}
      </a>
    </div>
  </div>

{{-- @hasanyrole('Administrador|Backoffice|Coordinador') --}}

@role('Auditor')
  <div class="col-lg-4 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-red">
      <div class="inner">
        <h3>{{$pendingAuditsCount}}</h3>

        <p>Auditorías pendientes</p>
      </div>
      <div class="icon">
        <i class="ion ion-pie-graph"></i>
      </div>
      <a href="#" class="small-box-footer">
        {{-- More info <i class="fa fa-arrow-circle-right"></i> --}}
      </a>
    </div>
  </div>
@endrole

@hasanyrole('Administrador|Coordinador|Backoffice')
  @foreach ($auditsByStatus as $auditStatus)
    <div class="col-lg-4 col-xs-6">
      <!-- small box -->
      <div class="small-box" style="background-color: {{$auditStatus->color}};">
        <div class="inner">
          <h3>{{$auditStatus->count}}</h3>

          <p>{{$auditStatus->name}}</p>
        </div>
        <div class="icon">
          {{-- <i class="ion ion-pie-graph"></i> --}}
        </div>
        <a href="#" class="small-box-footer">
          {{-- More info <i class="fa fa-arrow-circle-right"></i> --}}
        </a>
      </div>
    </div>
  @endforeach
  @endrole


</div>

@hasanyrole('Administrador|Cliente gerencial|Coordinador|Backoffice')
<div class="row">

  <div class="col-12">
    <!-- DONUT CHART -->
    <div class="box box-danger">
      <div class="box-header with-border">
        <h3 class="box-title">Prestaciones por prestador</h3>

        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
          </button>
          <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        </div>
      </div>
      <div class="box-body" style="height: 500px">
        <canvas id="expedientPerVendor" width="50" height="50"></canvas>
      </div>
      <!-- /.box-body -->
    </div>
  </div>
  <div class="col-12">
    <!-- DONUT CHART -->
    <div class="box box-danger">
      <div class="box-header with-border">
        <h3 class="box-title">Cantidad de módulos por tipo de módulo</h3>

        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
          </button>
          <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        </div>
      </div>
      <div class="box-body" style="height: 500px">
        <canvas id="modulesByType" width="50" height="50"></canvas>
      </div>
      <!-- /.box-body -->
    </div>
  </div>
  <div class="col-12">
    <!-- DONUT CHART -->
    <div class="box box-danger">
      <div class="box-header with-border">
        <h3 class="box-title">Módulos recomendados vs módulos</h3>

        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
          </button>
          <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        </div>
      </div>
      <div class="box-body" style="height: 650px">
        <canvas id="difMods" width="20" height="20"></canvas>
      </div>
      <!-- /.box-body -->
    </div>
  </div>

</div>
@endrole


<script>
  var ctx = document.getElementById("expedientPerVendor").getContext('2d');

  var myChart = new Chart(ctx, {
      type: 'bar',
      data: {
          labels: {!!json_encode($expedientsPerVendor->pluck("name"))!!},
          datasets: [{
              label: '# de prestaciones',
              data: {!!json_encode($expedientsPerVendor->pluck("c"))!!},
              backgroundColor:
                'rgb(1,184,170)'
            ,
            borderColor:
                'rgb(1,184,170)'
            ,
            borderWidth: 1
        }]
    },
    options: {
      responsive: true,
   maintainAspectRatio: false,
     scales: {
         yAxes: [{
             ticks: {
                 beginAtZero: true,
                  precision: 0
             }
         }],
         xAxes: [{
                ticks: {
                    autoSkip: false,
                    maxRotation: 90,
                    minRotation: 90
                }
            }]
     }
 }
});
  </script>
<script>
  var ctx = document.getElementById("modulesByType").getContext('2d');
  var myChart = new Chart(ctx, {
      type: 'horizontalBar',
      data: {
          labels: {!!json_encode($modulesByType->pluck("name"))!!},
          datasets: [{
              label: '# de módulos',
              data: {!!json_encode($modulesByType->pluck("c"))!!},
              backgroundColor:
                'rgb(1,184,170)'
            ,
            borderColor:
                'rgb(1,184,170)'
            ,
            borderWidth: 1
        }]
    },
    options: {
      responsive: true,
   maintainAspectRatio: false,
     scales: {
         xAxes: [{
             ticks: {
                 beginAtZero: true,

                 precision: 0
             }
         }]
     }
 }
});
  </script>

<script>
  var ctx = document.getElementById("difMods").getContext('2d');
  var myChart = new Chart(ctx, {
      type: 'line',
      data: {
          labels: {!!json_encode($difMods->pluck("moduleName"))!!},
          datasets: [{
              label: 'Recomendado',
              data: {!!json_encode($difMods->pluck("recommendedprice"))!!},
              backgroundColor:
              [
              "rgba(1,184,170,0.4)"

              ],

            borderColor:
            [
            "rgb(1,184,170)"

            ],

            borderWidth: 1
        },
        {
            label: 'Real',
            data: {!!json_encode($difMods->pluck("originalprice"))!!},
            backgroundColor:
            [

            "rgba(184, 1, 50,0.4)"
            ],

          borderColor:
          [

          "rgb(184, 1, 50)"
          ],

          borderWidth: 1
      }]
    },
    options: {
      responsive: true,
   maintainAspectRatio: false,
        scales: {

            xAxes: [{
                   ticks: {
                       autoSkip: true,
                       maxRotation: 90,
                       minRotation: 90,
                       beginAtZero: true
                   }
               }]
        }
    }
});
  </script>
    {{-- <iframe width="100%" height="800px" src="https://app.powerbi.com/reportEmbed?reportId=541f5f7a-ff2e-4670-a76b-dd73c09ce39a&autoAuth=true&ctid=7fc98b83-5575-4042-b476-f981acdb8673" frameborder="0" allowFullScreen="true"></iframe> --}}
@endsection

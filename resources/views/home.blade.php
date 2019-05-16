
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

  <div class="col-lg-3 col-xs-6">
          <!-- small box -->
    <div class="small-box bg-green">
      <div class="inner">
        <h3>{{$userAuditsCount}}</h3>

        <p>Total Auditorías</p>
      </div>
      <div class="icon">
        <i class="ion ion-pie-graph"></i>
      </div>
      <a href="{!! route('show-audits') !!}" class="small-box-footer">
        Ver más <i class="fa fa-arrow-circle-right"></i>
      </a>
    </div>
  </div>

@role('Auditor')


  <div class="col-lg-3 col-xs-6">
          <!-- small box -->
    <div class="small-box bg-red">
      <div class="inner">
        <h3>{{$userPendingAuditsCount}}</h3>

        <p>Auditorías pendientes</p>
      </div>
      <div class="icon">
        <i class="ion ion-pie-graph"></i>
      </div>
      <a href="{!! route('show-audits') !!}" class="small-box-footer">
        Ver más <i class="fa fa-arrow-circle-right"></i>
      </a>
    </div>
  </div>

@endrole
<div class="col-md-9 col-sm-8">
  <div class="pad">
    <!-- Map will be created here -->
    <div id="world-map-markers" style="height: 325px;"></div>
  </div>
</div>

</div>
    {{-- <iframe width="100%" height="800px" src="https://app.powerbi.com/reportEmbed?reportId=541f5f7a-ff2e-4670-a76b-dd73c09ce39a&autoAuth=true&ctid=7fc98b83-5575-4042-b476-f981acdb8673" frameborder="0" allowFullScreen="true"></iframe> --}}
@endsection
{{-- <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script> --}}
{{-- <script src="http://jvectormap.com/js/jquery-jvectormap-1.2.2.min.js"></script> --}}
<script src="{{ asset('js/jquery.min.js') }}" ></script>
<script src="{{ asset('js/jquery-jvectormap-2.0.3.min.js') }}" ></script>
<script src="{{ asset('js/jquery-jvectormap-world-mill-en.js') }}" ></script>
<script src="{{ asset('js/jquery-jvectormap-ar-mill-en.js') }}" ></script>
{{-- <script src="http://jvectormap.com/js/jquery-jvectormap-ar-mill.js"></script> --}}
<script type="text/javascript">

var locations = <?php echo json_encode($auditsByLocation, JSON_HEX_TAG); ?>;
console.log(locations);
$(function () {
  // console.log(locations);
  'use strict';
  map = $('#world-map-markers').vectorMap({
    map              : 'ar_mill',
    normalizeFunction: 'polynomial',
    hoverOpacity     : 0.7,
    hoverColor       : false,
    backgroundColor  : 'transparent',
    regionStyle      : {
      initial      : {
        fill            : 'rgba(210, 214, 222, 1)',
        'fill-opacity'  : 1,
        stroke          : 'none',
        'stroke-width'  : 0,
        'stroke-opacity': 1
      },
      hover        : {
        'fill-opacity': 0.7,
        cursor        : 'pointer'
      },
      selected     : {
        fill: 'yellow'
      },
      selectedHover: {}
    },
    markerStyle      : {
      initial: {
        fill  : '#00a65a',
        stroke: '#111'
      },
    },
    markers :[]

  });
  function addPlantsMarkers() {
     var plants = <?php echo json_encode($auditsByLocation); ?>;
      mapMarkers.length = 0;
      mapMarkersValues.length = 0;
      for (var i = 0, l= plants.length; i < l; i++) {
          mapMarkers.push({name: plants[i].name, latLng: plants[i].coords});
          mapMarkersValues.push(plants[i].status);
      }
      map.addMarkers(mapMarkers, []);
      map.series.markers[0].setValues(mapMarkersValues);
  }
addPlantsMarkers()
});
</script>

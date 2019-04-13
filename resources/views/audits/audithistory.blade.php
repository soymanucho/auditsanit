<div class="box box-warning collapsed-box">
  <div class="box-header with-border">
    <h3 class="box-title"><i class="fa fa-history"></i> Historial</h3>
    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
      </button>
    </div>
  </div>
   <!-- /.box-header -->
  <div class="box-body">
    {{-- <form role="form">
      <div class="form-group">
        <label>Nombre</label>
        <input class="form-control input" type="text" value="{{$audit->expedient->patient->person->name}}" placeholder=".input-lg">
      </div>
      <div class="form-group">
        <label>Apellido</label>
        <input class="form-control input" type="text" value="{{$audit->expedient->patient->person->surname}}" placeholder=".input-lg">
      </div>
    </form>--}}

  <div class="row">
    <div class="col-md-12">
      <!-- The time line -->
      <ul class="timeline">
        <!-- timeline time label -->

        @foreach ($audit->statuses as $timelineItem)


        <li class="time-label">
              <span class="bg-orange">
                {{date('d-m-Y', strtotime($timelineItem->pivot->created_at))}}
              </span>
        </li>
        <!-- /.timeline-label -->
        <!-- timeline item -->
        <li>
          <i class="fa fa-edit  bg-blue"></i>

          <div class="timeline-item">
            <span class="time"><i class="fa fa-clock-o"></i> {{date('H:m', strtotime($timelineItem->pivot->created_at))}}</span>

            <h3 class="timeline-header"><a href="#">{{$timelineItem->name}}</a> </h3>

            {{-- <div class="timeline-body">
              Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
              weebly ning heekya handango imeem plugg dopplr jibjab, movity
              jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
              quora plaxo ideeli hulu weebly balihoo...
            </div>
            <div class="timeline-footer">
              <a class="btn btn-primary btn-xs">Read more</a>
              <a class="btn btn-danger btn-xs">Delete</a>
            </div> --}}
          </div>
        </li>
        <!-- END timeline item -->
        @endforeach
        <!-- END timeline item -->
        <li>
          <i class="fa fa-clock-o bg-gray"></i>
        </li>
      </ul>
    </div>
    <!-- /.col -->
  </div>
  <!-- /.box-body -->
  </div>
</div>

<div class="box box-warning">
  <div class="box-header with-border">
    <h3 class="box-title"><i class="fa fa-history"></i> Historial</h3>
    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
      </button>
    </div>
  </div>

  <div class="box-body">

  <div class="row">
    <div class="col-md-12">
      <!-- The time line -->
      <ul class="timeline">
        <!-- timeline time label -->
        @php
          $date = ''
        @endphp
        @isset($audit->statuses)

          @foreach ($audit->statuses as $timelineItem)

            @if (date('Y-m-d', strtotime($date))!=date('Y-m-d', strtotime($timelineItem->pivot->created_at)))
              <li class="time-label">
                    <span class="bg-black">
                      {{date('d-m-Y', strtotime($timelineItem->pivot->created_at))}}
                    </span>
              </li>

            @endif

            <li>
              <i class="fa fa-edit" style="background: {{$timelineItem->color}}"></i>

              <div class="timeline-item" >
                <span class="time pull-left" ><i class="fa fa-clock-o"></i> {{date('H:m', strtotime($timelineItem->pivot->created_at))}}</span>
                <h3 class="timeline-header"><span class="badge" style="background: {{$timelineItem->color}}"  href="#">{{$timelineItem->name}}</span> </h3>
              </div>
            </li>
            @php
              $date = date('d-m-Y', strtotime($timelineItem->pivot->created_at))
            @endphp

          @endforeach
        @endisset

        <li>
          <i class="fa fa-clock-o bg-gray"></i>
        </li>
      </ul>
    </div>

  </div>

  </div>
</div>

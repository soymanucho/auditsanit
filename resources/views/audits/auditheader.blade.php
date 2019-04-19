<div class="row">

  <div class="col-md-4 col-sm-6 col-xs-12">
    <div class="info-box" style="background:{{$audit->currentStatus()->color}}">
      <span  style="color:white" class="info-box-icon"><i class="fa fa-compass  "></i></span>

      <div style="color:white" class="info-box-content">
        <span class="info-box-text">Estado</span>
        @if (isset($audit->currentStatus()->name))
        <span class="info-box-number">{{$audit->currentStatus()->name}}</span>
        @endif

        <div class="progress">
          <div class="progress-bar" style="width: 70%"></div>
        </div>
            {{-- <span class="progress-description">
              70% Increase in 30 Days
            </span> --}}
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <div class="col-md-4 col-sm-6 col-xs-12">
    <div class="info-box" style="background:#d2d6de">
      <span class="info-box-icon"><i class="fa fa-plus-square"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">Obra social</span>
        @if (isset($audit->expedient->client->companyName))
        <span class="info-box-number">{{$audit->expedient->client->companyName}}</span>
        @endif

        {{-- <div class="progress">
          <div class="progress-bar" style="width: 70%"></div>
        </div> --}}
            {{-- <span class="progress-description">
              70% Increase in 30 Days
            </span> --}}
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <div class="col-md-4 col-sm-6 col-xs-12">
    <div class="info-box" style="background:#605ca8">
      <span style="color:white" class="info-box-icon"><i class="fa fa-key"></i></span>

      <div class="info-box-content" style="color:white">
        <span class="info-box-text">Responsable</span>

        <span class="info-box-number">@isset(Auth::user()->name)
          {{Auth::user()->name}}
        @endisset</span>


        {{-- <div class="progress">
          <div class="progress-bar" style="width: 70%"></div>
        </div> --}}
            {{-- <span class="progress-description">
              70% Increase in 30 Days
            </span> --}}
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
</div>

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
              @isset($auditor->medicalServices)
                <h5 class="description-header">{{$auditor->medicalServices->count()}}</h5>
              @endisset
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

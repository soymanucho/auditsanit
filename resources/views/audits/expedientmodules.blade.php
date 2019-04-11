<div class="box-body">
  <div class="box box-primary collapsed-box">
    <div class="box-header with-border">
      <h3 class="box-title">Modulos</h3>
      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
        </button>
      </div>
    </div>
     <!-- /.box-header -->

    <div class="box-body">


        <ul>
          @foreach ($audit->expedient->expedientModules as $expedientModule)
            <li>{{$expedientModule->module->moduleType->name}} - {{$expedientModule->module->moduleCategory->name}}</li>
          @endforeach
        </ul>
     </div>
    </div>

 </div>


 <div class="box-body">
  <div class="nav-tabs-custom">
   <ul class="nav nav-tabs pull-right">
     @foreach ($audit->expedient->expedientModules as $expedientModule)
     <li class=""><a href="#modtab_{{$expedientModule->id}}" data-toggle="tab" aria-expanded="false">{{$expedientModule->id}}</a></li>
     @endforeach
     <li class="pull-left header"><i class="fa fa-sitemap"></i> Modulos</li>
   </ul>
   <div class="tab-content">
     @foreach ($audit->expedient->expedientModules as $expedientModule)
        <div class="tab-pane" id="modtab_{{$expedientModule->id}}">
          {{$expedientModule->module->moduleType->name}} - {{$expedientModule->module->moduleCategory->name}}

       </div>
     @endforeach
   </div>
  </div>
 </div>

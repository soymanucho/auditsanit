
 <div class="box-body">
  <div class="nav-tabs-custom">
   <ul class="nav nav-tabs pull-right">
     @foreach ($audit->expedient->expedientModules as $key =>$expedientModule )
     <li class=""><a href="#modtab_{{$expedientModule->id}}" data-toggle="tab" aria-expanded="false">{{$key+1}}</a></li>
     @endforeach
     <li class="pull-left header"><i class="fa fa-sitemap"></i> Modulos</li>
   </ul>
   <disv class="tab-content">
     @foreach ($audit->expedient->expedientModules as $expedientModule )
        <div class="tab-pane" id="modtab_{{$expedientModule->id}}">
          <h3>{{$expedientModule->module->moduleType->name}} - {{$expedientModule->module->moduleCategory->name}}

          </h3>
          @if ($expedientModule->medicalServices->count()==0)
              <small><strong> (Este Modulo no posee Prestaciones)</strong></small>
          @endif




            @foreach ($expedientModule->medicalServices as $medicalService)
              @include('audits.modulemedicalservice')
            @endforeach


       </div>
     @endforeach
   </div>
</div>

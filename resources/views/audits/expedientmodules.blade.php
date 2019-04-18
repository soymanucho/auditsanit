
 <div class="box-body">
  <div class="nav-tabs-custom">
   <ul class="nav nav-tabs pull-right">
     @isset($audit->expedient->expedientModules)
       @foreach ($audit->expedient->expedientModules as $key =>$expedientModule )
       <li class=""><a href="#modtab_{{$expedientModule->id}}" data-toggle="tab" aria-expanded="false">{{$key+1}} <button type="button" class="editMode btn btn-danger btn-xs"><i class="fa fa-trash"></i></button></a></li>
       @endforeach
     @endisset
     <li class="pull-left header"><i class="fa fa-sitemap"></i>
        Modulos
        <button type="button" class=" editMode btn btn-success btn-xs"><i class="fa fa-plus"></i></button>
        @isset($audit->expedient->expedientModules)
          @if($audit->expedient->expedientModules->count()==0)
            <br>
           <small><strong>(Este expediente no posee Modulos)</strong></small>
          @endif
        @endisset
      </li>
   </ul>
   <disv class="tab-content">
    @isset($audit->expedient->expedientModules)
      @foreach ($audit->expedient->expedientModules as $expedientModule )
         <div class="tab-pane" id="modtab_{{$expedientModule->id}}">
           <h3>{{$expedientModule->module->moduleType->name}} - {{$expedientModule->module->moduleCategory->name}}
             <button type="button" class=" editMode btn btn-success btn-xs"><i class="fa fa-plus"></i></button>
           </h3>

           @if ($expedientModule->medicalServices->count()==0)
               <small><strong> (Este Modulo no posee Prestaciones)</strong></small>
           @endif




             @foreach ($expedientModule->medicalServices as $medicalService)
               @include('audits.modulemedicalservice')
             @endforeach


        </div>
      @endforeach
    @endisset
   </div>
</div>

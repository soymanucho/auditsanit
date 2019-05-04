
    <div class="box box-info">
      <div class="box-header">
         <h3 class="box-title"><i class="fa fa-info-circle"></i> Conclusiones y recomendaciones del coordinador{{-- {{$audit->auditor->person->name}} --}}
          {{-- <small>editado por </small> --}}
        </h3>
        <!-- tools box -->
        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
          </button>
        </div>
        <!-- /. tools -->
      </div>

      <!-- /.box-header -->
      <div class="box-body pad">
        <form method="post">
              {{ csrf_field() }}
          <div class="form-group">
            <label>Conclusión</label>

            <textarea id="report1" class="editMode" name="conclution" rows="10" cols="80">
              @isset($audit->conclution)
                  {{$audit->conclution}}
              @endisset
            </textarea>
          </div>
         <div class="form-group col-sm-12 col-md-12 col-lg-12">
           <label>Recomendaciones</label>
           <select class="form-control select2" name="recommendations[]"multiple="multiple" data-placeholder="Seleccioná una recomendación"
                   style="width: 100%;">
              @isset($audit->recommendations)
                @foreach ($recommendations as $recommendation)
                  <option

                  @isset($audit->recommendations)
                    @foreach ($audit->recommendations as $auditrecommendation)
                      @if ($auditrecommendation->id == $recommendation->id)
                        selected="selected"
                      @endif
                    @endforeach
                  @endisset
                  value="{{$recommendation->id}}"
                  >{{$recommendation->name}}</option>
                @endforeach
              @endisset
           </select>
         </div>
         <div class="row">
           <div class="col-sm-12 col-md-4 col-lg-6">
             <label>Módulo original</label>
           </div>
           <div class="col-sm-12 col-md-4 col-lg-6">
             <label>Módulo recomendado</label>
           </div>
         </div>
         @foreach ($audit->expedient->expedientModules as $expedientModule )


           <div class="input-group input-large">

             <input class="form-control" type="text" name="moduleOrig" disabled value="{{$expedientModule->module->moduleType->name}} (${{$expedientModule->module->price}})">
             <span class="input-group-addon"> <i class="glyphicon glyphicon-menu-right"></i>  </span>

             <select class="form-control" name="module_{{$expedientModule->module->id}}" placeholder="Recomendá un módulo"
                     style="width: 100%;">
                     <option></option>
                     @foreach ($modules as $module)
                       <option @if ($expedientModule->recommended_module_id == $module->id)
                         selected
                       @endif value="{{$module->id}}">{{$module->moduleType->name}} - {{$module->moduleCategory->name}}</option>
                     @endforeach
             </select>


           </div>

         @endforeach
         @can ('audit-edit-conclution')
           <input type="submit" class="form-control editMode btn btn-success " name="updateDiagnosis" @if ($audit->currentStatus()->id != 4 && !(Auth::user()->hasRole('Administrador'))) disabled @endif value="Guardar conclusión y recomendaciones">
         @endcan
        </form>
      </div>
      @can ('audit-edit-conclution')
        <form action="{!! route('update-status-audit',['audit'=>$audit,'status'=>$audit->currentStatus()]) !!}" method="post">
              {{ csrf_field() }}
              <input type="submit" class="form-control btn btn-success " @if ($audit->currentStatus()->id != 4)
                disabled
              @endif name="updateStatus" value="Enviar al administrador">

        </form>
      @endcan
    </div>

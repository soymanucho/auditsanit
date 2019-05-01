
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
         <div class="form-group col-sm-12 col-md-6 col-lg-4">
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
         @can ('audit-edit-conclution')
           <input type="submit" class="form-control editMode btn btn-success " name="updateDiagnosis" @if ($audit->currentStatus()->id > 4 && !(Auth::user()->hasRole('Administrador'))) disabled @endif value="Guardar conclusión y recomendaciones">
         @endcan
        </form>
      </div>

      @can ('audit-edit-conclution')
        <form action="{!! route('update-status-audit',['audit'=>$audit,'status'=>$audit->currentStatus()]) !!}" method="post">
              {{ csrf_field() }}
              <input type="submit" class="form-control btn btn-success " @if ($audit->currentStatus()->id > 4 )
                disabled
              @endif name="updateStatus" value="Guardar y enviar al administrador">

        </form>
      @endcan
    </div>

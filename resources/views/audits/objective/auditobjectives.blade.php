
    <div class="box box-info">
      <div class="box-header">
        <h3 class="box-title"><i class="fa fa-info-circle"></i> Informe del auditor {{-- {{$audit->auditor->person->name}} --}}
          @can ('audit-edit-objectives')
            <button id='toggleedition'type="button" class="btn btn-warning btn-xs">Habilitar Edicion</button>
          @endcan
        </h3>
        <!-- tools box -->
        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
          </button>
        </div>

      </div>


      <div class="box-body pad">
        @include('errors.errors')
        <form method="post">
            {{ csrf_field() }}




         <div class="form-group  col-sm-12 col-md-6 col-lg-4">
           <label>Objetivos</label>
           <select class="editMode form-control select2" name="objectives[]" multiple="multiple" placeholder="Seleccioná un objetivo"
           style="width: 100%;">
             @isset($audit->objectives)
               @foreach ($objectives as $objective)
               <option
                   @isset($audit->objectives)
                     @foreach ($audit->objectives as $audobj)
                       @if ($audobj->id == $objective->id)
                         selected="selected"
                       @endif
                     @endforeach
                   @endisset
                value="{{$objective->id}}"
               >{{$objective->name}}</option>
               @endforeach
             @endisset
           </select>
          </div>







         <div class="form-group col-sm-12 col-md-6 col-lg-4">
           <label>Método de trabajo empleado</label>
           <select class="editMode form-control select2" name="instructions[]" multiple="multiple" data-placeholder="Seleccioná una instrucción"
                   style="width: 100%;">
              @isset($audit->instructions)
                 @foreach ($instructions as $instruction)
                   <option
                     @isset($audit->instructions)
                       @foreach ($audit->instructions as $audinst)
                         @if ($audinst->id == $instruction->id)
                           selected="selected"
                         @endif
                       @endforeach
                     @endisset
                   value="{{$instruction->id}}"
                   >{{$instruction->name}}
                 </option>
                 @endforeach
              @endisset

           </select>
         </div>
         <div class="form-group col-sm-12 col-md-6 col-lg-3">
            @can ('audit-edit-objectives')
              <label style="color:white">Guardar</label>
              <input type="submit" class="form-control editMode btn btn-success " @if ($audit->currentStatus()->id > 2)  disabled  @endif name="updateObjetivesInstructions" value="Guardar objetivos e instrucciones">
            @endcan

         </div>

        </form>
      </div>
      @can ('audit-edit-objectives')
        <form action="{!! route('update-status-audit',['audit'=>$audit,'status'=>$audit->currentStatus()]) !!}" method="post">
              {{ csrf_field() }}
              <input type="submit" class="form-control btn btn-success " @if ($audit->currentStatus()->id > 2 && !(Auth::user()->hasRole('Administrador')))
                disabled
              @endif name="updateStatus" value="Guardar y enviar">
        </form>
      @endcan
    </div>

    <script type="text/javascript">
     window.onload = hideEditables;

    function hideEditables(){
      var editables = document.getElementsByClassName("editMode");
        for(i = 0;i < editables.length; i++)
      {
        $(".editMode")
            .prop("disabled", true);
      }
      var togglebutton = document.getElementById("toggleedition");
      togglebutton.onclick = showEditables;
    }

    function showEditables(){
      var editables = document.getElementsByClassName("editMode");
        for(i = 0;i < editables.length; i++)
      {
        $(".editMode")
            .prop("disabled", false);
      }
      var togglebutton = document.getElementById("toggleedition");
      togglebutton.onclick = hideEditables;
    }


    </script>

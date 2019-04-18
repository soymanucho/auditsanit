
    <div class="box box-info">
      <div class="box-header">
         <h3 class="box-title"><i class="fa fa-info-circle"></i> Informe del auditor {{-- {{$audit->auditor->person->name}} --}}
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
        <form>
          <div class="form-group">
            <label>Conclusión</label>
            <textarea class="form-control" rows="10" placeholder="Comenzar a escribir acá...">
              @isset($var)
                {{$audit->conclution}}
              @endisset
            </textarea>
          </div>
         <div class="form-group col-sm-12 col-md-6 col-lg-4">
           <label>Recomendaciones</label>
           <select class="form-control select2" multiple="multiple" data-placeholder="Seleccioná una recomendación"
                   style="width: 100%;">
              @isset($audit->recommendations)
                @foreach ($audit->recommendations as $recommendation)
                  <option selected="selected">{{$recommendation->name}}</option>
                @endforeach
              @endisset
           </select>
         </div>
         {{-- <div class="form-group  col-sm-12 col-md-6 col-lg-4">
         <label>Objetivos</label>
         <select class="form-control select2" multiple="multiple" data-placeholder="Seleccioná un objetivo"
         style="width: 100%;">
         @foreach ($audit->objectives as $objective)
         <option selected="selected">{{$objective->name}}</option>
         @endforeach

           </select>
          </div> --}}
         {{-- <div class="form-group col-sm-12 col-md-6 col-lg-4">
           <label>Instrucciones</label>
           <select class="form-control select2" multiple="multiple" data-placeholder="Seleccioná una instrucción"
                   style="width: 100%;">
             @foreach ($audit->instructions as $instruction)
               <option selected="selected">{{$instruction->name}}</option>
             @endforeach

           </select>
         </div> --}}


              {{-- <label>Informe</label>
              <textarea id="editor1" name="editor1" rows="10" cols="80">
                {{$audit->report}}
              </textarea> --}}
        </form>
      </div>
    </div>

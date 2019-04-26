
    <div class="box box-info">
      <div class="box-header">
         <h3 class="box-title"><i class="fa fa-info-circle"></i> Informe del auditor {{-- {{$audit->auditor->person->name}} --}}

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
              <label>Informe</label>
              <textarea id="report" class="editMode" name="report" rows="10" cols="80">
                @isset($audit->report)
                  {{$audit->report}}
                @endisset
              </textarea>
              <input type="submit" class="form-control editMode btn btn-success " name="updateReport" value="Guardar informe">
        </form>
      </div>


      <form action="{!! route('update-status-audit',['audit'=>$audit,'status'=>$audit->currentStatus()]) !!}" method="post">
            {{ csrf_field() }}
            <input type="submit" class="form-control btn btn-success " @if ($audit->currentStatus()->id > 3)
              disabled
            @endif name="updateStatus" value="Guardar y enviar">
      </form>
    </div>

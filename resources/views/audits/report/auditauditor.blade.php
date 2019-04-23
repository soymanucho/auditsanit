
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
    </div>

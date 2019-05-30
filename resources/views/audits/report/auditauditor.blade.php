@foreach ($audit->medicalServices() as $medicalService )
  @if (!((Auth::user()->hasRole('Auditor')&&$medicalService->auditor->person->id!=Auth::user()->person_id)))


    <div class="box box-info">
      <div class="box-header">
         <h3 class="box-title"><i class="fa fa-info-circle"></i>
           @isset($medicalService->auditor->person)
             Informe de {{$medicalService->auditor->person->fullName()}}
            @else
              Informe de auditor
           @endisset
        </h3>
        <!-- tools box -->
        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool " data-widget="collapse"><i class="fa fa-plus"></i>
          </button>
        </div>
        <!-- /. tools -->
      </div>

      <!-- /.box-header -->
      <div class="box-body pad">


          <form method="post">
                {{ csrf_field() }}

                <textarea id="report_{{$medicalService->id}}" class="editMode ckeditor" name="report_{{$medicalService->id}}" rows="10" cols="80">
                  @isset($medicalService->report)
                    {{$medicalService->report}}
                  @endisset

                </textarea>
                  <input type="hidden" name="medicalService" id="medicalService" value="{{$medicalService->id}}" >
                @can ('audit-edit-report')
                  <input type="submit" class="form-control editMode btn btn-success " @if ($audit->currentStatus()->id > 3 && !(Auth::user()->hasRole('Administrador')))
                    disabled
                  @endif  name="updateReport" value="Guardar informe">
                @endcan
          </form>


      </div>




    </div>
    @endif
@endforeach
  @can ('audit-edit-report')
      <form action="{!! route('update-status-audit',['audit'=>$audit,'status'=>$audit->currentStatus()]) !!}" method="post">
            {{ csrf_field() }}
            <input type="submit" class="form-control btn btn-success " @if ($audit->currentStatus()->id != 3 && !(Auth::user()->hasRole('Administrador')))
              disabled
            @endif name="updateStatus" value="Enviar">
      </form>
    @endcan

<script type="text/javascript">

@foreach ($audit->medicalServices() as $medicalService )
CKEDITOR.replace( 'report_{{$medicalService->id}}',{
  removeButtons: '',
  uiColor: '#d1cfc7',
  });
  @endforeach
</script>

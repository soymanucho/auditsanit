<div class="box box-primary ">
  <div class="box-header with-border">
    <h3 class="box-title"><i class="fa fa-file"></i> Datos del expediente

    </h3>
    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
      </button>
    </div>
  </div>
   <!-- /.box-header -->


  @include('audits.expedient.expedientdiagnosis')
  @include('audits.expedient.expedientindications')
  @include('audits.expedient.expedientmodules')

  @can ('audit-edit-expedient')
    <form action="{!! route('update-status-audit',['audit'=>$audit,'status'=>$audit->currentStatus()]) !!}" method="post">
          {{ csrf_field() }}
          <input type="submit" class="form-control btn btn-success " @if ($audit->currentStatus()->id > 1 && !(Auth::user()->hasRole('Administrador')))
            disabled
          @endif name="updateStatus" value="Enviar">
    </form>
  @endcan
</div>

<script>

  $(document).ready(function () {

  });
</script>
<script type="text/javascript">
 window.onload = toggleEditables("toggleDiagnosisEdition","editButtonsDiagnosis","inputDiagnosisEdit",true);
 window.onload = toggleEditables("toggleIndicationsEdition","editButtonsIndications",null,true);
 window.onload = toggleEditables("toggleModulesEdition","editButtonsModules",null,true);

function toggleEditables(claseBoton,claseElementoEditable,inputEditable,toggle){
  var editables = document.getElementsByClassName(claseElementoEditable);



  if(inputEditable!='null'){
      $("."+inputEditable).prop("disabled", toggle);
  }

    if (toggle) {
        $("."+claseElementoEditable).hide();
    }
    else {
        $("."+claseElementoEditable).show();
    }


    console.log($("."+claseElementoEditable));
    console.log($("."+inputEditable));
  var togglebutton = document.getElementById(claseBoton);
  togglebutton.onclick = function(){toggleEditables(claseBoton,claseElementoEditable,inputEditable,!toggle)};
}


</script>

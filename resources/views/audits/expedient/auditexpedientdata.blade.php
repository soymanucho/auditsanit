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

  <form action="{!! route('update-status-audit',['audit'=>$audit,'status'=>$audit->currentStatus()]) !!}" method="post">
        {{ csrf_field() }}
        <input type="submit" class="form-control btn btn-success " @if ($audit->currentStatus()->id > 1)
          disabled
        @endif name="updateStatus" value="Guardar y enviar">
  </form>



</div>

<script>

  $(document).ready(function () {

  });
</script>
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

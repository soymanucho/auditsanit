
<div class="box box-primary">
 <div class="box-header with-border">
      <h3 class="box-title">Indicaciones
      @can ('audit-edit-expedient')
        <button id='toggleIndicationsEdition' type="button" class="btn btn-warning btn-xs">Habilitar Edicion</button>
        <button type="button" class="fancyboxIndication editButtonsIndications btn btn-success btn-xs" href="{!! route('new-indication',compact('audit')) !!}" ><i class="fa fa-plus"></i></button>
      @endcan
      </h3>
      <div class="box-tools pull-right">
      </div>
    <div class="box-body">
      <table id="indicationTable" class="table table-bordered table-hover display nowrap" style="width:100%">
        <tr>
          <th>Nombre</th>
          <th># sesiones mensuales</th>
          <th>Adicional Dependencia</th>
          <th>Medico</th>
          @can ('audit-edit-expedient')
            <th class="editMode">Eliminar</th>
          @endcan
        </tr>
        @foreach ($audit->expedient->indications as $indication)
          <tr>
            <td>{{$indication->indicationType->name}}</td>
            <td>{{$indication->numberOfSesions}}</td>
            <td>{{$indication->aditionalDependance}}</td>
            <td>{{$indication->medic->person->surname}}, {{$indication->medic->person->name}}</td>
            @can ('audit-edit-expedient')
              <td ><a type="button" href="{!! route('delete-indication',compact('indication')) !!}" onclick="return confirm('Seguro que quiere eliminar esta indicación?')" class="btn btn-danger btn-xs editButtonsIndications"><i class="fa fa-trash "></i></a></td>
            @endcan
          </tr>
        @endforeach
       </table>
    </div>
  </div>
</div>

<script type="text/javascript">
$(document).ready(function(){

  $.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
updateTableIndications()


});

function updateTableIndications() {
  console.log('updateTableIndications');

  $.ajax({
    type:"GET",
    url: "/indication/get/{!!$audit->id!!}", success: function(result){


      $("#indicationTable").find("tr:not(:first)").remove();
    $.each(result,function (key,value) {

      var newrow = $('<tr></tr>')
      $("#indicationTable").append(newrow);
      newrow.append('<td>' +value.indication_type.name+ '</td>');
      newrow.append('<td>' +value.numberOfSesions+ '</td>');
      newrow.append('<td>' +value.aditionalDependance+ '</td>');
      newrow.append('<td>' +value.medic.person.name+', '+value.medic.person.surname+ '</td>');
      newrow.append('<td ><a type="button" href="/indicacion/'+value.id+'/delete" onclick="return confirm("Seguro que quiere eliminar esta indicación?")" class="btn btn-danger btn-xs editButtonsIndications"><i class="fa fa-trash "></i></a></td>');
        console.log(value);
    });



  }});


}

</script>


<script type="text/javascript">
  window.addEventListener('load',function() {
  	$(".fancyboxIndication").fancybox({
  		maxWidth	: 1600,
      minWidth	: 1000,
  		maxHeight	: 300,
  		fitToView	: true,
  		width		: '100%',
  		height		: '50%',
  		autoSize	: true,
  		closeClick	: false,
  		openEffect	: 'none',
  		closeEffect	: 'none',
      type: 'ajax',
      afterClose: function(){
      updateTableIndications()

      }
  	});
  });
</script>

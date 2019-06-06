
<div class="box box-primary">
 <div class="box-header with-border">
      <h3 class="box-title">Indicaciones
      @can ('audit-edit-expedient')
        <button id='toggleIndicationsEdition' type="button" class="btn btn-warning btn-xs">Habilitar Edicion</button>
        <button type="button" class="fancybox editButtonsIndications btn btn-success btn-xs" href="{!! route('new-indication',compact('audit')) !!}" ><i class="fa fa-plus"></i></button>
      @endcan
      </h3>
      <div class="box-tools pull-right">
      </div>
    <div class="box-body">
      <table class="table table-bordered table-hover display nowrap" style="width:100%">
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

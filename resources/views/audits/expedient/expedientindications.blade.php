
<div class="box box-primary">
 <div class="box-header with-border">
      <h3 class="box-title">Indicaciones
      <button type="button" class="fancybox editMode btn btn-success btn-xs" href="{!! route('new-indication',compact('audit')) !!}" ><i class="fa fa-plus"></i></button>
      </h3>
      <div class="box-tools pull-right">
      </div>
    <div class="box-body">
      <table class="table table-bordered table-hover display nowrap" style="width:100%">
        <tr>
          <th>Nombre</th>
          <th># sesiones</th>
          <th>Adicional Dependencia</th>
          <th>Medico</th>
          <th class="editMode">Eliminar</th>
        </tr>
        @foreach ($audit->expedient->indications as $indication)
          <tr>
            <td>{{$indication->indicationType->name}}</td>
            <td>{{$indication->numberOfSesions}}</td>
            <td>{{$indication->aditionalDependance}}</td>
            <td>{{$indication->medic->person->surname}}, {{$indication->medic->person->name}}</td>
            <td class="editMode"><a type="button" href="{!! route('delete-indication',compact('indication')) !!}" onclick="return confirm('Seguro que quiere eliminar esta indicación?')" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a></td>
          </tr>
        @endforeach
       </table>
    </div>
  </div>
</div>

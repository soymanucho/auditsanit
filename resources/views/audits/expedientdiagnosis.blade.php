
<div class="box-body">
  <div class="nav-tabs-custom">
    <ul class="nav nav-tabs pull-right">
      @foreach ($audit->expedient->diagnoses as $diagnosis)
      <li class=""><a href="#tab_{{$diagnosis->id}}" data-toggle="tab" aria-expanded="false">{{$diagnosis->diagnosisType->name}} <button type="button" class="editMode btn btn-danger btn-xs"><i class="fa fa-trash"></i></button></a></li>
      @endforeach
        <li class="pull-left header"><i class="fa fa-heartbeat "></i>
           Diagnosticos
           <button type="button" class="editMode btn btn-success btn-xs"><i class="fa fa-plus"></i></button>
           @if($audit->expedient->diagnoses->count()==0)
             <br>
            <small><strong>(Este expediente no posee Diagnosticos)</strong></small>
           @endif
         </li>
    </ul>
    <div class="tab-content">



      @foreach ($audit->expedient->diagnoses as $diagnosis)
        <div class="tab-pane" id="tab_{{$diagnosis->id}}">
          @if ($diagnosis->indications->count()==0)
            <small><strong>(Este Diagnostico no posee Indicaciones)</strong></small>
          @else

          <table class="table table-bordered table-hover display nowrap" style="width:100%">
           <tr>
             <th>Indicacion  <button type="button" class="editMode btn btn-success btn-xs"><i class="fa fa-plus"></i></button></th>
             <th># sesiones</th>
             <th>Adicional dependencia</th>
             <th>Medico</th>
             <th  class="editMode">Editar</th>
             <th  class="editMode">Eliminar</th>
           </tr>
           @foreach ($diagnosis->indications as $indication)
             <tr>
               <td>{{$indication->indicationType->name}}</td>
               <td>{{$indication->numberOfSesions}}</td>
               <td>{{$indication->aditionalDependance}}</td>
               <td>{{$indication->medic->person->surname}}, {{$indication->medic->person->name}}</td>
               <td  class="editMode"><button type="button" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i></button></td>
               <td  class="editMode"><button type="button" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></button></td>
             </tr>

            @endforeach
          </table>
          @endif
        </div>
      @endforeach

    </div>
  </div>
</div>

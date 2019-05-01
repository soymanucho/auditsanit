<div class="box box-gray collapsed-box">
  <div class="box-header with-border">
    <h3 class="box-title"><i class="fa fa-medkit"></i> {{$medicalService->service->serviceType->name}}
      @can ('audit-edit-expedient')
        <a  href="{!! route('reasign-auditor-medical-service',compact('medicalService')) !!}"  class="fancybox editButtonsModules btn btn-primary btn-xs">
          Reasignar Auditor
        </a>
        <a  href="{!! route('delete-medical-service',compact('medicalService')) !!}"  class="  editButtonsModules btn btn-primary btn-xs">
          Agregar horarios
        </a>
        <a  data-toggle="tooltip" title="Eliminar prestación" href="{!! route('delete-medical-service',compact('medicalService')) !!}" onclick="return confirm('Seguro que quiere eliminar esta prestación?')" class="  editButtonsModules btn btn-danger btn-xs">
          <i class="fa fa-trash btn btn-danger btn-xs"></i>
        </a>
      @endcan

    </h3>
    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
      </button>
    </div>
  </div>
   <!-- /.box-header -->
   <div class="box-body with-border">
     <strong><i class="fa fa-user-md"></i> Prestador: </strong>  {{$medicalService->service->vendor->address->street}} {{$medicalService->service->vendor->address->number}}
     <br>
     <strong><i class="fa fa-user-secret"></i> Auditor: </strong> {{$medicalService->auditor->person->name}} {{$medicalService->auditor->person->surname}}
     <br>
     <strong><i class="fa fa-user-secret"></i> Status: </strong> <span class="badge" style="background:{{$medicalService->status->color}}" >{{$medicalService->status->name}}</span>
     <br>
     <strong><i class="fa fa-clock-o"></i> Horarios del servicio: </strong>

     <br>
     <table class="table table-bordered table-hover display nowrap" style="width:100%">


        <tr>
          <th>Inicio</th>
          <th>Fin</th>
          {{-- <th class="editMode">Editar</th> --}}
          {{-- <th class="editMode">Eliminar</th> --}}
        </tr>

        @foreach ($medicalService->service->serviceSchedules as $serviceSchedule)
          <tr>
            <td>{{$serviceSchedule->initial_datetime}}</td>
            <td>{{$serviceSchedule->final_datetime}}</td>
            {{-- <td class="editMode"><button type="button" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i></button></td> --}}
            {{-- <td class="editMode"><button type="button" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></button></td> --}}

          </tr>
        @endforeach

     </table>
     @isset($medicalService->transportService)
       <strong><i class="fa  fa-ambulance"></i> Transporte: </strong>{{$medicalService->transportService->service->vendor->address->street}} {{$medicalService->transportService->service->vendor->address->number}}
       <br>
      <strong><i class="fa fa-clock-o"></i> Horarios del servicio: </strong>

       <table class="table table-bordered table-hover display nowrap" style="width:100%">
         <tr>
           <th>Inicio</th>
           <th>Fin</th>
           {{-- <th class="editMode">Editar</th> --}}
           {{-- <th class="editMode">Eliminar</th> --}}
         </tr>
         @foreach ($medicalService->transportService->service->serviceSchedules as $serviceSchedule)
           <tr>
             <td>{{$serviceSchedule->initial_datetime}}</td>
             <td>{{$serviceSchedule->final_datetime}}</td>
             {{-- <td class="editMode"><button type="button" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i></button></td> --}}
             {{-- <td class="editMode"><button type="button" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></button></td> --}}
           </tr>
         @endforeach
        </table>
     @endisset
   </div>
</div>

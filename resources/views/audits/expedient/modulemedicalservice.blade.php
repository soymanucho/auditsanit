<div class="box box-gray collapsed-box">
  <div class="box-header with-border">
    <h3 class="box-title"><i class="fa fa-medkit"></i> {{$medicalService->service->serviceType->name}}
      {{-- <button type="button" class="editMode btn btn-warning btn-xs"><i class="fa fa-edit"></i></button> --}}
      {{-- <button type="button" class="editMode btn btn-danger btn-xs"><i class="fa fa-trash"></i></button> --}}
    </h3>
    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
      </button>
    </div>
  </div>
   <!-- /.box-header -->
   <div class="box-body with-border">
     <strong><i class="fa fa-user-md"></i> Prestador: </strong> {{$medicalService->service->vendor->jury_person}} {{$medicalService->service->vendor->address->street}} {{$medicalService->service->vendor->address->number}}
     <br>
     <strong><i class="fa fa-user-secret"></i> Auditor: </strong> {{$medicalService->auditor->person->name}} {{$medicalService->auditor->person->surname}}
     <br>
     <strong><i class="fa fa-clock-o"></i> Horarios del servicio: </strong>
       <button type="button" class=" btn btn-success btn-xs"><i class="fa fa-plus"></i></button>
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
       <strong><i class="fa  fa-ambulance"></i> Transporte: </strong>{{$medicalService->transportService->service->vendor->jury_person}}{{$medicalService->transportService->service->vendor->address->street}} {{$medicalService->transportService->service->vendor->address->number}}
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

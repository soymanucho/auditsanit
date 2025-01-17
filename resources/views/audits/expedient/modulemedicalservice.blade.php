<div class="box box-gray collapsed-box">
  <div class="box-header with-border">
    @isset($medicalService->service->serviceType)
      <h3 class="box-title"><i class="fa fa-medkit"></i> {{$medicalService->service->serviceType->name}}
        @can ('audit-edit-expedient')
          <a  href="{!! route('reasign-auditor-medical-service',compact('medicalService')) !!}"  class="fancybox editButtonsModules btn btn-primary btn-xs">
            Reasignar Auditor
          </a>
          <a  href="{!! route('create-schedule-service',compact('medicalService')) !!}"  class="fancybox  editButtonsModules btn btn-primary btn-xs">
            Agregar horarios
          </a>
          <a  data-toggle="tooltip" title="Eliminar prestación" href="{!! route('delete-medical-service',compact('medicalService')) !!}" onclick="return confirm('Seguro que quiere eliminar esta prestación?')" class="  editButtonsModules btn btn-danger btn-xs">
            <i class="fa fa-trash btn btn-danger btn-xs"></i>
          </a>
        @endcan

      </h3>
    @endisset
    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
      </button>
    </div>
  </div>
   <!-- /.box-header -->
   <div class="box-body with-border">
     @isset($medicalService->service->vendor->address)
       <strong><i class="fa fa-user-md"></i> Prestador: </strong> {{$medicalService->service->vendor->name}}
       <br>
       <strong><i class="fa fa-home"></i> Dirección: </strong>  {{$medicalService->service->vendor->address->street}} {{$medicalService->service->vendor->address->number}} {{$medicalService->service->vendor->address->floor}}, {{$medicalService->service->vendor->address->location->name}}, {{$medicalService->service->vendor->address->location->province->name}}
       <br>
     @endisset
     @isset($medicalService->auditor->person)
       <strong><i class="fa fa-user-secret"></i> Auditor: </strong> {{$medicalService->auditor->person->name}} {{$medicalService->auditor->person->surname}}
       <br>
     @endisset
     <strong><i class="fa fa-user-secret"></i> Status: </strong> <span class="badge" style="background:{{$medicalService->status->color}}" >{{$medicalService->status->name}}</span>
     <br>
     @isset($medicalService->service->serviceSchedules)
       <strong><i class="fa fa-clock-o"></i> Horarios del servicio: </strong>

       <br>
       <table class="table table-bordered table-hover display nowrap" style="width:100%">


         <tr>
           <th>Inicio</th>
           <th>Fin</th>
           <th>Lunes</th>
           <th>Martes</th>
           <th>Miercoles</th>
           <th>Jueves</th>
           <th>Viernes</th>
           <th>Sabado</th>
           <th>Domingo</th>
           <th>Eliminar</th>

         </tr>

         @foreach ($medicalService->service->serviceSchedules as $serviceSchedule)
           <tr>
             <td>{{date('H:i', strtotime($serviceSchedule->initial_datetime))}}</td>
             <td>{{date('H:i', strtotime($serviceSchedule->final_datetime))}}</td>
             @if ($serviceSchedule->monday)  <td><b>SI</b></td> @else  <td>NO</td>  @endif
             @if ($serviceSchedule->tuesday)  <td><b>SI</b></td> @else  <td>NO</td>  @endif
             @if ($serviceSchedule->wednesday)  <td><b>SI</b></td> @else  <td>NO</td>  @endif
             @if ($serviceSchedule->thursday)  <td><b>SI</b></td> @else  <td>NO</td>  @endif
             @if ($serviceSchedule->friday)  <td><b>SI</b></td> @else  <td>NO</td>  @endif
             @if ($serviceSchedule->saturday)  <td><b>SI</b></td> @else  <td>NO</td>  @endif
             @if ($serviceSchedule->sunday)  <td><b>SI</b></td> @else  <td>NO</td>  @endif


             <td >  <a  data-toggle="tooltip" title="Eliminar horario" href="{!! route('delete-schedule-service',compact('serviceSchedule')) !!}" onclick="return confirm('Seguro que quiere eliminar este horario?')" class="  editButtonsModules btn btn-danger btn-xs">
               <i class="fa fa-trash btn btn-danger btn-xs"></i>
             </a></td>
             {{-- <td class="editMode"><button type="button" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></button></td> --}}

           </tr>
         @endforeach

       </table>
     @endisset
     @isset($medicalService->transportService)

      <strong><i class="fa  fa-ambulance"></i> Transporte: </strong> {{$medicalService->transportService->service->vendor->name}}
      @isset($medicalService->transportService->service->vendor->address)
        <br><strong><i class="fa  fa-home"></i> Direccion: </strong>{{$medicalService->transportService->service->vendor->address->street}} {{$medicalService->transportService->service->vendor->address->number}}
      @endisset
       <br>
       <strong><i class="fa  fa-ambulance"></i> Km/mes: </strong>{{$medicalService->transportService->km_per_month}}
       <br>
      <strong><i class="fa fa-clock-o"></i> Horarios del servicio: </strong>

       <table class="table table-bordered table-hover display nowrap" style="width:100%">
         <tr>
           <th>Inicio</th>
           <th>Fin</th>
           <th>Lunes</th>
           <th>Martes</th>
           <th>Miercoles</th>
           <th>Jueves</th>
           <th>Viernes</th>
           <th>Sabado</th>
           <th>Domingo</th>
           <th>Eliminar</th>

           {{-- <th class="editMode">Eliminar</th> --}}
         </tr>
         @foreach ($medicalService->transportService->service->serviceSchedules as $serviceSchedule)
           <tr>
             <td>{{date('H:i', strtotime($serviceSchedule->initial_datetime))}}</td>
             <td>{{date('H:i', strtotime($serviceSchedule->final_datetime))}}</td>
             @if ($serviceSchedule->monday)  <td><b>SI</b></td> @else  <td>NO</td>  @endif
             @if ($serviceSchedule->tuesday)  <td><b>SI</b></td> @else  <td>NO</td>  @endif
             @if ($serviceSchedule->wednesday)  <td><b>SI</b></td> @else  <td>NO</td>  @endif
             @if ($serviceSchedule->thursday)  <td><b>SI</b></td> @else  <td>NO</td>  @endif
             @if ($serviceSchedule->friday)  <td><b>SI</b></td> @else  <td>NO</td>  @endif
             @if ($serviceSchedule->saturday)  <td><b>SI</b></td> @else  <td>NO</td>  @endif
             @if ($serviceSchedule->sunday)  <td><b>SI</b></td> @else  <td>NO</td>  @endif
             <td >  <a  data-toggle="tooltip" title="Eliminar horario" href="{!! route('delete-schedule-service',compact('serviceSchedule')) !!}" onclick="return confirm('Seguro que quiere eliminar este horario?')" class="  editButtonsModules btn btn-danger btn-xs">
                 <i class="fa fa-trash btn btn-danger btn-xs"></i>
               </a></td>
           </tr>
         @endforeach
        </table>
     @endisset
   </div>
</div>

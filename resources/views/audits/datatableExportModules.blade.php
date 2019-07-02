@extends('layouts.datatable')

@section('header')

{{--1	Registro por auditoría	M.Cliente	M.TipoAuditoria	M.Beneficiario	M.Beneficiario	Calculo	M.Beneficiario	M.Diagnostico	M.Modulo	M.PrestacionApoyo	M.Prestadores	M.Prestadores	M.Modulo	Si | No	Calculo	dd/mm/aaaa	dd/mm/aaaa	Calculo	M.MedicoSolicitante	M.Coordinadores	M.Objetivos	M.Auditor	M.Modulos	M.PrestacionApoyo	Si | No	M.Modulos	Calculo	Calculo	M.Resultados	Campo Libre	Campo Libre --}}
    <th>N° auditoría</th>
    <th>Modulo autorizado</th>
    <th>Tipo de prestación apoyo</th>
    <th>Prestador</th>
    <th>Km/mes</th>
    <th>Domicilio prestación</th>
    <th>Costo modulo autorizado</th>
    <th>Informe</th>
    <th>Auditor designado</th>
    <th>Modulo recomendado</th>
    <th>Costo modulo recomendado</th>


@endsection

@section('body')
  @foreach($audits as $audit)
    @foreach ($audit->expedient->expedientModules as $expedientModule)
      @foreach ($expedientModule->medicalServices as $medicalService)


        @php
          $audit = $expedientModule->expedient->audit;
          $expedientModule = $medicalService->expedientModule;
          $service = $medicalService->service;
          $serviceType = $service->serviceType;
          if($serviceType->name == 'Transporte') {
             $transports = $service->transportServices;
          }

        @endphp

        <tr>
          <td> {{-- Nº auditoria --}} {{ $audit->id}} </td>
          <td>{{-- Modulo autorizado --}}
            @isset($expedientModule)
              {{$expedientModule->module->moduleType->name}} ({{$expedientModule->module->moduleCategory->name}})
            @endisset
          </td>
          <td>{{-- Tipo de prestación apoyo --}}
            @isset($serviceType)
               {{$serviceType->name}}
            @endisset
          </td>
          <td>{{-- Red prestacional --}}
            @isset($medicalService->service->vendor)
               {{$medicalService->service->vendor->name}}
            @endisset
          </td>

          <td>
            @isset($transports)
              @foreach ($transports as $transport)
                {{$transport->km_per_month}} <br>
              @endforeach
            @endisset
          </td>
          <td>{{-- Domicilio prestación --}}
              @isset($medicalService->service->vendor->address)
                - {{$medicalService->service->vendor->address->street}} {{$medicalService->service->vendor->address->number}} {{$medicalService->service->vendor->address->floor}}, {{$medicalService->service->vendor->address->location->name}}, {{$medicalService->service->vendor->address->street}} <br>
              @endisset
          </td>
          <td>{{-- Costo modulo autorizado --}}
            @isset($expedientModule)
              {{$expedientModule->price}}
            @endisset
          </td>

          <td>{{-- Informe --}}
              @isset($medicalService)
                 {{$medicalService->report}}
              @endisset
          </td>
          <td>{{-- Auditor designado --}}
            @isset($medicalService->auditor->person)
               {{$medicalService->auditor->person->surname}}, {{$medicalService->auditor->person->name}}
            @endisset
          </td>
          <td>{{-- Modulo recomendado --}}
            @isset($expedientModule->recommendedModule)
              {{$expedientModule->recommendedModule->moduleType->name}}({{$expedientModule->recommendedModule->moduleCategory->name}})
            @endisset
          </td>

          <td>{{-- Costo modulo recomendado --}}
            @isset($expedientModule->recommendedModule)
              {{$expedientModule->recommendedModule->price}}
            @endisset
          </td>



        </tr>
      @endforeach
    @endforeach
  @endforeach

@endsection

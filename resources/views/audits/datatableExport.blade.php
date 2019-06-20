@extends('layouts.datatable')

@section('header')

{{--1	Registro por auditoría	M.Cliente	M.TipoAuditoria	M.Beneficiario	M.Beneficiario	Calculo	M.Beneficiario	M.Diagnostico	M.Modulo	M.PrestacionApoyo	M.Prestadores	M.Prestadores	M.Modulo	Si | No	Calculo	dd/mm/aaaa	dd/mm/aaaa	Calculo	M.MedicoSolicitante	M.Coordinadores	M.Objetivos	M.Auditor	M.Modulos	M.PrestacionApoyo	Si | No	M.Modulos	Calculo	Calculo	M.Resultados	Campo Libre	Campo Libre --}}
    <th>N° auditoría</th>
    <th>Cliente</th>
    <th>Tipo de auditoría</th>
    <th>Apellido y Nombre afiliado</th>
    <th>Fecha de nacimiento</th>
    <th>Edad</th>
    <th>Domicilio</th>
    <th>Diagnostico</th>
    <th>Modulo autorizado</th>
    <th>Tipo de prestación apoyo</th>
    <th>Red prestacional</th>
    <th>Domicilio prestación</th>
    <th>Costo modulo autorizado</th>
    <th>Adicional por dependencia autorizado</th>
    <th>Costo dependencia autorizado</th>
    <th>Fecha de inicio de módulo</th>
    <th>Fecha de cese del módulo</th>
    <th>Costo total autorizado</th>
    <th>Medico solicitante</th>
    <th>Coordinador</th>
    <th>Objetivo</th>
    <th>Informe</th>
    <th>Auditor designado</th>
    <th>Modulo recomendado</th>
    <th>Tipo de prestacion apoyo recomendada</th>
    <th>Adicional por dependencia recomendado</th>
    <th>Costo modulo recomendado</th>
    <th>Costo dependencia recomendado</th>
    <th>Costo total recomendado</th>
    <th>Resultado auditoria</th>
    <th>Conclusiones auditoria</th>
    <th>Recomendaciones</th>

@endsection

@section('body')
  @foreach($audits as $audit)
    @foreach ($audit->expedient->expedientModules as $expedientModule)
      @php
        $audit = $expedientModule->expedient->audit;
      @endphp

      <tr>
        <td> {{-- Nº auditoria --}} {{ $audit->id}} </td>
        <td>{{-- Cliente --}}
          @isset($audit->expedient->client)
            {{ $audit->expedient->client->companyName }}
          @endisset
        </td>
        <td> {{-- Tipo de auditoria --}} Discapacidad </td>
        <td>{{-- Afiliado apellido y nombre --}}
          @isset($audit->expedient->patient->person)
            {{ $audit->expedient->patient->person->surname}}, {{ $audit->expedient->patient->person->name}}
          @endisset
        </td>
        <td>{{-- Fecha de nacimiento --}}
          @isset($audit->expedient->patient->person)
            {{ $audit->expedient->patient->person->birthdate}}
          @endisset
        </td>
        <td>{{-- Edad --}}
          @isset($audit->expedient->patient->person)
            {{  \Carbon\Carbon::now()->diffInYears($audit->expedient->patient->person->birthdate) }}
          @endisset
        </td>

        <td>{{-- Domicilio --}}
          @isset($audit->expedient->patient->person->address)
            {{$audit->expedient->patient->person->address->street}} {{$audit->expedient->patient->person->address->number}} {{$audit->expedient->patient->person->address->floor}}, @isset($audit->expedient->patient->person->address->location) {{$audit->expedient->patient->person->address->location->name}} - {{$audit->expedient->patient->person->address->location->province->name}} @endisset
          @endisset
        </td>
        <td>{{-- Diagnostico --}}
          @isset($audit->expedient->diagnoses)
            @foreach ($audit->expedient->diagnoses as $diagnosis)
              - {{$diagnosis->diagnosisType->name}} <br>
            @endforeach
          @endisset
        </td>
        <td>{{-- Modulo autorizado --}}
          @isset($expedientModule)
            {{-- @foreach ($audit->expedient->expedientModules as $expedientModule) --}}
              - {{$expedientModule->module->moduleType->name}} ({{$expedientModule->module->moduleCategory->name}}) <br>
            {{-- @endforeach --}}
          @endisset
        </td>
        <td>{{-- Tipo de prestación apoyo --}}
          N/A
        </td>
        <td>{{-- Red prestacional --}}
          @isset($expedientModule)
            {{-- @foreach ($audit->expedient->expedientModules as $expedientModule) --}}
              @foreach ($expedientModule->medicalServices as $medicalService)
                - {{$medicalService->service->vendor->name}} <br>
              @endforeach
            {{-- @endforeach --}}
          @endisset
        </td>
        <td>{{-- Domicilio prestación --}}
          @isset($expedientModule)
            {{-- @foreach ($audit->expedient->expedientModules as $expedientModule) --}}
              @foreach ($expedientModule->medicalServices as $medicalService)
                @isset($medicalService->service->vendor->address)
                  - {{$medicalService->service->vendor->address->street}} {{$medicalService->service->vendor->address->number}} {{$medicalService->service->vendor->address->floor}}, {{$medicalService->service->vendor->address->location->name}}, {{$medicalService->service->vendor->address->street}} <br>
                @endisset
              @endforeach
            {{-- @endforeach --}}
          @endisset
        </td>
        <td>{{-- Costo modulo autorizado --}}
          @isset($expedientModule)
            {{$expedientModule->price}}
          @endisset
        </td>
        <td>{{-- Adicional por dependencia autorizado --}}
          @isset($audit->expedient->indications)
            @foreach ($audit->expedient->indications as $indication)
              @if ($indication->aditionalDependence = 0)
                - No <br>
              @else
                - Si <br>
              @endif
            @endforeach
          @endisset
        </td>
        <td>{{-- Costo dependencia autorizado --}}

            0

        </td>
        <td>{{-- Fecha de inicio de módulo --}}

        </td>
        <td>{{-- Fecha de cese del módulo --}}

        </td>
        <td>{{-- Costo total autorizado --}}
          @isset($expedientModule)
            {{$expedientModule->price}}
          @endisset
        </td>
        <td>{{-- Medico solicitante --}}
          @isset($audit->expedient->indications)
            @foreach ($audit->expedient->indications as $indication)
              - {{$indication->medic->person->surname}}, {{$indication->medic->person->name}} <br>
            @endforeach
          @endisset
        </td>
        <td>{{-- Coordinador --}}
          Homero Giles
        </td>
        <td>{{--     <th>Objetivo</th> --}}
          @isset($audit->objectives)
            @foreach ($audit->objectives as $objective)
              - {{$objective->name}} <br>
            @endforeach
          @endisset
        </td>
        <td>{{-- Informe --}}
          @isset($expedientModule)
            @foreach ($expedientModule->medicalServices as $medicalService)
              @isset($medicalService->service->vendor->address)
                - {{$medicalService->report}} <br>
              @endisset
            @endforeach
          @endisset
        </td>
        <td>{{-- Auditor designado --}}
          @isset($expedientModule)
            @foreach ($expedientModule->medicalServices as $medicalService)
              @isset($medicalService->service->vendor->address)
                - {{$medicalService->auditor->person->surname}},{{$medicalService->auditor->person->name}} <br>
              @endisset
            @endforeach
          @endisset
        </td>
        <td>{{-- Modulo recomendado --}}
          @isset($expedientModule->recommendedModule)
            {{$expedientModule->recommendedModule->moduleType->name}}({{$expedientModule->recommendedModule->moduleCategory->name}})
          @endisset
        </td>
        <td>{{-- Tipo de prestacion apoyo recomendada --}}
          @isset($var)

          @endisset
        </td>
        <td>{{-- Adicional por dependencia recomendado --}}
          @isset($var)

          @endisset
        </td>
        <td>{{-- Costo modulo recomendado --}}
          @isset($expedientModule->recommendedModule)
            {{$expedientModule->recommendedModule->price}}
          @endisset
        </td>
        <td>{{-- Costo dependencia recomendado --}}
          0
        </td>
        <td>{{-- Costo total recomendado --}}
          @isset($expedientModule->recommendedModule)
            {{$expedientModule->recommendedModule->price}}
          @endisset
        </td>
        <td>{{-- Resultado auditoria --}}
            Sin Observaciones
        </td>
        <td>{{-- Conclusiones auditoria --}}
          @isset($audit->conclution)
            {{$audit->conclution}}
          @endisset
        </td>
        <td>{{-- Recomendaciones --}}
          @isset($audit->recommendations)
            @foreach ($audit->recommendations as $recommendation)
              - {{$recommendation->name}} <br>
            @endforeach
          @endisset
        </td>

      </tr>
      @endforeach
    @endforeach
@endsection

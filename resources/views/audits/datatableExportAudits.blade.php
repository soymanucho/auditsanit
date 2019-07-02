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
    <th>Conclusiones auditoria</th>


@endsection

@section('body')
  @foreach($audits as $audit)
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
        <td>{{-- Conclusiones auditoria --}}
          @isset($audit->conclution)
            {{$audit->conclution}}
          @endisset
        </td>
      </tr>
    @endforeach
@endsection

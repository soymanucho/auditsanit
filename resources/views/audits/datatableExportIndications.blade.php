@extends('layouts.datatable')

@section('header')

{{--1	Registro por auditoría	M.Cliente	M.TipoAuditoria	M.Beneficiario	M.Beneficiario	Calculo	M.Beneficiario	M.Diagnostico	M.Modulo	M.PrestacionApoyo	M.Prestadores	M.Prestadores	M.Modulo	Si | No	Calculo	dd/mm/aaaa	dd/mm/aaaa	Calculo	M.MedicoSolicitante	M.Coordinadores	M.Objetivos	M.Auditor	M.Modulos	M.PrestacionApoyo	Si | No	M.Modulos	Calculo	Calculo	M.Resultados	Campo Libre	Campo Libre --}}
    <th>N° auditoría</th>

    <th>Tipo de indicación</th>

    <th>Adicional por dependencia autorizado</th>
    <th>Cantidad de sesiones semanales</th>

    <th>Medico solicitante</th>


@endsection

@section('body')
  @foreach($audits as $audit)
    @foreach ($audit->expedient->indications as $indication)

      <tr>
        <td> {{-- Nº auditoria --}} {{ $audit->id}} </td>
        <td> {{-- Tipo de indicación --}}
          {{ $indication->indicationType->name}}
        </td>

        <td>{{-- Adicional por dependencia autorizado --}}
          @isset($indication)
              @if ($indication->aditionalDependence = 0)
                 No
              @else
                 Si
              @endif
          @endisset
        </td>

        <td>{{-- Medico solicitante --}}
          @isset($indication)
               {{$indication->numberOfSesions}}
          @endisset
        </td>
        <td>{{-- Medico solicitante --}}
          @isset($indication)
               {{$indication->medic->person->surname}}, {{$indication->medic->person->name}}
          @endisset
        </td>







      </tr>
    @endforeach
  @endforeach
@endsection

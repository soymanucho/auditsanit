@extends('layouts.datatable')

@section('header')

{{--1	Registro por auditoría	M.Cliente	M.TipoAuditoria	M.Beneficiario	M.Beneficiario	Calculo	M.Beneficiario	M.Diagnostico	M.Modulo	M.PrestacionApoyo	M.Prestadores	M.Prestadores	M.Modulo	Si | No	Calculo	dd/mm/aaaa	dd/mm/aaaa	Calculo	M.MedicoSolicitante	M.Coordinadores	M.Objetivos	M.Auditor	M.Modulos	M.PrestacionApoyo	Si | No	M.Modulos	Calculo	Calculo	M.Resultados	Campo Libre	Campo Libre --}}
    <th>N° auditoría</th>

    <th>Diagnostico</th>


@endsection

@section('body')
  @foreach($audits as $audit)
    @foreach ($audit->expedient->diagnoses as $diagnosis)

      <tr>
        <td> {{-- Nº auditoria --}} {{ $audit->id}} </td>

        <td>{{-- Diagnostico --}}
          @isset($diagnosis)
             {{$diagnosis->diagnosisType->name}}
          @endisset
        </td>

      </tr>
      @endforeach
    @endforeach
@endsection

@extends('layouts.datatable')

@section('header')

    <th>Auditoria #</th>
    <th>Prestación</th>
    <th>Prestador</th>
    <th>Direccion</th>
    <th class="text-center ">Accion</th>

    <th></th>




@endsection

@section('body')
  @foreach($medicalServices as $medicalService)
      <tr>
        <td>  {{ $medicalService->expedientModule->expedient->audit->id}} </td>
        <td>  {{ $medicalService->service->serviceType->name}} </td>
        <td>  {{ $medicalService->service->vendor->name}} </td>
        @isset($medicalService->service->vendor->address)
          <td>  {{ $medicalService->service->vendor->address->fullAddress()}} </td>
        @else
          <td>  Indefinido </td>
        @endisset
        <td class="text-center ">
          <a class="btn btn-success" href="{{ route('accept-asigned-service', compact('medicalService')) }}">Aceptar</a>
          <a class="btn btn-danger" href="{{ route('decline-asigned-service', compact('medicalService')) }}">Rechazar</a>
        </td>

        {{--  --}}

      </tr>
    @endforeach
@endsection

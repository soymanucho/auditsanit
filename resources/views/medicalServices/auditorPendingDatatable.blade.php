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
        <td>  {{ $medicalService->service->vendor->address->fullAddress()}} </td>
        <td class="text-center ">
          <a class="btn btn-success" href="{{ route('accept-asigned-service', compact('medicalService')) }}">Aceptar</a>
          <a class="btn btn-danger" href="{{ route('decline-asigned-service', compact('medicalService')) }}">Rechazar</a>
        </td>

        {{--  --}}

      </tr>
    @endforeach
@endsection

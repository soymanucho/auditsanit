@extends('layouts.datatable')

@section('header')

    <th>N° Auditoria</th>
    <th>Prestacion</th>
    <th>Auditor</th>
    <th>Estado</th>
    <th>Ultima modificación</th>







@endsection

@section('body')
  @foreach($medicalServices as $medicalService)
      <tr>
        <td>{{$medicalService->expedientModule->expedient->audit->id}}</td>
        <td>{{$medicalService->service->serviceType->name}}</td>
        <td>{{$medicalService->auditor->person->surname}}, {{$medicalService->auditor->person->name}}</td>
        <td><span class="badge" style="background:{{$medicalService->status->color}}"> {{$medicalService->status->name}}</span></td>
        <td>{{$medicalService->updated_at}}</td>
      </tr>
    @endforeach
@endsection

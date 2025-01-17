@extends('layouts.datatable')

@section('header')

    <th>N°</th>
    <th>Mes/Año</th>
    <th>Afiliado</th>
    <th>Estado</th>
    <th>Fecha de creacion</th>

    <th></th>




@endsection

@section('body')
  @foreach($audits as $audit)
      <tr>
        <td>  {{ $audit->id}} </td>
        <td>  {{ $audit->month}}/{{$audit->year}} </td>
        <td>
          @isset($audit->expedient->patient->person)
            {{ $audit->expedient->patient->person->surname}}, {{ $audit->expedient->patient->person->name}}
          @endisset
        </td>
        <td>
          @isset($audit->statuses->sortBy('created_at')->last()->name)
            @php
                $status = $audit->statuses->sortBy('created_at')->last();
            @endphp
             <span class="badge" style="background:{{ $status->color}}">{{ $status->id}}. {{ $status->name}}</span>
          @endisset
        </td>
          <td>  {{ $audit->created_at}} </td>
          @if ($roles->contains('Administrador') || $roles->contains('Backoffice') || $roles->contains('Auditor') || $roles->contains('Coordinador'))
            <td class="text-center"> <a  href="{{ route('audit-detail-patient', compact('audit')) }}"><b class="fa fa-eye "></b></a> </td>
          @endif

          @if ($roles->contains('Cliente') || $roles->contains('Cliente gerencial'))
            <td class="text-center"> <a  href="{{ route('audit-detail-resume', compact('audit')) }}"><b class="fa fa-eye  "></b></a> </td>
          @endif

      </tr>
    @endforeach
@endsection

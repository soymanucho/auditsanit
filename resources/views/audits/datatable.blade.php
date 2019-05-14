@extends('layouts.datatable')

@section('header')

    <th>N°</th>
    <th>Mes/Año</th>
    <th>Afiliado</th>
    <th>Estado</th>

    <th></th>




@endsection

@section('body')
  @foreach($audits as $audit)
      <tr>
        <td>  {{ $audit->id}} </td>
        <td>  {{ $audit->created_at->format('m')}}/{{ $audit->created_at->format('Y')}} </td>
        <td>
          @isset($audit->expedient->patient->person)
            {{ $audit->expedient->patient->person->surname}}, {{ $audit->expedient->patient->person->name}}
          @endisset
        </td>
        <td>
          @isset($audit->currentStatus()->name)
             <span class="badge" style="background:{{ $audit->currentStatus()->color}}">{{ $audit->currentStatus()->id}}. {{ $audit->currentStatus()->name}}</span>
          @endisset
        </td>
      
          @hasanyrole('Administrador|Backoffice|Auditor|Coordinador')
            <td class="text-center"> <a  href="{{ route('audit-detail-patient', compact('audit')) }}"><b class="fa fa-eye "></b></a> </td>
          @endhasanyrole
          @hasanyrole('Cliente|Cliente gerencial')
          <td class="text-center"> <a  href="{{ route('audit-detail-resume', compact('audit')) }}"><b class="fa fa-eye  "></b></a> </td>
          @endhasanyrole
        {{-- <td>  {{ $category->subcategory->name }} </td>
        <td>  {{ $category->products()->count()}} </td>
        <td>  {{ $category->products()->sum('stock')}} </td> --}}
        {{-- <td class="text-center">  <a href={!! route('edit-category',compact('category')) !!} ><b class="fa fa-edit "></b></a> </td> --}}

      </tr>
    @endforeach
@endsection

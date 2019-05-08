@extends('layouts.datatable')

@section('header')

    <th>N°</th>
    <th>Nombre</th>
    <th>Tipo</th>
    <th>Personería jurídica</th>
    <th>Categoría SNR</th>
    <th class="text-center" >Detalle</th>
    <th class="text-center" >Editar</th>
    <th class="text-center" >Eliminar</th>



@endsection

@section('body')
  @foreach($vendors as $vendor)
      <tr>
        <td>  {{ $vendor->id}} </td>
        <td>  {{ $vendor->name}} </td>
        <td>  {{ $vendor->vendorType->name}} </td>
        <td>
          @if ($vendor->jury_person == 0)
            <span class="badge" style="background:#ff5252">Persona física</span>
          @else
            <span class="badge" style="background:#3297e9">Jurídica</span>
          @endif
        </td>
        <td>  {{ $vendor->snr_category}} </td>
        <td class="text-center"> <a  href="{!! route('edit-vendors',compact('vendor')) !!}"><b class="fa fa-eye "></b></a> </td> {{-- {{ route('audit-detail', compact('audit')) }} --}}
        <td class="text-center"> <a  style="color: orange;" href="{!! route('edit-vendors',compact('vendor')) !!}"><b class="fa fa-edit "></b></a> </td>
        <td class="text-center"> <a  style="color: red;" href="{!! route('delete-vendors',compact('vendor')) !!}"><b class="fa fa-trash "></b></a> </td>
    @endforeach
@endsection

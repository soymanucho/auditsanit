@extends('layouts.datatable')

@section('header')
  <th>Nombre</th>
  <th>Color</th>
  <th class="text-center" >Es final</th>
  {{-- <th class="text-center" >Detalle</th> --}}
  <th class="text-center" >Editar</th>
  <th class="text-center" >Eliminar</th>
@endsection

@section('body')
  @foreach ($statuses as $status)
    <tr>
      <td>  {{ $status->name}} </td>
      <td style="background: {{ $status->color}};">  {{ $status->color}} </td>
      @if ($status->isFinal)
        <td>SI</td>
      @else
        <td>NO</td>
      @endif

      <td class="text-center"> <a  href="{!! route('edit-status',compact('status')) !!}"style="color: orange;" ><b class="fa fa-edit "></b></a> </td> {{-- {{ route('audit-detail', compact('audit')) }} --}}
      <td class="text-center"> <a  href="{!! route('delete-status',compact('status')) !!}"style="color: red;"href=""><b class="fa fa-trash "></b></a> </td> {{-- {{ route('audit-detail', compact('audit')) }} --}}

    </tr>
  @endforeach
@endsection

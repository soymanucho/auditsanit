@extends('layouts.datatable')

@section('header')

    <th>Nº</th>
    <th>Nombre</th>
    <th class="text-center" >Detalle</th>
    <th class="text-center" >Editar</th>
    <th class="text-center" >Eliminar</th>




@endsection

@section('body')
  @foreach($objectives as $objective)
      <tr>
        <td>  {{ $objective->id}} </td>
        <td>  {{ $objective->name}} </td>
          <td class="text-center"> <a  href=""><b class="fa fa-eye "></b></a> </td> {{-- {{ route('audit-detail', compact('audit')) }} --}}
          <td class="text-center"> <a  style="color: orange;" href="{!! route('edit-objectives',compact('objective')) !!}"><b class="fa fa-edit "></b></a> </td>
          <td class="text-center"> <a  style="color: red;" href="{!! route('delete-objectives',compact('objective')) !!}"><b class="fa fa-trash "></b></a> </td>

      </tr>
    @endforeach
@endsection

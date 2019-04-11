@extends('layouts.datatable')

@section('header')

    <th>N°</th>
    <th>Nombre</th>
    <th class="text-center" >Detalle</th>
    <th class="text-center" >Editar</th>
    <th class="text-center" >Eliminar</th>



@endsection

@section('body')
  @foreach($recommendations as $recommendation)
      <tr>
        <td>  {{ $recommendation->id}} </td>
        <td>  {{ $recommendation->name}} </td>
        <td class="text-center"> <a  href=""><b class="fa fa-eye "></b></a> </td>
        <td class="text-center"> <a  style="color: orange;"  href="{!! route('edit-recommendations',compact('recommendation')) !!}"><b class="fa fa-edit "></b></a> </td>
        <td class="text-center"> <a  style="color: red;"  href="{!! route('delete-recommendations',compact('recommendation')) !!}"><b class="fa fa-trash "></b></a> </td>


      </tr>
    @endforeach
@endsection

@extends('layouts.datatable')

@section('header')

    <th>Nombre</th>
    <th class="text-center" >Detalle</th>
    <th class="text-center" >Editar</th>
    <th class="text-center" >Eliminar</th>




@endsection

@section('body')
  @foreach($objectives as $objective)
      <tr>
        <td>  {{ $objective->name}} </td>
          <td class="text-center"> <a  href=""><b class="fa fa-eye "></b></a> </td> {{-- {{ route('audit-detail', compact('audit')) }} --}}
          <td class="text-center"> <a  style="color: orange;" href=""><b class="fa fa-edit "></b></a> </td> {{-- {{ route('audit-detail', compact('audit')) }} --}}
          <td class="text-center"> <a  style="color: red;"href=""><b class="fa fa-trash "></b></a> </td> {{-- {{ route('audit-detail', compact('audit')) }} --}}


      </tr>
    @endforeach
@endsection

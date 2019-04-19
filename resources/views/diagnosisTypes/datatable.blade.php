@extends('layouts.datatable')

@section('header')

    <th>N°</th>
    <th>Nombre</th>
    <th class="text-center" >Editar</th>
    <th class="text-center" >Eliminar</th>



@endsection

@section('body')
  @foreach($diagnosisTypes as $diagnosisType)
      <tr>
        <td>  {{ $diagnosisType->id}} </td>
        <td>  {{ $diagnosisType->name}} </td>
        <td class="text-center"> <a  style="color: orange;" href="{!! route('update-diagnosisType',compact('diagnosisType')) !!}"><b class="fa fa-edit "></b></a> </td>
        <td class="text-center"> <a  style="color: red;" href="{!! route('delete-diagnosisType',compact('diagnosisType')) !!}"><b class="fa fa-trash "></b></a> </td>

        {{-- <td>  {{ $category->subcategory->name }} </td>
        <td>  {{ $category->products()->count()}} </td>
        <td>  {{ $category->products()->sum('stock')}} </td> --}}
        {{-- <td class="text-center">  <a href={!! route('edit-category',compact('category')) !!} ><b class="fa fa-edit "></b></a> </td> --}}
        {{-- <td class="text-center fancybox" href="{{ route('detail-category', compact('category')) }}"> <a><b class="fa fa-eye "></b></a> </td> --}}
      </tr>
    @endforeach
@endsection

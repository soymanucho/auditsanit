@extends('layouts.datatable')

@section('header')

    <th>Nombre</th>
    <th>Apellido</th>
    <th>DNI</th>
    <th>Acciones</th>




@endsection

@section('body')
  @foreach($patients as $patient)
      <tr>
        <td>  {{ $patient->person->name}} </td>
        <td>  {{ $patient->person->surname}} </td>
        <td>  {{ $patient->person->dni}} </td>
        <td class="text-center"> <a  style="color: orange;" href="{!! route('edit-patients',compact('patient')) !!}"><b class="fa fa-edit "></b></a> </td>
        {{-- <td>  {{ $category->subcategory->name }} </td>
        <td>  {{ $category->products()->count()}} </td>
        <td>  {{ $category->products()->sum('stock')}} </td> --}}
        {{-- <td class="text-center">  <a href={!! route('edit-category',compact('category')) !!} ><b class="fa fa-edit "></b></a> </td> --}}
        {{-- <td class="text-center fancybox" href="{{ route('detail-category', compact('category')) }}"> <a><b class="fa fa-eye "></b></a> </td> --}}
      </tr>
    @endforeach
@endsection

@extends('layouts.datatable')

@section('header')

    <th>Nombre</th>
    <th>Apellido</th>
    <th>DNI</th>
    <th>Licensia</th>
    <th>Es Licensia Nacional</th>



@endsection

@section('body')
  @foreach($medics as $medic)
      <tr>
        <td>  {{ $medic->person->name}} </td>
        <td>  {{ $medic->person->surname}} </td>
        <td>  {{ $medic->person->dni}} </td>
        <td>  {{ $medic->license }} </td>
        <td>  {{ $medic->isNationalLicense }} </td>
        {{-- <td>  {{ $category->subcategory->name }} </td>
        <td>  {{ $category->products()->count()}} </td>
        <td>  {{ $category->products()->sum('stock')}} </td> --}}
        {{-- <td class="text-center">  <a href={!! route('edit-category',compact('category')) !!} ><b class="fa fa-edit "></b></a> </td> --}}
        {{-- <td class="text-center fancybox" href="{{ route('detail-category', compact('category')) }}"> <a><b class="fa fa-eye "></b></a> </td> --}}
      </tr>
    @endforeach
@endsection

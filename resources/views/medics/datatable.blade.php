@extends('layouts.datatable')

@section('header')

    <th>Nombre</th>
    <th>Apellido</th>
    <th>DNI</th>
    <th>Licencia</th>
    <th>Es Licencia Nacional</th>
    <th>Editar</th>
    <th>Eliminar</th>



@endsection

@section('body')
  @foreach($medics as $medic)
      <tr>
        <td>  {{ $medic->person->name}} </td>
        <td>  {{ $medic->person->surname}} </td>
        <td>  {{ $medic->person->dni}} </td>
        <td>  {{ $medic->license }} </td>
        <td>  @if ($medic->isNationalLicense)
                Si
              @else
                No
              @endif
        </td>
        <td class="text-center">  <a style="color: orange;" href={!! route('edit-medics',compact('medic')) !!} ><b class="fa fa-edit "></b></a> </td>
        <td class="text-center">  <a style="color: red;" href={!! route('delete-medics',compact('medic')) !!} ><b class="fa fa-trash "></b></a> </td>
        {{-- <td>  {{ $category->subcategory->name }} </td>
        <td>  {{ $category->products()->count()}} </td>
        <td>  {{ $category->products()->sum('stock')}} </td> --}}
      </tr>
    @endforeach
@endsection

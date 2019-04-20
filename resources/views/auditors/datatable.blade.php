@extends('layouts.datatable')

@section('header')

    <th>Nombre y Apellido</th>

    <th>Auditorias Terminadas</th>
    <th>Auditorias Pendientes</th>






@endsection

@section('body')
  @foreach($auditors as $auditor)
      <tr>
        <td>  {{ $auditor->person->name}}, {{ $auditor->person->surname}} </td>
        <td>  {{ $auditor->numberOfFinalAudits()}} </td>
        <td>  {{ $auditor->numberOfPendingAudits()}} </td>

        {{-- <td>  {{ $category->subcategory->name }} </td>
        <td>  {{ $category->products()->count()}} </td>
        <td>  {{ $category->products()->sum('stock')}} </td> --}}
        {{-- <td class="text-center">  <a href={!! route('edit-category',compact('category')) !!} ><b class="fa fa-edit "></b></a> </td> --}}
        {{-- <td class="text-center fancybox" href="{{ route('detail-category', compact('category')) }}"> <a><b class="fa fa-eye "></b></a> </td> --}}
      </tr>
    @endforeach
@endsection

@extends('layouts.datatable')

@section('header')

    <th>Nombre</th>
    <th>Apellido</th>
    <th>DNI</th>
    <th>E-mail</th>




@endsection

@section('body')
  @foreach($auditors as $auditor)
      <tr>
        <td>  {{ $auditor->person->name}} </td>
        <td>  {{ $auditor->person->surname}} </td>
        <td>  {{ $auditor->person->dni}} </td>
        <td> <a href="mailto:{{$auditor->user->email}}"> {{ $auditor->user->email}} </a></td>
        {{-- <td>  {{ $category->subcategory->name }} </td>
        <td>  {{ $category->products()->count()}} </td>
        <td>  {{ $category->products()->sum('stock')}} </td> --}}
        {{-- <td class="text-center">  <a href={!! route('edit-category',compact('category')) !!} ><b class="fa fa-edit "></b></a> </td> --}}
        {{-- <td class="text-center fancybox" href="{{ route('detail-category', compact('category')) }}"> <a><b class="fa fa-eye "></b></a> </td> --}}
      </tr>
    @endforeach
@endsection

@extends('layouts.datatable')

@section('header')

    <th>Título</th>
    <th>Paciente</th>
    <th>Auditores</th>
    <th></th>




@endsection

@section('body')
  @foreach($audits as $audit)
      <tr>
        <td>  {{ $audit->expedient->title}} </td>
        <td>  {{ $audit->expedient->patient->person->name}} </td>
        <td>
          @foreach ($audit->auditors() as $auditor)
            {{$auditor->person->name}} || 
          @endforeach
        </td>
          <td class="text-center"> <a  href="{{ route('audit-detail', compact('audit')) }}"><b class="fa fa-eye "></b></a> </td>
        {{-- <td>  {{ $category->subcategory->name }} </td>
        <td>  {{ $category->products()->count()}} </td>
        <td>  {{ $category->products()->sum('stock')}} </td> --}}
        {{-- <td class="text-center">  <a href={!! route('edit-category',compact('category')) !!} ><b class="fa fa-edit "></b></a> </td> --}}

      </tr>
    @endforeach
@endsection

@extends('layouts.datatable')

@section('header')

    <th>N°</th>
    <th>Título</th>
    <th>Estado</th>
    <th>Nº de comentarios</th>
    <th>Obra social</th>
    <th></th>




@endsection

@section('body')
  @foreach($audits as $audit)
      <tr>
        <td>  {{ $audit->id}} </td>
        <td>  {{ $audit->expedient->title}} </td>
        <td>
          @isset($audit->currentStatus()->name)
             <span class="badge" style="background:{{ $audit->currentStatus()->color}}">{{ $audit->currentStatus()->name}}</span>
          @endisset
        </td>
        <td>
        @isset($audit->comments)
          {{$audit->comments->count()}}
        @endisset
        </td>
        <td>
        @isset($audit->expedient->client->companyName)
          {{$audit->expedient->client->companyName}}
        @endisset
        </td>
          <td class="text-center"> <a  href="{{ route('audit-detail', compact('audit')) }}"><b class="fa fa-eye "></b></a> </td>
        {{-- <td>  {{ $category->subcategory->name }} </td>
        <td>  {{ $category->products()->count()}} </td>
        <td>  {{ $category->products()->sum('stock')}} </td> --}}
        {{-- <td class="text-center">  <a href={!! route('edit-category',compact('category')) !!} ><b class="fa fa-edit "></b></a> </td> --}}

      </tr>
    @endforeach
@endsection

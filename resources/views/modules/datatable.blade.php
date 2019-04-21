@extends('layouts.datatable')

@section('header')

<th>Tipo</th>
@foreach ($moduleCategories as $moduleCategory)
  <th class="text-right">{{ucwords($moduleCategory->name)}}</th>
@endforeach







@endsection

@section('body')
  @foreach($moduleTypes as $moduleType)
      <tr>
        <td>  {{ $moduleType->name}} </td>

        @foreach ($moduleCategories as $moduleCategory)

          @if (isset($matrix[$moduleType->id][$moduleCategory->id]))
            <th class="text-right" ><a data-toggle="tooltip" title="Click para editar" href="{!! route('edit-module',compact('moduleType','moduleCategory')) !!}">${{$matrix[$moduleType->id][$moduleCategory->id]}}</a></th>
            @else
                <th class="text-right">
                  <a style="color:grey" data-toggle="tooltip" title="Click para crear nuevo" href="{!! route('new-module',compact('moduleType','moduleCategory')) !!}"> No existe</a>
                </th>
          @endif


        @endforeach

        </tr>
    @endforeach
@endsection

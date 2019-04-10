@extends('layouts.datatable')

@section('header')

<th>Tipo</th>
@foreach ($moduleCategories as $moduleCategory)
  <th>{{ucwords($moduleCategory->name)}}</th>
@endforeach







@endsection

@section('body')
  @foreach($moduleTypes as $moduleType)
      <tr>
        <td>  {{ $moduleType->name}} </td>

        @foreach ($moduleCategories as $moduleCategory)
          <th>${{$matrix[$moduleType->id][$moduleCategory->id]}}</th>
        @endforeach

        </tr>
    @endforeach
@endsection

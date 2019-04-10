@extends('layouts.datatable')

@section('header')


<th>Nombre</th>

@endsection

@section('body')
  @foreach ($statuses as $status)
    <tr>
      <td>  {{ $status->name}} </td>
    </tr>
  @endforeach


@endsection

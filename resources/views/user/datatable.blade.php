@extends('layouts.datatable')

@section('header')

    <th>Nombre</th>
    <th>Email</th>
    <th>Rol</th>
    <th>Editar rol</th>




@endsection

@section('body')
  @foreach($users as $user)
      <tr>
        <td>  {{ $user->name}} </td>
        <td>  {{ $user->email}} </td>
        <td>
          @foreach ($user->getRoleNames() as $role)
              {{$role}} <br>
          @endforeach
         </td>
        <td class="text-center"> <a  style="color: orange;" href="{!! route('users-edit-role',compact('user')) !!}"><b class="fa fa-edit "></b></a> </td>

      </tr>
    @endforeach
@endsection

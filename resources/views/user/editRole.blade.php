@extends('layouts.app')

@section('title')
  Editando rol de usuario
@endsection


@section('content-header')
  <h1>Editando rol del usuario {{$user->id}}</h1>


@endsection

@section('content')

  <div class="panel-body">
    @include('errors.errors')
    <div class="box box-success">
      <div class="box-header with-border">
        <h3 class="box-title">Elegi un rol para el usuario {{$user->id}}  </h3>
        <a class="float-right btn btn-success btn-xs" href="{!! route('profile-edit',compact('user')) !!}">Ver más detalles del usuario</a>
      </div>
      <form method="POST" name='editRol'>
        {{ method_field('post') }}
        {{ csrf_field() }}
        <div class="box-body">
          <div class="form-group col-sm-12 col-md-6 col-lg-6">
            <label>Nombre</label>
            <input class="form-control input" name="name" disabled type="text" value="@isset($user->name){{old('name',$user->name)}}@endisset" placeholder="Juan">
          </div>
          <div class="form-group col-sm-12 col-md-6 col-lg-6">
            <label>Email</label>
            <input class="form-control input" name="email"  disabled type="text" value="@isset($user->email){{old('email',$user->email)}}@endisset" placeholder="Juan">
          </div>
          <div class="form-group col-sm-12 col-md-6 col-lg-6">
            <label for="role_id" class="col-sm-2 control-label">Rol</label>
            <select class="form-control select2" placeholder="Seleccioná un rol" name="role_id">
              <option></option>
              @foreach ($roles as $role)
                <option value="{{$role->id}}">{{$role->name}}</option>
              @endforeach
            </select>
          </div>

        </div>
        <div class="box-footer">
          <a class="btn btn-danger" href="{{ URL::previous()}}">Volver</a>
          <input class="btn btn-primary"type="submit" value="Guardar cambios" name="submit"/>
        </div>
      </form>

    </div>
  </div>




@endsection

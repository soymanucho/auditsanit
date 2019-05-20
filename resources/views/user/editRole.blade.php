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
            <input class="form-control input" name="name" disabled type="text" value="@isset($user->person){{old('name',$user->person->fullName())}}@endisset" placeholder="Juan">
          </div>
          <div class="form-group col-sm-12 col-md-6 col-lg-6">
            <label>Email</label>
            <input class="form-control input" name="email"  disabled type="text" value="@isset($user->email){{old('email',$user->email)}}@endisset" placeholder="Juan">
          </div>
          <div class="form-group col-sm-12 col-md-6 col-lg-6">
            <label for="role_id" class="col-sm-2 control-label">Rol</label>
            <select id="role" class="form-control select2" placeholder="Seleccioná un rol" name="role_id">
              <option></option>
              @foreach ($roles as $role)
                <option @if ($user->getRoleNames()->contains($role->name))
                  selected
                @endif value="{{old('role_id',$role->id)}}">{{$role->name}}</option>
              @endforeach
            </select>
          </div>

            <div id='client' class="form-group col-sm-12 col-md-6 col-lg-6">
              <label for="client_id" class="col-sm-2 control-label">Cliente</label>
              <select class="form-control select2" placeholder="Seleccioná un cliente" name="client_id">
                <option></option>
                @foreach ($clients as $client)
                  <option value="{{old('client_id',$client->id)}}">{{$client->companyName}}</option>
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


  <script type="text/javascript">


  $('#role').select2().trigger('change');


  $(document).ready(function(){

    // Initialize Select2
    //$('#role').select2();
  // document.getElementById("client").style.display = "none";
  var roleInput = document.getElementById("role");
  var clientInput = document.getElementById("client");
  if(roleInput.value==5 || roleInput.value==6)
    {
      console.log('es cliente');
      clientInput.style.display = "block";
    //  $('#client').select2();
    }
    else {
        console.log('no es cliente');
      clientInput.style.display = "none";
    }
    // Set option selected onchange
    $('#role').change(function(){


      var roleInput = document.getElementById("role");
      var clientInput = document.getElementById("client");
      if(roleInput.value==5 || roleInput.value==6)
        {
          console.log('es cliente');
          clientInput.style.display = "block";
        //  $('#client').select2();
        }
        else {
            console.log('no es cliente');
          clientInput.style.display = "none";
        }

    });
  });









  </script>

@endsection

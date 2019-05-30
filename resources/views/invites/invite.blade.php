@extends('layouts.app')

@section('title')
  Invitar a un nuevo usuario
@endsection

@section('breadcrumb-items')
  <li><a href="{!! route('home') !!}"><i class="fa "></i> Inicio</a></li>

@endsection

@section('content')


<div class="panel-body">
  @include('errors.errors')
  <div class="box box-success">
    <div class="box-header with-border">
      <h3 class="box-title">Invitar un nuevo usuario:</h3>
    </div>
    <form  method="POST" name='newInvite'>
      <div class="box-body">
        {{ method_field('post') }}
        {{ csrf_field() }}
        <div class="form-group col-sm-12 col-md-6 col-lg-6">
          <label for="name">Nombre:</label>
          <input class="form-control input" type="text" name="name" />
        </div>
        <div class="form-group col-sm-12 col-md-6 col-lg-6">
          <label for="name">Apellido:</label>
          <input class="form-control input" type="text" name="surname" />
        </div>
        <div class="form-group col-sm-12 col-md-6 col-lg-6">
          <label for="name">DNI:</label>
          <input class="form-control input" type="text" name="dni" />
        </div>
        <div class="form-group col-sm-12 col-md-6 col-lg-6">
          <label for="name">Email:</label>
          <input class="form-control input" type="email" name="email" />
        </div>
        <div class="form-group col-sm-12 col-md-6 col-lg-6">
          <label for="role_id" class="col-sm-2 control-label">Rol</label>
          <select id='role' class="form-control select2 role" placeholder="Seleccioná un rol" name="role_id">
            <option></option>
            @foreach ($roles as $role)
              <option value="{{$role->id}}">{{$role->name}}</option>
            @endforeach
          </select>
        </div>
        <div id='client' class="form-group col-sm-12 col-md-6 col-lg-6" >
          <label for="client_id" class="col-sm-2 control-label">Cliente</label>
          <select  class="form-control select2" placeholder="Seleccioná un cliente" name="client_id">
            <option></option>
            @foreach ($clients as $client)
              <option value="{{$client->id}}">{{$client->companyName}}</option>
            @endforeach
          </select>
        </div>
      </div>
      <div class="box-footer">
        <a class="btn btn-danger" href="{{ URL::previous()}}">Volver</a>
        <input class="btn btn-primary"type="submit" value="Enviar invitación" name="submit"/>
      </div>
    </form>
  </div>
</div>


<script type="text/javascript">


$('#role').select2().trigger('change');


$(document).ready(function(){

  // Initialize Select2
  //$('#role').select2();
document.getElementById("client").style.display = "none";
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

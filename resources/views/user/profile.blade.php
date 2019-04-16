@extends('layouts.app')

@section('title')
  Perfil
@endsection


@section('content-header')
  <h1>Perfil de {{$user->name}}</h1>


@endsection

@section('content')

  <div class="panel-body">
    @include('errors.errors')
    <div class="box box-success">
      <div class="box-header with-border">
        <h3 class="box-title">Editando el perfil</h3>
      </div>
      <form method="POST" class="form-horizontal" name='editProfile'>
        <div class="box-body">
          {{ csrf_field() }}
          {{ method_field('post') }}
          <div class="form-group">
            <label for="name" class="col-sm-2 control-label">Nombre</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="name" placeholder="Juan" value="{{$user->person->name}}">
            </div>
          </div>
          <div class="form-group">
            <label for="surname" class="col-sm-2 control-label">Apellido</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="surname" placeholder="Pérez" value="{{$user->person->surname}}">
            </div>
          </div>
          <div class="form-group">
            <label for="dni" class="col-sm-2 control-label">DNI</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="dni" placeholder="35.579.459" value="{{$user->person->dni}}">
            </div>
          </div>
          <div class="form-group">
            <label for="birthdate" class="col-sm-2 control-label">Fecha de nacimiento</label>
            <div class="col-sm-10">
              <input type="date" class="form-control" name="birthdate" value="{{$user->person->birthdate}}">
            </div>
          </div>
          <div class="form-group">
            <label for="email" class="col-sm-2 control-label">Email</label>
            <div class="col-sm-10">
              <input type="email" class="form-control" name="email" placeholder="hola@ejemplo.com" value="{{$user->email}}">
            </div>
          </div>
          <div class="form-group">
            <label for="profesion" class="col-sm-2 control-label">Profesión</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="profesion" placeholder="Médico" value="{{$user->person->profesion}}">
            </div>
          </div>
          <div class="form-group">
            <label for="cargo" class="col-sm-2 control-label">Cargo en la empresa</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="cargo" placeholder="Gerente" value="{{$user->person->cargo}}">
            </div>
          </div>
          <div class="form-group">
            <label for="matricula" class="col-sm-2 control-label">Matrícula</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="matricula" placeholder="5845" value="{{$user->person->matricula}}">
            </div>
          </div>
          <div class="form-group">
            <label for="tipoMatricula" class="col-sm-2 control-label">Tipo de Matrícula</label>
            <div class="col-sm-10">
              <select class="form-control" name="tipoMatricula">
                <option value="nacional">Nacional</option>
                <option value="provincial" >Provincial</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label for="telTrabajoInterno" class="col-sm-2 control-label">Teléfono laboral</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="telTrabajoInterno" placeholder="221 15 356 6554" value="{{$user->person->telTrabajoInterno}}">
            </div>
          </div>
          <div class="form-group">
            <label for="celular" class="col-sm-2 control-label">Teléfono celular</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="celular" placeholder="221 657 9876" value="{{$user->person->celular}}">
            </div>
          </div>


          <div class="form-group">
            <label for="street" class="col-sm-2 control-label">Calle</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="street" placeholder="Calle 50 e/7 y 8" value="{{$user->person->address->street}}">
            </div>
          </div>
          <div class="form-group">
            <label for="number" class="col-sm-2 control-label">Número</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="number" placeholder="5135" value="{{$user->person->address->number}}">
            </div>
          </div>
          <div class="form-group">
            <label for="floor" class="col-sm-2 control-label">Piso</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="floor" placeholder="8A" value="{{$user->person->address->floor}}">
            </div>
          </div>
          <div class="form-group">
            <label for="floor" class="col-sm-2 control-label">Localidad</label>
            <div class="col-sm-10">
              <select name="location_id" class="form-control" data-placeholder="Seleccioná una localidad" style="width: 100%;">
                @foreach ($locations as $location)
                  @if ($user->person->address->location->id = $location->id)
                    <option selected value="{{$location->id}}" >{{$location->name}}</option>
                  @endif
                  <option value="{{$location->id}}" >{{$location->name}}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="form-group">
            <label for="floor" class="col-sm-2 control-label">Provincia</label>
            <div class="col-sm-10">
              <select name="province_id" class="form-control" data-placeholder="Seleccioná una provincia" style="width: 100%;">
                @foreach ($provinces as $province)
                  <option value="{{$province->id}}" >{{$province->name}}</option>
                @endforeach
              </select>
            </div>
          </div>

          <div class="form-group">
            <label for="gender_id" class="col-sm-2 control-label">Género</label>
            <div class="col-sm-10">
              <select class="form-control" name="gender_id">
                @foreach ($genders as $gender)
                  <option value="{{$gender->id}}">{{$gender->name}}</option>
                @endforeach

              </select>
            </div>
          </div>

          <div class="form-group">
            <label for="password" class="col-sm-2 control-label">Contraseña</label>
            <div class="col-sm-10">
              <input type="password" class="form-control" name="password" placeholder="Contraseña">
            </div>
          </div>
          <div class="form-group">
            <label for="rpassword" class="col-sm-2 control-label">Repita la contraseña</label>
            <div class="col-sm-10">
              <input type="password" class="form-control" name="rpassword" placeholder="Repita la contraseña">
            </div>
          </div>
          <div class="box-footer">
            <a class="btn btn-danger" href="{{ URL::previous()}}">Volver</a>
            <input class="btn btn-primary" type="submit" value="Guardar cambios" name="submit"/>


          </div>
          {{-- <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
            </div>
          </div> --}}
        </div>
      </form>

    </div>
  </div>




@endsection

<div class="box-body">
  {{ csrf_field() }}

  <div class="form-group">
    <label for="name" class="col-sm-2 control-label">Nombre</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="name" placeholder="Juan" value="{{ old('name',$person->name)}}">
    </div>
  </div>
  <div class="form-group">
    <label for="surname" class="col-sm-2 control-label">Apellido</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="surname" placeholder="Pérez" value="{{ old('surname',$person->surname)}}">
    </div>
  </div>
  <div class="form-group">
    <label for="dni" class="col-sm-2 control-label">DNI</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="dni" placeholder="35.579.459" value="{{ old('dni',$person->dni)}}">
    </div>
  </div>
  <div class="form-group">
    <label for="birthdate" class="col-sm-2 control-label">Fecha de nacimiento</label>
    <div class="col-sm-10">
      <input type="date" class="form-control" name="birthdate" value="{{ old('birthdate',$person->birthdate)}}">
    </div>
  </div>
  <div class="form-group">
    <label for="email" class="col-sm-2 control-label">Email</label>
    <div class="col-sm-10">
      <input type="email" class="form-control" name="email" placeholder="hola@ejemplo.com" value="{{old('email',$user->email)}}">
    </div>
  </div>
  <div class="form-group">
    <label for="profesion" class="col-sm-2 control-label">Profesión</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="profesion" placeholder="Médico" value="{{ old('profesion',$person->profesion)}}">
    </div>
  </div>
  <div class="form-group">
    <label for="cargo" class="col-sm-2 control-label">Cargo en la empresa</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="cargo" placeholder="Gerente" value="{{ old('cargo',$person->cargo)}}">
    </div>
  </div>
  <div class="form-group">
    <label for="matricula" class="col-sm-2 control-label">Matrícula</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="matricula" placeholder="5845" value="{{ old('matricula',$person->matricula)}}">
    </div>
  </div>
  <div class="form-group">
    <label for="tipoMatricula" class="col-sm-2 control-label">Tipo de Matrícula</label>
    <div class="col-sm-10">
      <select class="form-control" name="tipoMatricula">
        @if ($person->nacional == true)
          <option selected value="nacional">Nacional</option>
          <option value="provincial" >Provincial</option>
        @else
          <option value="nacional">Nacional</option>
          <option selected value="provincial" >Provincial</option>
        @endif

      </select>
    </div>
  </div>
  <div class="form-group">
    <label for="telTrabajoInterno" class="col-sm-2 control-label">Teléfono laboral</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="telTrabajoInterno" placeholder="221 15 356 6554" value="{{ old('telTrabajoInterno',$person->telTrabajoInterno)}}">
    </div>
  </div>
  <div class="form-group">
    <label for="celular" class="col-sm-2 control-label">Teléfono celular</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="celular" placeholder="221 657 9876" value="{{ old('celular',$person->celular)}}">
    </div>
  </div>


  <div class="form-group">
    <label for="street" class="col-sm-2 control-label">Calle</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="street" placeholder="Calle 50 e/7 y 8" value="{{ old('street',$person->address->street)}}">
    </div>
  </div>
  <div class="form-group">
    <label for="number" class="col-sm-2 control-label">Número</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="number" placeholder="5135" value="{{ old('number',$person->address->number)}}">
    </div>
  </div>
  <div class="form-group">
    <label for="floor" class="col-sm-2 control-label">Piso</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="floor" placeholder="8A" value="{{ old('floor',$person->address->floor)}}">
    </div>
  </div>
  <div class="form-group">
    <label for="floor" class="col-sm-2 control-label">Localidad</label>
    <div class="col-sm-10">
      <select name="location_id" class="form-control" id="location_id" data-placeholder="Seleccioná una localidad" style="width: 100%;">
        @foreach ($locations as $location)
          <option
          @if ($person->address->location->id == $location->id)
             selected
          @endif
          value="{{$location->id}}" >{{$location->name}}</option>
        @endforeach
      </select>
    </div>
  </div>
  <div class="form-group">
    <label for="floor" class="col-sm-2 control-label">Provincia</label>
    <div class="col-sm-10">
      <select name="province_id" class="form-control" id="province_id" data-placeholder="Seleccioná una provincia" style="width: 100%;">

        @foreach ($provinces as $province)
          <option
          @if ($person->address->location->province->id == $province->id)
            selected
          @endif
          value="{{$province->id}}" >{{$province->name}}</option>
        @endforeach

      </select>
    </div>
  </div>

  <div class="form-group">
    <label for="gender_id" class="col-sm-2 control-label">Género</label>
    <div class="col-sm-10">
      <select class="form-control" name="gender_id" id="gender_id">

        @foreach ($genders as $gender)
          <option
          @if ($person->gender->id == $gender->id)
             selected
          @endif
          value="{{$gender->id}}">{{$gender->name}}</option>
        @endforeach
{{--    1	Femenino
        2	Masculino
        3	No binario --}}
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
@if ($function=="show")
  <script>

    $(document).ready(function () {
    $(":input")
        .prop("disabled", true);
    });
  </script>
@endif
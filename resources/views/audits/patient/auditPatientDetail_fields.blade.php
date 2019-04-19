

<div class="form-group col-sm-12 col-md-6 col-lg-2">
  <label>DNI</label>
  <input class="form-control input" name="dni" type="text" value="@isset($audit->expedient->patient->person->dni){{old('dni',$audit->expedient->patient->person->dni)}} @endisset" placeholder="25579513">
</div>
<div class="form-group col-sm-12 col-md-6 col-lg-5">
  <label>Nombre</label>
  <input class="form-control input" name="name" type="text" value="@isset($audit->expedient->patient->person->name){{old('name',$audit->expedient->patient->person->name)}}@endisset" placeholder="Juan">
</div>
<div class="form-group col-sm-12 col-md-6 col-lg-5">
  <label>Apellido</label>
  <input class="form-control input" type="text" name="surname" value="@isset($audit->expedient->patient->person->surname){{old('surname',$audit->expedient->patient->person->surname)}}@endisset" placeholder="Pérez">
</div>
<div class="form-group col-sm-12 col-md-6 col-lg-3">
  <label>Fecha de nacimiento</label>
  <div class="input-group">
    <div class="input-group-addon">
      <i class="fa fa-calendar"></i>
    </div>
    <input type="date" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" name="birthdate" data-mask value="@isset($audit->expedient->patient->person->birthdate){{old('birthdate',$audit->expedient->patient->person->birthdate)}}@endisset">
  </div>

</div>
<div class="form-group col-sm-12 col-md-6 col-lg-2">
  <label>Edad</label>
  <input type="text" class="form-control" name="age" value="@isset($audit->expedient->patient->person){{old('age',$audit->expedient->patient->person->age())}}@endisset">
</div>
<div class="form-group col-sm-12 col-md-6 col-lg-2">
  <label>Género</label>
  <input type="text" class="form-control" name="gender" value="@isset($audit->expedient->patient->person->gender->name){{old('gender',$audit->expedient->patient->person->gender->name)}}@endisset">
</div>

<div class="form-group col-sm-12 col-md-6 col-lg-3">
  <label>Calle</label>
  <input class="form-control input" name="street" type="text" value="@isset($audit->expedient->patient->person->address->street){{old('street',$audit->expedient->patient->person->address->street)}}@endisset">
</div>
<div class="form-group col-sm-12 col-md-6 col-lg-1">
  <label>Número</label>
  <input class="form-control input" name="number" type="text" value="@isset($audit->expedient->patient->person->address->number){{old('number',$audit->expedient->patient->person->address->number)}}@endisset">
</div>
<div class="form-group col-sm-12 col-md-6 col-lg-1">
  <label>Piso</label>
  <input class="form-control input" type="text" name="floor" value="@isset($audit->expedient->patient->person->address->floor){{old('floor',$audit->expedient->patient->person->address->floor)}}@endisset">
</div>
<div class="form-group col-sm-12 col-md-6 col-lg-4">
 <label>Localidad</label>
 <input class="form-control input" type="text" name="location" value="@isset($audit->expedient->patient->person->address->location){{old('floor',$audit->expedient->patient->person->address->location->name)}}@endisset">
</div>
<div class="form-group col-sm-12 col-md-6 col-lg-3">
 <label>Provincia</label>
 <input class="form-control input" type="text" name="province" value="@isset($audit->expedient->patient->person->address->location->province){{old('floor',$audit->expedient->patient->person->address->location->province->name)}}@endisset">

</div>
@if ($function=="show")
  <script>

    $(document).ready(function () {
    $(":input")
        .prop("disabled", true);
    });
  </script>
@endif

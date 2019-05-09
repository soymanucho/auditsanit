{{ csrf_field() }}


<div class="form-group col-sm-12 col-md-6 col-lg-4">
  <label for="name">Nombre</label>
  <input class="form-control input" type="text" name="name" id="name" value="{{ old('name',$medic->person->name)}}"/>
</div>
<div class="form-group col-sm-12 col-md-6 col-lg-4">
  <label for="surname">Apellido</label>
  <input class="form-control input" type="text" name="surname" id="surname" value="{{ old('surname',$medic->person->surname)}}"/>
</div>
<div class="form-group col-sm-12 col-md-6 col-lg-4">
  <label for="dni">DNI</label>
  <input class="form-control input" type="text" name="dni" id="dni" value="{{ old('dni',$medic->person->dni)}}"/>
</div>
<div class="form-group col-sm-12 col-md-6 col-lg-5">
  <label for="license">#Matrícula</label>
  <input class="form-control input" type="text" name="license" id="license" value="{{ old('license',$medic->license)}}"/>
</div>

<div class="form-group">
  <label for="isNationalLicense" class="col-sm-2 control-label">Tipo de Matrícula</label>
  <div class="col-sm-12 col-md-6 col-lg-7">
    <select class="form-control" name="isNationalLicense">
      @if ($medic->isNationalLicense == true)
        <option selected value="1">Nacional</option>
        <option value="0" >Provincial</option>
      @else
        <option value="1">Nacional</option>
        <option selected value="0" >Provincial</option>
      @endif

    </select>
  </div>
</div>

{{ csrf_field() }}

<div class="form-group col-sm-12 col-md-6 col-lg-2">
  <label>Obra social</label>
  <select class="form-control select2" name="client_id" data-placeholder="Seleccioná una obra social"
          style="width: 100%;">
          @foreach ($clients as $client)
            <option
            @isset($audit->expedient->client)
              @if ($client->id == $audit->expedient->client->id)
                selected
              @endif
            @endisset
            value="{{$client->id}}">{{$client->companyName}}</option>
          @endforeach
  </select>
</div>
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
  <label>Género</label>
  <select class="form-control select2" name="gender_id" data-placeholder="Seleccioná un genero"
          style="width: 100%;">
          @foreach ($genders as $gender)
            <option
            @isset($audit->expedient->patient->person->gender->id)
              @if ($gender->id == $audit->expedient->patient->person->gender->id)
                selected
              @endif
            @endisset
            value="{{$gender->id}}">{{$gender->name}}</option>
          @endforeach
  </select>
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
 <select class="form-control select2" name="location_id" data-placeholder="Seleccioná una localidad"
         style="width: 100%;">
         @foreach ($locations as $location)
           <option
           @isset($audit->expedient->patient->person->address->location)
             @if ($location->id == $audit->expedient->patient->person->address->location->id)
               selected
             @endif
           @endisset
           value="{{$location->id}}">{{$location->name}}</option>
         @endforeach
 </select>
</div>
<div class="form-group col-sm-12 col-md-6 col-lg-3">
 <label>Provincia</label>
 <select class="form-control select2" name="province_id" data-placeholder="Seleccioná una provincia"
         style="width: 100%;">
         @foreach ($provinces as $province)
           <option
           @isset($audit->expedient->patient->person->address->location->province)
             @if ($province->id == $audit->expedient->patient->person->address->location->province->id)
               selected
             @endif
           @endisset
           value="{{$province->id}}">{{$province->name}}</option>
         @endforeach

 </select>
</div>

{{ csrf_field() }}


<div class="form-group col-sm-12 col-md-6 col-lg-3">
  <label for="name">Nombre</label>
  <input class="form-control input" type="text" name="name" id="name" value="{{ old('name',$vendor->name)}}"/>
</div>
<div class="form-group col-sm-12 col-md-6 col-lg-3">
  <label for="snr_category">Categoría SNR</label>
  <input class="form-control input" type="text" name="snr_category" id="snr_category" value="{{ old('snr_category',$vendor->snr_category)}}"/>
</div>

<div class="form-group col-sm-12 col-md-6 col-lg-3">
  <label>Adic. por dep.</label>
  <select class="form-control select2" name="dependency_additional" style="width: 100%;">
    @isset($vendor->dependency_additional)
      @if ($vendor->dependency_additional == true)
        <option selected value="true">Si</option>
        <option value="false" >No</option>
      @else
        <option value="true">Si</option>
        <option selected value="false" >No</option>
      @endif
    @else
      <option value="true">Si</option>
      <option value="false" >No</option>
    @endisset

  </select>
</div>

<div class="form-group col-sm-12 col-md-6 col-lg-3">
  <label>Personería jurídica</label>
  <select class="form-control select2" name="jury_person" style="width: 100%;">
    @isset($person->nacional)
      @if ($person->nacional == true)
        <option selected value="true">Jurídica</option>
        <option value="false" >Persona Física</option>
      @else
        <option value="true">Jurídica</option>
        <option selected value="false" >Persona Física</option>
      @endif
    @else
      <option value="true">Jurídica</option>
      <option value="false" >Persona Física</option>
    @endisset
  </select>
</div>

<div class="form-group col-sm-12 col-md-6 col-lg-4">
  <label>Calle</label>
  <input class="form-control input" name="street" type="text" value="{{$vendor->address->street}}">
</div>

<div class="form-group col-sm-12 col-md-6 col-lg-4">
  <label>Número</label>
  <input class="form-control input" name="number" type="text" value="{{$vendor->address->number}}">
</div>

<div class="form-group col-sm-12 col-md-6 col-lg-4">
  <label>Piso</label>
  <input class="form-control input" type="text" name="floor" value="{{$vendor->address->floor}}">
</div>

<div class="form-group col-sm-12 col-md-6 col-lg-4">
 <label>Localidad</label>
 <select class="form-control select2" name="location_id" data-placeholder="Seleccioná una localidad" style="width: 100%;">
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

<div class="form-group col-sm-12 col-md-6 col-lg-4">
 <label>Provincia</label>
 <select class="form-control select2" name="province_id" data-placeholder="Seleccioná una provincia" style="width: 100%;">
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

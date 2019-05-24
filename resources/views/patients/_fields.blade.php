{{ csrf_field() }}


<div class="form-group col-sm-12 col-md-6 col-lg-2">
  <label>DNI</label>
  <input class="form-control input" name="dni" type="text" value="@isset($patient->person->dni){{old('dni',$patient->person->dni)}} @endisset" placeholder="25579513">
</div>
<div class="form-group col-sm-12 col-md-6 col-lg-5">
  <label>Nombre</label>
  <input class="form-control input" name="name" type="text" value="@isset($patient->person->name){{old('name',$patient->person->name)}}@endisset" placeholder="Juan">
</div>
<div class="form-group col-sm-12 col-md-6 col-lg-5">
  <label>Apellido</label>
  <input class="form-control input" type="text" name="surname" value="@isset($patient->person->surname){{old('surname',$patient->person->surname)}}@endisset" placeholder="Pérez">
</div>
<div class="form-group col-sm-12 col-md-6 col-lg-3">
  <label>Fecha de nacimiento</label>
  <div class="input-group">
    <div class="input-group-addon">
      <i class="fa fa-calendar"></i>
    </div>
    <input type="date" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" name="birthdate" data-mask value="@isset($patient->person->birthdate){{old('birthdate',$patient->person->birthdate)}}@endisset">
  </div>

</div>
<div class="form-group col-sm-12 col-md-6 col-lg-2">
  <label>Género</label>
  <select class="form-control select2" name="gender_id" data-placeholder="Seleccioná un genero"
          style="width: 100%;">
          @foreach ($genders as $gender)
            <option
            @isset($patient->person->gender->id)
              @if ($gender->id == $patient->person->gender->id)
                selected
              @endif
            @endisset
            value="{{$gender->id}}">{{$gender->name}}</option>
          @endforeach
  </select>
</div>

<div class="form-group col-sm-12 col-md-6 col-lg-3">
  <label>Calle</label>
  <input class="form-control input" name="street" type="text" value="@isset($patient->person->address->street){{old('street',$patient->person->address->street)}}@endisset">
</div>
<div class="form-group col-sm-12 col-md-6 col-lg-1">
  <label>Número</label>
  <input class="form-control input" name="number" type="text" value="@isset($patient->person->address->number){{old('number',$patient->person->address->number)}}@endisset">
</div>
<div class="form-group col-sm-12 col-md-6 col-lg-1">
  <label>Piso</label>
  <input class="form-control input" type="text" name="floor" value="@isset($patient->person->address->floor){{old('floor',$patient->person->address->floor)}}@endisset">
</div>

<div class="form-group col-sm-12 col-md-6 col-lg-3">
 <label>Provincia</label>
 <select class="form-control select2" name="province_id" id="province_id"  data-placeholder="Seleccioná una provincia"
         style="width: 100%;">
         @foreach ($provinces as $province)
           <option
           @isset($patient->person->address->location->province)
             @if ($province->id == $patient->person->address->location->province->id)
               selected
             @endif
           @endisset
           value="{{$province->id}}">{{$province->name}}</option>
         @endforeach

 </select>
</div>

<div class="form-group col-sm-12 col-md-6 col-lg-4" >
 <label>Localidad</label>
 <select class="form-control select2" name="location_id" id="location_id" data-placeholder="Seleccioná una localidad"
         style="width: 100%;">

         @foreach ($locations as $location)
           @if ($location->province->id == $patient->person->address->location->province->id)
             <option
             @isset($patient->person->address->location)
               @if ($location->id == $patient->person->address->location->id)
                 selected
               @endif
             @endisset
             value="{{$location->id}}">{{$location->name}}</option>
           @endif
         @endforeach
 </select>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){

  $.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
  $('#province_id').change('click',function() {

    var province = $(this).children("option:selected").val();
    var $selectLocations = $('#location_id');
    $("#location_id").select2("close");
    $selectLocations.empty();
    $.ajax({
      type:"GET",
      url: "/localidades/get", success: function(result){
      // $("#location_id").html(result);
      $selectLocations.append('<option></option>');
      $.each(JSON.parse(result),function (key,value) {
        if (value.province_id == province) {
          $selectLocations.append('<option value=' + value.id+ '>' + value.name  + '</option>');
        }
      });

      $("#location_id").select2("open");
      //
      // $("#location_id").select2();
    }});


  });
});
</script>

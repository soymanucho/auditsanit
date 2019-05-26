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
  <label>Personería jurídica</label>
  <select class="form-control select2" name="jury_person" style="width: 100%;">
    @isset($vendor->jury_person)
      @if ($vendor->jury_person == true)
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

<div class="form-group col-sm-12 col-md-6 col-lg-3">
  <label>Calle</label>
  <input class="form-control input" name="street" type="text" value="{{$vendor->address->street}}">
</div>

<div class="form-group col-sm-12 col-md-6 col-lg-3">
  <label>Número</label>
  <input class="form-control input" name="number" type="text" value="{{$vendor->address->number}}">
</div>

<div class="form-group col-sm-12 col-md-6 col-lg-3">
  <label>Piso</label>
  <input class="form-control input" type="text" name="floor" value="{{$vendor->address->floor}}">
</div>

<div class="form-group col-sm-12 col-md-6 col-lg-3">
 <label>Provincia</label>
 <select class="form-control select2" name="province_id" id="province_id" data-placeholder="Seleccioná una provincia" style="width: 100%;">
         @foreach ($provinces as $province)
           <option
           @isset($vendor->address->location->province)
             @if ($province->id == $vendor->address->location->province->id)
               selected
             @endif
           @endisset
           value="{{$province->id}}">{{$province->name}}</option>
         @endforeach

 </select>
</div>

<div class="form-group col-sm-12 col-md-6 col-lg-3">
 <label>Localidad</label>
 <select class="form-control select2" name="location_id" id="location_id" data-placeholder="Seleccioná una localidad" style="width: 100%;">
         @foreach ($provinces as $province)
           @foreach ($province->locations as $location)

           @if ($vendor->address->location->province->id == $location->province->id)
             <option
             @isset($vendor->address->location)
               @if ($location->id == $vendor->address->location->id)
                 selected
               @endif
             @endisset
             value="{{$location->id}}">{{$location->name}}</option>
           @endif
         @endforeach
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

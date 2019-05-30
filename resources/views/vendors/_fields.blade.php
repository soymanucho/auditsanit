{{ csrf_field() }}


<div class="form-group col-sm-12 col-md-6 col-lg-3">
  <label for="name">Nombre</label>
  <input class="form-control input" type="text" name="name" id="name" value="@isset($vendor->name) {{ old('name',$vendor->name)}}@endisset"/>
</div>
<div class="form-group col-sm-12 col-md-6 col-lg-3">
  <label for="snr_category">Categoría SNR</label>
  <input class="form-control input" type="text" name="snr_category" id="snr_category" value="@isset($vendor->snr_category){{ old('snr_category',$vendor->snr_category)}}@endisset"/>
</div>

<div class="form-group col-sm-12 col-md-6 col-lg-3">
  <label>Personería jurídica</label>
  <select class="form-control select2" name="jury_person" style="width: 100%;">
    @isset($vendor->jury_person)
      @if ($vendor->jury_person == true)
        <option selected value="1">Jurídica</option>
        <option value="0" >Persona Física</option>
      @else
        <option value="1">Jurídica</option>
        <option selected value="0" >Persona Física</option>
      @endif
    @else
      <option value="1">Jurídica</option>
      <option value="0" >Persona Física</option>
    @endisset
  </select>
</div>

<div class="form-group col-sm-12 col-md-6 col-lg-3">
  <label>Calle</label>
  <input class="form-control input" name="street" type="text" value="@isset($vendor->address)
    {{$vendor->address->street}}
  @endisset">
</div>

<div class="form-group col-sm-12 col-md-6 col-lg-3">
  <label>Número</label>
  <input class="form-control input" name="number" type="text" value="@isset($vendor->address)
    {{$vendor->address->number}}
  @endisset">
</div>

<div class="form-group col-sm-12 col-md-6 col-lg-3">
  <label>Piso</label>
  <input class="form-control input" type="text" name="floor" value="@isset($vendor->address)
    {{$vendor->address->floor}}
  @endisset">
</div>

<div class="form-group col-sm-12 col-md-6 col-lg-3">
 <label>Provincia</label>
 <select class="form-control select2" name="province_id" id="province_id" data-placeholder="Seleccioná una provincia" style="width: 100%;">
         @foreach ($provinces as $province)
           <option @isset($vendor->address->location)
             @if ($province->id == $vendor->address->location->province->id) selected @endif
           @endisset  value="{{$province->id}}">{{$province->name}}</option>
         @endforeach
 </select>
</div>

<div class="form-group col-sm-12 col-md-6 col-lg-3">
 <label>Localidad</label>
 <select class="form-control select2" name="location_id" id="location_id" data-placeholder="Seleccioná una localidad" style="width: 100%;">
         @foreach ($provinces as $province)
           @foreach ($province->locations as $location)
               <option @isset($vendor->address->location)
                 @if ($location->id == $vendor->address->location->id) selected @endif
               @endisset value="{{$location->id}}">{{$location->name}}</option>
           @endforeach
         @endforeach
 </select>
</div>
<div class="form-group col-sm-12 col-md-6 col-lg-3">
 <label>Tipo de prestador</label>
 <select class="form-control select2" name="vendor_type_id" id="vendor_type_id" data-placeholder="Seleccioná un tipo" style="width: 100%;">
         @foreach ($vendorTypes as $vendorType)
           <option @isset($vendor->vendor_type_id)
              @if ($vendorType->id == $vendor->vendor_type_id) selected @endif
           @endisset value="{{$vendorType->id}}">{{$vendorType->name}}</option>
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

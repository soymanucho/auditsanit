


{{ csrf_field() }}


<div class="form-group form-group col-sm-12 col-md-12 col-lg-12">
  <label for="name">Servicio: </label>
  <select class="form-control select2" name="service_id" id="service_id" data-placeholder="Seleccioná un servicio"
          style="width: 100%;">
          <option value=""></option>
          @foreach ($services as $service)
            <option value="{{$service->id}}">{{$service->serviceType->name}} </option>
          @endforeach
  </select>
</div>

<div class="form-group form-group col-sm-12 col-md-6 col-lg-6">
<label for="name">Desde: </label>
<input  type="time" value="{{date("H:i")}}" name="initial_datetime" class="form-control ">
</div>

<div class="form-group form-group col-sm-12 col-md-6 col-lg-6">
<label for="name">Hasta: </label>
<input  type="time" value="{{date("H:i")}}" name="final_datetime"  class="form-control ">
</div>
<div class="form-group form-group col-sm-12 col-md-6 col-lg-6">
<label for="name">Dias: </label>
<br>
<label><input type="checkbox" id="monday" name="monday" value="1"> Lunes</label><br>
<label><input type="checkbox" id="tuesday" name="tuesday"  value="1"> Martes</label><br>
<label><input type="checkbox" id="wednesday" name="wednesday" value="1"> Miercoles</label><br>
<label><input type="checkbox" id="thursday" name="thursday" value="1"> Jueves</label><br>
<label><input type="checkbox" id="friday" name="friday" value="1"> Viernes</label><br>
<label><input type="checkbox" id="saturday" name="saturday" value="1"> Sabado</label><br>
<label><input type="checkbox" id="sunday" name="sunday" value="1"> Domingoo</label><br>
</div>



<script type="text/javascript">
$('.select2').select2({
  placeholder: 'Select an option',
  theme: "classic",
  dropdownParent:$("#father"),


  });
</script>

<script type="text/javascript">
    $(".form_datetime").datetimepicker({format: 'YYYY-MM-DD hh:mm:00'});
</script>

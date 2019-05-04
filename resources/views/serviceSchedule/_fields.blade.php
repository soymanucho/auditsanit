{{ csrf_field() }}

<style media="screen">
  .select2-dropdown { z-index: 9999 }
</style>

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
  <input type="datetime" class="form-control" >
</div>

<div class="form-group form-group col-sm-12 col-md-6 col-lg-6">
  <label for="name">Hasta: </label>
<input type="datetime" class="form-control" >
</div>


<script type="text/javascript">
$('.select2').select2({
  placeholder: 'Select an option',
  theme: "classic",
  dropdownParent:$("#father"),


  });
</script>

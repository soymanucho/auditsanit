{{ csrf_field() }}

<style media="screen">
  .select2-dropdown { z-index: 9999 }
</style>

<div class="form-group form-group col-sm-12 col-md-12 col-lg-12">
  <label for="name">Módulo: </label>
  <select class="form-control select2" name="module_id" id="module_id" data-placeholder="Seleccioná un módulo"
          style="width: 100%;">
          <option value=""></option>
          @foreach ($modules as $module)
            <option value="{{$module->id}}">{{$module->moduleType->name}} - {{$module->moduleCategory->name}}</option>
          @endforeach
  </select>
</div>


<script type="text/javascript">
$('.select2').select2({
  placeholder: 'Select an option',
  theme: "classic",
  dropdownParent:$("#father"),


  });
</script>

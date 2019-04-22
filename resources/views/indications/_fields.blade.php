{{ csrf_field() }}

<style media="screen">
  .select2-dropdown { z-index: 9999 }
</style>

<div class="form-group form-group col-sm-12 col-md-6 col-lg-6">
  <label for="name">Indicación:</label>
  <select class="form-control select2" name="client_id" id="client_id" data-placeholder="Seleccioná una indicacion"
          style="width: 100%;">
          <option value=""></option>
          @foreach ($indicationTypes as $indicationType)
            <option value="{{$indicationType->id}}">{{$indicationType->name}}</option>
          @endforeach
  </select>
</div>


<div class="form-group form-group col-sm-12 col-md-6 col-lg-6" >
  <label for="name">Medico:</label>
  <select class="form-control select2"  name="client_id" id="client_id" data-placeholder="Seleccioná un médico"
          style="width: 100%;">
          <option value=""></option>
          @foreach ($medics as $medic)
            <option value="{{$medic->id}}">{{$medic->person->surname}}, {{$medic->person->name}} - [{{$medic->person->dni}}]</option>
          @endforeach
  </select>
</div>

<div class="form-group form-group col-sm-12 col-md-6 col-lg-6">
  <label for="name"># Sesiones:</label>
  <input type="number" min="0" step="1"class="form-control"name="name" id="name" value="{{ old('name',$indication->numberOfSesions)}}"/>
</div>

<div class="form-group form-group col-sm-12 col-md-6 col-lg-6">
    <label for="isFinal">Adicional por dependencia?:</label>
    <br>
    SI
    <input type="radio" name="aditionalDependance" id="aditionalDependance" value="1"
    @if (old('isFinal',$indication->aditionalDependance))
      checked
    @endif/>
    NO
    <input type="radio" name="aditionalDependance" id="aditionalDependance" value="0"
    @if (!old('isFinal',$indication->aditionalDependance))
      checked
    @endif/>


</div>

<script type="text/javascript">
$('.select2').select2({
  placeholder: 'Select an option',
  theme: "classic",
  dropdownParent:$("#father")

  });
</script>

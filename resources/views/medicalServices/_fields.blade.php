{{ csrf_field() }}

<style media="screen">
  .select2-dropdown { z-index: 9999 }
</style>

<div class="form-group form-group col-sm-12 col-md-12 col-lg-12">
  <label for="auditor_id">Auditor:</label>
  <select class="form-control select2" name="auditor_id" id="auditor_id" data-placeholder="Seleccioná un auditor"
          style="width: 100%;">
          <option value=""></option>
          @foreach ($auditors as $auditor)
            <option value="{{$auditor->id}}">{{$auditor->person->surname}}, {{$auditor->person->name}}</option>
          @endforeach
  </select>

</div>

<div class="form-group form-group col-sm-12 col-md-6 col-lg-6">
  <label for="service_id">Prestador:</label>
  <select class="form-control select2" name="service_id" id="service_id" data-placeholder="Seleccioná un prestador"
          style="width: 100%;">
          <option value=""></option>
          @foreach ($medicVendors as $medicVendor)
            <option value="{{$medicVendor->id}}">{{$medicVendor->name}}</option>
          @endforeach
  </select>
</div>



<div class="form-group form-group col-sm-12 col-md-6 col-lg-6">
  <label for="medical_service_type_id">Tipo de prestacion:</label>
  <select class="form-control select2" name="medical_service_type_id" id="medical_service_type_id" data-placeholder="Seleccioná un tipo de prestacion"
          style="width: 100%;">
          <option value=""></option>
          @foreach ($medicalServiceTypes as $medicalServiceType)
            <option value="{{$medicalServiceType->id}}">{{$medicalServiceType->name}}</option>
          @endforeach
  </select>
</div>

<div class="form-group form-group col-sm-12 col-md-6 col-lg-6">
  <label for="transport_service_id">Transportista:</label>
  <select class="form-control select2" name="transport_service_id" id="transport_service_id" data-placeholder="Seleccioná un transportista (opcional)"
          style="width: 100%;">
          <option value=""></option>
          @foreach ($transportVendors as $transportVendor)
            <option value="{{$transportVendor->id}}">{{$transportVendor->name}}</option>
          @endforeach
  </select>
</div>

<div class="form-group form-group col-sm-12 col-md-6 col-lg-6">
  <label for="transport_service_type_id">Tipo de transporte:</label>
  <select class="form-control select2" name="transport_service_type_id" id="transport_service_type_id" data-placeholder="Seleccioná un tipo de prestacion (opcional)"
          style="width: 100%;">
          <option value=""></option>
          @foreach ($transportServiceTypes as $transportServiceType)
            <option value="{{$transportServiceType->id}}">{{$transportServiceType->name}}</option>
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

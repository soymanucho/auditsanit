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

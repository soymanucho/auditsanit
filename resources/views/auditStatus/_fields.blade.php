{{ csrf_field() }}

<div class="form-group col-sm-12 col-md-6 col-lg-6">
  <label>Auditoria</label>
  <select class="form-control select2" name="audit_id" data-placeholder="Seleccioná una auditoria"
          style="width: 100%;">
          <option value=""></option>
          @foreach ($audits as $audit)
            <option
            {{ (old("audit_id") == $audit->id ? "selected":"") }}
            value="{{$audit->id}}">{{$audit->id}}</option>
          @endforeach
  </select>
</div>

<div class="form-group col-sm-12 col-md-6 col-lg-6">
  <label>Estado</label>
  <select class="form-control select2" name="status_id" data-placeholder="Seleccioná un estado"
          style="width: 100%;">
          <option value=""></option>
          @foreach ($statuses as $status)
            <option
              {{ (old("status_id") == $status->id ? "selected":"") }}
            value="{{$status->id}}">{{$status->name}}</option>
          @endforeach
  </select>
</div>

<div class="box-body">
  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Diagnosticos
        @can ('audit-edit-expedient')
          <button id='toggleDiagnosisEdition'type="button" class="btn btn-warning btn-xs">Habilitar Edicion</button>
        @endcan
      </h3>
      @include('errors.errors')
     <!-- /.box-header -->

      <div class="box-body">
        <form class="" action="" method="post">
          {{ csrf_field() }}
          <div class="row">
            <div class="form-group  col-sm-12 col-md-6 col-lg-6">
              <select id='diagnosisSelector' name ='diagnosisTypes[]'class="form-control select2 inputDiagnosisEdit" multiple="multiple" data-placeholder="Seleccioná un diagnostico"
                style="width: 100%;">
                  @foreach ($diagnosesType as $diagnosisType)
                  <option value="{{$diagnosisType->id}}"
                  @isset($audit->expedient->diagnoses)
                    @foreach ($audit->expedient->diagnoses as $diagnosis)
                      @if ($diagnosis->diagnosisType->id == $diagnosisType->id)
                        selected="selected"
                      @endif
                    @endforeach
                  @endisset
                  >{{$diagnosisType->name}}</option>
                  @endforeach
              </select>
            </div>
            @can ('audit-edit-expedient')
               <div class="form-group  col-sm-12 col-md-6 col-lg-2">
                 <input type="submit" class="form-control editButtonsDiagnosis btn btn-success " name="updateDiagnosis" value="Guardar diagnosticos">
              </div>
            @endcan
          </div>
       </form>
      </div>
    </div>
  </div>
</div>

    <script type="text/javascript">
    $('select').select2({
  minimumResultsForSearch: -1,
  placeholder: function(){
      $(this).data('placeholder');
  }
});
    </script>

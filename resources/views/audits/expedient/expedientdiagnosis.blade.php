<div class="box-body">
  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Diagnosticos </h3>
      <div class="box-tools pull-right">

    </div>
     <!-- /.box-header -->

    <div class="box-body">
      <form class="" action="index.html" method="post">


      <div class="form-group  col-sm-12 col-md-6 col-lg-4">

        <select id='diagnosisSelector'class="form-control select2 editMode" multiple="multiple" data-placeholder="Seleccioná un diagnostico"
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
     </form>





     </div>
    </div>
    </div>

    <script type="text/javascript">
    $('select').select2({
  minimumResultsForSearch: -1,
  placeholder: function(){
      $(this).data('placeholder');
  }
}):
    </script>




    <!-- Custom Tabs (Pulled to the right) -->
    <div class="nav-tabs-custom">
      <ul class="nav nav-tabs pull-right">
        @foreach ($audit->expedient->diagnoses as $diagnosis)
        <li class=""><a href="#tab_{{$diagnosis->id}}" data-toggle="tab" aria-expanded="false">{{$diagnosis->diagnosisType->name}}</a></li>

        @endforeach

        <li class="pull-left header"><i class="fa fa-th"></i> Diagnosticos</li>
      </ul>
      <div class="tab-content">
          @foreach ($audit->expedient->diagnoses as $diagnosis)
        <div class="tab-pane" id="tab_{{$diagnosis->id}}">
          <table style="width:100%">
           <tr>
             <th>Indicacion</th>
             <th># sesiones</th>
             <th>Adicional dependencia</th>
             <th>Medico</th>
           </tr>
           @foreach ($diagnosis->indications as $indication)
           <tr>
             <td>{{$indication->indicationType->name}}</td>
             <td>{{$indication->numberOfSesions}}</td>
             <td>{{$indication->aditionalDependance}}</td>
             <td>{{$indication->medic->person->surname}}, {{$indication->medic->person->name}}</td>

           </tr>
             @endforeach
          </table>




          </ul>



        </div>
        @endforeach
        <!-- /.tab-pane -->
      </div>
      <!-- /.tab-content -->
    </div>
    <!-- nav-tabs-custom -->
    </div>
    <!-- /.col -->
    </div>
    <!-- /.row -->
    <!-- END CUSTOM TABS -->

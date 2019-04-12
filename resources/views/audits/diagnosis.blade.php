<div class="box-body">
  <div class="box box-primary collapsed-box">
    <div class="box-header with-border">
      <h3 class="box-title">{{$diagnosis->diagnosisType->name}}</h3>
      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
        </button>
      </div>
    </div>
     <!-- /.box-header -->

    <div class="box-body">


          <ul>
            @foreach ($diagnosis->indications as $indication)
              <li>{{$indication->indicationType->name}}</li>
            @endforeach
          </ul>


     </div>
    </div>
    </div>

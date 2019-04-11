@extends('layouts.app')

@section('title')
  Auditoría
@endsection


@section('content-header')
  <h1>Auditoría n° {{$audit->id}}</h1>


@endsection

@section('content')

<div class="box box-widget">
  <div class="box-header with-border">
    <div class="row">

      <div class="col-md-4 col-sm-6 col-xs-12">
        <div class="info-box bg-red">
          <span class="info-box-icon"><i class="fa fa-comments-o"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Estado</span>
            @if (isset($audit->currentStatus()->name))
            <span class="info-box-number">{{$audit->currentStatus()->name}}</span>
            @endif

            <div class="progress">
              <div class="progress-bar" style="width: 70%"></div>
            </div>
                <span class="progress-description">
                  70% Increase in 30 Days
                </span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <div class="col-md-4 col-sm-6 col-xs-12">
        <div class="info-box bg-aqua">
          <span class="info-box-icon"><i class="fa fa-comments-o"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Obra social</span>
            @if (isset($audit->expedient->client->companyName))
            <span class="info-box-number">{{$audit->expedient->client->companyName}}</span>
            @endif

            <div class="progress">
              <div class="progress-bar" style="width: 70%"></div>
            </div>
                <span class="progress-description">
                  70% Increase in 30 Days
                </span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
    </div>
  </div>

  <div class="box-body">
      <div class="box box-success collapsed-box">
        <div class="box-header with-border">
          <h3 class="box-title">Datos del paciente <strong> {{$audit->expedient->patient->person->name}} {{$audit->expedient->patient->person->surname}}</strong></h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
            </button>
          </div>
        </div>
         <!-- /.box-header -->
        <div class="box-body">
          <form role="form">
            <div class="form-group col-sm-12 col-md-6 col-lg-2">
              <label>DNI</label>
              <input class="form-control input" type="text" value="{{$audit->expedient->patient->person->dni}}" readonly placeholder=".input-lg">
            </div>
            <div class="form-group col-sm-12 col-md-6 col-lg-5">
              <label>Nombre</label>
              <input class="form-control input" type="text" value="{{$audit->expedient->patient->person->name}}" placeholder=".input-lg">
            </div>
            <div class="form-group col-sm-12 col-md-6 col-lg-5">
              <label>Apellido</label>
              <input class="form-control input" type="text" value="{{$audit->expedient->patient->person->surname}}" placeholder=".input-lg">
            </div>
            <div class="form-group col-sm-12 col-md-6 col-lg-3">
              <label>Fecha de nacimiento</label>
              <div class="input-group">
                <div class="input-group-addon">
                  <i class="fa fa-calendar"></i>
                </div>
                <input type="text" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask value="{{$audit->expedient->patient->person->birth_date}}">
              </div>

            </div>
            <div class="form-group col-sm-12 col-md-6 col-lg-2">
              <label>Género</label>
              <select class="form-control select2"  data-placeholder="Seleccioná un genero"
                      style="width: 100%;">
                  <option selected="selected">{{$audit->expedient->patient->person->gender->name}}</option>
              </select>
            </div>
          </form>
        </div>
        <div class="box-body">
          <form role="form">
              <div class="form-group col-sm-12 col-md-6 col-lg-3">
                <label>Calle</label>
                <input class="form-control input" type="text" value="{{$audit->expedient->patient->person->address->street}}">
              </div>
              <div class="form-group col-sm-12 col-md-6 col-lg-1">
                <label>Número</label>
                <input class="form-control input" type="text" value="{{$audit->expedient->patient->person->address->number}}">
              </div>
              <div class="form-group col-sm-12 col-md-6 col-lg-1">
                <label>Piso</label>
                <input class="form-control input" type="text" value="{{$audit->expedient->patient->person->address->floor}}">
              </div>
              <div class="form-group col-sm-12 col-md-6 col-lg-4">
               <label>Localidad</label>
               <select class="form-control select2" multiple="multiple" data-placeholder="Seleccioná una localidad"
                       style="width: 100%;">
                   <option selected="selected">{{$audit->expedient->patient->person->address->location->name}}</option>
               </select>
             </div>
              <div class="form-group col-sm-12 col-md-6 col-lg-3">
               <label>Provincia</label>
               <select class="form-control select2" multiple="multiple" data-placeholder="Seleccioná una provincia"
                       style="width: 100%;">
                   <option selected="selected">{{$audit->expedient->patient->person->address->location->province->name}}</option>
               </select>
             </div>
          </form>
        </div>
        <!-- /.box-body -->
      </div>

      <!-- /.box-body -->
    </div>

    <div class="box box-primary collapsed-box">
      <div class="box-header with-border">
        <h3 class="box-title">Datos del expediente</h3>
        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
          </button>
        </div>
      </div>
       <!-- /.box-header -->
      <div class="box-body">
        <form role="form">

          <div class="form-group">
           <label>Diagnósticos:</label>
           {{-- <select class="form-control select2" multiple="multiple" data-placeholder="Seleccioná un objetivo"
                   style="width: 100%;"> --}}
                   <ul>
                     @foreach ($audit->expedient->diagnoses as $diagnosis)
                       <li selected="selected">{{$diagnosis->diagnosisType->name}}</li>
                     @endforeach
                   </ul>

           {{-- </select> --}}
         </div>
         <div class="form-group">
          <label>Modulos:</label>
          <ul>
          @foreach ($audit->expedient->expedientModules as $moduleexp)


                <li>{{$moduleexp->module->moduleType->name}} - {{$moduleexp->module->moduleCategory->name}}</li>



          @endforeach
          </ul>
          </div>
           {{-- TO DO establecer relacion entre diagnosis e indications --}}
          {{-- <div class="form-group">
           <label>Indicaciones del médico</label>
           <select class="form-control select2" multiple="multiple" data-placeholder="Seleccioná un objetivo"
                   style="width: 100%;">
             @foreach ($audit->expedient->diagnoses as $diagnosis)
               @foreach ($diagnosis->indications as $indication)
                 <option selected="selected">{{$indication->indicationType->name}}</option>
               @endforeach
             @endforeach
           </select>
           </div> --}}

        </form>
      </div>

    </div>


    <div class="row">
      <div class="col-md-12">
        <div class="box box-info collapsed-box">
          <div class="box-header">
            <h3 class="box-title">Resultados de la auditoría
              <small>editado por </small>
            </h3>
            <!-- tools box -->
            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
              </button>
            </div>
            <!-- /. tools -->
          </div>

          <!-- /.box-header -->
          <div class="box-body pad">
            <form>
              <div class="form-group  col-sm-12 col-md-6 col-lg-4">
               <label>Objetivos</label>
               <select class="form-control select2" multiple="multiple" data-placeholder="Seleccioná un objetivo"
                       style="width: 100%;">
                 @foreach ($audit->objetives as $objetive)
                   <option selected="selected">{{$objetive->name}}</option>
                 @endforeach

               </select>
             </div>
             <div class="form-group col-sm-12 col-md-6 col-lg-4">
               <label>Recomendaciones</label>
               <select class="form-control select2" multiple="multiple" data-placeholder="Seleccioná una recomendación"
                       style="width: 100%;">
                 @foreach ($audit->recommendations as $recommendation)
                   <option selected="selected">{{$recommendation->descrip}}</option>
                 @endforeach

               </select>
             </div>
             <div class="form-group col-sm-12 col-md-6 col-lg-4">
               <label>Instrucciones</label>
               <select class="form-control select2" multiple="multiple" data-placeholder="Seleccioná una instrucción"
                       style="width: 100%;">
                 @foreach ($audit->instructions as $instruction)
                   <option selected="selected">{{$instruction->name}}</option>
                 @endforeach

               </select>
             </div>

              <div class="form-group">
                <label>Conclusión</label>
                <textarea class="form-control" rows="10" placeholder="Comenzar a escribir acá...">{{$audit->conclution}}</textarea>
              </div>
                  <label>Informe</label>
                  <textarea id="editor1" name="editor1" rows="10" cols="80">
                    {{$audit->report}}
                  </textarea>
            </form>
          </div>
        </div>
      </div>
    </div>

    <div class="box box-warning collapsed-box">
      <div class="box-header with-border">
        <h3 class="box-title">Historial</h3>
        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
          </button>
        </div>
      </div>
       <!-- /.box-header -->
      <div class="box-body">
        {{-- <form role="form">
          <div class="form-group">
            <label>Nombre</label>
            <input class="form-control input" type="text" value="{{$audit->expedient->patient->person->name}}" placeholder=".input-lg">
          </div>
          <div class="form-group">
            <label>Apellido</label>
            <input class="form-control input" type="text" value="{{$audit->expedient->patient->person->surname}}" placeholder=".input-lg">
          </div>
        </form>--}}

      <div class="row">
        <div class="col-md-12">
          <!-- The time line -->
          <ul class="timeline">
            <!-- timeline time label -->

            @foreach ($audit->statuses as $timelineItem)


            <li class="time-label">
                  <span class="bg-orange">
                    {{date('d-m-Y', strtotime($timelineItem->pivot->created_at))}}
                  </span>
            </li>
            <!-- /.timeline-label -->
            <!-- timeline item -->
            <li>
              <i class="fa fa-edit  bg-blue"></i>

              <div class="timeline-item">
                <span class="time"><i class="fa fa-clock-o"></i> {{date('H:m', strtotime($timelineItem->pivot->created_at))}}</span>

                <h3 class="timeline-header"><a href="#">{{$timelineItem->name}}</a> </h3>

                {{-- <div class="timeline-body">
                  Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                  weebly ning heekya handango imeem plugg dopplr jibjab, movity
                  jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                  quora plaxo ideeli hulu weebly balihoo...
                </div>
                <div class="timeline-footer">
                  <a class="btn btn-primary btn-xs">Read more</a>
                  <a class="btn btn-danger btn-xs">Delete</a>
                </div> --}}
              </div>
            </li>
            <!-- END timeline item -->
            @endforeach
            <!-- END timeline item -->
            <li>
              <i class="fa fa-clock-o bg-gray"></i>
            </li>
          </ul>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.box-body -->
      </div>
    </div>

  </div>
<div class="box-footer box-comments">
  @isset($audit->comments)
    @foreach ($audit->comments as $comment)
      <div class="box-comment">
        <!-- User image -->
        <img class="img-circle img-sm" src="/img/avatar.svg" alt="User Image">

        <div class="comment-text">
              <span class="username">
                User->name
                <span class="text-muted pull-right">{{$comment->created_at}}</span>
              </span><!-- /.username -->
          {{$comment->text}}
        </div>
        <!-- /.comment-text -->
      </div>
    @endforeach
  @endisset

  <!-- /.box-comment -->
</div>
<div class="box-footer">
  <form action="#" method="post">
    <img class="img-responsive img-circle img-sm" src="/img/avatar.svg" alt="Alt Text">
    <!-- .img-push is used to add margin to elements next to floating images -->
    <div class="img-push">
      <input type="text" class="form-control input-sm" placeholder="Press enter to post comment">
    </div>
  </form>
</div>
</div>



@endsection

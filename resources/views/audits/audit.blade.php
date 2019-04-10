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
          <h3 class="box-title">Datos del paciente</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
            </button>
          </div>
        </div>
         <!-- /.box-header -->
        <div class="box-body">
          <form role="form">
            <div class="form-group">
              <label>Nombre</label>
              <input class="form-control input" type="text" value="{{$audit->expedient->patient->person->name}}" placeholder=".input-lg">
            </div>
            <div class="form-group">
              <label>Apellido</label>
              <input class="form-control input" type="text" value="{{$audit->expedient->patient->person->surname}}" placeholder=".input-lg">
            </div>
          </form>
        </div>
        <div class="box-body">
          <form role="form">
            <div class="form-group">
              <label>Diagnosticos</label>
              <textarea class="form-control" rows="10" placeholder="Comenzar a escribir acá...">{{$audit->conclution}}</textarea>
            </div>
          </form>
        </div>
        <!-- /.box-body -->
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

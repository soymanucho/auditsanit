@extends('layouts.app')

@section('title')
  Nueva auditoría
@endsection

@section('breadcrumb-items')
  <li><a href="{!! route('home') !!}"><i class="fa "></i> Inicio</a></li>
  <li><a href="{!! route('show-audits') !!}"><i class="fa "></i> Auditorías</a></li>
  <li class="active">Nueva</li>
@endsection

@section('content')
  <div class="panel-body">
    @include('errors.errors')
    <div class="box box-success">
      <div class="box-header with-border">
        <h3 class="box-title">Agregando auditoría</h3>
      </div>
      <form  method="POST" name='newAudit'>
        <div class="box-body">
      	  {{ method_field('post') }}
          {{ csrf_field() }}
          <div class="form-group col-sm-12 col-md-6 col-lg-6">
            <label>Obra social</label>
            <select class="form-control select2" name="client_id" id="client_id" data-placeholder="Seleccioná una obra social"
                    style="width: 100%;">
                    <option value=""></option>
                    @foreach ($clients as $client)
                      <option value="{{$client->id}}">{{$client->companyName}}</option>
                    @endforeach
            </select>
          </div>
          <div class="form-group col-sm-12 col-md-6 col-lg-6">
            <label for="dni">Afiliado </label>
            <select class="form-control select2" id="patient_id" name="patient_id" data-placeholder="Seleccioná un afiliado"
                    style="width: 100%;">
                    <option value=""></option>
                    @foreach ($patients as $patient)
                      <option value="{{$patient->id}}">{{$patient->person->surname}}, {{$patient->person->name}} [{{$patient->person->dni}}]</option>
                    @endforeach
            </select>
          </div>

          <div class="form-group col-sm-12 col-md-6 col-lg-6">
            <label for="dni">Mes </label>
          <select class="form-control select2" id="month" name="month" data-placeholder="Seleccioná un mes"
                  style="width: 100%;">
                  <option value=""></option>
                  @for ($i=1; $i < 13; $i++)
                      <option value="{{$i}}"
                        @if ($i==date('m'))
                           selected
                        @endif
                      >{{$i}}</option>
                  @endfor


          </select>
          </div>

          <div class="form-group col-sm-12 col-md-6 col-lg-6">
            <label for="dni">Año</label>
          <select class="form-control select2" id="year" name="year" data-placeholder="Seleccioná un año"
                  style="width: 100%;">
                  <option value=""></option>
                  @for ($i=date('Y')-10; $i < date('Y')+10; $i++)
                      <option value="{{$i}}"
                      <option value="{{$i}}"
                        @if ($i==date('Y'))
                           selected
                        @endif
                      >{{$i}}</option>
                  @endfor


          </select>
          </div>


          <div class="form-group col-sm-12 col-md-6 col-lg-4">
            <a class="btn btn-success btn-xs" href="{!! route('new-patients') !!}">Crear nuevo afiliado</a>
          </div>


        </div>


        </div>

          <div class="box-footer">
            <a class="btn btn-danger" href="{{ URL::previous()}}">Volver</a>
            <input class="btn btn-primary"type="submit" value="Agregar auditoria" name="submit"/>
          </div>
      </form>
    </div>
  </div>
@endsection

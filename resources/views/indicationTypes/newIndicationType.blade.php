@extends('layouts.app')

@section('title')
  Nueva Tipo de Indicación
@endsection

@section('breadcrumb-items')
  <li><a href="{!! route('home') !!}"><i class="fa "></i> Inicio</a></li>
  <li><a href="{!! route('show-instructions') !!}"><i class="fa "></i> Tipo Indicación</a></li>
  <li class="active">Nueva</li>
@endsection

@section('content')
  <div class="panel-body">
    @include('errors.errors')
    <div class="box box-success">
      <div class="box-header with-border">
        <h3 class="box-title">Agregando nuevo tipo de indicación</h3>
      </div>
      <form  method="POST" name='newInstruction'>
        <div class="box-body">
      	  {{ method_field('post') }}
          @include('indicationTypes._fields')
          <div class="box-footer">
            <a class="btn btn-danger" href="{{ URL::previous()}}">Volver</a>
            <input class="btn btn-primary"type="submit" value="Agregar indicación" name="submit"/>
          </div>
        </div>
      </form>
    </div>
  </div>
@endsection

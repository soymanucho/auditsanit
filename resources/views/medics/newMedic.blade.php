@extends('layouts.app')

@section('title')
  Nuevo médico
@endsection

@section('breadcrumb-items')
  <li><a href="{!! route('home') !!}"><i class="fa "></i> Inicio</a></li>
  <li><a href="{!! route('show-medics') !!}"><i class="fa "></i> Médicos</a></li>
  <li class="active">Nuevo</li>
@endsection

@section('content')
  <div class="panel-body">
    @include('errors.errors')
    <div class="box box-success">
      <div class="box-header with-border">
        <h3 class="box-title">Agregando un nuevo médico</h3>
      </div>
      <form  method="POST" name='newMedic'>
        <div class="box-body">
      	  {{ method_field('post') }}
          @include('medics._fields')
        </div>
        <div class="box-footer">
          <a class="btn btn-danger" href="{{ URL::previous()}}">Volver</a>
          <input class="btn btn-primary"type="submit" value="Agregar médico" name="submit"/>
        </div>
      </form>
    </div>
  </div>
@endsection

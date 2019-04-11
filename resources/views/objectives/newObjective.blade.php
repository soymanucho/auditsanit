@extends('layouts.app')

@section('title')
  Nuevo objetivo
@endsection

@section('breadcrumb-items')
  <li><a href="{!! route('home') !!}"><i class="fa "></i> Inicio</a></li>
  <li><a href="{!! route('show-objectives') !!}"><i class="fa "></i> Objetivos</a></li>
  <li class="active">Nueva</li>
@endsection

@section('content')
  <div class="panel-body">
    @include('errors.errors')
    <div class="box box-success">
      <div class="box-header with-border">
        <h3 class="box-title">Agregando un nuevo objetivo</h3>
      </div>
      <form  method="POST" name='newObjetive'>
        <div class="box-body">
      	  {{ method_field('post') }}
          @include('objectives._fields')
          <div class="box-footer">
            <a class="btn btn-danger" href="{{ URL::previous()}}">Volver</a>
            <input class="btn btn-primary"type="submit" value="Agregar objetivo" name="submit"/>
          </div>
        </div>
      </form>
    </div>
  </div>
@endsection

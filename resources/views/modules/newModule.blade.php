@extends('layouts.app')

@section('title')
  Nuevo modulo
@endsection

@section('breadcrumb-items')
  <li><a href="{!! route('home') !!}"><i class="fa "></i> Inicio</a></li>
  <li><a href="{!! route('show-module') !!}"><i class="fa "></i> Modulo</a></li>
  <li class="active">Nuevo</li>
@endsection

@section('content')
  <div class="panel-body">
    @include('errors.errors')
    <div class="box box-success">
      <div class="box-header with-border">
        <h3 class="box-title">Agregando un nuevo modulo {{$module->moduleType->name}}-{{$module->moduleCategory->name}}</h3>
      </div>
      <form  method="POST" name='newInstruction'>
        <div class="box-body">
      	  {{ method_field('post') }}
          @include('modules._fields')
          <div class="box-footer">
            <a class="btn btn-danger" href="{{ URL::previous()}}">Volver</a>
            <input class="btn btn-primary"type="submit" value="Agregar modulo" name="submit"/>
          </div>
        </div>
      </form>
    </div>
  </div>
@endsection
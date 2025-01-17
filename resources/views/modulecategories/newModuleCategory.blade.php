@extends('layouts.app')

@section('title')
  Nueva categoria de modulo
@endsection

@section('breadcrumb-items')
  <li><a href="{!! route('home') !!}"><i class="fa "></i> Inicio</a></li>
  <li><a href="{!! route('show-moduletypes') !!}"><i class="fa "></i> Categoria de modulo</a></li>
  <li class="active">Nueva</li>
@endsection

@section('content')
  <div class="panel-body">
    @include('errors.errors')
    <div class="box box-success">
      <div class="box-header with-border">
        <h3 class="box-title">Agregando uan nueva categoria de modulo</h3>
      </div>
      <form  method="POST" name='newInstruction'>
        <div class="box-body">
      	  {{ method_field('post') }}
          @include('modulecategories._fields')
          <div class="box-footer">
            <a class="btn btn-danger" href="{{ URL::previous()}}">Volver</a>
            <input class="btn btn-primary"type="submit" value="Agregar tipo de modulo" name="submit"/>
          </div>
        </div>
      </form>
    </div>
  </div>
@endsection

@extends('layouts.app')

@section('title')
  Editando Tipo de diagnosticos
@endsection

@section('breadcrumb-items')
  <li><a href="{!! route('home') !!}"><i class="fa "></i> Inicio</a></li>
  <li><a href="{!! route('show-instructions') !!}"><i class="fa "></i> Tipo de Diagnosticos</a></li>
  <li class="active">Editar</li>
@endsection

@section('content')
  <div class="panel-body">
    @include('errors.errors')
    <div class="box box-success">
      <div class="box-header with-border">
        <h3 class="box-title">Editando Tipo de Diagnostico</h3>
      </div>
      <form  method="POST" name='editInstruction'>
        <div class="box-body">
      	  {{ method_field('post') }}
          @include('diagnosisTypes._fields')
          <div class="box-footer">
            <a class="btn btn-danger" href="{{ URL::previous()}}">Volver</a>
            <input class="btn btn-primary"type="submit" value="Guardar cambios" name="submit"/>
          </div>
        </div>
      </form>
    </div>
  </div>
@endsection

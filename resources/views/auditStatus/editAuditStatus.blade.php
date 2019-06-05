@extends('layouts.app')

@section('title')
  Editando estado de auditoria
@endsection

@section('breadcrumb-items')
  <li><a href="{!! route('home') !!}"><i class="fa "></i> Estado de auditoria</a></li>

@endsection

@section('content')
  <div class="panel-body">
    @include('errors.errors')
    <div class="box box-success">
      <div class="box-header with-border">
        <h3 class="box-title">Editando estado de auditoria</h3>
      </div>
      <form  method="POST" name='editClient'>
        <div class="box-body">
      	  {{ method_field('post') }}
          @include('auditStatus._fields')
          <div class="box-footer">
            <a class="btn btn-danger" href="{{ URL::previous()}}">Volver</a>
            <input class="btn btn-primary"type="submit" value="Cambiar estado de auditoria" name="submit"/>
          </div>
        </div>
      </form>
    </div>
  </div>
@endsection

@extends('layouts.app')

@section('title')
  Invitar a un nuevo usuario
@endsection

@section('breadcrumb-items')
  <li><a href="{!! route('home') !!}"><i class="fa "></i> Inicio</a></li>

@endsection

@section('content')


<div class="panel-body">
  @include('errors.errors')
  <div class="box box-success">
    <div class="box-header with-border">
      <h3 class="box-title">Invitar un nuevo usuario:</h3>
    </div>
    <form  method="POST" name='newInstruction'>
      <div class="box-body">
        {{ method_field('post') }}
        {{ csrf_field() }}
        <div class="form-group">
          <label for="name">Email:</label>
          <input type="email" name="email" />
        </div>

        <div class="box-footer">
          <a class="btn btn-danger" href="{{ URL::previous()}}">Volver</a>
          <input class="btn btn-primary"type="submit" value="Enviar invitación" name="submit"/>
        </div>
      </div>
    </form>
  </div>
</div>


@endsection

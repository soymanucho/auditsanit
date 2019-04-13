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

  @include('audits.auditheader')

  @include('audits.auditpatient')

  @include('audits.auditexpedientdata')

  @include('audits.auditresult')

  @include('audits.audithistory')

  </div>
 @include('audits.auditscomments')
</div>



@endsection

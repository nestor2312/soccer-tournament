

@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
<div class="col-xs-12 col-sm-12 col-md-12 form">
  <p class="col-xs-12 col-sm-12 col-md-12 text-center form-title">equipo</p>
  <form class="form-horizontal" action="/equipos" class="was-validated" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="form-group col-xs-12 col-sm-6 col-md-6 form">
      <label class="control-label col-xs-12 col-sm-4 col-md-4" >grupo:</label>
      <div class="col-xs-12 col-sm-8 col-md-8">
        <select name="grupo_id" id="" class="form-control ">
          @foreach ($grupos as $grupo)
          <option value="{{$grupo->id}}">{{$grupo->nombre}}</option>
          @endforeach
      </select>
      </div>
    </div>
    <!-- nombre -->
    <div class="form-group col-xs-12 col-sm-6 col-md-6 form">
      <label class="control-label col-xs-12 col-sm-4 col-md-4" >nombre:</label>
      <div class="col-xs-12 col-sm-8 col-md-8">
        <input type="text" class="form-control"  name="nombre" required>
      </div>
    </div>

    <div class="form-group col-xs-12 col-sm-6 col-md-6 form">
      <label class="control-label col-xs-12 col-sm-4 col-md-4" >imagen:</label>
      <div class="col-xs-12 col-sm-8 col-md-8">
        {{-- <input type="file" class="form-control"  name="imagen" id="imagen" class="hidden"> --}}
        <input name="imagen" id="imagen" type='file' accept="image/*">
      </div>
    </div>
</div>
<button type="submit" class="btn btn-success">registrar</button>
<a href="/equipos" class="btn btn-danger">cancelar</a>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop
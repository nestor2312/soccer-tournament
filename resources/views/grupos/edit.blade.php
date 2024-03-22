

@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
<div class="col-xs-12 col-sm-12 col-md-12 form">
  <p class="col-xs-12 col-sm-12 col-md-12 text-center form-title">grupos</p>
  <form class="form-horizontal" action="/grupos/{{$grupo->id}}"  method="POST" >
    @csrf
    @method('PUT')
    <!-- Equipo -->
     <!-- Nombre -->
     <div class="form-group col-xs-12 col-sm-6 col-md-6 form">
      <label class="control-label col-xs-12 col-sm-4 col-md-4" >Nombre:</label>
      <div class="col-xs-12 col-sm-8 col-md-8">
        <input type="text" class="form-control"  name="nombre" value="{{$grupo->nombre}}">
      </div>
    </div>
</div>
<button type="submit" class="btn btn-info">Actualizar</button>
<a href="/grupos" class="btn btn-danger">Cancelar</a>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
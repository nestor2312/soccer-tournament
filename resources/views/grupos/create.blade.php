

@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
<div class="col-xs-12 col-sm-12 col-md-12 form">
  <p class="col-xs-12 col-sm-12 col-md-12 text-center form-title">grupo</p>
  <form class="form-horizontal" action="/grupos" method="POST" >
    @csrf

    <div class="form-group col-xs-12 col-sm-6 col-md-6 form">
      <label class="control-label col-xs-12 col-sm-4 col-md-4" >categoria:</label>
      <div class="col-xs-12 col-sm-8 col-md-8">
        <select name="grupo_id" id="" class="form-control ">
          @foreach ($categorias as $categoria)
          <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
          @endforeach
      </select>
      </div>
    </div>

     <!-- Nombre -->
     <div class="form-group col-xs-12 col-sm-6 col-md-6 form">
      <label class="control-label col-xs-12 col-sm-4 col-md-4" >Nombre:</label>
      <div class="col-xs-12 col-sm-8 col-md-8">
        <input type="text" class="form-control"  name="nombre">
      </div>
    </div>
</div>
<button type="submit" class="btn btn-success">registrar</button>
<a href="/grupos" class="btn btn-danger">cancelar</a>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
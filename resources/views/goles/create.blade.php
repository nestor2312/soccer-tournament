@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
<div class="col-xs-12 col-sm-12 col-md-12 form">
  <p class="col-xs-12 col-sm-12 col-md-12 text-center form-title">equipo</p>
  <form class="form-horizontal" action="/goles" class="was-validated" method="POST" >
    @csrf
    <!-- nombre -->
    <div class="form-group col-xs-12 col-sm-6 col-md-6 form">
        <label class="control-label col-xs-12 col-sm-4 col-md-4" >jugador:</label>
        <div class="col-xs-12 col-sm-8 col-md-8">
          <select name="jugador_id" id="" class="form-control ">
            @foreach ($jugadores as $jugador)
            <option value="{{$jugador->id}}">{{$jugador->nombre}} {{$jugador->apellido}}</option>
            @endforeach
        </select>
        </div>
      </div>

    <div class="form-group col-xs-12 col-sm-6 col-md-6 form">
      <label class="control-label col-xs-12 col-sm-4 col-md-4" >goles marcados:</label>
      <div class="col-xs-12 col-sm-8 col-md-8">
        <input name="goles" type='number'>
      </div>
    </div>
</div>
<button type="submit" class="btn btn-success">registrar</button>
<a href="/asistenicia" class="btn btn-danger">cancelar</a>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop
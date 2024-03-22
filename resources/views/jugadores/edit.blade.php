@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
<div class="col-xs-12 col-sm-12 col-md-12 form">
  <p class="col-xs-12 col-sm-12 col-md-12 text-center form-title">jugadores</p>
  <form class="form-horizontal" action="/jugadores/{{$jugador->id}}"  method="POST" >
    @csrf
    @method('PUT')
    <!-- Equipo -->
    <div class="form-group col-xs-12 col-sm-6 col-md-6 form">
      <label class="control-label col-xs-12 col-sm-4 col-md-4" >Equipo:</label>
      <div class="col-xs-12 col-sm-8 col-md-8">
        <select name="equipo_id" id="" class="form-control ">
          @foreach($equipos as $equipo)
          @if($equipo->id == $jugador->equipo_id)
              <option value="{{$equipo->id}}" selected> {{ $equipo->nombre }}</option>
          @else
              <option value="{{$equipo->id}}"> {{ $equipo->nombre }}</option>
          @endif
      @endforeach
      </select>
      </div>
    </div>
     <!-- Nombre -->
     <div class="form-group col-xs-12 col-sm-6 col-md-6 form">
      <label class="control-label col-xs-12 col-sm-4 col-md-4" >Nombre:</label>
      <div class="col-xs-12 col-sm-8 col-md-8">
        <input type="text" class="form-control"  name="nombre" value="{{$jugador->nombre}}"> 
      </div>
    </div>
     <!-- Apellido -->
     <div class="form-group col-xs-12 col-sm-6 col-md-6 form">
      <label class="control-label col-xs-12 col-sm-4 col-md-4" >Apellido:</label>
      <div class="col-xs-12 col-sm-8 col-md-8">
        <input type="text" class="form-control"  name="apellido" value="{{$jugador->apellido}}" >
      </div>
    </div>
     <!-- Edad -->
     <div class="form-group col-xs-12 col-sm-6 col-md-6 form">
      <label class="control-label col-xs-12 col-sm-4 col-md-4" >Edad:</label>
      <div class="col-xs-12 col-sm-8 col-md-8">
        <input type="number" class="form-control"  name="edad" value="{{$jugador->edad}}" >
      </div>
    </div>
    <!-- Numero -->
    <div class="form-group col-xs-12 col-sm-6 col-md-6 form">
      <label class="control-label col-xs-12 col-sm-4 col-md-4" >Numero:</label>
      <div class="col-xs-12 col-sm-8 col-md-8">
        <input type="number" class="form-control"  name="numero" value="{{$jugador->numero}}" >
      </div>
    </div>
    <div class="form-group col-xs-12 col-sm-6 col-md-6 form">
      <label class="control-label col-xs-12 col-sm-4 col-md-4" >Tarjetas amarillas</label>
      <div class="col-xs-12 col-sm-8 col-md-8">
        <select name="cardA_id" id="" class="form-control ">
          @foreach($cards as $card)
          @if($card->id == $jugador->cardA_id)
              <option value="{{$card->id}}" selected> {{ $card->tarjeta_A }}</option>
          @else
              <option value="{{$card->id}}"> {{ $card->tarjeta_A }}</option>
          @endif
      @endforeach
      </select>
      </div>
    </div>
    <div class="form-group col-xs-12 col-sm-6 col-md-6 form">
      <label class="control-label col-xs-12 col-sm-4 col-md-4" >Tarjetas amarillas</label>
      <div class="col-xs-12 col-sm-8 col-md-8">
        <select name="cardR_id" id="" class="form-control ">
            @foreach ($cards as $card)
            @if($card->id == $jugador->equipoA_id)
          <option value="{{$card->id}}" selected> {{ $card->tarjeta_R }}</option>
      @else
          <option value="{{$card->id}}"> {{ $card->tarjeta_R }}</option>
      @endif
      @endforeach
      </select>
      </div>
    </div>
</div>
<button type="submit" class="btn btn-info">Actializar</button>
<a href="/jugadores" class="btn btn-danger">cancelar</a>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
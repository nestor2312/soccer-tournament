@extends('adminlte::page')

@section('title', 'Admin')

@section('content_header')
    <h1>Equipos</h1>
@stop

@section('content')
<div class="col-xs-12 col-sm-12 col-md-12 form">
  <p class="col-xs-12 col-sm-12 col-md-12 text-center form-title">Partido</p>
    <form class="form-horizontal" action="/partidos/{{$partido->id}}"  class="was-validated" method="POST" >
      @csrf
      @method('PUT')
          <div class="row">
            <div class="col">
              <label for="">local</label>  
              <select name="equipoA_id" id="" class="form-control ">
                @foreach ($equipos as $equipo)
                @if($equipo->id == $partido->equipoA_id)
              <option value="{{$equipo->id}}" selected> {{ $equipo->nombre }}</option>
          @else
              <option value="{{$equipo->id}}"> {{ $equipo->nombre }}</option>
          @endif
          @endforeach
            </select>
            </div>
            <div class="col">
              <label for="" class="text-center">marcador</label>  
              <input type="number" class="form-control"  name="marcador1" required value="{{$partido->marcador1}}">
            </div>
            <div class="col">
              <label for="">marcador</label>  
          <input type="number" class="form-control"  name="marcador2" required value="{{$partido->marcador2}}">
            </div>
            <div class="col">
              <label for="">visitante</label>  
              <select name="equipoB_id" id="" class="form-control">
                @foreach ($equipos as $equipo)
                @if($equipo->id == $partido->equipoB_id)
              <option value="{{$equipo->id}}" selected> {{ $equipo->nombre }}</option>
          @else
              <option value="{{$equipo->id}}"> {{ $equipo->nombre }}</option>
          @endif
                @endforeach
            </select>
            </div>
          </div>
       
      <button type="submit" class="btn btn-info">Actializar</button>
      <a href="/partidos" class="btn btn-danger">Cancelar</a>
    </form>
    </div>


@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
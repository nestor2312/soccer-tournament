

@extends('adminlte::page')

@section('title', 'Admin')

@section('content_header')
    <h1>Equipos</h1>
@stop

@section('content')

<div class="col-xs-12 col-sm-12 col-md-12 form" >
  <p class="col-xs-12 col-sm-12 col-md-12 text-center form-title">Partido</p>
    <form class="form-horizontal"  action="/eliminatorias" class="was-validated" method="POST" >
      @csrf
      {{-- equipo_a_id	equipo_b_id	marcador1	marcador2	ronda --}}
          <div class="row">
            <div class="col" >
              <label for="">local</label>  
              <select name="equipo_a_id" id="" class="form-control ">
             
                @foreach ($equipos as $equipo)
                <option value="{{$equipo->id}}">{{$equipo->nombre}}</option>
                @endforeach
            </select>
            </div>
            <div class="col">
              <label for="" class="text-center">marcador</label>  
              <input type="number" class="form-control"  name="marcador1" required>
            </div>
            <div class="col">
              <label for="">marcador</label>  
          <input type="number" class="form-control"  name="marcador2" required>
            </div>
            <div class="col">
              <label for="">visitante</label>  
              <select name="equipo_b_id" id="" class="form-control">
                @foreach ($equipos as $equipo)
             
                <option value="{{$equipo->id}}">{{$equipo->nombre}}</option>
                @endforeach
            </select>
            </div>
            <div class="col">
              <label for="">partido #</label>  
          <input type="number" class="form-control"  name="numPartido" required>
            </div>
          </div>
          <br>
          <button type="submit" class="btn btn-success">registrar</button>
          <a href="/eliminatorias" class="btn btn-danger">cancelar</a>
          
    </form>
    </div>

   
    
    
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
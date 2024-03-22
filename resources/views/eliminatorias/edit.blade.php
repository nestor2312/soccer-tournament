@extends('adminlte::page')
@section('title', 'Admin')
@section('content')
<div class="col-xs-12 col-sm-12 col-md-12 pt-4 form">
    <p class="col-xs-12 col-sm-12 col-md-12 text-center form-title">Partido</p>
    <form class="form-horizontal" action="/eliminatorias/{{$eliminatoria->id}}" method="POST" >
      @csrf
      @method('PUT')
     
    

      <div class="row">
        <div class="col" >
          <label for="">local</label>  
          <select name="equipo_a_id" id="" class="form-control ">
            @foreach ($equipos as $equipo)
            @if($equipo->id == $eliminatoria->equipo_a_id)
            
            <option value="{{$equipo->id}}" selected> {{ $equipo->nombre }}</option>
            @else
            <option value="{{$equipo->id}}"> {{ $equipo->nombre }}</option>
            {{-- <option value=" ">por definir</option> --}}
      @endif
      @endforeach
          
        </select>
        </div>
        <div class="col">
          <label for="" class="text-center">marcador</label>  
          <input type="number" class="form-control"  name="marcador1" required value="{{$eliminatoria->marcador1}}">
        </div>
        <div class="col">
          <label for="">marcador</label>  
      <input type="number" class="form-control"  name="marcador2" required value="{{$eliminatoria->marcador2}}">
        </div>
        <div class="col">
          <label for="">visitante</label>  
          <select name="equipo_b_id" id="" class="form-control">
            @foreach ($equipos as $equipo)
            @if($equipo->id == $eliminatoria->equipo_b_id)
          <option value="{{$equipo->id}}" selected> {{ $equipo->nombre }}</option>
      @else
          <option value="{{$equipo->id}}"> {{ $equipo->nombre }}</option>
      @endif
      @endforeach
        </select>
        </div>
        <div class="col">
          <label for="">partido #</label>  
      <input type="number" class="form-control"  name="numPartido" required value="{{$eliminatoria->numPartido}}">
        </div>
      </div>
      <button type="submit" class="btn btn-success">Actualizar</button>
      <a href="/eliminatorias" class="btn btn-danger">Cancelar</a>
@endsection

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop


@extends('adminlte::page')

@section('title', 'Jugadores')

@section('content_header')
    <h1>Jugadores</h1>
@stop

@section('content')


<div class="col-12">
  <div class="col-2">
    <a href="/jugadores" class="btn btn-primary margen">Volver</a> <br> 
    <div class="dropdown">
      <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
        Equipos
      </button>
      <div class="dropdown-menu">
        @foreach ($equipos as $equipo)
            <a href="/equipos/{{$equipo->id}}/jugadores"class="dropdown-item">{{$equipo->nombre}}</a>
            @endforeach 
      </div>
    </div>
    <br>
  </div>
</div>
<div class="container-fluid ">  
  <div class="table-responsive card">         
  <table class="table">
    <thead class="thead-light">
      <tr>
        <th class="center"></th>
        <th class="center">Equipo</th>
        <th class="center">Nombre</th>
        <th class="center">Apellido</th>
        <th class="center">Edad</th>
        <th class="center">Numero</th>
        <th class="center">Acciones</th>
      </tr>
    </thead>
    <tbody>
     
      @foreach ($jugadores as $jugador)
            <tr>     
              <td  class="center">
                <img src="imagenes/{{$jugador->equipo->imagen}}">
              </td>     
                <td class="center">{{$jugador->equipo->nombre}}</td>
                <td class="center">{{$jugador->nombre}}</td>
                <td class="center">{{$jugador->apellido}}</td>
                <td class="center">{{$jugador->edad}}</td>
                <td class="center">{{$jugador->numero}}</td>
                <td class="center">
                  <form action="{{ route ('jugadores.destroy',$jugador->id)}}" method="post">
                    <a href="{{route('jugadores.show', $jugador->id)}}" class="btn btn-primary fas fa-book">ver mas</a>
                  <a href="jugadores/{{$jugador->id}}/edit" class="btn btn-warning fas fa-pen"></a>     
                  @csrf                                
                  @method('delete')
                   <button type="submit" class="btn btn-danger far fa-trash-alt"></button>
                  </form>
                  </td>
          </tr>    
            @endforeach
    </tbody>
  </table>
</div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="/css/estilo.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
@stop

@section('js')
   
@stop



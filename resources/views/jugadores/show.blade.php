@extends('adminlte::page')

@section('title', 'Jugadores')

@section('content_header')
    <h1>Informacion del jugador</h1>
@stop

@section('content')
<div class="col-12">
  <h4>Equipo: <strong>{{$jugador->equipo->nombre}}</strong></h4>
  
</div>
<div class="container-fluid ">  
  <div class="table-responsive card">         
  <table class="table">
    <thead class="thead-light">
      <tr>    
        <th class="center">Nombre</th>
        <th class="center">Apellido</th>
        <th class="center">Edad</th>
        <th class="center">Numero</th>
        <th class="center">tarjeta <button class="yellowcard"></button></th>
        <th class="center">tarjeta <button class="redcard"></button></th>
        <th class="center">Acciones</th>
      </tr>
    </thead>
    <tbody>
           
                <td class="center">{{$jugador->nombre}}</td>
                <td class="center">{{$jugador->apellido}}</td>
                <td class="center">{{$jugador->edad}}</td>
                <td class="center">{{$jugador->numero}}</td>
                <td class="center">{{$jugador->cardA->tarjeta_A}}</td>
                <td class="center">{{$jugador->cardR->tarjeta_R}}</td>
                <td class="center"> <form action="{{ route ('jugadores.destroy',$jugador->id)}}" method="post">
                  <a href="{{$jugador->id}}/edit" class="btn btn-warning fas fa-pen"></a>
                  @csrf                                
                  @method('delete')
                   <button type="submit" class="btn btn-danger far fa-trash-alt"></button>
                  </form>
                  </td>
          </tr>    
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
    <script> console.log('Hi!'); </script>
@stop
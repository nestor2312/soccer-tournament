@extends('adminlte::page')

@section('title', 'Equipos')

@section('content_header')
    <h1>goleadores</h1>
@stop

@section('content')

<div class="container-fluid ">  
  <div class="table-responsive card">         
  <table class="table">
    <thead class="thead-light">
      <tr>
        <th class="center">#</th>
        <th class="center">Jugador</th>
        <th class="center">Goles</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($goles as $gol)
            <tr>
              <td class="center">{{ $loop->iteration }}</td>
                <td class="center"> {{$gol->jugador->nombre}}</td>
                <td class="center"> {{$gol->goles}}</td>
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
    <script> console.log('Hi!'); </script>
@stop



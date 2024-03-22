@extends('adminlte::page')

@section('title', 'grupos')

@section('content_header')
    <h1>grupos</h1>
@stop

@section('content')
<div class="col-12">
  <div class="col-6">
    {{-- <a href="/tabla" class="btn btn-primary margen">Volver</a> <br>  --}}
      <div>
        @foreach ($grupos as $grupo)
        <a href="/grupos/{{$grupo->id}}/equipos" class="btn btn-info">{{$grupo->nombre}}</a>
            @endforeach 
    </div>
    <br>
  </div>
</div>  
<div class="container">  
  <div class="table-responsive card">       
  <table class="table">  
    <thead class="thead-light"> 
    <tr>
      <th>No</th>
      <th></th>
      <th>equipo</th>
      <th>pj</th>
      <th>pg</th>
      <th>pe</th>
      <th>pp</th>
      <th>gf</th>
      <th>gc</th>
      <th>df</th>
      <th>puntos</th> 
    </tr>
    </thead> 
    <tbody>
      @php
      $row =1; 
      @endphp
      @foreach ($equipos as $equipo)
      {{-- {{ dd($equipo) }} --}}
          @php
           if ($row<=2){
           $e = 'class=table-success';
           }
           else  {
             $e = "";
          }  
          @endphp  
       <tr {{$e}}>
          <td>{{ $loop->iteration }}</td>
          <td>
            <img src=" {{ url('imagenes').'/'.$equipo->imagen}}" width="5%" class="logo">
          </td>
          <td>{{$equipo->nombre}}</td>
          <td>{{$equipo->pj}}</td>
          <td>{{$equipo->pg}}</td>
          <td>{{$equipo->pe}}</td>
          <td>{{$equipo->pp}}</td>
          <td>{{$equipo->gf}}</td>
          <td>{{$equipo->gc}}</td>
          <td>{{$equipo->gd}}</td>    
          <td>{{$equipo->puntos}}</td>
          @php
          $row ++;
          @endphp
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




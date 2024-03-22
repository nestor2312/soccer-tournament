
@extends('adminlte::page')

@section('title', 'Admin')

@section('content_header')
    <h1>crear partido</h1>
@stop

@section('content')
<div class="col-xs-12 col-sm-12 col-md-12 form" >
  <p class="col-xs-12 col-sm-12 col-md-12 text-center form-title">Partido</p>
    <form class="form-horizontal" action="/partidos"  class="was-validated" method="POST" >
      @csrf
     
          <div class="row">
            <div class="col" id="clone" >
              <label for="">local</label>  
              <select name="equipoA_id[]" id="" class="form-control ">
                @foreach ($equipos as $equipo)
                <option value="{{$equipo->id}}">{{$equipo->nombre}}</option>
                @endforeach
            </select>
            </div>
            <div class="col">
              <label for="" class="text-center">marcador</label>  
              <input type="number" class="form-control"  name="marcador1[]" required>
            </div>
            <div class="col">
              <label for="">marcador</label>  
          <input type="number" class="form-control"  name="marcador2[]" required>
            </div>
            <div class="col">
              <label for="">visitante</label>  
              <select name="equipoB_id[]" id="" class="form-control">
                @foreach ($equipos as $equipo)
                <option value="{{$equipo->id}}">{{$equipo->nombre}}</option>
                @endforeach
            </select>
            </div>
          </div>
          <div id="newRow"></div>
      <button type="submit" class="btn btn-success">registrar</button>
      <a href="/partidos" class="btn btn-danger">cancelar</a>
      <button id="addRow" type="button" class="btn btn-info">Agregar</button>
    </form>
    </div>
<br>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">
  // agregar registro
  $("#addRow").click(function () {
  var html = '';
  
  html += '<div class="row" id="clone">';
  html += ' <div class="col">';
  html += '<label for="">local</label>  ';
  html += '  <select name="equipoA_id[]" id="" class="form-control ">';
  html += '  @foreach ($equipos as $equipo)';
  html += ' <option value="{{$equipo->id}}">{{$equipo->nombre}}</option>';
  html += ' @endforeach';
  html += '  </select>';
  html += ' </div>';
  html += '<div class="col">';
  html += '<label for="" class="text-center">marcador</label>';
  html += ' <input type="number" class="form-control"  name="marcador1[]" required>';
  html += ' </div>';
  html += '  <div class="col">';
  html += ' <label for="">marcador</label> ';
  html += ' <input type="number" class="form-control"  name="marcador2[]" required>';
  html += '</div>';
  html += '<div class="col">';
  html += '<label for="">visitante</label> >';
  html += '<select name="equipoB_id[]" id="" class="form-control">';
  html += ' @foreach ($equipos as $equipo)';
  html += '  <option value="{{$equipo->id}}">{{$equipo->nombre}}</option>';
  html += ' @endforeach';
  html += ' </select>';
  html += '<br>';
  html += '<button id="removeRow" type="button" class="btn btn-danger posicion ">Borrar</button>';
  html += ' </div>';
  html += ' </div>';
  html += '<br>';

  $('#newRow').append(html);
      });
      
      // borrar registro
      $(document).on('click', '#removeRow', function () {
      $(this).closest('#clone').remove();
      });
  </script>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop





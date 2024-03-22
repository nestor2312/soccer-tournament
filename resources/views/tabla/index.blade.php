@extends('adminlte::page')

@section('title', 'Admin')

@section('content_header')
<h1>Tabla de posiciones por grupo</h1>
<h2>Seleccione un grupo para ver la tabla de posiciones</h2>
@stop

@section('content')

<div class="container-fluid">
    <div class="d-flex flex-wrap">
        @foreach ($grupos as $grupo)
            <a href="/grupos/{{$grupo->id}}/equipos" class="btn btn-outline-info btn-lg mr-3 mb-3">{{$grupo->nombre}}</a>
        @endforeach 
    </div>
</div>
@stop
@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
    <link rel="stylesheet" href="/css/estilo.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
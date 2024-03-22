@extends('adminlte::page')

@section('title', 'Jugadores')

@section('content_header')
    <h1>Jugadores</h1>
@stop

@section('content')

<div>
  <a href="jugadores/create" class="btn btn-success margen">Registrar Jugador</a> <br>   
</div>
<div id="alerta" class="alerta alert-dismissible fade show" role="alert" style="display: none;">
  Jugador agregado correctamente.
</div>
@if (session('mensaje'))
    <script>
        document.getElementById('alerta').style.display = 'block';
        setTimeout(function() {
            document.getElementById('alerta').style.display = 'none';
        }, 5000);
    </script>
@endif
<div class="col-12">
  <h5>filtrar por equipo</h5>
  {{-- <div class="dropdown-menu">
    @foreach ($equipos as $equipo)
        <a href="/equipos/{{$equipo->id}}/jugadores"class="btn btn-warning">{{$equipo->nombre}}</a>
        @endforeach 
  </div> --}}
</div>
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
              <td  class="center">
                <img src="imagenes/{{$jugador->equipo->imagen}}"></td>
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
                  
                   <button type="submit" class="btn btn-danger far fa-trash-alt delete-btn"></button>
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
    <link rel="stylesheet" href="{{ asset('css/sweetalert2.min.css') }}">
    <link rel="stylesheet" href="/css/estilo.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
@stop

@section('js')
   
<script src="{{ asset('js/sweetalert2.all.min.js') }}"></script>


<script>
  setTimeout(function(){
      $('.alerta').fadeOut();
  }, 3000); //tiempo en milisegundos, en este caso 5 segundos
</script>

<script>
$('.delete-btn').on('click', function(e) {
    e.preventDefault();
    Swal.fire({
        title: '¿Está seguro que desea eliminar este jugador?',
        text: "¡No podrás revertir esto!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí, eliminar',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
          Swal.fire({
      title: "Eliminado!",
      text: "El jugador ha sido eliminado.",
    });
            $(this).closest('form').submit();
        }
    })
});
</script>
@stop



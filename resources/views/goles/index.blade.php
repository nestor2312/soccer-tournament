@extends('adminlte::page')

@section('title', 'Equipos')

@section('content_header')
    <h1>goleadores</h1>
@stop

@section('content')

<div>
  <a href="goles/create" class="btn btn-success margen">registrar goleador</a> <br>   
</div>
<div id="alerta" class="alerta alert-dismissible fade show" role="alert" style="display: none;">
  Anotacion agregado correctamente.
</div>
@if (session('mensaje'))
    <script>
        document.getElementById('alerta').style.display = 'block';
        setTimeout(function() {
            document.getElementById('alerta').style.display = 'none';
        }, 5000);
    </script>
@endif
<div class="container-fluid ">  
  <div class="table-responsive card">         
  <table class="table">
    <thead class="thead-light">
      <tr>
        <th class="center">Jugador</th>
        <th class="center">Goles</th>
        <th class="center">Acciones</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($goles as $gol)
            <tr>
                <td class="center"> {{$gol->jugador->nombre}}</td>
                <td class="center"> {{$gol->goles}}</td>
              <td class="center">
              <form action="{{ route ('goles.destroy',$gol->id)}}" method="post">
                <a href="goles/{{$gol->id}}/edit" class="btn btn-warning fas fa-pen"></a>  
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
    <link rel="stylesheet" href="/css/admin_custom.css">
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
        title: '¿Está seguro que desea eliminar esta anotacion?',
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
      text: "La anotacion ha sido eliminado.",
    });
            $(this).closest('form').submit();
        }
    })
});
</script>
@stop



@extends('adminlte::page')

@section('title', 'Equipos')

@section('content_header')
    <h1>Equipos</h1>
@stop

@section('content')

<div>
  <a href="equipos/create" class="btn btn-success margen">crear</a> <br>   
</div>
<div>
@foreach ($grupos as $grupo)
    <a href="/grupos/{{$grupo->id}}/equipos" class="btn btn-info">{{$grupo->nombre}}</a>
@endforeach  
</div> 
     
<div id="alerta" class="alerta alert-dismissible fade show" role="alert" style="display: none;">
  Equipo agregado correctamente.
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
  <div class="table-responsive card my-2">   
  <table class="table ">
    <thead class="thead-light">
      <tr>
        <th class="center">Logo</th>
        <th class="center">Grupo</th>
        <th class="center">Equipo</th>
        <th class="center">Acciones</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($equipos as $equipo)
            <tr>
              <td  class="center">
                <img src="imagenes/{{$equipo->imagen}}">
              </td>
              <td class="center"> {{$equipo->grupo->nombre}}</td>
                <td class="center"> {{$equipo->nombre}}</td>
              <td class="center">
            <form action="{{ route ('equipos.destroy',$equipo->id)}}" method="post">
              <a href="equipos/{{$equipo->id}}/edit" class="btn btn-warning fas fa-pen"></a>            
            @csrf                                
            @method('delete')
               <button type="submit" class="btn btn-danger far fa-trash-alt delete-btn"></button>
              </form>
            </td>
          </tr>    
            @endforeach
    </tbody>
  </table>
  <div class="d-flex justify-content-left-end">
    {!! $equipos->links()!!}
  </div>
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
            title: '¿Está seguro que desea eliminar este equipo?',
            text: "¡No podrás revertir esto!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sí, eliminar',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                $(this).closest('form').submit();
            }
        })
    });
</script>
@stop



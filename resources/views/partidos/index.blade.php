@extends('adminlte::page')

@section('title', 'Partidos')

@section('content_header')
    <h1>Partidos</h1>
@stop

@section('content')
<div>
<a href="partidos/create" class="btn btn-success margen">crear partido</a>
</div>
<div id="alerta" class="alerta alert-dismissible fade show" role="alert" style="display: none;">
  partido agregado correctamente.
</div>
@if (session('mensaje'))
    <script>
        document.getElementById('alerta').style.display = 'block';
        setTimeout(function() {
            document.getElementById('alerta').style.display = 'none';
        }, 5000);
    </script>
@endif
<div class="container ">  
    <div class="table-responsive card">         
    <table class="table">
      <thead class="thead-light">
        <tr>
            <th class="center">Local</th>
            <th></th>
            <th></th>
            <th></th>
            <th class="center">Visitante</th>
            <th class="center">Acciones</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($partidos as $partido)
        <tr>
         
            <th class="center">{{ $partido->equipoA->nombre }}</th>
            <th class="center">{{ $partido->marcador1 }}</th>
            <th class="center"> - </th>
            <th class="center">{{ $partido->marcador2 }}</th>
            <th class="center">{{ $partido->equipoB->nombre }}</th> 
            <th class="center">
             <form action="{{ route ('partidos.destroy',$partido->id)}}" method="post">
              <a href="partidos/{{$partido->id}}/edit" class="btn btn-warning fas fa-pen"></a>
                @csrf                                
                  @method('delete')
             <button type="submit" class="btn btn-danger far fa-trash-alt delete-btn"></button>
            </form><br>
            
            </th>
        </tr>
        {{-- @empty
                        <tr>
                            <td colspan="6">No hay equipos</td>
                        </tr> --}}
        @endforeach
      </tbody>
    </table>
    <div class="d-flex justify-content-left-end">
      {!! $partidos->links()!!}
    </div>
  </div>
  </div>
@stop

@section('css')
<link rel="stylesheet" href="{{ asset('css/sweetalert2.min.css') }}">
  
    <link rel="stylesheet" href="/css/estilo.css">
    <link rel="stylesheet"  href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
@stop

@section('js')

<script src="{{ asset('js/sweetalert2.all.min.js') }}"></script>

<script>
  setTimeout(function(){
      $('.alerta').fadeOut();
  }, 2000); //tiempo en milisegundos, en este caso 5 segundos
</script>

<script>
$('.delete-btn').on('click', function(e) {
    e.preventDefault();
    Swal.fire({
        title: '¿Está seguro que desea eliminar este partido?',
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
      text: "El partido se ha sido eliminado.",
    });
            $(this).closest('form').submit();
        }
    })
});
</script>


{{-- <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap.min.js"></script> --}}

@stop

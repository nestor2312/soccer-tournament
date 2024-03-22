<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Partidos</title>
   <link rel="stylesheet" href="/css/estilo.css">
   <link rel="stylesheet" href="/css/uno.css">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
  <script src="/js/main.js"></script>
  <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap.min.js"></script>
</head>
<body class="user">
  <nav class="navbar navbar-expand-lg  fondo">
    <a class="nav-link link uppercase " href="inicio">Inicio</a>
      <button button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <svg xmlns="http://www.w3.org/2000/svg" height="2rem" color="white" fill="none" viewBox="0 0 24 24" stroke="currentColor" strokeWidth={2}>
          <path strokeLinecap="round" strokeLinejoin="round" d="M4 6h16M4 12h16M4 18h16" />
        </svg>
      </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item ">
          <a class="nav-link link active" href="matches">Partidos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link link uppercase" href="players">Jugadores</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link link dropdown-toggle" data-toggle="dropdown" href="#">Tabla de posiciones</a>    
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            @foreach ($grupos as $grupo)
            <a class="dropdown-item" href="{{ url('/group/'.$grupo->id.'/teams') }}">{{$grupo->nombre}}</a>
          @endforeach 
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link link dropdown-toggle" data-toggle="dropdown" href="#">Estadisticas</a>    
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item"  href="{{ url('goleador') }}">Goleadores</a>
            <a class="dropdown-item"  href="{{ url('asistidor') }}">Asistidores</a>
          </div>
        </li>
      </ul>
    </div>
  </nav>
<div class="container mt-4">
    <div class="row hiden2">
        @foreach ($partidos as $partido)
        <div class="col-md-4 mb-4 ">
            <div class="card card-matches d-flex justify-content-center align-items-center">
                <div class="card-body  d-flex justify-content-center align-items-center ">
                    <div class="row">
                        <div class="col-4 d-flex justify-content-start align-items-center">
                            <img src="{{ url('imagenes').'/'.$partido->equipoA->imagen }}" class="logo2 " alt="{{ $partido->equipoA->nombre }}">
                            <span class="team ">{{ $partido->equipoA->nombre }}</span>
                        </div>
                        <div class="col-4 d-flex flex-wrap align-content-around justify-content-center">
                            <span class="score">{{ $partido->marcador1 }}-{{ $partido->marcador2 }}</span>
                        </div>
                        <div class="col-4 d-flex justify-content-end align-items-center">
                          <span class="team ">{{ $partido->equipoB->nombre }}</span>
                          <img src="{{ url('imagenes').'/'.$partido->equipoB->imagen }}" class="logo2 " alt="{{ $partido->equipoB->nombre }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        <div class="container-fluid">
          <div class="d-flex justify-content-left-end mt-">
            {!! $partidos->links()!!}
          </div>
        </div>
    </div> 
  </div>
  <div class="col-sm-12 d-lg-none">
    <div class="card border-0 shadow">
      <div class="card-header fondo-card TITULO border-0">Partidos</div>
      <div class="card table-responsive border-0 table-sm">         
        <table class="table-borderless">
          <thead>
              <tr>
                  <th></th>
                  <th class="titulo2 text-left">Local</th>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th class="titulo2 text-right">Visitante</th>
                  <th></th>
              </tr>
          </thead>
          <tbody>
              @foreach ($partidos as $partido)
              <tr>
                  <td style="width: 5%;" >
                      <img src="{{ url('imagenes').'/'.$partido->equipoA->imagen }}" width="100%" class="logo" alt="{{ $partido->equipoA->nombre }}">
                  </td>
                  <td class="text-left team" style="width: 40%;">{{ $partido->equipoA->nombre }}</td>
                  <td class=" data">{{ $partido->marcador1 }}</td>
                  <th class=" data">-</th>
                  <td class=" data">{{ $partido->marcador2 }}</td>
                  <td class="text-right team" style="width: 40%;">{{ $partido->equipoB->nombre }}</td>
                  <td style="width: 5%;" >
                      <img src="{{ url('imagenes').'/'.$partido->equipoB->imagen }}" width="100%" class="logo" alt="{{ $partido->equipoB->nombre }}">
                  </td>
              </tr>
              @endforeach
          </tbody>
      </table>  
      </div>
    </div>
    {{-- <button class="botonUno btn-block" ><span><a href="matches" class="matches">ver mas partidos</a></span></button>    --}}
    <div class="container-fluid d-lg-none">
      <div class="d-flex justify-content-left-end mt-2">
        {!! $partidos->links()!!}
      </div>
    </div>
  </div>




      
  

</body>
</html>
              {{-- @foreach ($partidos as $partido)
              <div class="col-12 col-sm-6 col-md-4 mt-4">
                <div class="card border-0">
                  <div class="card-body card-shadow">
                    <div class="row align-items-center"> <!-- Alinea verticalmente los elementos de la fila -->
                        <div class="col-4 col-sm-4 col-md-4">
                            <div class="d-flex align-items-center"> <!-- Alinea verticalmente los elementos del contenedor -->
                              <img src="{{ url('imagenes').'/'.$partido->equipoA->imagen }}" class="d-block mx-auto my-1 logo2" alt="{{ $partido->equipoA->nombre }}">
                              <h6 class="text-center team">{{ $partido->equipoA->nombre }}</h6>
                            </div>
                        </div>
                        <div class="col-4 col-sm-4 col-md-4 text-center">
                            <div class="d-flex flex-column align-items-center"> <!-- Alinea verticalmente los elementos del contenedor -->
                                <h5 class="score">{{ $partido->marcador1 }}-{{ $partido->marcador2 }}</h5>
                            </div>
                        </div>
                        <div class="col-4 col-sm-4 col-md-4">
                            <div class="d-flex align-items-center"> <!-- Alinea verticalmente los elementos del contenedor -->
                              <h6 class="text-center team">{{ $partido->equipoB->nombre }}</h6>
                              <img src="{{ url('imagenes').'/'.$partido->equipoB->imagen }}" class="d-block mx-auto my-1 logo2" alt="{{ $partido->equipoB->nombre }}">
                            </div>
                        </div>
                    </div>
                </div>   
              </div>
              </div>
              @endforeach --}}
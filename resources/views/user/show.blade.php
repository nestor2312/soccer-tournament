<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Jugador</title>
   <link rel="stylesheet" href="/css/estilo.css">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body class="user">
  <nav class="navbar navbar-expand-lg  fondo">
    <a class="nav-link link uppercase" href="{{ url('inicio') }}">Inicio</a>
      <button button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <svg xmlns="http://www.w3.org/2000/svg" height="2rem" color="white" fill="none" viewBox="0 0 24 24" stroke="currentColor" strokeWidth={2}>
          <path strokeLinecap="round" strokeLinejoin="round" d="M4 6h16M4 12h16M4 18h16" />
        </svg>
      </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item ">
          <a class="nav-link link" href="matches">Partidos</a>
        </li>
        <li class="nav-item ">
          <a class="nav-link link uppercase active" href="players">Jugadores</a>
        </li>
        <li class="nav-item ">
          <a class="nav-link link uppercase" href="table">Tabla de posiciones</a>
        </li>
        {{-- <li class="nav-item dropdown">
          <a class="nav-link link dropdown-toggle" data-toggle="dropdown" href="#">Tabla de posiciones</a>    
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            @foreach ($grupos as $grupo)
            <a class="dropdown-item" href="{{ url('/group/'.$grupo->id.'/teams') }}">{{$grupo->nombre}}</a>
          @endforeach 
          </div>
        </li> --}}
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
  {{-- <div class="container-fluid h-100">
    <div class="row h-100 justify-content-center">
      <div class="col-12 col-sm-12 col-md-8 mt-5 mb-5 d-flex align-items-center">
        <div class="card mx-auto border-0 shadow flashcard"> --}}

<div class="container">
  <div class="row d-flex justify-content-center align-items-center">
    <div class="col-12 col-sm-12 col-md-12">
      <div class="col-12 col-sm-12 col-md-6 mt-5 mb-5 ">
        <div class="card border-0 shadow flashcard  d-flex align-items-center ">
          <div class="card-body">
            <div class="front">
              <div>
                  <img src="{{ url('imagenes').'/'.$jugador->equipo->imagen }}" width="5%" class="logo">
              </div>
              <div class="row">
                  <div class="col-7 col-sm-6 col-md-6">
                      <ul class="list-group list-group-flush text-right">
                          <li class="list-group-item border-0 titulo3">Nombre:</li>
                          <li class="list-group-item border-0 titulo3">Equipo:</li>
                          <li class="list-group-item border-0 titulo3">Edad:</li>
                          <li class="list-group-item border-0 titulo3">Número:</li>
                      </ul>
                  </div>
                  <div class="col-5 col-md-6">
                      <ul class="list-group list-group-flush text-right">
                          <li class="list-group-item border-0 score text-capitalize">{{ $jugador->nombre }}</li>
                          <li class="list-group-item border-0 score text-capitalize">{{ $jugador->equipo->nombre }}</li>
                          <li class="list-group-item border-0 score ">{{ $jugador->edad }}</li>
                          <li class="list-group-item border-0 score ">{{ $jugador->numero }}</li>
                      </ul>
                  </div>
              </div>
              <div class="row mt-3 justify-content-center">
                  <div class="col-md-8  text-center">
                      <button class="botonUno flip"><span>Estadísticas</span></button>
                  </div>
              </div>
          </div>
            <div class="back">
                <div class="row ">
                    <div class="col-7 col-md-6">
                        <ul class="list-group list-group-flush text-right">
                            <li class="list-group-item border-0 titulo3">Goles:</li>
                            <li class="list-group-item border-0 titulo3">Asistencias:</li>
                            <li class="list-group-item border-0 titulo3">T Amarillas:</li>
                            <li class="list-group-item border-0 titulo3">T Rojas:</li>
                        </ul>
                    </div>
                    <div class="col-5 col-md-6">
                        <ul class="list-group list-group-flush text-right">
                          @forelse  ($jugador->goles as $gol)
                          <li class="list-group-item border-0 score text-capitalize">{{$gol->goles  }}</li>
                      @empty
                          <li class="list-group-item border-0 score text-capitalize">Sin anotaciones</li>
                      @endforelse
                         
                  @forelse ($jugador->asistencias as $asistencia)
                  <li class="list-group-item border-0 score text-capitalize">{{$asistencia->asistencias }}</li>
              @empty
                  <li class="list-group-item border-0 score text-capitalize">Sin asistencias</li>
              @endforelse
                            <li class="list-group-item border-0 score ">{{$jugador->cardA->tarjeta_A }}</li>
                            <li class="list-group-item border-0 score ">{{ $jugador->cardR->tarjeta_R }}</li>
                        </ul>
                    </div>
                   
                </div>
                <div class="row mt-3 justify-content-center">
                    <div class="col-md-12 text-center">
                      <button class="botonUno flip"><span>Volver</span></button>
                    </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
<script src="/js/index.js"></script>





</body>
</html>
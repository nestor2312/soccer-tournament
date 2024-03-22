<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Equipos</title>
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
          <a class="nav-link link uppercase active" href="table">Tabla de posiciones</a>
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

  <div class="container">
    
   
    
      <div class="container-fluid ">  
        <div class="col-12 col-sm-12 col-md-12 mt-4">
            <div class="card border-0 shadow ">
              <div class="card-header fondo-card TITULO border-0">Equipos</div>
              <div class="card-body">
              <div class="row justify-content-around " >
                  @foreach ($equipos as $equipo)
                  <a href="/team/{{$equipo->id}}/players" class="team-item2 ">                      
                      <div class="inner-card mt-3 d-flex flex-wrap align-content-end justify-content-center">
                          <div> <!-- Alinea verticalmente los elementos del contenedor -->
                            <img src="{{ url('imagenes').'/'.$equipo->imagen }}" width="50%" class="d-block mx-auto my-3 logomovil" alt="{{ $equipo->nombre }}">
                            <h6 class="text-center team">{{ $equipo->nombre }}</h6>
                        </div>
                      </div>
                  </a> 
                  @endforeach
                </div> 
              </div>
            </div>
          </div>
      </div> 
  </div>
</body>
</html>
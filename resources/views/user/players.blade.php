<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Jugadores</title>
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

  <div class="container">
    <div class="row mt-2 mb-3">
      <div class="col-sm-8">
        <div class="dropdown">
          <button type="button" class="btn dropdown-toggle  btn-lg" data-toggle="dropdown">
            Equipos
          </button>
          <div class="dropdown-menu">
            <a href="{{ url('players') }}" class="dropdown-item btn-block">
                <span>Ver Todos</span>
            </a>
            @foreach ($equipos as $equipo)
                <a href="/team/{{$equipo->id}}/players" class="dropdown-item">{{$equipo->nombre}}</a>
            @endforeach 
        </div>
        
        </div>
      </div>
    </div>
    
      <div class="container-fluid ">  
        <div class="row hiden2">
          @foreach ($jugadores as $jugador)
          <div class="col-md-4 mb-4 ">
            <a href="{{ route('user.show', $jugador->id) }}" class="team-item2">         
              <div class="card card-matches card-hover d-flex justify-content-center align-items-center">
                  <div class="card-body  d-flex justify-content-center align-items-center ">
                      <div class="row">
                          <div class="col-7 d-flex justify-content-around align-items-center">
                              <img src="{{ url('imagenes').'/'.$jugador->equipo->imagen }}" class="logomovil logo2 ">
                              <span class="team ">{{ $jugador->numero }} {{ $jugador->equipo->nombre }}</span>    
                          </div>
                          <div class="col-5 d-flex justify-content-center align-items-center">
                            <span class="team ">{{ $jugador->nombre }} {{ $jugador->apellido }}</span>   
                            {{-- <a href="{{ route('user.show', $jugador->id) }}" class="btn btn-primary fas fa-book">ver mas</a> --}}

                        </div>
                          
                      </div>
                  </div>
              </div>
          </div>
          </a>    
          @endforeach
          @if (count($jugadores) === 0)
          <div class="col-md-12">
            <div class="alert alert-info">
              <strong> No hay jugadores registrados en este momento.</strong>
            </div>
              
          </div>
      @endif
      </div>
    </div>


      <div class="col-sm-12 col-md-12 mt-4 d-lg-none">
        <div class="card border-0 shadow ">
          <div class="card-header fondo-card TITULO border-0">Jugadores</div>
          <div class="card table-responsive border-0 table-sm">         
            <table class="table-borderless">  
              <thead> 
              <tr>
                <th></th>
                <th class="movil titulo2">Equipo</th>
                <th class="movil titulo2">Nombre</th>  
              </tr>
              </thead> 
              <tbody>
                @foreach ($jugadores as $jugador)
                 <tr>
                    <td style="width: 5%;">
                      <img src=" {{ url('imagenes').'/'.$jugador->equipo->imagen}}" width="5%" class="logo">
                    </td>
                    <td class="movil data text-capitalize">{{$jugador->equipo->nombre}}</td>
                      <td class="movil data text-capitalize">{{$jugador->nombre}}</td>
                      <td><a href="{{ route('user.show', $jugador->id) }}" class="btn btn-outline-info btn-sm">Ver mas </a></td>
              </tr>
            </a>
                  @endforeach              
              </tbody> 
            </table>
            @if (count($jugadores) === 0)
            <div class="col-md-12 mt-2">
              <div class="alert alert-info">
                <strong> No hay jugadores registrados en este momento.</strong>
              </div> 
            </div>
        @endif
          </div>
        </div>
      </div>





     
  </div>
</body>
</html>
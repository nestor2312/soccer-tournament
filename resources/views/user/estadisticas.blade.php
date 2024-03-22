<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Estadisticas</title>
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
          <a class="nav-link link" href="matches">Partidos</a>
        </li>
        <li class="nav-item ">
          <a class="nav-link link uppercase" href="players">Jugadores</a>
        </li>
        <li class="nav-item ">
          <a class="nav-link link" href="#">Tabla de posiciones</a>    
          </a>
          <div class="dropdown-menu">
            @foreach ($grupos as $grupo)
            <a class="dropdown-item" href="{{ url('/group/'.$grupo->id.'/teams') }}">{{$grupo->nombre}}</a>
          @endforeach 
          </div>
        </li>
        <li class="nav-item ">
          <a class="nav-link link active" href="#">Estadisticas</a>
        </li>
      </ul>
    </div>
  </nav>

  <div class="container">
    <div class="row">
      <div class="col-sm-12 col-md-6 mt-4">
        <div class="card border-0 shadow ">
          <div class="card-header fondo-card TITULO border-0">Goleadores</div>
          <div class="card table-responsive border-0 table-sm">         
            <table class="table-borderless">  
              <thead> 
              <tr>
                <th></th>
                <th class="movil titulo2 text-left">Nombre</th>
                <th class="movil titulo2">Anotaciones</th> 
              </tr>
              </thead> 
              <tbody>
                @foreach ($goles as $gol)
                 <tr>
                    <td style="width: 5%;">
                      {{-- <img src=" {{ url('imagenes').'/'.$equipo->imagen}}" width="5%" class="logo"> --}}
                    </td>
                    <td style="width: 30%;" class="movil team"> {{$gol->jugador->nombre}}</td>
                    <td class="movil data"> {{$gol->goles}}</td>       
              </tr>
                  @endforeach             
              </tbody> 
            </table>
          </div>
        </div>
      </div>
      <div class="col-sm-12 col-md-6 mt-4">
        <div class="card border-0 shadow ">
          <div class="card-header fondo-card TITULO border-0">Asistencias</div>
          <div class="card table-responsive border-0 table-sm">         
            <table class="table-borderless">  
              <thead> 
              <tr>
                <th></th>
                <th class="movil titulo2 text-left">Nombre</th>
                <th class="movil titulo2">Asistencias</th> 
              </tr>
              </thead> 
              <tbody>
                  @foreach ($asistencias as $asistencia)
                 <tr>
                    <td style="width: 5%;">
                      {{-- <img src=" {{ url('imagenes').'/'.$equipo->imagen}}" width="5%" class="logo"> --}}
                    </td>
                    <td style="width: 30%;" class="movil team"> {{$asistencia->jugador->nombre}}</td>
                    <td class="movil data"> {{$asistencia->asistencias}}</td>       
              </tr>
                  @endforeach             
              </tbody> 
            </table>
          </div>
        </div>
      </div>
      </div>
  </div>  
  </div>
</body>
</html>
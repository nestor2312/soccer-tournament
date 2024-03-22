<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Tabla de posicions</title>
   <link rel="stylesheet" href="/css/estilo.css">

   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
 
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
        <li class="nav-item dropdown">
          <a class="nav-link link dropdown-toggle active" data-toggle="dropdown" href="#">Tabla de posiciones</a>    
          </a>
          
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
  <div class="container">
    <div class="row">
        @foreach ($datosGrupos as $datosGrupo)
            <div class="col-12 col-sm-12 col-md-6 mt-4">
                <div class="card border-0 shadow">
                    <div class="card-header fondo-card TITULO border-0">{{ $datosGrupo['grupo']->nombre }} </div>
                    <div class="card table-responsive border-0 table-sm">
                        <table class="table-borderless">
                          {{-- <thead>
                            <tr>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                
                                
                            </tr>
                        </thead> --}}
                            <tbody>
                                <tr class="py-2">
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td class="titulo2 movil">pj</td>
                                    <td class="titulo2 movil">pg</td>
                                    <td class="titulo2 movil">pe</td>
                                    <td class="titulo2 movil">pp</td>
                                    <td class="titulo2 movil">gf</td>
                                    <td class="titulo2 movil">gc</td>
                                    <td class="titulo2 movil">df</td>
                                    <td class="titulo2 movil">pts</td>
                                </tr>
                                @php
                                $row = 1;
                                @endphp
                                @foreach ($datosGrupo['equipos'] as $equipo)
                                    @php
                                    if ($row <= 2) {
                                        $e = 'class=table-success';
                                    } else {
                                        $e = "";
                                    }
                                    $row++;
                                    @endphp
                                    <tr {{ $e }} >
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                          <img src=" {{ url('imagenes').'/'.$equipo->imagen}}" width="5%" class="logo">
                                        </td>
                                        <td class="movil data text-left team">{{ $equipo->nombre }}</td>
                                        <td class="movil data">{{ $equipo->pj }}</td>
                                        <td class="movil data">{{ $equipo->pg }}</td>
                                        <td class="movil data">{{ $equipo->pe }}</td>
                                        <td class="movil data">{{ $equipo->pp }}</td>
                                        <td class="movil data">{{ $equipo->gf }}</td>
                                        <td class="movil data">{{ $equipo->gc }}</td>
                                        <td class="movil data">{{ $equipo->gd }}</td>
                                        <td class="movil data">{{ $equipo->puntos }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    
</div>



</body>
</html>
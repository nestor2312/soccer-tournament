<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>inicio</title>
   
   <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
   <link rel="stylesheet" href="/css/estilo.css">
  {{-- <script src="/js/main.js"></script> --}}
  {{-- <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap.min.js"></script> --}}
</head>
<body class="user">
  <nav class="navbar navbar-expand-lg  fondo">
    <a class="nav-link link uppercase active" href="inicio">Inicio</a>
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
          <a class="nav-link link uppercase" href="teams">Equipos</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link link dropdown-toggle" data-toggle="dropdown" href="#">Tabla de posiciones</a>    
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            {{-- @foreach ($grupos as $grupo)
            <a class="dropdown-item" href="{{ url('/group/'.$grupo->id.'/teams') }}">{{$grupo->nombre}}</a>
          @endforeach  --}}
          </div>
        </li>
        <li class="nav-item ">
          <a class="nav-link link uppercase" href="{{ url('estadisticas') }}">Estadisticas</a>
        </li>
     
      </ul>
    </div>
  </nav>

  <div class="container">
    <div class="row">
      <div class="col-sm-12 col-md-6 mt-4">
        <div class="card border-0 shadow ">
          <div class="card-header fondo-card TITULO border-0">Clasificacion</div>
          <div class="card table-responsive border-0 table-sm">         
            <table class="table-borderless">  
              <thead> 
              <tr>
                <th></th>
                <th></th>
                <th class="movil titulo2">pj</th>
                <th class="movil titulo2">pg</th>
                <th class="movil titulo2">pe</th>
                <th class="movil titulo2">pp</th>
                <th class="movil titulo2">gf</th>
                <th class="movil titulo2 hiden">gc</th>
                <th class="movil titulo2">pts</th> 
              </tr>
              </thead> 
              <tbody>
                @foreach ($equipos as $equipo)
                 <tr>
                    <td style="width: 5%;">
                      <img src=" {{ url('imagenes').'/'.$equipo->imagen}}" width="5%" class="logo">
                    </td>
                    <td style="width: 30%;" class="movil team">{{$equipo->nombre}}</td>
                    <td class="movil data">{{$equipo->pj}}</td>
                    <td class="movil data">{{$equipo->pg}}</td>
                    <td class="movil data">{{$equipo->pe}}</td>
                    <td class="movil data">{{$equipo->pp}}</td>
                    <td class="movil data">{{$equipo->gf}}</td>
                    <td class="movil data hiden">{{$equipo->gc}}</td>
                    <td class="movil data">{{$equipo->puntos}}</td>         
              </tr>
                  @endforeach             
              </tbody> 
            </table>
          </div>
          {{-- <button class="botonUno btn-block" ><span><a href="matches" class="matches">ver Clasificacion</a></span></button>     --}}
        </div>
      </div>
      <div class="col-sm-12 col-md-6 mt-4">
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
      </div>
      <div class="col-12 col-sm-12 col-md-12 mt-4">
        <div class="card border-0 shadow ">
          <div class="card-header fondo-card TITULO border-0">Equipos</div>
          <div class="card-body">
          <div class="row justify-content-around " >
              @foreach ($teams as $equipo)
              <div class="team-item ">
                  <div class="inner-card  d-flex flex-wrap align-content-end justify-content-center">
                    <div> <!-- Alinea verticalmente los elementos del contenedor -->
                      <img src="{{ url('imagenes').'/'.$equipo->imagen }}" width="50%" class="d-block mx-auto my-3 logomovil" alt="{{ $equipo->nombre }}">
                      <h6 class="text-center team">{{ $equipo->nombre }}</h6>
                    </div>
                  </div>
              </div> 
              @endforeach
            </div> 
          </div>
        </div>
      </div>
      <div class="col-sm-12 col-md-12 mt-4">
        <div class="card mt-2 border-0 shadow">
          <div class="card-header fondo-card TITULO border-0">Eliminatorias</div>
            <div class="titulos">
              <div class="titulo"  >Cuartos</div>
              <div class="titulo" >Semis</div>
              <div class="titulo" >Final</div>
              <div class="titulo" >Campeón</div>
            </div>
          <div>
            <div class="esquema">
              <div class="jornada_contenedor">
                  {{--cuartos --}}       
    
     @foreach ($eliminatoriasCuartos as $partido)
        <div class="partido">
            <div class="jornada">
                <div class="jugador {{ $partido->marcador1 > $partido->marcador2 ? 'win' : '' }}">  
                    @if ($partido->equipoA) {{-- Si el id existe muestra los datos: imagen, nombre y marcador  --}}
                        <img src="{{ url('imagenes').'/'.$partido->equipoA->imagen }}" class="logo" alt="sin imagen">            
                        <span class="equipo">{{$partido->equipoA->nombre}}</span>
                        <span class="goles">{{$partido->marcador1}}</span>   
                    @else {{-- Si el id es null entonces muestra tu mensaje --}}
                    <p>Por definir</p>  
                    @endif
                </div>                                                                                                                                            
                <div class="jugador {{ $partido->marcador2 > $partido->marcador1 ? 'win' : '' }}">
                    @if ($partido->equipoB)
                        <img src="{{ url('imagenes').'/'.$partido->equipoB->imagen }}" class="logo" alt="sin imagen">               
                        <span class="equipo">{{$partido->equipoB->nombre}}</span>
                        <span class="goles">{{$partido->marcador2}}</span>  
                    @else
                    <p>Por definir</p>  
                    @endif
                </div>
            </div>                  
        </div>
    @endforeach 
              </div>  
              {{-- Conectores de octavos a cuartos --}}
              <div class="conectores">
                  <div class="conector">
                      <div class="conector_doble"></div>
                      <div class="conector_simple"></div> 
                  </div>       
          
                  <div class="conector">
                      <div class="conector_doble"></div>
                      <div class="conector_simple"></div> 
                  </div>
          
                  <div class="conector">
                      <div class="conector_doble"></div>
                      <div class="conector_simple"></div> 
                  </div>
          
                  <div class="conector">
                      <div class="conector_doble"></div>
                      <div class="conector_simple"></div> 
                  </div>
              </div>
          
              {{--cuartos --}}
    
              <div class="jornada_contenedor">
                @foreach ($eliminatoriasSemis as $partido)  
                <div class="jornada">   
                    <div class=" jugador {{ $partido->marcador1 > $partido->marcador2 ? 'win' : '' }}">  
                        @if ($partido->equipoA)
                        <img src="{{ url('imagenes').'/'.$partido->equipoA->imagen }}" class="logo" alt="sin imagen">               
                            <span class="equipo">{{$partido->equipoA->nombre}}</span>
                            <span class="goles">{{$partido->marcador1}}</span>     
                            @else {{-- Si el id es null entonces muestra tu mensaje --}}                                             
                            <p>Por definir</p>  
                            @endif
                        </div>           
                </div>               
    
                <div class="jornada">          
                    <div class=" jugador {{ $partido->marcador2 > $partido->marcador1 ? 'win' : '' }}">     
                        @if ($partido->equipoB)    
                        <img src="{{ url('imagenes').'/'.$partido->equipoB->imagen }}" class="logo" alt="sin imagen">               
                            <span class="equipo">{{$partido->equipoB->nombre}}</span>
                            <span class="goles">{{$partido->marcador2}}</span>                                              
                            @else        
                            <p>Por definir</p>  
                            @endif
                        </div> 
                </div>                  
                @endforeach                
               
               
    
    </div>
    
    
              {{-- Conectores de cuartos a semifinal --}}
              <div class="conectores">
                  <div class="conector">
                      <div class="conector_doble conector_doble_semifinal"></div>
                      <div class="conector_simple"></div> 
                  </div>       
          
                  <div class="conector">
                      <div class="conector_doble conector_doble_semifinal"></div>
                      <div class="conector_simple"></div> 
                  </div>
              </div>
              {{-- final --}}    
              <div class="jornada_contenedor">
                   @foreach ($eliminatoriasFinal as $partido)  
                  <div class="jornada">            
                          <div class="conector_doble"></div>
                          <div class="conector_simple"></div>            
                        <div class="jugador {{ $partido->marcador1 > $partido->marcador2 ? 'win' : '' }}"> 
                            @if ($partido->equipoA)
                              <img src="{{ url('imagenes').'/'.$partido->equipoA->imagen }}" class="logo" alt="sin imagen">               
                              <span class="equipo">{{$partido->equipoA->nombre}}</span>
                              <span class="goles">{{$partido->marcador1}}</span> 
                              @else                                           
                              <p>Por definir</p>     
                            @endif
                       
                      </div>        
                  </div>
          
                  <div class="jornada">            
                          <div class="conector_doble"></div>
                          <div class="conector_simple"></div>
                       <div class="jugador {{ $partido->marcador2 > $partido->marcador1 ? 'win' : '' }}"> 
                        @if ($partido->equipoB)
                              <img src="{{ url('imagenes').'/'.$partido->equipoB->imagen }}" class="logo" alt="sin imagen">               
                              <span class="equipo">{{$partido->equipoB->nombre}}</span>
                              <span class="goles">{{$partido->marcador2}}</span> 
                        @else                                            
                            <p>Por definir</p>    
                        @endif
                            </div>        
                        </div>
                        @endforeach 
                      
              </div>
          
              {{-- Conectores de semifinal a ganador --}}
              <div class="conectores">
                  <div class="conector">
                      <div class="conector_doble conector_doble_ganador"></div>
                      <div class="conector_simple"></div> 
                  </div>            
              </div>
                  
              {{-- Ganador --}}
              <div class="ganador_esquema">
                  <div class="ganador ">         
                    @if ($eliminatoriasFinal)
                    @if ($partido->equipoA && $partido->equipoB)
                        <div class="conector_doble"></div> 
                        <div class="conector_simple"></div>            
                        @if ($partido->marcador1 !== null && $partido->marcador2 !== null)
                            @if ($partido->marcador1 == $partido->marcador2)
                                <div class="jugador">
                                    <span class="equipo">Por definir</span> 
                                </div>
                            @elseif ($partido->marcador2 > $partido->marcador1)
                                <div class="jugador win"> 
                                    <img src="{{ url('imagenes').'/'.$partido->equipoB->imagen }}" class="logo" alt="sin imagen"> 
                                    <span class="equipo">{{ $partido->equipoB->nombre }}</span>
                                </div>
                            @else
                                <div class="jugador win">
                                    <img src="{{ url('imagenes').'/'.$partido->equipoA->imagen }}" class="logo" alt="sin imagen">
                                    <span class="equipo">{{ $partido->equipoA->nombre }}</span>
                                </div>
                            @endif
                        @else
                            <div class="jugador">
                                <span class="equipo">No definido</span> 
                            </div>
                        @endif
                    @else
                        <div class="jugador">
                            <span class="equipo">No definido</span> 
                        </div>
                    @endif
                @endif
                
    
                  </div>   
                  
              <div>
    
          </div>
      
          </div>
          
      </div>
     
      </div>

  </div>  
</div>
    </div>
  </div>
  
  <footer class="mt-3  text-center" style="margin-bottom: 0px;">
    <h5>Derechos reservados</h5>
  </footer>
  
</body>
<script>
// // <>
// document.addEventListener('DOMContentLoaded', function() {
//     // Define la media query para pantallas menores de 768px
//     const mediaQuery = window.matchMedia('(max-width: 768px)');

//     // Función para aplicar el corte de texto
//     function aplicarCorteTexto() {
//         let elementos = document.querySelectorAll('.equipo');
//         console.log(elementos);

//         elementos.forEach(function(palabra) {
//             let texto = palabra.innerText;
//             console.log(texto.length);

//             let textoCortado = texto.substring(0, 3);
//             palabra.innerText = textoCortado;
//             console.log(textoCortado);
//             console.log(textoCortado.length);
//         });
//     }

//     // Verifica si la media query coincide
//     if (mediaQuery.matches) {
//         // Si estamos en una pantalla de menos de 768px, aplica el corte de texto
//         aplicarCorteTexto();
//     }

//     // Opcional: Agrega un listener para cambios en el tamaño de la ventana
//     // Esto es útil si quieres que el corte de texto se aplique o se remueva dinámicamente al cambiar el tamaño de la ventana.
//     mediaQuery.addListener(function(e) {
//         if (e.matches) {
//             // Si cambiamos a una pantalla de menos de 768px, aplica el corte de texto
//             aplicarCorteTexto();
//         } else {
//             // Si cambiamos a una pantalla de más de 768px, podrías querer revertir el texto a su estado original
//             // Esto requeriría almacenar el texto original antes de cortarlo y usarlo aquí para restaurar los elementos.
//         }
//     });
// });


</script>

</html>
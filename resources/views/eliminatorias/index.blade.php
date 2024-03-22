
@extends('adminlte::page')

@section('title', 'Admin')

@section('content_header')
    <h1>Eliminatorias</h1>
@stop

@section('content')
<div>
    <a href="eliminatorias/create" class="btn btn-success margen">crear</a>
</div>
<table class="table">
    <thead class="thead-light">
      <tr>
        <th class="center">Cuartos de final</th>
        <th class="center">Acciones</th>
      </tr>
    </thead>
    <tbody>
       
        @foreach ($eliminatoriasCuartos as $partido)
        <td class="center">
            {{ $partido->equipoA ? $partido->equipoA->nombre : 'No definido' }} 
            {{ $partido->marcador1 !== null ? $partido->marcador1 : '' }} -
            {{ $partido->marcador2 !== null ? $partido->marcador2 : '' }} 
            {{ $partido->equipoB ? $partido->equipoB->nombre : '' }}
        </td>
               <td class="center">
                   
                   <a href="{{ route('eliminatorias.reset',$partido->id)}}" class="btn btn-info fas fa-sync-alt reset-btn"></a>
               
                    <a href="eliminatorias/{{$partido->id}}/edit" class="btn btn-warning fas fa-pen"></a>
                    
                  
                  </td>
          </tr>    
            @endforeach
    </tbody>
  </table>
  <table class="table">
    <thead class="thead-light">
      <tr>
        <th class="center">Semifinal</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($eliminatoriasSemis as $partido)
        <td class="center">
            {{ $partido->equipoA ? $partido->equipoA->nombre : 'No definido' }} 
            {{ $partido->marcador1 !== null ? $partido->marcador1 : '' }} -
            {{ $partido->marcador2 !== null ? $partido->marcador2 : '' }} 
            {{ $partido->equipoB ? $partido->equipoB->nombre : '' }}
        </td>       <td class="center">
               
                    <form action="{{ route ('eliminatorias.destroy',$partido->id)}}" method="post">
                        <a href="eliminatorias/{{$partido->id}}/edit" class="btn btn-warning fas fa-pen"></a>
                        @csrf                                
                        <a href="{{ route('eliminatorias.reset',$partido->id)}}" class="btn btn-info fas fa-sync-alt reset-btn"></a>

                        </form>
                  </td>
          </tr>    
            @endforeach
    </tbody>
  </table>
  <table class="table">
    <thead class="thead-light">
      <tr>
        <th class="center">Final</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($eliminatoriasFinal as $partido)
        <td class="center">
            {{ $partido->equipoA ? $partido->equipoA->nombre : 'No definido' }} 
            {{ $partido->marcador1 !== null ? $partido->marcador1 : '' }} -
            {{ $partido->marcador2 !== null ? $partido->marcador2 : '' }} 
            {{ $partido->equipoB ? $partido->equipoB->nombre : '' }}
        </td>       <td class="center">
               
                    <form action="{{ route ('eliminatorias.destroy',$partido->id)}}" method="post">
                        <a href="eliminatorias/{{$partido->id}}/edit" class="btn btn-warning fas fa-pen"></a>
                        @csrf                                
                        <a href="{{ route('eliminatorias.reset',$partido->id)}}" class="btn btn-info fas fa-sync-alt reset-btn"></a>

                         
                        </form>
                  </td>
          </tr>    
            @endforeach
    </tbody>
  </table>


<div>
      <div class="titulos">
        <div class="titulo" >Cuartos</div>
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
      
          {{--semis --}}

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
          @foreach ($eliminatoriasFinal as $partido)  
          
          <div class="jornada_contenedor">
               
              <div class="jornada">  
                          
                      <div class="conector_doble"></div>
                      <div class="conector_simple"></div>            
                    <div class="jugador {{ $partido->marcador1 > $partido->marcador2 ? 'win' : '' }}"> 
                        @if ($partido->equipoA)
                          <img src="{{ url('imagenes').'/'.$partido->equipoA->imagen }}" class="logo" alt="sin imagen">               
                          <span class="equipo">{{$partido->equipoA->nombre}}</span>
                          <span class="goles">{{$partido->marcador1}}</span> 
                          @else                                           
                          <p class="equipo">Por definir</p>     
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
                    {{-- <span class="equipo">ss</span> --}}
                    <span class="goles">Por definir</span>           
                        {{-- <p class="new">Por definir</p>     --}}
                                                        
                    @endif
                        </div>        
                    </div>
                    
                    
                </div>
                
                @endforeach 
      
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





  

@stop

@section('css')
<link rel="stylesheet" href="{{ asset('css/sweetalert2.min.css') }}">
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="/css/estilo.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
    @stop

@section('js')
<script src="{{ asset('js/sweetalert2.all.min.js') }}"></script>


  

<script>
  setTimeout(function(){
      $('.alerta').fadeOut();
  }, 3000); //tiempo en milisegundos, en este caso 5 segundos
</script>

<script>
$('.reset-btn').on('click', function(e) {
    e.preventDefault();
    var self = this;
    Swal.fire({
        title: '¿Está seguro que desea resetear este partido?',
        text: "¡No podrás revertir esto y debera volver a registrar el encuentro!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí, restaurar',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            // $(this).closest('form').submit();
            window.location.href = self.getAttribute('href');
        }
    })
});
</script>
@stop
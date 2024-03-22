<style>
    #container { 
    width: 800px; 
    height: 600px; 
    float: left; 
}

section { 
    width: 130px; 
    height: 520px; 
    float: left;
}

section > div { 
    width: 100px; 
    height: 20px; 
    border: 1px solid #000; 
    margin: 10px 0; 
    background: #73789F; 
    color: white; 
    padding: 10px 10px 10px 20px;
}

section > div:nth-child(2n) { 
    margin-bottom: 40px;
}

.connecter { 
    width: 30px; 
    height: 520px; 
    float: left; 
}

.line { 
    width: 30px; 
    height: 520px; 
    float: left; 
}

.connecter div { 
    border: 1px solid #000; 
    border-left: none; 
    height: 50px; 
    width: 100%; 
    margin: 80px 0 0 1px;
}

.connecter div:first-child { 
    margin: 32px 0 0 1px; 
}

.line div { 
    border-top: 1px solid #000; 
    margin: 133px 0 0 1px; 
}

.line div:first-child { 
    margin-top: 55px; 
}

#quarterFinals > div { 
    margin-top: 91px; 
}

#quarterFinals > div:first-child { 
    margin-top: 37px; 
}

#conn2 div { 
    margin-top: 133px; 
    height: 133px;
}

#conn2 div:first-child { 
    margin-top: 57px; 
}

#line2 div { 
    margin-top: 270px; 
}

#line2 div:first-child { 
    margin-top: 125px; 
}
#semiFinals > div { 
    margin-top: 230px; 
}
#semiFinals > div:first-child { 
    margin-top: 105px; 
}
#conn3 div { 
    margin-top: 125px; 
    height: 270px;
}

#line3 div { 
    margin-top: 270px; 
}

#final > div { 
    margin-top: 250px; 
}
</style>

<article id="container">

  <section>
    <div>Player 1</div>
    <div>Player 2</div>
    <div>Player 3</div>
    <div>Player 4</div>
    <div>Player 5</div>
    <div>Player 6</div>
    <div>Player 7</div>
    <div>Player 8</div>
  </section>

  <div class="connecter">
    <div></div>
    <div></div>
    <div></div>
    <div></div>
  </div>

  <div class="line">
    <div>
    </div>
    <div>
    </div>
    <div>
    </div>
    <div>
    </div>
  </div>

  <section id="quarterFinals">
    <div></div>
    <div></div>
    <div></div>
    <div></div>
  </section>

  <div class="connecter" id="conn2">
    <div></div>
    <div></div>
  </div>

  <div class="line" id="line2">
    <div></div>
    <div></div>
  </div>

  <section id="semiFinals">
    <div></div>
    <div></div>
  </section>

  <div class="connecter" id="conn3">
    <div></div>
  </div>

  <div class="line" id="line3">
    <div></div>
  </div>

  <section id="final">
    <div></div>
  </section>

</article>





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
                              <img src="{{ url('imagenes').'/'.$partido->equipoA->imagen }}" class="logo" alt="sin imagen">               
                              <span class="equipo">{{$partido->equipoA->nombre}}</span>
                              <span class="goles">{{$partido->marcador1}}</span>                                      
                          </div>                                                                                                                                            
                          <div class="jugador {{ $partido->marcador2 > $partido->marcador1 ? 'win' : '' }}">     
                              <img src="{{ url('imagenes').'/'.$partido->equipoB->imagen }}" class="logo" alt="sin imagen">               
                              <span class="equipo">{{$partido->equipoB->nombre}}</span>
                              <span class="goles">{{$partido->marcador2}}</span>                                              
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
    
    
        {{-- Cuartos --}}
        <div class="jornada_contenedor">
          @foreach ($eliminatoriasCuartos as $partido) 
            <div class="partido">
                <div class="jornada">
                          <div class="jugador {{ $partido->marcador1 > $partido->marcador2 ? 'win' : '' }}">  
                              <img src="{{ url('imagenes').'/'.$partido->equipoA->imagen }}" class="logo" alt="sin imagen">               
                              <span class="equipo">{{$partido->equipoA->nombre}}</span>
                              <span class="goles">{{$partido->marcador1}}</span>                                      
                          </div>                                                                                                                                            
                          <div class="jugador {{ $partido->marcador2 > $partido->marcador1 ? 'win' : '' }}">     
                              <img src="{{ url('imagenes').'/'.$partido->equipoB->imagen }}" class="logo" alt="sin imagen">               
                              <span class="equipo">{{$partido->equipoB->nombre}}</span>
                              <span class="goles">{{$partido->marcador2}}</span>                                              
                          </div>
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
        {{-- Semifinal --}}    
        <div class="jornada_contenedor">
            <div class="jornada">            
                    <div class="conector_doble"></div>
                    <div class="conector_simple"></div>            
                 {{-- <div class="jugador {{ $partido->marcador1 > $partido->marcador2 ? 'win' : '' }}">
                    @foreach ($eliminatorias as $partido)  
                        @if ($partido->numPartido == 7)
                        <img src="{{ url('imagenes').'/'.$partido->equipoA->imagen }}" class="logo" alt="sin imagen">               
    
                        <span class="equipo">{{$partido->equipoA->nombre}}</span>
                        <span class="goles">{{$partido->marcador1}}</span> 
                        @endif
                    @endforeach --}}
                </div>        
            </div>
    
            {{-- <div class="jornada">            
                    <div class="conector_doble"></div>
                    <div class="conector_simple"></div>
                 <div class="jugador {{ $partido->marcador2 > $partido->marcador1 ? 'win' : '' }}"> 
                    @foreach ($eliminatorias as $partido)  
                        @if ($partido->numPartido == 7)
                        <img src="{{ url('imagenes').'/'.$partido->equipoB->imagen }}" class="logo" alt="sin imagen">               
    
                        <span class="equipo">{{$partido->equipoB->nombre}}</span>
                        <span class="goles">{{$partido->marcador2}}</span> 
                        @endif
                    @endforeach
                </div>        
            </div> --}}
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
              {{-- @foreach ($eliminatorias as $partido)    
              @if ($partido->numPartido == 7)      
                    <div class="conector_doble"></div>
                    <div class="conector_simple"></div>            
                <div class="jugador {{ $partido->marcador2 >  $partido->marcador1 ? 'win' :  'win2' }}"> --}}
                  {{-- original --}}
                  {{-- <img src="{{ url('imagenes').'/'.$partido->equipoB->imagen }}" class="logo" alt="sin imagen">  --}}
                  {{-- la mia --}}
                  {{-- <img src="{{ url('imagenes').'/'.$partido->marcador2 > $partido->marcador1 ? $partido->equipoB->imagen : $partido->equipoA->imagen}}" class="logo" alt="sin imagen">  --}}
                  {{-- la de chatgpt --}}
                  {{-- <img src="{{ url('imagenes').'/'.($partido->marcador2 > $partido->marcador1 ? $partido->equipoB->imagen : $partido->equipoA->imagen) }}" class="logo" alt="sin imagen">


                  <span class="equipo">{{ $partido->marcador2 > $partido->marcador1 ? $partido->equipoB->nombre : $partido->equipoA->nombre}}</span>
                </div>  
                @endif
                @endforeach       --}}
            </div>   
            
        <div>

    </div>

    </div>
    
</div>


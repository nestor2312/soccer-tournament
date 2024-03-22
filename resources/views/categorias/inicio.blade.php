<div class="container">
    <h1>Categoría: {{ $categoria->nombre }}</h1>

    <h2>Grupos</h2>
    @foreach ($categoria->grupos as $grupo)
        <h3>{{ $grupo->nombre }}</h3>

        <h4>Equipos</h4>
        @foreach ($grupo->equipos as $equipo)
            <p>{{ $equipo->nombre }}</p>
            <ul>
                <li>Jugadores:</li>
                @foreach ($equipo->jugadores as $jugador)
                    <li>{{ $jugador->nombre }}</li>
                @endforeach
            </ul>
        @endforeach

        <h4>Partidos</h4>
        <ul>
            por definir
            {{-- @foreach ($grupo->equipos->partidos as $partido)
                <li>{{ $partido->detalle_del_partido }}</li> <!-- Asume que tienes una columna 'detalle_del_partido' o similar -->
            @endforeach --}}
        </ul>
    @endforeach
</div>

<div class="container">
  
    <div class="container">
        <h2>Equipos en la Categoría</h2>
        <ul>
            @foreach ($equipos as $equipo)
                <li>{{ $equipo->nombre }}</li>
            @endforeach
        </ul>
    </div>
</div>
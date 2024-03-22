@foreach ($partidos as $partido)
    <div>{{ $partido->nombre }} - {{ $partido->fecha }}</div>
@endforeach

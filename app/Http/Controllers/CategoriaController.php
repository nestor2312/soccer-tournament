<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Partido;
// Importa tus modelos de Equipo y Jugador según sea necesario

class CategoriaController extends Controller
{

public function inicio($categoria_id)
{
    $categoria = Categoria::with(['grupos', 'grupos.equipos', 'grupos.equipos.jugadores', ])->findOrFail($categoria_id);

    return view('categorias.inicio', compact('categoria'));
}



    public function partidos($categoria_id)
    {
        $partidos = Partido::whereHas('grupo', function($query) use ($categoria_id) {
            $query->where('categoria_id', $categoria_id);
        })->get();

        return view('categorias.partidos', compact('partidos'));
    }

    public function equipos($categoria_id)
    {
        // Encuentra la categoría y carga sus grupos y los equipos de esos grupos
        $categoria = Categoria::with('grupos.equipos')->findOrFail($categoria_id);
    
        // Preparar los equipos para pasarlos a la vista
        $equipos = $categoria->grupos->flatMap(function ($grupo) {
            return $grupo->equipos;
        });
    
        return view('categorias.equipos', compact('equipos'));
    }
    public function jugadores($categoria_id)
    {
        // Implementa la lógica para obtener jugadores por categoría
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Equipo;
use App\Models\Grupo;
use App\Models\Player;
class HomePlayers_userController extends Controller
{
    public function index($equipo = null)
    {
        $grupos = Grupo::all();
        $equipos = Equipo::all();
        $jugadores = Player::query();
    
        // Aplicar el filtro si se proporciona un equipo_id
        if ($equipo) {
            $jugadores->where('equipo_id', $equipo);
        }
    
        $jugadores = $jugadores->get();

    
        return view('user.players', compact('equipos', 'jugadores', 'grupos'));
    }

    public function show($id)
    {
        $jugador = Player::with('equipo', 'cardA', 'cardR', 'goles','asistencias')->find($id);
        // return  $jugador;
        return view('user.show', compact('jugador'));
    }
    
    
    
}

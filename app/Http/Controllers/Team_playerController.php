<?php

namespace App\Http\Controllers;

use App\Models\Equipo;
use Illuminate\Http\Request;

class Team_playerController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Equipo $equipo)

    {
        $equipos = Equipo::all();
        $jugadores = $equipo->jugadores;
        return view('team_player.index',compact('equipos','jugadores'));
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Equipo;
class HomeTeams_userController extends Controller
{
    public function index()

    {
        $equipos = Equipo::all();
        // $jugadores = Player::all();
        return view('user.team',compact('equipos'));
    }

   
}

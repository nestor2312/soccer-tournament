<?php

namespace App\Http\Controllers;

use App\Models\gol;
use App\Models\asistencia;
use Illuminate\Http\Request;
use App\Models\Grupo;
class Homegols_userController extends Controller
{
    public function index()
    {
       $grupos = Grupo::all();
        $goles = gol::all()->sortByDesc('goles');
        $asistencias = asistencia::all()->sortByDesc('asistencias');
        return view('user.estadisticas',compact('goles','grupos','asistencias'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\asistencia;
use App\Models\Grupo;
use Illuminate\Http\Request;

class Homeassist_userController extends Controller
{
    public function index()
    {
        $grupos = Grupo::all();
        $asistencias = asistencia::all()->sortByDesc('asistencias');
        return view('user.assist',compact('asistencias','grupos'));

    }
}

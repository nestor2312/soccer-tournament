<?php

namespace App\Http\Controllers;

use App\Models\asistencia;
use Illuminate\Http\Request;

class AsistenciasController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $asistencias = asistencia::all()->sortByDesc('asistencias');
        return view('asistencias.index',compact('asistencias'));

    }
}

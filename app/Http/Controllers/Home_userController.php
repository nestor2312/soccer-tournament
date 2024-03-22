<?php

namespace App\Http\Controllers;

use App\Models\Equipo;
use App\Models\Grupo;
use App\Models\Partido;
use Illuminate\Http\Request;
use App\Models\Eliminatoria;
use Illuminate\Support\Facades\DB;
class Home_userController extends Controller
{
    public function index()

    {
        $eliminatoriasCuartos = Eliminatoria::where('numPartido', 1)->orderBy('id', 'asc')->get();
        $eliminatoriasSemis =   Eliminatoria::where('numPartido', 2)->orderBy('id', 'asc')->get();
        $eliminatoriasFinal =   Eliminatoria::where('numPartido',3)->get();
        $partidos = Partido::orderby('id','desc')->paginate(4);
        $teams = Equipo::orderby('id')->paginate(9);
        $grupos = Grupo::all();
        $equipos =  DB::select('SELECT e.`nombre`, e.`imagen`,
        SUM(CASE WHEN u.GF > u.GA THEN 3 ELSE 0 END + CASE WHEN u.GF = u.GA THEN 1 ELSE 0 END) puntos,
        COUNT(CASE WHEN u.GF > u.GA THEN 1 END) pg,
        COUNT(CASE WHEN u.GF < u.GA THEN 1 END) pp,
        COUNT(CASE WHEN u.GF = u.GA THEN 1 END) pe,
        COUNT(CASE WHEN u.GF > u.GA THEN 1 END) + COUNT(CASE WHEN u.GF < u.GA THEN 1 END) +  COUNT(CASE WHEN u.GF = u.GA THEN 1 END) pj,
        SUM(u.GF) AS "gf",
        SUM(u.GA) AS "gc",
        SUM(u.GF - u.GA) AS "gd"
    FROM (
        SELECT p.equipoA_id as team_id, p.marcador1 as GF, p.marcador2 as GA FROM partidos p
        UNION ALL
        SELECT p.equipoB_id as team_id, p.marcador2 as GF, p.marcador1 as GA FROM partidos p
    ) u 
    INNER JOIN equipos e 
    ON u.team_id = e.id
WHERE e.grupo_id = 3 -- ID del grupo que deseas mostrar

    GROUP BY e.id order by puntos DESC,gd DESC,pg desc,pp desc,pe desc,gf desc,gc desc ');
        return view('user.index',compact('grupos','partidos','equipos','teams','eliminatoriasCuartos','eliminatoriasSemis','eliminatoriasFinal'));

    }
}

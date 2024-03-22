<?php

namespace App\Http\Controllers;

use App\Models\Equipo;
use App\Models\Grupo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeTable_userController extends Controller
{
    public function index()
    {
        $grupos = Grupo::all();
        $datosGrupos = [];
        foreach ($grupos as $grupo) {
            $equipos = DB::select('SELECT e.`nombre`, e.`imagen`,
               SUM(CASE WHEN u.GF > u.GA THEN 3 ELSE 0 END + CASE WHEN u.GF = u.GA THEN 1 ELSE 0 END) puntos,
               COUNT(CASE WHEN u.GF > u.GA THEN 1 END) pg,
               COUNT(CASE WHEN u.GF < u.GA THEN 1 END) pp,
               COUNT(CASE WHEN u.GF = u.GA THEN 1 END) pe,
  COUNT(CASE WHEN u.GF > u.GA THEN 1 END) + COUNT(CASE WHEN u.GF < u.GA THEN 1 END) + COUNT(CASE WHEN u.GF = u.GA THEN 1 END) pj,
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
                      WHERE grupo_id = :id
                      GROUP BY e.id 
                      ORDER BY puntos DESC', ['id' => $grupo->id]);
            $datosGrupos[] = ['grupo' => $grupo, 'equipos' => $equipos];
        }
        return view('user.table', compact('datosGrupos'));
    }
}
        
        //     return view('user.table', compact('datosGrupos'));

        //     $equipos = Equipo::select('nombre', 'imagen')
        //     ->selectRaw('SUM(CASE WHEN p.marcador1 > p.marcador2 THEN 3 
        //                   WHEN p.marcador1 = p.marcador2 THEN 1 ELSE 0 END) as puntos')
        //     ->selectRaw('SUM(CASE WHEN p.marcador1 > p.marcador2 THEN 1 ELSE 0 END) as pg')
        //     ->selectRaw('SUM(CASE WHEN p.marcador1 < p.marcador2 THEN 1 ELSE 0 END) as pp')
        //     ->selectRaw('SUM(CASE WHEN p.marcador1 = p.marcador2 THEN 1 ELSE 0 END) as pe')
        //     ->selectRaw('SUM(p.marcador1) as gf')
        //     ->selectRaw('SUM(p.marcador2) as gc')
        //     ->join('p', function($join) {
        //         $join->on('equipos.id', '=', 'p.equipoA_id')
        //             ->orWhere('equipos.id', '=', 'p.equipoB_id');
        //     })
        //     ->where('grupo_id', $grupo->id)
        //     ->groupBy('equipos.id', 'nombre', 'imagen')
        //     ->orderByDesc('puntos')
        //     ->get();
        
        // return view('user.table', compact('equipos', 'grupos'));
        // }



// public function index()
// {
//     $grupos = Grupo::all();
//     $datosGrupos = [];

//     foreach ($grupos as $grupo) {
//         $equipos = DB::select(' SELECT e.`nombre`, e.`imagen`,
//                 SUM(CASE WHEN u.GF > u.GA THEN 3 ELSE 0 END + CASE WHEN u.GF = u.GA THEN 1 ELSE 0 END) puntos,
//                 COUNT(CASE WHEN u.GF > u.GA THEN 1 END) pg,
//                 COUNT(CASE WHEN u.GF < u.GA THEN 1 END) pp,
//                 COUNT(CASE WHEN u.GF = u.GA THEN 1 END) pe,
//                 COUNT(CASE WHEN u.GF > u.GA THEN 1 END) + COUNT(CASE WHEN u.GF < u.GA THEN 1 END) + COUNT(CASE WHEN u.GF = u.GA THEN 1 END) pj,
//                 SUM(u.GF) AS "gf",
//                 SUM(u.GA) AS "gc",
//                 SUM(u.GF - u.GA) AS "gd"
//             FROM (
//                 SELECT p.equipoA_id as team_id, p.marcador1 as GF, p.marcador2 as GA FROM partidos p
//                 UNION ALL
//                 SELECT p.equipoB_id as team_id, p.marcador2 as GF, p.marcador1 as GA FROM partidos p
//             ) u 
//             INNER JOIN equipos e 
//             ON u.team_id = e.id 
//             WHERE grupo_id = :id
//             GROUP BY e.id 
//             ORDER BY puntos DESC', ['id' => $grupo->id]);
        
//         $datosGrupos[] = ['grupo' => $grupo, 'equipos' => $equipos];
//     }

//     return view('user.table', compact('datosGrupos'));
// }
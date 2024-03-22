<?php

namespace App\Http\Controllers;

use App\Models\Equipo;
use App\Models\Grupo;
use App\Models\Partido;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class TablaController extends Controller
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
    public function index()
    {
        
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
        ON u.team_id 
    GROUP BY e.id order by puntos DESC,gd DESC,pg desc,pp desc,pe desc,gf desc,gc desc');
        return view('tabla.index', compact('grupos','equipos'));


       



//     SELECT e.`nombre`, e.`imagen`,
//     SUM(CASE WHEN u.GF > u.GA THEN 3 ELSE 0 END + CASE WHEN u.GF = u.GA THEN 1 ELSE 0 END) puntos,
//     COUNT(CASE WHEN u.GF > u.GA THEN 1 END) pg,
//     COUNT(CASE WHEN u.GF < u.GA THEN 1 END) pp,
//     COUNT(CASE WHEN u.GF = u.GA THEN 1 END) pe,
//     COUNT(CASE WHEN u.GF > u.GA THEN 1 END) + COUNT(CASE WHEN u.GF < u.GA THEN 1 END) +  COUNT(CASE WHEN u.GF = u.GA THEN 1 END) pj,
//     SUM(u.GF) AS "gf",
//     SUM(u.GA) AS "gc",
//     SUM(u.GF - u.GA) AS "gd"
// FROM (
//     SELECT p.equipoA_id as team_id, p.marcador1 as GF, p.marcador2 as GA FROM partidos p
//     UNION ALL
//     SELECT p.equipoB_id as team_id, p.marcador2 as GF, p.marcador1 as GA FROM partidos p
// ) u 
// INNER JOIN equipos e 
//     ON u.team_id = e.id
// GROUP BY e.id order by puntos desc

        

//       consulta definitiva
//       SELECT A.equipo,(A.gf+B.gf) as gf,
// (A.gc+B.gc) as gc,
// (A.gf+B.gf-A.gc-B.gc) as df
// from(SELECT equipoA_id AS equipo,
//         SUM(marcador1) AS Gf,
//         SUM(marcador2) AS GC   
//         FROM partidos GROUP BY equipoA_id) as A LEFT JOIN (SELECT equipoB_id AS equipo,
//         SUM(marcador2) AS Gf,
//         SUM(marcador1) AS GC   
//         FROM partidos GROUP BY equipoB_id) as B on A.equipo=B.equipo





        // SELECT e.nombre AS 'Team',
        // SUM(p.marcador1) AS 'GF',
        // SUM(p.marcador2) AS 'GC',
        // SUM(p.marcador1 - p.marcador2) AS 'GD'
        // FROM equipos e
        // INNER JOIN partidos p
        // ON p.equipoA_id = e.id GROUP BY e.id

// completa
// select
//  e.`nombre`,
//  SUM(CASE WHEN u.GF > u.GA THEN 3 ELSE 0 END + CASE WHEN u.GF = u.GA THEN 1 ELSE 0 END) 'Score',
//  COUNT(CASE WHEN u.GF > u.GA THEN 1 END) 'Won',
//  COUNT(CASE WHEN u.GF < u.GA THEN 1 END) 'Lost',
//  COUNT(CASE WHEN u.GF = u.GA THEN 1 END) 'Draw',
//  SUM(u.GF) AS 'Goals For',
//  SUM(u.GA) AS 'Goals Against',
//  SUM(u.GF - u.GA) AS 'Goals Difference'
// FROM (
//  SELECT p.equipoA_id as 'equipo_id', p.marcador1 as 'GF', p.marcador2 as 'GA' FROM partidos p
//  UNION ALL
//  SELECT p.equipoB_id as 'equipo_id', p.marcador2 as 'GF', p.marcador1 as 'GA' FROM partidos p
// ) u 
// INNER JOIN equipos e 
//  ON u.equipo_id = e.id 
// GROUP BY e.id

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use  Illuminate\Database\Eloquent\Builder;




class Equipo extends Model
{
    use HasFactory;

    protected $fillable = ['grupo_id','nombre', 'imagen'];

    public function partidos(){
        return $this->hasMany(Partido::class);
    }

    public function e2liminatoria(){
        return $this->hasMany(e2liminatoria::class);
    }

    public function jugadores(){
        return $this->hasMany(Player::class);
    }

    public function grupo(){
        return $this->belongsTo(Grupo::class,'grupo_id');
    }
    public function categoria()
{
    return $this->belongsTo(Categoria::class, 'categoria_id');
}
   
// // partidos totales
//     public function getpartidosAttribute(){
//         return Partido::where(function($query) {
//             $query->where('equipoA_id', $this->attributes['id'])->orWhere('equipoB_id', $this->attributes['id']);
//         })
//         ->whereNotNull('marcador1')

//         ->count();
//     }

// //partidos Ganados
//     public function getGanadoAttribute(){
//         return Partido::whereNotNull('marcador1')
//             ->where(function($query) {
//                 $query->where(function($query2) {
//                     $query2->where('equipoA_id', $this->attributes['id'])->whereRaw('marcador1 > marcador2');
//                 })->orWhere(function($query2) {
//                     $query2->where('equipoB_id', $this->attributes['id'])->whereRaw('marcador1 < marcador2');
//                 });
//             })
//             ->count();
//     }

// //partidos Empatados

//     public function getEmpatadoAttribute(){
//         return Partido::whereNotNull('marcador1')
//             ->whereRaw('marcador1 = marcador2')
//             ->where(function($query) {
//                 $query->where('equipoA_id', $this->attributes['id'])
//                     ->orWhere('equipoB_id', $this->attributes['id']);
//             })
//             ->count();
//     }

// //partidos Perdidos

//     public function getPerdidoAttribute(){
//         return Partido::whereNotNull('marcador1')
//             ->where(function($query) {
//                 $query->where(function($query2) {
//                     $query2->where('equipoA_id', $this->attributes['id'])->whereRaw('marcador1 < marcador2');
//                 })->orWhere(function($query2) {
//                     $query2->where('equipoB_id', $this->attributes['id'])->whereRaw('marcador1 > marcador2');
//                 });
//             })
//             ->count();
//     }

   
// //Puntos

//     public function getPuntosAttribute(){
//         return $this->getganadoAttribute() * 3 + $this->getEmpatadoAttribute() * 1;
//     }

// //Puntos

//     public function getPuntosAttribute(){
//         return $this->getganadoAttribute() * 3 + $this->getEmpatadoAttribute() * 1;
//     }





// SELECT e.`nombre`,
//         SUM(CASE WHEN u.GF > u.GA THEN 3 ELSE 0 END + CASE WHEN u.GF = u.GA THEN 1 ELSE 0 END) puntos,
//         COUNT(CASE WHEN u.GF > u.GA THEN 1 END) pg,
//         COUNT(CASE WHEN u.GF < u.GA THEN 1 END) pp,
//         COUNT(CASE WHEN u.GF = u.GA THEN 1 END) pe,
//        -- SUM(CASE WHEN (p.equipoA_id = e.id OR p.equipoB_id = e.id ) THEN 1 ELSE 0 END) AS "pj",
//         SUM(u.GF) AS "gf",
//         SUM(u.GA) AS "gc",
//         SUM(u.GF - u.GA) AS "gd"
//     FROM (
//         SELECT p.equipoA_id as team_id, p.marcador1 as GF, p.marcador2 as GA FROM partidos p
//         UNION ALL
//         SELECT p.equipoB_id as team_id, p.marcador2 as GF, p.marcador1 as GA FROM partidos p
//     ) u 
//     INNER JOIN equipos e 
//         ON u.team_id = e.id 
//     GROUP BY e.id
 
//     ORDER BY puntos DESC, pg DESC, gd DESC, gf DESC, e.nombre ASC


// SELECT 
//     t.id,  
//     t.nombre AS Equipo , 
//     (SUM(CASE WHEN (g.equipoA_id = t.id AND g.marcador1 > g.marcador2 ) OR ( g.equipoB_id = t.id AND g.marcador2 > g.marcador1) THEN 3 ELSE 0 END) + SUM(CASE WHEN ( g.equipoA_id = t.id OR g.equipoB_id = t.id ) AND ( g.marcador1 = g.marcador2 ) THEN 1 ELSE 0 END)) AS PTS ,  
//     SUM(CASE WHEN ( g.equipoA_id = t.id OR g.equipoB_id = t.id ) THEN 1 ELSE 0 END) AS PJ ,  
//     SUM(CASE WHEN ( g.equipoA_id = t.id AND g.marcador1 > g.marcador2 ) OR ( g.equipoB_id = t.id AND g.marcador2 > g.marcador1 ) THEN 1 ELSE 0 END) AS V , 
//     SUM(CASE WHEN ( g.equipoA_id = t.id OR g.equipoB_id = t.id ) AND g.marcador1 = g.marcador2 THEN 1 ELSE 0 END) AS E ,  
//     SUM(CASE WHEN ( g.equipoA_id = t.id AND g.marcador1 < g.marcador2 ) OR ( g.equipoB_id = t.id AND g.marcador2 < g.marcador1 ) THEN 1 ELSE 0 END) AS D ,  
//     COALESCE(SUM(CASE WHEN (g.equipoA_id = t.id) THEN g.marcador1 WHEN (g.equipoB_id = t.id) THEN g.marcador2 END),0) AS GF , 
//     COALESCE(SUM(CASE WHEN (g.equipoA_id = t.id) THEN g.marcador2 WHEN (g.equipoB_id = t.id) THEN g.marcador1 END),0) AS GC ,  
//     COALESCE((SUM(CASE WHEN (g.equipoA_id = t.id) THEN g.marcador1 WHEN (g.equipoB_id = t.id) THEN g.marcador2 END) - SUM(CASE WHEN (g.equipoA_id = t.id) THEN g.marcador2 WHEN (g.equipoB_id = t.id) THEN g.marcador1 END)),0) AS DIF 
// FROM equipos t  
//     LEFT OUTER JOIN partidos g ON t.id IN (g.equipoA_id,g.equipoB_id) 
// GROUP BY t.id, t.nombre 
// ORDER BY PTS DESC, V DESC, DIF DESC, GF DESC, PJ ASC, t.nombre ASC
   
}

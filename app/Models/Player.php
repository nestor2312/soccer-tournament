<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    use HasFactory;

    public function equipo(){
        return $this->belongsTo(Equipo::class,'equipo_id');
       
    }

    public function cardA(){
        return $this->belongsTo(card::class,'cardA_id');
       
    }
    public function cardR(){
        return $this->belongsTo(card::class,'cardR_id');
       
    }
    public function goles(){
        return $this->hasMany(gol::class,'jugador_id');
       
    }
    public function asistencias(){
        return $this->hasMany(asistencia::class,'jugador_id');
       
    }

   
}

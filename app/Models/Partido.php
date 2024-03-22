<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partido extends Model
{
    use HasFactory;

    public function equipoA(){
        return $this->belongsTo(Equipo::class,'equipoA_id');
    }
    public function equipoB(){
        return $this->belongsTo(Equipo::class,'equipoB_id');
    }















    
    // public function setTeam1IdAttribute($input)
    // {
    //     $this->attributes['equipoA_id'] = $input ? $input : null;;
    // }


    // public function setTeam2IdAttribute($input)
    // {
    //     $this->attributes['equipoB_id'] = $input ? $input : null;
    // }

    // public function setResult1Attribute($input)
    // {
    //     $this->attributes['marcador1'] = $input ? $input : null;
    // }


    // public function setResult2Attribute($input)
    // {
    //     $this->attributes['marcador2'] = $input ? $input : null;
    // }

}

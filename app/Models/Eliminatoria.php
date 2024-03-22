<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eliminatoria extends Model
{
    protected $fillable = ['equipo_a_id', 'equipo_b_id', 'marcador1', 'marcador2', 'numPartido'];
    // Añade más campos al array según necesites
    use HasFactory;
    public function equipoA()
    {
        return $this->belongsTo(Equipo::class, 'equipo_a_id');
    }

    public function equipoB()
    {
        return $this->belongsTo(Equipo::class, 'equipo_b_id');
    }

}

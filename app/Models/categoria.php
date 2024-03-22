<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categoria extends Model
{
    protected $table = 'categoria';
    use HasFactory;

    public function grupos()
    {
        return $this->hasMany(Grupo::class, 'categoria_id');
    }
  
}

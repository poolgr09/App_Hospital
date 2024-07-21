<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class horarios extends Model
{
    use HasFactory;

    public function medico(){
        return $this->belongsTo(Medicos::class,'medico_id');
    }

    public function especialidad(){
        return $this->belongsTo(Especialidades::class,'especialidad_id');
    }
}

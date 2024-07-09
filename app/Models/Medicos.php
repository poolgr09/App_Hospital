<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicos extends Model
{
    use HasFactory;

    public function especialidades(){
        return $this->belongsToMany(Especialidades::class, 'especialidad_medico');
    }
}

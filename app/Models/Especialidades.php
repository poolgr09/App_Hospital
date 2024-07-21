<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Especialidades extends Model
{
    use HasFactory;


    public function medico(): BelongsToMany
    {
        return $this->belongsToMany(Medicos::class,'especialidad_medico', 'especialidad_id', 'medico_id');
    }

    public function horario(){
        return $this->hasMany(horarios::class);
    }

    public function consultorio(){
        return $this->hasMany(Consultorio::class);
    }

}

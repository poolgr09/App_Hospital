<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Medicos extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function persona(){
        return $this->belongsTo(Personas::class);
    }



    public function especialidad(): BelongsToMany
    {
        return $this->belongsToMany(Especialidades::class, 'especialidad_medico', 'medico_id', 'especialidad_id');
    }

    public function horario(){
        return $this->hasMany(horarios::class);
    }

    public function consultorio(){
        return $this->hasMany(Consultorio::class);
    }

    public function event(){
        return $this->hasMany(Event::class); 
    }   
}

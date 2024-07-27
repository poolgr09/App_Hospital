<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function medico(){
        return $this->belongsTo(Medicos::class);
    }

    public function especialidad(){
        return $this->belongsTo(Especialidades::class,'especialidad_id');

    }

    public function historial(){
        return $this->belongsTo(Historial::class);
    }

}

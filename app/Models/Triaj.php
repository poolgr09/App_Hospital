<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Triaj extends Model
{
    use HasFactory;

    public function pacientes(){
        return $this->belongsTo(Pacientes::class);
    }
}

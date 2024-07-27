<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personas extends Model
{
    use HasFactory;

    public function secretarias(){
        return $this->hasMany(Secretaria::class);
    }

    public function medicos(){
        return $this->hasMany(Medicos::class);
    }

    public function users(){
        return $this->belongsTo(User::class);
    }
}

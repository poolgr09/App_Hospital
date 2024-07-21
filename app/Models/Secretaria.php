<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Secretaria extends Model
{
    use HasFactory;

    public function persona(){
        return $this->belongsTo(Personas::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}

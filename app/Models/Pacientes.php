<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Pacientes extends Model
{
    use HasFactory;
    protected $guard_name = 'web';
    
    public function persona(){
        return $this->belongsTo(Personas::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}

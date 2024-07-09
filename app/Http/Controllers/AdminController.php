<?php

namespace App\Http\Controllers;

use App\Models\Especialidades;
use App\Models\Medicos;
use App\Models\Pacientes;
use App\Models\Secretaria;
use App\Models\User;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        $total_usuarios = User::count();
        $total_secretarias = Secretaria::count();
        $total_pacientes = Pacientes::count();
        $total_medicos = Medicos::count();
        $total_especialidades = Especialidades::count();
        return view('admin.index', compact('total_usuarios','total_secretarias','total_pacientes','total_medicos','total_especialidades'));
    }
}

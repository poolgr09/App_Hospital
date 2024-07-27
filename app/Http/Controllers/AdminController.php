<?php

namespace App\Http\Controllers;

use App\Models\Consultorio;
use App\Models\Especialidades;
use App\Models\Event;
use App\Models\horarios;
use App\Models\Medicos;
use App\Models\Pacientes;
use App\Models\Personas;
use App\Models\Secretaria;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index(){
        $total_usuarios = User::count();
        $total_secretarias = Secretaria::count();
        $total_pacientes = Pacientes::count();
        $total_medicos = Medicos::count();
        $total_especialidades = Especialidades::count();
        $total_horarios= horarios::count();
        $total_consultorios= Consultorio::count();

        $medicos = Medicos::all();
        $especialidades = Especialidades::all();
        $personas= Personas::all();
        $citas = Event::all();

        return view('admin.index', compact('total_usuarios','total_secretarias','total_pacientes','total_medicos',
            'total_especialidades','total_horarios','total_consultorios',
            'medicos','especialidades','personas','citas'
        ));
    }


    public function citas_reservadas($id){

        $citas = Event::where('user_id',$id)->get();
        
        return view('admin.citas_reservadas', compact('citas'));
    }

    public function delete_citas($id){
        
        Event::destroy($id);

        return redirect()->back();
        
        
    }
}

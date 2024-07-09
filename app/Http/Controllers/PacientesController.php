<?php

namespace App\Http\Controllers;

use App\Models\Pacientes;
use Illuminate\Http\Request;

class PacientesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pacientes = Pacientes::all();
        return view('admin.pacientes.index', compact('pacientes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pacientes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
            $request-> validate([
            'cedula' => 'numeric|min:1000000000|max:9999999999|required|unique:pacientes',
            'nombres' => 'required',
            'apellidos' => 'required',
            'genero' => 'required',
            'celular' => 'required',
            'fecha_nacimiento' => 'required',
            'direccion' => 'required',
            'tipo_sangre' => 'required',
            'correo' => 'required|max:250|unique:pacientes',
        ]);
    
           $pacientes = new Pacientes();
           $pacientes->cedula = $request->cedula;
           $pacientes->nombres = $request->nombres;
           $pacientes->apellidos = $request->apellidos;
           $pacientes->genero = $request->genero;
           $pacientes->celular = $request->celular;
           $pacientes->fecha_nacimiento = $request->fecha_nacimiento ;
           $pacientes->direccion = $request->direccion;
           $pacientes->tipo_sangre = $request->tipo_sangre;
           $pacientes->correo = $request->correo;
           $pacientes->save();
    
           return redirect()->route ('admin.pacientes.index')->with('mensaje','¡Datos registrados con exitoso!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)    {
        $pacientes = Pacientes::findOrFail($id);
        return view('admin.pacientes.show', compact('pacientes'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id){
        $paciente = Pacientes::findOrFail($id);
        return view('admin.pacientes.edit', compact('paciente'));
    }

    /**
     * Update the specified resource in storage.
     */
     
    public function update(Request $request, $id){
        
        $paciente = Pacientes::find($id);
       
        $request -> validate([
            'cedula' => 'required|unique:pacientes,cedula,'.$paciente->id,
            'nombres' => 'required',
            'apellidos' => 'required',
            'genero' => 'required',
            'celular' => 'required',
            'fecha_nacimiento' => 'required',
            'direccion' => 'required',
            'tipo_sangre' => 'required',
            'correo' => 'required|max:250|unique:pacientes,correo,'.$paciente->id,            
        ]);
               
        
        $paciente->cedula = $request->cedula;
        $paciente->nombres = $request->nombres;
        $paciente->apellidos = $request->apellidos;
        $paciente->genero = $request->genero;
        $paciente->celular = $request->celular;
        $paciente->fecha_nacimiento = $request->fecha_nacimiento ;
        $paciente->direccion = $request->direccion;
        $paciente->tipo_sangre = $request->tipo_sangre;
        $paciente->correo = $request->correo;
        $paciente->save();
 
        return redirect()->route ('admin.pacientes.index')->with('mensaje','¡Datos registrados con exitoso!');
        
    }

    public function confirmDelete($id){
        $pacientes = Pacientes::findOrFail($id);
        return view('admin.pacientes.delete', compact('pacientes'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id){

        Pacientes::destroy($id);
        return redirect()->route ('admin.pacientes.index')->with('mensaje','¡Datos eliminados con exitoso!');
    }
}

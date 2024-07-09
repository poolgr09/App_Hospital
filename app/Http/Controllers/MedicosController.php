<?php

namespace App\Http\Controllers;

use App\Models\Medicos;
use Illuminate\Http\Request;

class MedicosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $medicos = Medicos::all();
        return view('admin.medicos.index', compact('medicos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.medicos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'cedula' => 'required|unique:medicos',
            'nombres' => 'required',
            'apellidos' => 'required',
            'genero' => 'required',
            'celular' => 'required',
            'fecha_nacimiento' => 'required',
            'direccion' => 'required',
            'tipo_sangre' => 'required',
            'correo' => 'required|max:250|unique:medicos',
        ]);
    
           $medicos = new Medicos();
           $medicos->cedula = $request->cedula;
           $medicos->nombres = $request->nombres;
           $medicos->apellidos = $request->apellidos;
           $medicos->genero = $request->genero;
           $medicos->celular = $request->celular;
           $medicos->fecha_nacimiento = $request->fecha_nacimiento ;
           $medicos->direccion = $request->direccion;
           $medicos->tipo_sangre = $request->tipo_sangre;
           $medicos->correo = $request->correo;
           
           $medicos->save();
           
           return redirect()->route ('admin.medicos.index')->with('mensaje','¡Datos registrados con exitoso!');
           
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $medicos = Medicos::findOrFail($id);
        return view('admin.medicos.show', compact('medicos'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $medicos = Medicos::findOrFail($id);
        return view('admin.medicos.edit', compact('medicos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $medicos = Medicos::find($id);
       
        $request -> validate([
        'cedula' => 'required|unique:medicos,cedula,'.$medicos->id,
        'nombres' => 'required',
        'apellidos' => 'required',
        'genero' => 'required',
        'celular' => 'required',
        'fecha_nacimiento' => 'required',
        'direccion' => 'required',
        'tipo_sangre' => 'required',
        'correo' => 'required|max:250|unique:medicos,correo,'.$medicos->id,
                  
        ]);
               
        
    $medicos->cedula = $request->cedula;
    $medicos->nombres = $request->nombres;
    $medicos->apellidos = $request->apellidos;
    $medicos->genero = $request->genero;
    $medicos->celular = $request->celular;
    $medicos->fecha_nacimiento = $request->fecha_nacimiento ;
    $medicos->direccion = $request->direccion;
    $medicos->tipo_sangre = $request->tipo_sangre;
    $medicos->correo = $request->correo;
    
    $medicos->save();
 
    return redirect()->route ('admin.medicos.index')->with('mensaje','¡Datos registrados con exitoso!');
    
}

    public function confirmDelete($id){
        $medico = Medicos::findOrFail($id);
        return view('admin.medicos.delete', compact('medico'));
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Medicos::destroy($id);
        return redirect()->route ('admin.medicos.index')->with('mensaje','¡Datos eliminados con exitoso!');
    }
}

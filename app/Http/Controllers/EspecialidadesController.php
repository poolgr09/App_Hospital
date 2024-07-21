<?php

namespace App\Http\Controllers;

use App\Models\Especialidades;
use App\Models\Medicos;
use Illuminate\Http\Request;
use Monolog\Level;
use PhpParser\Node\Stmt\ElseIf_;

class EspecialidadesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $especialidades = Especialidades::all();

                      
        return view('admin.especialidades.index', compact('especialidades'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        return view('admin.especialidades.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'estado' => 'required',
        ]);
            
        
           $especialidades = new Especialidades();
           $especialidades->nombre = $request->nombre;
           $especialidades->descripcion = $request->descripcion;
           $especialidades->isActive = $request->estado;
                     
           $especialidades->save();
           
           return redirect()->route ('admin.especialidades.index')->with('mensaje','¡Datos registrados con exitoso!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $especialidades = Especialidades::findOrFail($id);
        
        
        return view('admin.especialidades.show', compact('especialidades'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $especialidades = Especialidades::findOrFail($id);
        return view('admin.especialidades.edit', compact('especialidades'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $especialidades = Especialidades::findOrFail($id);
       
        $request->validate([
            'nombre' => 'required|unique:especialidades,nombre,'.$especialidades->id,
            'descripcion' => 'required',
            'estado' => 'required',
        ]);
    
           
           $especialidades->nombre = $request->nombre;
           $especialidades->descripcion = $request->descripcion;
           $especialidades->isActive = $request->estado;
                     
           $especialidades->save();
           
           return redirect()->route ('admin.especialidades.index')->with('mensaje','¡Datos registrados con exitoso!');
    }

    /**
     * Remove the specified resource from storage.
     */

     public function confirmDelete($id){
        $especialidades = Especialidades::findOrFail($id);
        return view('admin.especialidades.delete', compact('especialidades'));
    }


    public function destroy($id)
    {
        Especialidades::destroy($id);
        return redirect()->route ('admin.especialidades.index')->with('mensaje','¡Datos eliminados con exitoso!');
    }

    public function byProyect($id){

        $medicos = Medicos::find($id);
        $especialidades = $medicos->especialidad;
        return $especialidades; 
    
    }
}

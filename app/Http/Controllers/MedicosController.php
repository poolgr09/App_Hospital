<?php

namespace App\Http\Controllers;

use App\Models\Personas;
use App\Models\User;
use App\Models\Especialidades;
use App\Models\Medicos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MedicosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $medicos = Medicos::with('user','persona','especialidad')->get();
        return view('admin.medicos.index', compact('medicos'));
                
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() 
    {
        $especialidades = Especialidades::all();
        return view('admin.medicos.create', compact('especialidades'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'cedula' => 'required|unique:personas',
            'nombres' => 'required',
            'apellidos' => 'required',
            'genero' => 'required',
            'fecha_nacimiento' => 'required',
            'direccion' => 'required',
            'celular' => 'required',
            'user_name' => 'required',
            'email' => 'required|max:250|unique:users',
            'password' => 'required|max:250|confirmed',
        ]);
    
           $persona= new Personas();
           $persona->cedula = $request->cedula;
           $persona->nombres = $request->nombres;
           $persona->apellidos = $request->apellidos;
           $persona->edad = \Carbon\Carbon::parse($request->fecha_nacimiento)->age;
           $persona->genero=$request->genero;
           $persona->celular = $request->celular;
           $persona->fecha_nacimiento = $request->fecha_nacimiento;
           $persona->direccion = $request->direccion;
           $persona->tipo_sangre = $request->tipo_sangre;
           $persona->save();
    
           $usuario = new User();
           $usuario->name = $request->user_name;
           $usuario->email = $request->email;
           $usuario->password = Hash::make($request['password']);
           $usuario->save();
           
           $medico = new Medicos();
           $medico->user_id = $usuario->id;
           $medico->persona_id = $persona->id;
           $medico->save();
           
           $medico-> especialidad()->attach($request->input('especialidades'));
           
           
    
           return redirect()->route ('admin.medicos.index')->with('mensaje','¡Datos registrados con exitoso!');
    
    }

    /**
     * Display the specified resource.
     */
    public function show($id) 
    {
        $medicos = Medicos::with('user','persona','especialidad')->findOrFail($id);
        return view('admin.medicos.show', compact('medicos'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $medicos = Medicos::with('user','persona','especialidad')->findOrFail($id);
        $especialidades = Especialidades::all();
        return view('admin.medicos.edit', compact('medicos','especialidades'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $medico = Medicos::find($id);
        $usuario = User::find($medico->user->id);
        $persona = Personas::find($medico->persona->id);
       
        $request->validate([
            'cedula' => 'required|unique:personas,cedula,'.$medico->persona->id,
            'nombres' => 'required',
            'apellidos' => 'required',
            'genero' => 'required',
            'fecha_nacimiento' => 'required',
            'direccion' => 'required',
            'celular' => 'required',
            'user_name' => 'required',
            'email' => 'required|max:250|unique:users,email,'.$medico->user->id,
        ]);
                      
        
           $persona->cedula = $request->cedula;
           $persona->nombres = $request->nombres;
           $persona->apellidos = $request->apellidos;
           $persona->edad = \Carbon\Carbon::parse($request->fecha_nacimiento)->age;
           $persona->genero=$request->genero;
           $persona->celular = $request->celular;
           $persona->fecha_nacimiento = $request->fecha_nacimiento;
           $persona->direccion = $request->direccion;
           $persona->tipo_sangre = $request->tipo_sangre;
           $persona->save();

          
           $usuario->name = $request->user_name;
           $usuario->email = $request->email;
           $usuario->password = Hash::make($request['password']);
           $usuario->save();

          
           $medico->user_id = $usuario->id;
           $medico->persona_id = $persona->id;
           $medico->save();
           
           $medico-> especialidad()->sync($request->input('especialidades'));
           
           
           return redirect()->route ('admin.medicos.index')->with('mensaje','¡Datos actualizados con exitoso!');
    
    }

    public function confirmDelete($id){
       
        $medico = Medicos::with('user','persona','especialidad')-> findOrFail($id);
        return view('admin.medicos.delete', compact('medico'));
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $medico = Medicos::findOrFail($id);
        $medico->especialidad()->detach($id);

        $medico = Medicos::destroy($id);
        return redirect()->route ('admin.medicos.index')->with('mensaje','¡Datos eliminados con exitoso!');
    }
}

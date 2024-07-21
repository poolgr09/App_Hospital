<?php

namespace App\Http\Controllers;

use App\Models\Pacientes;
use App\Models\Personas;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PacientesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() 
    {
        $pacientes = Pacientes::with('user','persona')->get();
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
        
        $request->validate([
            'cedula' => 'numeric|required|unique:personas',
            'nombres' => 'required',
            'apellidos' => 'required',
            'genero' => 'required',
            'fecha_nacimiento' => 'required',
            'direccion' => 'required',
            'celular' => 'numeric|required',
            'user_name' => 'required',
            'tipo_sangre' => 'required',
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

           $paciente = new Pacientes();
           $paciente->user_id = $usuario->id;
           $paciente->persona_id = $persona->id;
           $paciente->save();
 
       return redirect()->route ('admin.pacientes.index')->with('mensaje','¡Datos registrados con exitoso!');

    }

    /**
     * Display the specified resource.
     */
    public function show($id)    {
        $pacientes = Pacientes::with('user','persona')-> findOrFail($id);
        return view('admin.pacientes.show', compact('pacientes'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id){
        $paciente = Pacientes::with('user','persona')-> findOrFail($id);
        return view('admin.pacientes.edit', compact('paciente'));
    }

    /**
     * Update the specified resource in storage.
     */
     
    public function update(Request $request, $id){
        
            $paciente = Pacientes::find($id);
            $usuario = User::find($paciente->user->id);
            $persona = Personas::find($paciente->persona->id);
            
            $request -> validate([
            'cedula' => 'numeric|required|unique:personas,cedula,'.$paciente->persona->id,
            'nombres' => 'required',
            'apellidos' => 'required',
            'genero' => 'required',
            'fecha_nacimiento' => 'required',
            'direccion' => 'required',
            'celular' => 'numeric|required',
            'user_name' => 'required',
            'tipo_sangre' => 'required',
            'email' => 'required|max:250|unique:users,email,'.$paciente->user->id,
            
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
         
            $usuario->email = $request->email;
            $usuario->name = $request->user_name;
            $usuario->save();
     
            $paciente->user_id = $usuario->id;
            $paciente->persona_id = $persona->id;
            $paciente->save();
 
        return redirect()->route ('admin.pacientes.index')->with('mensaje','¡Datos registrados con exitoso!');
        
    }

    public function confirmDelete($id){

        $paciente = Pacientes::with('user','persona')-> findOrFail($id);
        return view('admin.pacientes.delete', compact('paciente'));
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id){

        $paciente = Pacientes::find($id);

        //eliminar persona asociada
        $persona = $paciente->persona;
        $persona ->delete();

        //eliminar user asociado
        $user = $paciente->user;
        $user->delete();

        //eliminar secreataria asociada
        $paciente->delete();

        return redirect()->route ('admin.pacientes.index')->with('mensaje','¡Datos eliminados con exitoso!');
    }
}

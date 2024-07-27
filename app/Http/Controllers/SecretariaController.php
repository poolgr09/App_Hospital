<?php

namespace App\Http\Controllers;

use App\Models\Personas;
use App\Models\Secretaria;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class SecretariaController extends Controller
{
    /**
     * Display a listing of the resource. 
     */
    
    public function index()
    {
       $secretarias = Secretaria::with('user','persona')->get();
        return view('admin.secretarias.index', compact('secretarias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.secretarias.create');
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

       $secretaria = new Secretaria();
       $secretaria->user_id = $usuario->id;
       $secretaria->persona_id = $persona->id;
       $secretaria->save();

       $usuario->assignRole('secretaria');

       return redirect()->route ('admin.secretarias.index')->with('mensaje','¡Datos registrados con exitoso!');

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $secretarias = Secretaria::with('user','persona')-> findOrFail($id);
        return view('admin.secretarias.show', compact('secretarias'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $secretaria = Secretaria::with('user','persona')-> findOrFail($id);
        return view('admin.secretarias.edit', compact('secretaria'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
            $secretaria = Secretaria::find($id);
            $usuario = User::find($secretaria->user->id);
            $persona = Personas::find($secretaria->persona->id);
            
            $request -> validate([
           'cedula' => 'numeric|required|unique:personas,cedula,'.$secretaria->persona->id,
            'nombres' => 'required',
            'apellidos' => 'required',
            'genero' => 'required',
            'fecha_nacimiento' => 'required',
            'direccion' => 'required',
            'celular' => 'numeric|required',
            'user_name' => 'required',
            'tipo_sangre' => 'required',
            'email' => 'required|max:250|unique:users,email,'.$secretaria->user->id,
            
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
     
            $secretaria->user_id = $usuario->id;
            $secretaria->persona_id = $persona->id;
            $secretaria->save();

            return redirect()->route ('admin.secretarias.index')->with('mensaje','¡Datos registrados con exitoso!');
    }

    /**
     * Remove the specified resource from storage.
     */

     public function confirmDelete($id){
        $secretaria = Secretaria::with('user','persona')-> findOrFail($id);
        return view('admin.secretarias.delete', compact('secretaria'));
        
    }


    public function destroy($id) 
    {
        $secretaria = Secretaria::find($id);

        //eliminar persona asociada
        $persona = $secretaria->persona;
        $persona ->delete();

        //eliminar user asociado
        $user = $secretaria->user;
        $user->delete();

        //eliminar secreataria asociada
        $secretaria->delete();

        return redirect()->route ('admin.secretarias.index')->with('mensaje','¡Datos eliminados con exitoso!');
    }
}

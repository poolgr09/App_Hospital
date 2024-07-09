<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    public function index (){
        $usuarios = User::all();
        return view('admin.usuarios.index', compact('usuarios'));
    }

    public function create(){
        return view('admin.usuarios.create');
    }

    public function store(Request $request){
       
        $request->validate([
            'name'=> 'required|max:250',
            'email'=> 'required|max:250|unique:users',
            'password'=> 'required|max:250|confirmed',
            
        ]);

        $usuario = new User();
        $usuario->name = $request->name;
        $usuario->email = $request->email;
        $usuario->password = Hash::make($request['password']);
        $usuario->save();
        return redirect()->route ('admin.usuarios.index')->with('mensaje','¡Datos registrados con exitoso!');

    }

    public function show($id){
        
        $usuario = User::findOrFail($id);
        return view('admin.usuarios.show', compact('usuario'));
    }

    public function edit($id){
        $usuario = User::findOrFail($id);
        return view('admin.usuarios.edit',compact('usuario'));

    }

    public function update(Request $request, $id){
        $request->validate([
            'name'=> 'required|max:250',
            'email'=> 'required|max:250',
        ]);

        $usuario = User::find($id);
        $usuario->name = $request->name;
        $usuario->email = $request->email;
        
        $usuario-> save();
        
        return redirect()->route ('admin.usuarios.index')->with('mensaje','¡Datos modificados con exitoso!');
    }

    public function delete($id){
        echo $id;
        
    }

    public function confirmDelete($id){
        $usuario = User::findOrFail($id);
        return view('admin.usuarios.delete', compact('usuario'));
    }

    public function destroy($id){
        User::destroy($id);
        return redirect()->route ('admin.usuarios.index')->with('mensaje','¡Datos eliminados con exitoso!');
    }
}

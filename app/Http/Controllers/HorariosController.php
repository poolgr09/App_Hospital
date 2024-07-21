<?php

namespace App\Http\Controllers;

use App\Models\Especialidades;
use App\Models\horarios;
use App\Models\Medicos;
use App\Models\Personas;
use Carbon\Carbon;
use Illuminate\Http\Request;

use function Laravel\Prompts\alert;

class HorariosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $horarios = horarios::with('medico','especialidad')->get();

        $personas = Personas::all();

        return view('admin.horarios.index', compact('horarios','personas' ));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $medicos = Medicos::all();
        $personas = Personas::all();
        $especialidades = Especialidades::all();
        return view('admin.horarios.create', compact('medicos','personas','especialidades'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'dia' => 'required',
            'slct1' => 'required',
            'slct2'=> 'required',
        ]);

        
        // Verificar si el horario ya existe para ese día y rango de horas 
        // $horarioExistente = horarios::where('dia', $request->dia) 
        //     ->where (function ($query) use ($request) { 
        //         $query -> where (function ($query) use ($request) { 
        //             $query->where('slct1', '>=', $request -> hora_inicio_dia) 
        //                 ->where('slct1', '<', $request->hora_fin_dia); 
        //         }) 
        //             ->orWhere (function ($query) use ($request) { 
        //                 $query->where('slct2', '>', $request->hora_inicio_dia) 
        //                     ->where('slct2', '<=', $request->hora_fin_dia); 
        //             }) 
        //                 ->orwhere (function ($query) use ($request) { 
        //                     $query->where('slct1', '<', $request->hora_inicio_dia) 
        //                         ->where('slct2', '>', $request->hora_fin_dia); 
        //                 }); 
        //     }) 
        //     ->exists(); 
        // if ($horarioExistente) { 
        //     return redirect()->back() 
        //         ->withInput() 
        //         ->with('mensaje','El horario no esta disponible'); 
        // }

        $horarios = new horarios();

        $horarios->dia = $request->dia;
        $horainicio = Carbon::parse($request->slct1);
        $horarios->hora_inicio_dia = $horainicio->format('H:i:s');
        $horafin = Carbon::parse($request->slct2);
        $horarios->hora_fin_dia = $horafin->format('H:i:s');
        $horarios->medico_id = $request->medico;
        $horarios->especialidad_id = $request->especialidad;

        $horarios->save();

        return redirect()->route ('admin.horarios.index')->with('mensaje','¡Datos registrados con exitoso!');

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $horarios = horarios::findOrFail($id);
        return view('admin.horarios.show', compact('horarios'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $horarios = horarios::findOrFail($id);
        return view('admin.horarios.edit', compact('horarios'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $horarios = horarios::find($id);

        $request->validate([
            'dia' => 'required',
            'hora_inicio' => 'required',
            'hora_fin' => 'required',
        ]);


           $horarios->dia = $request->dia;
           $horarios->hora_inicio = $request->hora_inicio;
           $horarios->hora_fin = $request->hora_fin;

           $horarios->save();

           return redirect()->route ('admin.horarios.index')->with('mensaje','¡Datos registrados con exitoso!');

    }

    /**
     * Remove the specified resource from storage.
     */

     public function confirmDelete($id){
        $horarios = horarios::findOrFail($id);
        return view('admin.horarios.delete', compact('horarios'));
    }


    public function destroy($id)
    {
        horarios::destroy($id);
        return redirect()->route ('admin.horarios.index')->with('mensaje','¡Datos eliminados con exitoso!');
    }


}

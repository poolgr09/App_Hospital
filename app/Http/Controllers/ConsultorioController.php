<?php

namespace App\Http\Controllers;

use App\Models\Consultorio;
use App\Models\Especialidades;
use App\Models\Medicos;
use App\Models\Personas;
use Illuminate\Http\Request;

use function Laravel\Prompts\alert;

class ConsultorioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $consultorios = Consultorio::with('medico','especialidad')->get();

        $personas = Personas::all();

        return view('admin.consultorios.index', compact('consultorios','personas' ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.consultorios.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'codigo' => 'required',
            'nombre' => 'required',
            'descripcion' => 'required',
            'ubicacion'=> 'required',

        ]);

        $consultorios = new Consultorio();

        $consultorios->codigo = $request->codigo;
        $consultorios->nombre = $request->nombre;
        $consultorios->descripcion = $request->descripcion;
        $consultorios->ubicacion = $request->ubicacion;

        $consultorios->save();

        return redirect()->route ('admin.consultorios.index')->with('mensaje','¡Datos registrados con exitoso!');

    }

    /**
     * Display the specified resource.
     */
    public function show(Consultorio $consultorio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, $id)
    {
        $consultorios = Consultorio::all();
        $persona = Personas::all();
        $medicos = Medicos::all();
        $especialidades = Especialidades::all();

        return view('admin.consultorios.edit', compact('consultorios','persona','medicos','especialidades'));
   
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $consultorios = Consultorio::find($id);

        $request->validate([
            'dia' => 'required',
            'hora_inicio' => 'required',
            'hora_fin' => 'required',
        ]);


        $consultorios->dia = $request->dia;
        $consultorios->hora_inicio = $request->hora_inicio;
        $consultorios->hora_fin = $request->hora_fin;

        $consultorios->save();

        return redirect()->route ('admin.consultorios.index')->with('mensaje','¡Médico registrado con exito!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Consultorio $consultorio)
    {
    
    }

   public function asignar()
   {
        $consultorios = Consultorio::all();
        $medicos = Medicos::all();
        $especialidades = Especialidades::all();
        $personas = Personas::all();

        return view('admin.consultorios.asignar', compact('consultorios','personas','medicos','especialidades'));     
    
    
   }

   public function guardarAsignacion(Request $request)
    {
        $consultorios = Consultorio::find($request->consultorio);
             
        $consultorios-> medico_id = $request->medico;
        $consultorios-> especialidad_id = $request->especialidad;
        $consultorios-> fecha_asignacion = now();
        $consultorios-> activo = FALSE;
        $consultorios->save();

        return redirect()->route ('admin.consultorios.index')->with('mensaje','Consultorio registrado con exito!');
    }
    
    public function reporte(Request $request)
    {
        $consultorios = Consultorio::with('medico','especialidad')->get();

        $medico = Medicos::with('persona')->get();

        return view('admin.consultorios.reporte', compact('consultorios','medico'));

    }    

    
}

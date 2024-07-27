<?php

namespace App\Http\Controllers;

use App\Models\Especialidades;
use App\Models\Event;
use App\Models\horarios;
use App\Models\Medicos;
use App\Models\Personas;
use Carbon\Carbon;
//use Dotenv\Exception\ValidationException;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;


class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'fecha' => 'required|date',
            'hora' => 'required|date_format:H:i',
            
        ]);
        

        
        $medicos = Medicos::find($request->medico);
        $especialidades = Especialidades::find($request->especialidad);
        
        $horaI = $request-> hora;
        // $fechaI = Carbon::parse($request-> fecha);
        // $diaI= $fechaI->format('l');

        // $diasEs= array (
        //     'Monday'=> 'LUNES',
        //     'Tuesday'=> 'MARTES',
        //     'Wednesday'=> 'MIERCOLES',
        //     'Thursday'=> 'JUEVES',
        //     'Friday'=> 'VIERNES'
        // );

        
        // $diaEs = $diasEs[$diaI];
        

        // // $dia = date('1', strtotime($fechaI));
        // // $dia_reserva = $this->traducir_dia($dia);



        // $horarios = horarios:: where('medico_id',$medicos->id)
        //                     -> where('especialidad_id',$especialidades->id)   
        //                     -> where ('dia', $diaEs)
        //                     -> where ('hora_inicio_dia', '<=', $horaI)
        //                     -> where ('hora_fin_dia', '>=', $horaI)
        //                     -> exists();

        // if (!$horarios) {
        //     throw ValidationException::withMessages
        //     ([
        //         'horaI'=> ['El medico no esta disponible en este horario'],

        //     ]);
        
        // }
                            
        
        
        $cita = new Event(); 

        $cita-> title = $medicos->persona->nombres.''.$medicos->persona->apellidos.''.$especialidades->nombre.''.$request->hora;
        $cita-> start = $request->fecha." ".$horaI;
        $cita-> end = $request->fecha." ".$horaI;
        $cita-> color = 'blue';
        $cita-> user_id = Auth::user()->id;
        $cita-> medico_id = $request->medico;
        $cita-> especialidad_id = $request->especialidad;
       
        $cita->save();

        return redirect()->route ('admin.index')->with('mensaje','¡Datos registrados con exitoso!');

    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */

      
    public function destroy()
    {
       
    }
}

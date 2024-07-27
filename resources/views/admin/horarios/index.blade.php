@extends('layouts.admin')

@section('content')
    <div class="row col-md-12">
        <div class="card card-primary col-md-12">
            <div class="card-header bg-lightblue">
                <h3 class="card-title">Horarios registrados</h3>
                <div class="card-tools">
                    <a href="{{ url('admin/horarios/create') }}" class="btn btn-secondary bg-white">
                        Registro nuevo
                    </a>
                </div>

            </div>

            <div class="card-body" style="display: block;">
                @if ($message = Session::get('mensaje'))
                    <div class="alert alert-success">
                        {{ $message }}
                    </div>
                @endif
                <table id="example1" class="table table-striped table-sm table-hover">
                    <thead style="background-color: rgb(150, 158, 165)">
                        <tr>
                            
                            
                            <th scope="col">Fecha</th>
                            <th scope="col">Hora Inicio</th>
                            <th scope="col">Hora Fin</th>
                            <th scope="col">Médico</th>
                            <th scope="col">Especialidad</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($horarios as $horario)
                            <tr>
                                <td> {{ $horario->dia}} </td> 
                                <td> {{ $horario->hora_inicio_dia }} </td>
                                <td> {{ $horario->hora_fin_dia }} </td>
                                <td> {{ $horario->medico->persona->nombres.' '.$horario->medico->persona->apellidos}} </td>
                                <td> {{ $horario->especialidad->nombre}} </td>
                               
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                            <a href="{{ url('admin/horarios/' . $horario->id . '/confirm-delete') }}" type="button"
                                            class="btn btn-outline-danger btn-sm"><i class="bi bi-trash3-fill"></i></a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <br>
                <div class="card-body">
                    <table class="table table-striped table-sm table-hover" style="text-align: center">
                        <thead style="background-color: rgb(150, 158, 165)">
                            <tr >
                                <th cope="col">HORA/DIA</th> 
                                <th cope="col">LUNES</th> 
                                <th scope="col">MARTES</th> 
                                <th scope="col">MIÉRCOLES</th> 
                                <th scope="col">JUEVES</th> 
                                <th scope="col">VIERNES</th>                            
                            </tr>
                        </thead>
                        <tbody>
                        @php
                            $horas = ['09:00:00 - 09:30:00','09:30:00 - 10:00:00','10:00:00 - 10:30:00','10:30:00 - 11:00:00','11:00:00 - 11:30:00','11:30:00 - 12:00:00','16:00:00 - 16:30:00','16:30:00 - 17:00:00','17:00:00 - 17:30:00','17:30:00 - 18:00:00'];
                            $dias =['LUNES','MARTES','MIERCOLES','JUEVES','VIERNES'];
                        @endphp
                        @foreach ($horas as $hora)
                            @php
                                list($hora_inicio,$hora_fin)= explode(' - ',$hora);
                            @endphp
                            <tr>
                                 <td> {{$hora}} </td>
                                 @foreach ($dias as $dia)
                                     @php
                                        $nombre_medico = '';
                                        foreach ($horarios as $horario) {
                                            if (strtoupper($horario->dia)==$dia &&
                                                $hora_inicio>= $horario->hora_inicio_dia &&
                                                $hora_fin<= $horario->hora_fin_dia){
                                                $nombre_medico=$horario->medico->persona->nombres.' '.$horario->medico->persona->apellidos;
                                                break;
                                            }
                                        }
                                     @endphp
                                     <td> {{$nombre_medico}} </td>
                                 @endforeach
                                 
                             </tr>
                        @endforeach  
                        </tbody>
                    </table>
                </div>
                <script>
                    $(function() {
                        $("#example1").DataTable({
                            "responsive": true,
                            "lengthChange": false,
                            "autoWidth": false,
                            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
                        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
                        $('#example2').DataTable({
                            "paging": true,
                            "lengthChange": false,
                            "searching": false,
                            "ordering": true,
                            "info": true,
                            "autoWidth": false,
                            "responsive": true,
                        });
                    });
                </script>
            </div>

        </div>

    </div>
    
@endsection

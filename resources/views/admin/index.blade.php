@extends('layouts.admin')

@section('content')

    {{-- Muestra datos del usuario autenticado --}}
    <div class="row">

        @php
            $persona = Auth::user()->personas;
        
        @endphp

        @if ((Auth::user()->name) != 'Administrador')
            <h3>Bienvenido {{(Auth::user()->name)}}: {{$persona->nombres.' '.$persona->apellidos}}</h3>
        @else
        <h3>Bienvenido: {{(Auth::user()->name)}} </h3>
        @endif
        
    
    </div>
    <hr>

{{-- Muestra modulos del sistema --}}
    <div class="row">
        
        {{-- Modulo usuarios --}}
        @can('admin.usuarios.index')
            <div class="col-lg-3 col-6">

                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ $total_usuarios }}</h3>
                        <p>Usuarios registrados</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-user-plus"></i>
                    </div>
                    <a href="{{ url('admin/usuarios') }}" class="small-box-footer">
                        Más información <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
        @endcan

        {{-- Modulo secretarias --}}
        @can('admin.secretarias.index')
            <div class="col-lg-3 col-6">
                <div class="small-box bg-primary">
                    <div class="inner">
                        <h3>{{ $total_secretarias }}</h3>
                        <p>Secretarias registradas</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-user-plus"></i>
                    </div>
                    <a href="{{ url('admin/secretarias') }}" class="small-box-footer">
                        Más información <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
        @endcan

        {{-- Modulo pacientes --}}
        @can('admin.pacientes.index')
            <div class="col-lg-3 col-6">
                <div class="small-box bg-lightblue">
                    <div class="inner">
                        <h3>{{ $total_pacientes }}</h3>
                        <p>Pacientes registrados</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-user-plus"></i>
                    </div>
                    <a href="{{ url('admin/pacientes') }}" class="small-box-footer">
                        Más información <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
        @endcan

        {{-- Modulo médicos --}}
        @can('admin.medicos.edit')
            <div class="col-lg-3 col-6">
                <div class="small-box bg-purple">
                    <div class="inner">
                        <h3>{{ $total_medicos }}</h3>
                        <p>Médicos registrados</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-user-plus"></i>
                    </div>
                    <a href="{{ url('admin/medicos') }}" class="small-box-footer">
                        Más información <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
        @endcan

        {{-- Modulo especialidades --}}
        @can('admin.especialidades.edit')
            <div class="col-lg-3 col-6">
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{ $total_especialidades }}</h3>
                        <p>Especialidades registradas</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-user-plus"></i>
                    </div>
                    <a href="{{ url('admin/especialidades') }}" class="small-box-footer">
                        Más información <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
        @endcan

        {{-- Modulo horarios --}}
        @can('admin.horarios.index')
            <div class="col-lg-3 col-6">
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{ $total_horarios }}</h3>
                        <p>Horarios médicos</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-user-plus"></i>
                    </div>
                    <a href="{{ url('admin/horarios') }}" class="small-box-footer">
                        Más información <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
        @endcan

        {{-- Modulo consultorios --}}
        @can('admin.consultorios.index')
            <div class="col-lg-3 col-6">
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{ $total_consultorios}}</h3>
                        <p>Consultorios</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-user-plus"></i>
                    </div>
                    <a href="{{ url('admin/consultorios') }}" class="small-box-footer">
                        Más información <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
        @endcan
    </div>

    {{-- Modulo citas --}}
    <div class="row col-md-12">
        @can('admin.medicos.index')
        <div class="card card-primary col-md-14">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                Registrar cita
            </button>
            <a href="{{url('admin/citas_reservadas', Auth::user()->id)}}" class="btn btn-success"> <i class="bi bi-calendar-check"></i>  Citas reservadas</a>
        </div>
        @endcan

            <div class="card card-primary col-md-12">

                @can('admin.medicos.edit')
                    <div class="card-header bg-lightblue">
                        <h3 class="card-title">Calendario de reserva de citas médicas</h3>
                    </div>
                @endcan

                <div class="card-body" style="display: block;">
                    <div class="row">
                                            
                        <!-- Modalpara ingreso de datos -->
                        <form action="{{url('/admin/citas/create')}}" method="POST">
                            @csrf

                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Reserva de cita médica</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="">Médico</label><br>
                                                    <select class="form-control js-example-basic-single" name="medico" id="select-medico" required>
                                                        <option value="">Selecccione una opción</option>
                                                        @foreach ($medicos as $medico)
                                                            <option value="{{$medico->id}}">
                                                                {{$medico->persona->nombres." ".$medico->persona->apellidos}}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Especialidad</label><br>
                                                    <select class="form-control js-example-basic-single"  name="especialidad" id="select-especialidad" required>
                                                        <option value="">Selecccione una opción</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="">Fecha</label>
                                                    <input type="date" name="fecha" id="fecha" value="<?php echo date ('Y-m-d') ?>" class="form-control">
                                                    <script>
                                                        document.addEventListener('DOMContentLoaded', function(){
                                                            const fechainput = document.getElementById('fecha');
                                                            fechainput.addEventListener('change', function(){
                                                                let selecfecha = this.value;
                                                                let hoy = new Date().toISOString().slice(0, 10);

                                                                if (selecfecha < hoy) {
                                                                    this.value = null;
                                                                    alert('La fecha debe ser actual o mayor');
                                                                }
                                                            
                                                            });
                                                        });
                                                    </script>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="">Hora</label>
                                                    <input type="time" name="hora" id="hora" class="form-control">
                                                    @error('hora')
                                                        <small style="color: red"> {{$message}} </small>
                                                    @enderror
                                                    <script>
                                                        document.addEventListener('DOMContentLoaded', function(){
                                                            const horainput = document.getElementById('hora');
                                                            horainput.addEventListener('change', function(){
                                                                let selechora = this.value;

                                                                selechora = selechora.split(':');
                                                                if (selechora[1]<'30') {
                                                                        
                                                                        selechora = selechora[0] + ':00';
                                                                        this.value = selechora;
                                                                } 
                                                                else {
                                                                    
                                                                    selechora = selechora[0] + ':30';
                                                                    this.value = selechora;
                                                                }
                                                                
                                                                

                                                                if ((selechora >= '09:00' && selechora < '12:00') || (selechora >= '16:00' && selechora < '18:00')) {
                                                                    
                                                                    this.value = selechora;
                                                                }
                                                                else{
                                                                    this.value = null;
                                                                    alert('El horario de atención es 09:00 - 12:00 y 16:00 - 18:00');
                                                                }
                                                                
                                                            });
                                                        });
                                                    </script>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </form>
                    
                    </div>
                    @can('admin.medicos.edit')
                        <div id='calendar'></div>
                    @endcan
                </div>
            </div>
    </div>

    {{-- Scripts --}}
    <script>

        document.addEventListener('DOMContentLoaded', function() {
          var calendarEl = document.getElementById('calendar');
          var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            locale:'es',
            
            events:[
                @foreach($citas as $cita){
                title:'{{$cita->title}}',
                start:'{{$cita->start}}',
                end:'{{$cita->end}}',
                color:'{{$cita->color}}',
                },
                @endforeach
            ]
          });
          calendar.render();
        });
      
      </script>
@endsection

@section('scripts')
<script src="{{url('/dist/js/edit.js')}}"></script>
<script src="{{url('/dist/js/selech.js')}}"></script>

@endsection

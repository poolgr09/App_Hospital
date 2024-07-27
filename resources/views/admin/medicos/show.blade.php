@extends('layouts.admin')

@section('content')
    <div class="row col-md-12">
        <h3>Médico: {{$medicos->persona->nombres}} {{$medicos->persona->apellidos}}</h3>
    </div>
    <hr>
    <div class="row col-md-12">
        <div class="col-md-12">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Datos registrados</h3>
                </div>
                
                <div class="card-body">
                   
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Cédula</label>
                                    <p>{{$medicos->persona->cedula}}</p>
                                   
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Nombres</label>
                                    <p>{{$medicos->persona->nombres}}</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Apellidos</label>
                                    <p>{{$medicos->persona->apellidos}}</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Celular</label>
                                    <p>{{$medicos->persona->celular}}</p>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Especialidad</label>
                                    @foreach ($medicos->especialidad as $especialidad)
                                        <p> {{ $especialidad->nombre }} </p>
                                    @endforeach
                                    
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form group">
                                    <label for="">Dirección</label><b>*</b>
                                    <p>{{$medicos->persona->direccion}}</p>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form group">
                                    <label for="">Edad</label><b>*</b>
                                    <p>{{$medicos->persona->edad}}</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Email</label>
                                    <p>{{$medicos->user->email}}</p>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form group">
                                    <a href="{{url('admin/medicos')}}" class="btn btn-secondary">Volver</a>
                                   
                                </div>
                            </div>
                        </div>
                   
                </div>
                
            </div>
        </div>
    </div>
@endsection
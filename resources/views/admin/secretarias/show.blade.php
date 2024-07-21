@extends('layouts.admin')

@section('content')
    <div class="row col-md-12">
        <h3>Secretaria: {{$secretarias->persona->nombres}} {{$secretarias->persona->apellidos}}</h3>
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
                                    <label for="">Cedula</label>
                                    <p>{{$secretarias->persona->cedula}}</p>
                                   
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Nombres</label>
                                    <p>{{$secretarias->persona->nombres}}</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Apellidos</label>
                                    <p>{{$secretarias->persona->apellidos}}</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Genero</label>
                                    <p>{{$secretarias->persona->genero}}</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Celular</label>
                                    <p>{{$secretarias->persona->celular}}</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Tipo de sangre</label>
                                    <p>{{$secretarias->persona->tipo_sangre}}</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Nombre de usuario</label>
                                    <p>{{$secretarias->user->name}}</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Edad</label>
                                    <p>{{$secretarias->persona->edad}}</p>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Fecha Nacimiento</label>
                                    <p>{{$secretarias->persona->fecha_nacimiento}}</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form group">
                                    <label for="">Dirección</label>
                                    <p>{{$secretarias->persona->direccion}}</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Email</label>
                                    <p>{{$secretarias->user->email}}</p>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form group">
                                    <a href="{{url('admin/secretarias')}}" class="btn btn-secondary">Volver</a>
                                   
                                </div>
                            </div>
                        </div>
                   
                </div>
                
            </div>
        </div>
    </div>
@endsection
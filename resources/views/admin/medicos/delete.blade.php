
@extends('layouts.admin')

@section('content')
    <div class="row col-md-12 bg-danger row justify-content-center align-items-center">
        <h3>Eliminar datos: {{$medico->persona->nombres}} {{$medico->persona->apellidos}}</h3>
    </div>
    <hr>
    <div class="row col-md-12">
        <div class="col-md-12">
            <div class="card card-danger">
                <div class="card-header">
                    <h3 class="card-title">¿Está seguro que desea eliminar este registro?</h3>
                </div>
                
                <div class="card-body">
                    <form action="{{url('/admin/medicos/'.$medico->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Cedula</label>
                                    <input type="text" value="{{$medico->persona->cedula}}" name="cedula" class="form-control" disabled>
                                   
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Nombres</label> 
                                    <input type="text" value="{{$medico->persona->nombres}}" name="nombres" class="form-control" disabled>
                                   
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Apellidos</label> 
                                    <input type="text" value="{{$medico->persona->apellidos}}" name="apellidos" class="form-control" disabled>
                                   
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Celular</label> 
                                    <input type="text" value="{{$medico->persona->celular}}" name="celular" class="form-control" disabled>
                                    
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Edad</label>
                                    <input type="date" value="{{$medico->persona->edad}}" name="edad" class="form-control" disabled>
                                    
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form group">
                                    <label for="">Dirección</label>
                                    <input type="address" value="{{$medico->persona->direccion}}" name="direccion" class="form-control" disabled>
                                   
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Genero</label>
                                    <p>{{$medico->persona->genero}}</p>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form group">
                                    <label for="">Email</label>
                                    <input type="email" value="{{$medico->user->email}}" name="email" class="form-control" disabled>
                                    
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form group">
                                    <a href="{{url('admin/medicos')}}" class="btn btn-secondary">Cancelar</a>
                                    <button type="submit" class="btn btn-danger">Eliminar</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                
            </div>
        </div>
    </div>
@endsection
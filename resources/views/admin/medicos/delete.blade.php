
@extends('layouts.admin')

@section('content')
    <div class="row col-md-12 bg-danger row justify-content-center align-items-center">
        <h3>Eliminar datos: {{$medico->nombres}} {{$medico->apellidos}}</h3>
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
                                    <input type="text" value="{{$medico->cedula}}" name="cedula" class="form-control" disabled>
                                    @error('cedula')
                                        <small style="color: red"> {{$message}} </small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Nombres</label> 
                                    <input type="text" value="{{$medico->nombres}}" name="nombres" class="form-control" disabled>
                                    @error('nombres')
                                        <small style="color: red"> {{$message}} </small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Apellidos</label> 
                                    <input type="text" value="{{$medico->apellidos}}" name="apellidos" class="form-control" disabled>
                                    @error('apellidos')
                                        <small style="color: red"> {{$message}} </small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Celular</label> 
                                    <input type="text" value="{{$medico->celular}}" name="celular" class="form-control" disabled>
                                    @error('celular')
                                        <small style="color: red"> {{$message}} </small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Fecha Nacimiento</label>
                                    <input type="date" value="{{$medico->fecha_nacimiento}}" name="fecha_nacimiento" class="form-control" disabled>
                                    @error('fecha_nacimiento')
                                        <small style="color: red"> {{$message}} </small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="form group">
                                    <label for="">Dirección</label>
                                    <input type="address" value="{{$medico->direccion}}" name="direccion" class="form-control" disabled>
                                    @error('direccion')
                                        <small style="color: red"> {{$message}} </small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form group">
                                    <label for="">Email</label>
                                    <input type="email" value="{{$medico->correo}}" name="email" class="form-control" disabled>
                                    @error('correo')
                                        <small style="color: red"> {{$message}} </small>
                                    @enderror
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
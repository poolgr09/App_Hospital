@extends('layouts.admin')

@section('content')
    <div class="row col-md-12 bg-green row justify-content-center align-items-center">
        <h3>Modificar datos de especialidad: {{$especialidades->nombres}}</h3>
    </div>
    <hr>
    <div class="row col-md-12">
        <div class="col-md-12">
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title">Complete los datos de la especialidad</h3>
                </div>
                
                <div class="card-body">
                    <form action="{{url('/admin/especialidades',$especialidades->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                           
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Nombre</label> <b>*</b>
                                    <input type="text" value="{{$especialidades->nombre}}" name="nombre" class="form-control" required>
                                    @error('nombre')
                                        <small style="color: red"> {{$message}} </small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Descripción</label> <b>*</b>
                                    <input type="text" value="{{$especialidades->descripcion}}" name="descripcion" class="form-control" required>
                                    @error('descripcion')
                                        <small style="color: red"> {{$message}} </small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form group">
                                    <label for="">Estado</label><b>*</b>
                                    
                                    <div class="col-md-6">
                                        <select class="js-example-basic-single" style="width: 50%" name="estado" required>
                                        
                                            <option value="1">Acitvo</option>
                                            
                                            <option value="0">Inactivo</option>
                                           
                                        </select>
                                    </div>
                                    @error('estado')
                                        <small style="color: red"> {{$message}} </small>
                                    @enderror
                                </div>
                            </div>
                            
                        </div>
                        
                        
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form group">
                                    <a href="{{url('admin/especialidades')}}" class="btn btn-secondary">Cancelar</a>
                                    <button type="submit" class="btn btn-success">Actualizar</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                
            </div>
        </div>
    </div>
@endsection
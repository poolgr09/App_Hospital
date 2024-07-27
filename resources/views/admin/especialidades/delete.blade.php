
@extends('layouts.admin')

@section('content')
    <div class="row col-md-12 bg-danger row justify-content-center align-items-center">
        <h3>Eliminar datos: {{$especialidades->nombres}} </h3>
    </div>
    <hr>
    <div class="row col-md-12">
        <div class="col-md-12">
            <div class="card card-danger">
                <div class="card-header">
                    <h3 class="card-title">¿Está seguro que desea eliminar este registro?</h3>
                </div>
                
                <div class="card-body">
                    <form action="{{url('/admin/especialidades/'.$especialidades->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <div class="row">
                            
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Nombre</label> 
                                    <input type="text" value="{{$especialidades->nombre}}" name="nombres" class="form-control" disabled>
                                    @error('nombres')
                                        <small style="color: red"> {{$message}} </small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Descripción</label> 
                                    <input type="text" value="{{$especialidades->descripcion}}" name="descripcion" class="form-control" disabled>
                                    @error('descripcion')
                                        <small style="color: red"> {{$message}} </small>
                                    @enderror
                                </div>
                            </div>
                            
                            
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form group">
                                    <a href="{{url('admin/especialidades')}}" class="btn btn-secondary">Cancelar</a>
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
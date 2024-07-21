@extends('layouts.admin')

@section('content')
    <div class="row col-md-12">
        <h3>Registro de nueva especialidad</h3>
    </div>
    <hr>
    <div class="row col-md-12">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Complete los datos</h3>
                </div>

                <div class="card-body">
                    <form action="{{ url('/admin/especialidades/create') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Nombre</label> <b>*</b>
                                    <input type="text" value="{{ old('nombre') }}" name="nombre" class="form-control"
                                        required>
                                    @error('nombre')
                                        <small style="color: red"> {{ $message }} </small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Descripcion</label> <b>*</b>
                                    <input type="text" value="{{ old('descripcion') }}" name="descripcion"
                                        class="form-control" required>
                                    @error('descripcion')
                                        <small style="color: red"> {{ $message }} </small>
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
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form group">
                                    <a href="{{ url('admin/especialidades') }}" class="btn btn-secondary">Cancelar</a>
                                    <button type="submit" class="btn btn-primary">Registrar</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

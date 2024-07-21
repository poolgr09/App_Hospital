@extends('layouts.admin')

@section('content')
    <div class="row col-md-12 bg-green row justify-content-center align-items-center">
        <h3>Modificar datos de medicos: {{$medicos->persona->nombres}} {{$medicos->persona->apellidos}}</h3>
    </div>
    <hr>
    <div class="row col-md-12">
        <div class="col-md-12">
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title">Complete los datos</h3>
                </div>
                
                <div class="card-body">
                    <form action="{{url('/admin/medicos/'.$medicos->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Cedula</label> <b>*</b>
                                    <input type="text" value="{{$medicos->persona->cedula}}" name="cedula" class="form-control" required>
                                    @error('cedula')
                                        <small style="color: red"> {{$message}} </small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Nombres</label> <b>*</b>
                                    <input type="text" value="{{$medicos->persona->nombres}}" name="nombres" class="form-control" required>
                                    @error('nombres')
                                        <small style="color: red"> {{$message}} </small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Apellidos</label> <b>*</b>
                                    <input type="text" value="{{$medicos->persona->apellidos}}" name="apellidos" class="form-control" required>
                                    @error('apellidos')
                                        <small style="color: red"> {{$message}} </small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Celular</label> <b>*</b>
                                    <input type="text" value="{{$medicos->persona->celular}}" name="celular" class="form-control" required>
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
                                    <label for="">Fecha Nacimiento</label><b>*</b>
                                    <input type="date" value="{{$medicos->persona->fecha_nacimiento}}" name="fecha_nacimiento" class="form-control" required>
                                    @error('fecha_nacimiento')
                                        <small style="color: red"> {{$message}} </small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form group">
                                    <label for="">Dirección</label><b>*</b>
                                    <input type="address" value="{{$medicos->persona->direccion}}" name="direccion" class="form-control" required>
                                    @error('direccion')
                                        <small style="color: red"> {{$message}} </small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Genero</label><b>*</b>
                                    
                                    <select name="genero" id="" class="form-control">
                                        <option value="{{$medicos->persona->genero}}">{{$medicos->persona->genero}}</option>
                                        <option value="Masculino">Masculino</option>
                                        <option value="Femenino">Femenino</option>
                                    </select>
                                    @error('genero')
                                        <small style="color: red"> {{$message}} </small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Tipo de sangre</label> <b>*</b>
                                    <input type="text" value="{{$medicos->persona->tipo_sangre}}" name="tipo_sangre" class="form-control" required>
                                    @error('tipo_sangre')
                                        <small style="color: red"> {{$message}} </small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form group"> 
                                    <label for="">Email</label><b>*</b>
                                    <input type="email" value="{{$medicos->user->email}}" name="email" class="form-control" required>
                                    @error('email')
                                        <small style="color: red"> {{$message}} </small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Nombre de usuario</label> <b>*</b>
                                    <input type="text" value="{{$medicos->user->name}}" name="user_name" class="form-control" required>
                                    @error('user_name')
                                        <small style="color: red"> {{$message}} </small>
                                    @enderror
                                </div> 
                            </div>
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Especialidad</label><b>*</b>
                                    <select class="form-control js-example-basic-multiple"  name="especialidades[]" multiple="multiple" required>
                                        @foreach ($especialidades as $especialidad)
                                            <option value="{{ $especialidad->id }}" {{ in_array($especialidad->id, old('especialidades', $medicos->especialidad->pluck('id')->toArray())) ? 'selected' : '' }}>
                                                    {{ $especialidad->nombre }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('especialidades')
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
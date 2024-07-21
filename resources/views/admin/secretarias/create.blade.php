@extends('layouts.admin')

@section('content')
    <div class="row col-md-12">
        <h3>Registro nuevo</h3>
    </div>
    <hr>
    <div class="row col-md-12">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Complete los datos</h3>
                </div>
                
                <div class="card-body">
                    <form action="{{url('/admin/secretarias/create')}}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Cedula</label> <b>*</b>
                                    <input type="text" value="{{old('cedula')}}" name="cedula" class="form-control" required>
                                    @error('cedula')
                                        <small style="color: red"> {{$message}} </small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Nombres</label> <b>*</b>
                                    <input type="text" value="{{old('nombres')}}" name="nombres" class="form-control" required>
                                    @error('nombres')
                                        <small style="color: red"> {{$message}} </small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Apellidos</label> <b>*</b>
                                    <input type="text" value="{{old('apellidos')}}" name="apellidos" class="form-control" required>
                                    @error('apellidos')
                                        <small style="color: red"> {{$message}} </small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Genero</label> <b>*</b>
                                    <select name="genero" id="" class="form-control" >
                                        <option value="Masculino">Masculino</option>
                                        <option value="Femenino">Femenino</option>
                                    </select>
                                    
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                                <div class="col-md-3">
                                    <div class="form group">
                                        <label for="">Fecha Nacimiento</label><b>*</b>
                                        <input type="date" value="{{old('fecha_nacimiento')}}" name="fecha_nacimiento" class="form-control" required>
                                        @error('fecha_nacimiento')
                                            <small style="color: red"> {{$message}} </small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form group">
                                        <label for="">Dirección</label><b>*</b>
                                        <input type="address" value="{{old('direccion')}}" name="direccion" class="form-control" required>
                                        @error('direccion')
                                            <small style="color: red"> {{$message}} </small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form group">
                                        <label for="">Celular</label> <b>*</b>
                                        <input type="text" value="{{old('celular')}}" name="celular" class="form-control" required>
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
                                    <label for="">Email</label><b>*</b>
                                    <input type="email" value="{{old('email')}}" name="email" class="form-control" required>
                                    @error('email')
                                        <small style="color: red"> {{$message}} </small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Nombre de usuario</label><b>*</b>
                                    <input type="text" value="{{old('user_name')}}" name="user_name" class="form-control" required>
                                    @error('user_name')
                                        <small style="color: red"> {{$message}} </small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Tipo de sangre</label><b>*</b>
                                    <input type="text" value="{{old('tipo_sangre')}}" name="tipo_sangre" class="form-control" required>
                                    @error('tipo_sangre')
                                        <small style="color: red"> {{$message}} </small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Contraseña</label><b>*</b>
                                    <input type="password" value="{{old('password')}}" name="password" class="form-control" required>
                                    @error('password')
                                        <small style="color: red"> {{$message}} </small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Confirmar contraseña</label><b>*</b>
                                    <input type="password" value="{{old('password_confirmation')}}" name="password_confirmation" class="form-control" required>
                                    @error('password_confirmation')
                                        <small style="color: red"> {{$message}} </small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form group">
                                    <a href="{{url('admin/secretarias')}}" class="btn btn-secondary">Cancelar</a>
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
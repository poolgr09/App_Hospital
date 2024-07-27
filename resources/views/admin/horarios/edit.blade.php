@extends('layouts.admin')

@section('content')
    <div class="row col-md-12 bg-green row justify-content-center align-items-center">
        <h3>Modificar datos de horario</h3>
    </div>
    <hr>
    <div class="row col-md-12">
        <div class="col-md-12">
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title">Complete los datos del horario</h3>
                </div>
                
                <div class="card-body">
                    <form action="{{url('/admin/horarios',$horarios->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                           
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Día</label> <b>*</b>
                                    <input type="text" value="{{$horarios->dia}}" name="dia" class="form-control" required>
                                    @error('dia')
                                        <small style="color: red"> {{$message}} </small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Hora inicio</label> <b>*</b>
                                    <input type="time" value="{{$horarios->hora_inicio}}" name="hora_inicio" class="form-control" required>
                                    @error('hora_inicio')
                                        <small style="color: red"> {{$message}} </small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Hora fin</label> <b>*</b>
                                    <input type="time" value="{{$horarios->hora_fin}}" name="hora_fin" class="form-control" required>
                                    @error('hora_fin')
                                        <small style="color: red"> {{$message}} </small>
                                    @enderror
                                </div>
                            </div>
                            
                        </div>
                        
                        
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form group">
                                    <a href="{{url('admin/horarios')}}" class="btn btn-secondary">Cancelar</a>
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
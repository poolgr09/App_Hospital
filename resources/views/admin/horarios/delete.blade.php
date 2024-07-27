
@extends('layouts.admin')

@section('content')
    <div class="row col-md-12 bg-danger row justify-content-center align-items-center">
        <h3>Eliminar datos </h3>
    </div>
    <hr>
    <div class="row col-md-12">
        <div class="col-md-12">
            <div class="card card-danger">
                <div class="card-header">
                    <h3 class="card-title">¿Está seguro que desea eliminar este registro?</h3>
                </div>

                <div class="card-body">
                    <form action="{{url('/admin/horarios/'.$horarios->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <div class="row">

                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Día</label>
                                    <input type="text" value="{{$horarios->dia}}" name="dia" class="form-control" disabled>
                                    @error('dia')
                                        <small style="color: red"> {{$message}} </small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Hora inicio</label>
                                    <input type="time" value="{{$horarios->hora_inicio_dia}}" name="hora_inicio" class="form-control" disabled>
                                    @error('hora_inicio')
                                        <small style="color: red"> {{$message}} </small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Hora fin</label>
                                    <input type="time" value="{{$horarios->hora_fin_dia}}" name="hora_fin" class="form-control" disabled>
                                    @error('hora_fin')
                                        <small style="color: red"> {{$message}} </small>
                                    @enderror
                                </div>
                            </div>

                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form group">
                                    <a href="{{url('admin/horarios')}}" class="btn btn-secondary">Cancelar</a>
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

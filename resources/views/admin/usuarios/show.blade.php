@extends('layouts.admin')

@section('content')
    <div class="row col-md-12">
        <h3>Usuario: {{$usuario->name}}</h3>
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
                                    <label for="">Nombre</label>
                                    <p>{{$usuario->name}}</p>
                                   
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Email</label>
                                    <p>{{$usuario->email}}</p>
                                </div>
                            </div>
                            
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form group">
                                    <a href="{{url('admin/usuarios')}}" class="btn btn-secondary">Volver</a>
                                   
                                </div>
                            </div>
                        </div>
                   
                </div>
                
            </div>
        </div>
    </div>
@endsection
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
                    <form action="{{url('/admin/createhistorial')}}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form group">
                                    <label for="">Diagnostico</label> <b>*</b>
                                    <textarea class="form-control" id="diagnostico" rows="4"></textarea>
                                    @error('diagnostico')
                                        <small style="color: red"> {{$message}} </small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form group">
                                    <label for="">Receta</label> <b>*</b>
                                    <textarea class="form-control" id="receta" rows="4"></textarea>
                                    @error('receta')
                                        <small style="color: red"> {{$message}} </small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form group">
                                    <label for="">Examen</label> <b>*</b>
                                    <textarea class="form-control" id="examen" rows="4"></textarea>
                                    @error('examen')
                                        <small style="color: red"> {{$message}} </small>
                                    @enderror
                                </div>
                            </div>

                        </div>    
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form group">
                                    <a href="{{url('admin/vercitas')}}" class="btn btn-secondary">Cancelar</a>
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

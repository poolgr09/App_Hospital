@extends('layouts.admin')

@section('content')
    <div class="row col-md-12">
        <h3>Registro de nuevo consultorio</h3>
    </div>
    <hr>
    <div class="row col-md-12">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Complete los datos</h3>
                </div>

                <div class="card-body">
                    <form action="{{ url('/admin/consultorios/create') }}" method="POST">
                        @csrf
                        <div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form group">
                                        <label for="">Codigo</label> <b>*</b>
                                        <input type="text" value="{{old('codigo')}}" name="codigo" class="form-control" required>
                                        @error('codigo')
                                        <small style="color: red"> {{$message}} </small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form group">
                                        <label for="">Nombre</label> <b>*</b>
                                        <input type="text" value="{{old('nombre')}}" name="nombre" class="form-control" required>
                                        @error('nombre')
                                        <small style="color: red"> {{$message}} </small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form group">
                                        <label for="">Descripcion</label> <b>*</b>
                                        <input type="text" value="{{old('descripcion')}}" name="descripcion" class="form-control" required>
                                        @error('descripcion')
                                        <small style="color: red"> {{$message}} </small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form group">
                                        <label for="">Ubicacion</label> <b>*</b>
                                        <input type="text" value="{{old('ubicacion')}}" name="ubicacion" class="form-control" required>
                                        @error('ubicacion')
                                        <small style="color: red"> {{$message}} </small>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                            <br>

                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form group">
                                    <a href="{{ url('admin/consultorios') }}" class="btn btn-secondary">Cancelar</a>
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
 @section('scripts')
    <script src="{{url('/dist/js/edit.js')}}"></script>
 @endsection

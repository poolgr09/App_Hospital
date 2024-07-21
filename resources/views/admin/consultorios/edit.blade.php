@extends('layouts.admin')

@section('content')
    <div class="row col-md-12 bg-green row justify-content-center align-items-center">
        <h3>Asignación de consultorio</h3>
    </div>
    <hr>
    <div class="row col-md-12">
        <div class="col-md-12">
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title">Complete los datos</h3>
                </div>

                <div class="card-body">
                    <form action="{{url('/admin/consultorios')}}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-md-6"> 
                                <div class="form group">
                                    <label for="">Consultorios</label><b>*</b>
                                    <select class="form-control js-example-basic-single" name="consultorio" required>
                                        <option value="">Selecccione una opcion</option>
                                        @foreach ($consultorios as $consultorio)
                                            <option value="{{$consultorio->id}}">
                                                {{$consultorio->nombres}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form group">
                                        <label for="">Medicos</label><b>*</b>
                                        <select class="form-control js-example-basic-single" name="medico" id="select-medico" required>
                                            <option value="">Selecccione una opcion</option>
                                            @foreach ($medicos as $medico)
                                                <option value="{{$medico->id}}">
                                                    {{$medico->persona->nombres." ".$medico->persona->apellidos}}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('medico_id')
                                        <small style="color: red"> {{$message}} </small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form group">
                                        <label for="">Especialidades</label><b>*</b>
                                        <select class="form-control js-example-basic-single"  name="especialidad" id="select-especialidad" required>
                                            <option value="">Selecccione una opcion</option>
                                        </select>
                                        @error('especialidad')
                                        <small style="color: red"> {{$message}} </small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <br>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form group">
                                    <a href="{{url('admin/consultorios')}}" class="btn btn-secondary">Cancelar</a>
                                    <button type="submit" class="btn btn-success">Guardar</button>
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

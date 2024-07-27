@extends('layouts.admin')

@section('content')
    <div class="row col-md-12">
        <h3>Registro de nuevo horario</h3>
    </div>
    <hr>
    <div class="row col-md-12">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Complete los datos</h3>
                </div>

                <div class="card-body">
                    <form action="{{ url('/admin/horarios/create') }}" method="POST">
                        @csrf
                        <div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form group">
                                        <label for="">Médicos</label><b>*</b>
                                        <select class="form-control js-example-basic-single" name="medico" id="select-medico" required>
                                            <option value="">Selecccione una opción</option>
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
                                <div class="col-md-4">
                                    <div class="form group">
                                        <label for="">Día</label> <b>*</b>

                                        <select name="dia" id="" class="form-control" required>
                                            <option value="LUNES">LUNES</option>
                                            <option value="MARTES">MARTES</option>
                                            <option value="MIERCOLES">MIÉRCOLES</option>
                                            <option value="JUEVES">JUEVES</option>
                                            <option value="VIERNES">VIERNES</option>

                                        </select>

                                    </div>
                                </div>

                                @error('dia')
                                    <small style="color: red"> {{ $message }} </small>
                                @enderror

                                <div class="col-md-4">
                                    <div class="form group">
                                        <label for="">Hora inicio</label> <b>*</b>
                                        <div class="col-md-8">
                                            <select class="js-example-basic-single" style="width: 50%" name="slct1" id="slct1" onchange="populate(this.id,'slct2')">
                                                <option value=""> Selecciona </option>
                                                <option value="09:00">09:00</option>
                                                <option value="09:30">09:30</option>
                                                <option value="10:00">10:00</option>
                                                <option value="10:30">10:30</option>
                                                <option value="11:00">11:00</option>
                                                <option value="11:30">11:30</option>                                                
                                                <option value="16:00">16:00</option>
                                                <option value="16:30">16:30</option>
                                                <option value="17:00">17:00</option>
                                                <option value="17:30">17:30</option>
                                            </select>
                                
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form group">
                                        <label for="">Hora fin</label> <b>*</b>
                                        <div class="col-md-8">
                                            <select class="js-example-basic-single" style="width: 50%" name="slct2" id="slct2"></select>
                                        </div>
                                        
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form group">
                                    <a href="{{ url('admin/horarios') }}" class="btn btn-secondary">Cancelar</a>
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
    <script src="{{url('/dist/js/selech.js')}}"></script>
    
 @endsection

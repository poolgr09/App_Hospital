@extends('layouts.admin')

@section('content')
    <div class="row col-md-12">
        <h3>Horario</h3>
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
                                <label for="">Dia</label>
                                <p>{{ $horarios->dia }}</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form group">
                                <label for="">Hora inicio</label>
                                <p>{{ $horarios->hora_inicio_dia }}</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form group">
                                <label for="">Hora fin</label>
                                <p>{{ $horarios->hora_fin_dia }}</p>
                            </div>
                        </div>

                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form group">
                                <a href="{{ url('admin/horarios') }}" class="btn btn-secondary">Volver</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

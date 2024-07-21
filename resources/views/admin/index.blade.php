@extends('layouts.admin')

@section('content')

    <div class="row">
        <h3>Bienvenido: {{Auth::user()->name}}</h3>
    </div>
    <hr>

    <div class="row">
        
        @can('admin.usuarios.index')
            <div class="col-lg-3 col-6">

                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ $total_usuarios }}</h3>
                        <p>Usuarios registrados</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-user-plus"></i>
                    </div>
                    <a href="{{ url('admin/usuarios') }}" class="small-box-footer">
                        Más información <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
        @endcan

        @can('admin.secretarias.index')
            <div class="col-lg-3 col-6">
                <div class="small-box bg-primary">
                    <div class="inner">
                        <h3>{{ $total_secretarias }}</h3>
                        <p>Secretarias registradas</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-user-plus"></i>
                    </div>
                    <a href="{{ url('admin/secretarias') }}" class="small-box-footer">
                        Más información <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
        @endcan

        @can('admin.pacientes.index')
            <div class="col-lg-3 col-6">
                <div class="small-box bg-lightblue">
                    <div class="inner">
                        <h3>{{ $total_pacientes }}</h3>
                        <p>Pacientes registrados</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-user-plus"></i>
                    </div>
                    <a href="{{ url('admin/pacientes') }}" class="small-box-footer">
                        Más información <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
        @endcan

        @can('admin.medicos.index')
            <div class="col-lg-3 col-6">
                <div class="small-box bg-purple">
                    <div class="inner">
                        <h3>{{ $total_medicos }}</h3>
                        <p>Medicos registrados</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-user-plus"></i>
                    </div>
                    <a href="{{ url('admin/medicos') }}" class="small-box-footer">
                        Más información <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
        @endcan

        @can('admin.especialidades.index')
            <div class="col-lg-3 col-6">
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{ $total_especialidades }}</h3>
                        <p>Especialidades registradas</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-user-plus"></i>
                    </div>
                    <a href="{{ url('admin/especialidades') }}" class="small-box-footer">
                        Más información <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
        @endcan

        @can('admin.horarios.index')
            <div class="col-lg-3 col-6">
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{ $total_horarios }}</h3>
                        <p>Horarios medicos</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-user-plus"></i>
                    </div>
                    <a href="{{ url('admin/horarios') }}" class="small-box-footer">
                        Más información <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
        @endcan

        @can('admin.consultorios.index')
            <div class="col-lg-3 col-6">
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{ $total_consultorios}}</h3>
                        <p>Consultorios</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-user-plus"></i>
                    </div>
                    <a href="{{ url('admin/consultorios') }}" class="small-box-footer">
                        Más información <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
        @endcan
    </div>
@endsection

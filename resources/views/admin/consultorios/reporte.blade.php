@extends('layouts.admin')

@section('content')
    <div class="row col-md-12">
        <div class="card card-primary col-md-12">
            <div class="card-header bg-lightblue">
                <h3 class="card-title">Consultorios registrados</h3>
            </div>

            <div class="card-body" style="display: block;">
                @if ($message = Session::get('mensaje'))
                    <div class="alert alert-success">
                        {{ $message }}
                    </div>
                @endif
                <table id="example1" class="table table-striped table-sm table-hover">
                    <thead style="background-color: rgb(150, 158, 165)">
                        <tr>
                            <th scope="col">Consultorio</th>
                            <th scope="col">Médico</th>
                            <th scope="col">Especialidad</th>
                            <th scope="col">Fecha de asignación</th>
                            <th scope="col">Estado</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($consultorios as $consultorio)
                            <tr>
                                <td> {{ $consultorio->nombre}} </td>

                                @if ($consultorio->medico_id == Null)
                                <td> {{ ' '}} </td>
                                @else
                                    <td> {{$consultorio->medico->persona->nombres." ".$consultorio->medico->persona->apellidos}} </td>
                                @endif
                                @if ($consultorio->especialidad_id == Null)
                                <td> {{ ' '}} </td>
                                @else
                                    <td> {{ $consultorio->especialidad->nombre}} </td>
                                @endif
                                <td> {{ $consultorio->fecha_asignacion }} </td>
                                @if ($consultorio->activo)
                                <td> {{ 'Disponible'}} </td>
                                @else
                                    <td> {{ 'No Disponible'}} </td>
                                @endif
                                
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
                <script>
                    $(function() {
                        $("#example1").DataTable({
                            "responsive": true,
                            "lengthChange": false,
                            "autoWidth": false,
                            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
                        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
                        $('#example2').DataTable({
                            "paging": true,
                            "lengthChange": false,
                            "searching": false,
                            "ordering": true,
                            "info": true,
                            "autoWidth": false,
                            "responsive": true,
                        });
                    });
                </script>


        </div>

    </div>

@endsection

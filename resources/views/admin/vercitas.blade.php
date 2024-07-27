@extends('layouts.admin')

@section('content')
    
    <div class="row col-md-12">
        <div class="card card-primary col-md-12">
            <div class="card-header bg-lightblue">
                    <h3 class="card-title">Citas Registradas</h3>
                         
            </div>
            
            <div class="card-body" style="display: block;">
              
                <table id="example1" class="table table-striped table-sm table-hover">
                    <thead style="background-color: rgb(150, 158, 165)">
                      <tr>
                        <th scope="col">Fecha</th>
                        <th scope="col">Hora</th>
                        <th scope="col">Nombres</th>
                        <th scope="col">Apellidos</th>
                        
                        <th scope="col">Fecha de nacimiento</th>
                        <th scope="col">Dirección</th>
                        <th scope="col">Especialidad</th>
                        <th scope="col">Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($citas as $cita)
                        <tr>
                          
                            <td> {{\Carbon\Carbon::parse($cita->start)->format('Y-m-d')}} </td>
                            <td> {{\Carbon\Carbon::parse($cita->start)->format('H:i')}} </td>
                            @foreach ($pacientes as $paciente)
                              <td> {{$paciente->persona->nombres}} </td>
                              <td> {{$paciente->persona->apellidos}} </td>
                              <td> {{$paciente->persona->fecha_nacimiento}} </td>
                              <td> {{$paciente->persona->direccion}} </td>
                            @endforeach 
                            @foreach ($especialidades as $especialidad)
                             <td> {{$especialidad->nombre}} </td>
                            @endforeach
                            <td>
                              
                              <a href=" {{url('admin/createhistorial')}} " class="btn btn-primary"> Tratar cita médica</a>
                             
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                  </table>
                  <script>
                    $(function () {
                      $("#example1").DataTable({
                        "responsive": true, "lengthChange": false, "autoWidth": false,
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
        
        </div>

    @endsection
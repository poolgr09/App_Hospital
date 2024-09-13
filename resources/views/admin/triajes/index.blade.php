@extends('layouts.admin')

@section('content')
    
    <div class="row col-md-12">
        <div class="card card-primary col-md-12">
            <div class="card-header bg-lightblue">
                    <h3 class="card-title">Triajes Registrados</h3>
                <div class="card-tools">
                    <a href="{{url('admin/triajes/create')}}" class="btn btn-secondary bg-white">
                        Registro nuevo 
                    </a>
                </div>
            </div>
            
            <div class="card-body" style="display: block;">
                @if ($message = Session::get('mensaje'))
                    <div class="alert alert-success">
                        {{$message}}
                    </div>
                @endif
                <table id="example1" class="table table-striped table-sm table-hover">
                    <thead style="background-color: rgb(150, 158, 165)">
                      <tr>
                        <th scope="col">Cedula</th>
                        <th scope="col">Nombres</th>
                        <th scope="col">Apellidos</th>
                        <th scope="col">Fecha de nacimiento</th>
                        <th scope="col">Genero</th>
                        <th scope="col">Triaje</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($triajes as $triaje)
                        <tr>
                            <td> {{$triaje->paciente->persona->cedula}} </td>
                            <td> {{$triaje->$paciente->persona->nombres}} </td>
                            <td> {{$triaje->$paciente->persona->apellidos}} </td>
                            <td> {{$triaje->$paciente->persona->celular}} </td>
                            <td> {{$triaje->$paciente->persona->fecha_nacimiento}} </td>
                            <td> {{$triaje->$paciente->persona->direccion}} </td>
                            <td> {{$triaje->$paciente->user->email}} </td> 

                            <td>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                  <a href="{{url('admin/triajes/'.$paciente->id)}}" type="button" class="btn btn-outline-info btn-sm"><i class="bi bi-arrow-through-heart"></i></a>
                                    <a href="{{url('admin/triajes/'.$paciente->id)}}" type="button" class="btn btn-outline-info btn-sm"><i class="bi bi-eye-fill"></i></a>
                                    <a href="{{url('admin/triajes/'.$paciente->id.'/edit')}}" type="button" class="btn btn-outline-success btn-sm"><i class="bi bi-pencil-fill"></i></a>
                                    <a href="{{url('admin/triajes/'.$paciente->id.'/confirm-delete')}}" type="button" class="btn btn-outline-danger btn-sm"><i class="bi bi-trash3-fill"></i></a>
                                  </div>
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
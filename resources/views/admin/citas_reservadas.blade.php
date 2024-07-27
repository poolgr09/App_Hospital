@extends('layouts.admin')

@section('content')

    <div class="row col-md-12">
        <div class="card card-primary col-md-12">
            <div class="card-header bg-lightblue">
                    <h1 class="card-title">Citas Reservadas</h1>
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
                        <th scope="col">Médico</th>
                        <th scope="col">Especialidad</th>
                        <th scope="col">Fecha cita</th>
                        <th scope="col">Hora cita</th>
                        <th scope="col">Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($citas as $cita)
                        <tr>
                            <td> {{$cita->medico->persona->nombres.' '.$cita->medico->persona->apellidos}} </td>
                            <td> {{$cita->especialidad->nombre}} </td>
                            <td> {{\Carbon\Carbon::parse($cita->start)->format('Y-m-d')}} </td>
                            <td> {{\Carbon\Carbon::parse($cita->start)->format('H:i')}} </td>

                            <td>
                              
                                <div class="btn-group" role="group" aria-label="Basic example">
                                
                                <form action="{{url('/admin/delete_citas/'.$cita->id)}}" method="POST">
                                  @csrf
                                  @method ('DELETE')
                                  <button class="btn btn-outline-danger btn-sm" type="submit"><i class="bi bi-trash3-fill"></i></button>
                                </form>
                                  
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

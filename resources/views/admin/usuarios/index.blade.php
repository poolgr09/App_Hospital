@extends('layouts.admin')

@section('content')
    <div class="row col-md-12">
        <div class="card card-primary col-md-12">
            <div class="card-header bg-lightblue">
                <h3 class="card-title">Usuarios Registrados</h3>
                <div class="card-tools">
                    <a href="{{ url('admin/usuarios/create') }}" class="btn btn-secondary bg-white">
                        Registrar nuevo
                    </a>
                </div>

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
                            <th scope="col">Nombre</th>
                            <th scope="col">email</th>
                            <th scope="col">acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($usuarios as $usuario)
                            <tr>
                                <td> {{ $usuario->name }} </td>
                                <td> {{ $usuario->email }} </td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a href="{{ url('admin/usuarios/' . $usuario->id) }}" type="button"
                                            class="btn btn-outline-info btn-sm"><i class="bi bi-eye-fill"></i></a>
                                        <a href="{{ url('admin/usuarios/' . $usuario->id . '/edit') }}" type="button"
                                            class="btn btn-outline-success btn-sm"><i class="bi bi-pencil-fill"></i></a>
                                        <a href="{{ url('admin/usuarios/' . $usuario->id . '/confirm-delete') }}" type="button"
                                            class="btn btn-outline-danger btn-sm"><i class="bi bi-trash3-fill"></i></a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
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

    </div>
@endsection

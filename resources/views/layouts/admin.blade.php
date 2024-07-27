<!DOCTYPE html>
<!-- Plantilla principal del proyecto -->
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Hospital Isidro Ayora</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="{{url('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback')}}">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{url('plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{url('dist/css/adminlte.min.css')}}">
  <!--Iconos bootstrap-->
  <link rel="stylesheet" href="{{url('https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css')}}">
  <!--Select opcion-->
  <link rel="stylesheet" href="{{url('https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css')}}">
   {{-- fullcalendar  --}}
   <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js'></script>
   <script src="{{url('fullcalendar/es.global.js')}}"></script>
 <!--sweetalert2-->
  <script src="{{url('https://cdn.jsdelivr.net/npm/sweetalert2@11')}}"></script>
  <!-- jQuery -->
  <script src="{{url('plugins/jquery/jquery.min.js')}}"></script>
  <!--datatable-->
  <link rel="stylesheet" href="{{url('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{url('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{url('plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">

</head>
<body class="hold-transition sidebar-mini">
  <div class="wrapper">

    <!-- Barra de navegavción -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light bg-lightblue">
      <!-- barra de navegación izquierdo -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="{{url('admin')}}" class="nav-link" style="color: white">Sistema de control de citas médicas</a>
        </li>
      </ul>

      <!-- barra de navegación derecho -->
      <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
              <i class="fas fa-expand-arrows-alt"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
              <i class="bi bi-person-circle"></i>
            </a>
          </li>
      </ul>
    </nav>
    
    <!-- Contenedor del menu principal-->
    <aside class="main-sidebar sidebar-light-primary elevation-4 bg-lightblue">
      <!-- Logo superior izquierdo -->
      <div class="brand-link">
        <img src="{{url('dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light text-white">Hospital Isidro Ayora</span>
      </div>

      {{-- Muestra el rol del usuario que ingresa al sistema--}}
      <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="info">
            <div class="d-block" style="color: white"> 

              @php
                $persona = Auth::user()->personas;
              @endphp

              @if ((Auth::user()->name) != 'Administrador')
                <h5><p class="text-monospace text-uppercase">{{(Auth::user()->name)}}</p></h5>
              @else
                <h5><p class="text-monospace text-uppercase">{{(Auth::user()->name)}}</p></h5>
              @endif
            
            </div>
          </div>
        </div>

        <!-- Barra del menú -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            
              <!--modulo Usuarios-->
            @can('admin.usuarios.index')
              <li class="nav-item">
                <a href="{{url('#')}}" class="nav-link active btn btn-outline-info">
                  <i class="nav-icon fas bi bi-people-fill"></i>
                  <p>
                    Usuarios
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{url('admin/usuarios/create')}}" class="nav-link active bg-lightblue">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Creación de usuarios</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{url('admin/usuarios')}}" class="nav-link active bg-lightblue">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Listar usuarios</p>
                    </a>
                  </li>
                </ul>
              </li>
            @endcan
            
            <!--modulo Secretarias-->
            @can('admin.secretarias.index')
              <li class="nav-item">
                <a href="{{url('#')}}" class="nav-link active btn btn-outline-info">
                  <i class="nav-icon fas bi bi-person-vcard"></i>
                  <p>
                    Secretarias
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{url('admin/secretarias/create')}}" class="nav-link active bg-lightblue">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Creación de secretaria</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{url('admin/secretarias')}}" class="nav-link active bg-lightblue">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Listar secretarias</p>
                    </a>
                  </li>
                </ul>
              </li>
            @endcan

            <!--modulo Pacientes-->
            @can('admin.pacientes.index')
              <li class="nav-item">
                <a href="{{url('#')}}" class="nav-link active btn btn-outline-info">
                  <i class="nav-icon fas bi bi-person-bounding-box"></i>
                  <p>
                    Pacientes
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{url('admin/pacientes/create')}}" class="nav-link active bg-lightblue">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Creación de paciente</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{url('admin/pacientes')}}" class="nav-link active bg-lightblue">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Listar pacientes</p>
                    </a>
                  </li>
                </ul>
              </li>
            @endcan

            <!--modulo Medicos-->
            @can('admin.medicos.index')
              <li class="nav-item">
                <a href="{{url('#')}}" class="nav-link active btn btn-outline-info">
                  <i class="nav-icon fas bi bi-heart-pulse-fill"></i>
                  <p>
                    Médicos
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  @can('admin.medicos.edit')
                  <li class="nav-item">
                    <a href="{{url('admin/medicos/create')}}" class="nav-link active bg-lightblue">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Creación de médico</p>
                    </a>
                  </li>
                  @endcan
                  <li class="nav-item">
                    <a href="{{url('admin/medicos')}}" class="nav-link active bg-lightblue">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Listar médicos</p>
                    </a>
                  </li>
                </ul>
              </li>
            @endcan

            <!--modulo Especialidades-->
            @can('admin.especialidades.index')
              <li class="nav-item">
                <a href="{{url('#')}}" class="nav-link active btn btn-outline-info">
                  <i class="nav-icon fas bi bi-clipboard2-pulse"></i>
                  <p>
                    Especialidades
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  @can('admin.medicos.edit')
                  <li class="nav-item">
                    <a href="{{url('admin/especialidades/create')}}" class="nav-link active bg-lightblue">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Creación de especialidad</p>
                    </a>
                  </li>
                  @endcan
                  <li class="nav-item">
                    <a href="{{url('admin/especialidades')}}" class="nav-link active bg-lightblue">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Listar especialidades</p>
                    </a>
                  </li>
                </ul>
              </li>
            @endcan

            <!--modulo horarios-->
            @can('admin.horarios.index')
              <li class="nav-item">
                <a href="{{url('#')}}" class="nav-link active btn btn-outline-info">
                  <i class="nav-icon fas bi bi-calendar2-date"></i>
                  <p>
                    Horarios
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{url('admin/horarios/create')}}" class="nav-link active bg-lightblue">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Creación de horarios</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{url('admin/horarios')}}" class="nav-link active bg-lightblue">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Listar horarios</p>
                    </a>
                  </li>
                </ul>
              </li>
            @endcan

            <!--modulo cita-->
            <li class="nav-item">
              <a href="{{url('#')}}" class="nav-link active btn btn-outline-info">
                  <i class="nav-icon fas bi bi-journal-medical"></i>
                  <p>
                      Citas Médicas
                      <i class="right fas fa-angle-left"></i>
                  </p>
              </a>
              
              <ul class="nav nav-treeview">
                @can('admin.medicos.index')
                <li class="nav-item">
                    <a href="{{url('admin')}}" class="nav-link active bg-lightblue">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Gestionar citas médicas</p>
                    </a>
                </li>
                @endcan   
                @can('admin.vercitas')
                  <li class="nav-item">
                    <a href="{{url('admin/vercitas')}}" class="nav-link active bg-lightblue">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Agenda de citas médicas</p>
                    </a>
                  </li> 
                @endcan
              </ul>
            </li>
              

              <!--modulo consultorios-->
              @can('admin.consultorios.index')
                <li class="nav-item">
                  <a href="{{url('#')}}" class="nav-link active btn btn-outline-info">
                      <i class="nav-icon fas bi bi-door-open"></i>
                      <p>
                          Consultorios
                          <i class="right fas fa-angle-left"></i>
                      </p>
                  </a>
                  <ul class="nav nav-treeview">
                      <li class="nav-item">
                          <a href="{{url('admin/consultorios/create')}}" class="nav-link active bg-lightblue">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Creación de consultorio</p>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a href="{{url('admin/consultorios')}}" class="nav-link active bg-lightblue">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Listar consultorios</p>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a href="{{url('asignar')}}" class="nav-link active bg-lightblue">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Asignar consultorio</p>
                          </a>
                      </li>
                      <li class="nav-item">
                        <a href="{{url('reporte')}}" class="nav-link active bg-lightblue">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Reporte de consultorios</p>
                        </a>
                    </li>
                  </ul>
              </li>
              @endcan

            <li class="nav-item">
              <a href="{{ route('logout') }}" class="nav-link btn btn-outline-danger" style="background-color: rgb(199, 85, 85)" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                  <i class="nav-icon fas bi bi-box-arrow-in-right" style="color:beige"></i>
                  <p style="color:beige">
                    Cerrar Sesion
                  </p>
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
              </form>
            </li>
          </ul>
        </nav>
        
      </div>
     
    </aside>

    <div class="content-wrapper">
      <br>
      <div class="content">
        @yield('content')
      </div>
    </div>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-light">
      <div class="p-3">
        <h5> </h5>
        <p>Datos personales</p>
        <p>Editar perfil</p>
        <p>Cambiar contraseña</p>
        <p><i class="nav-icon fas bi bi-box-arrow-in-right" style="color:rgb(97, 194, 233)"></i> Cerrar sesion</p>
      </div>
    </aside>
    

    <!-- Footer -->
    <footer class="main-footer">
            
      <strong>Copyright &copy; 2024 <a href="">Paul Gonzalez</a>.</strong> Todos los derechos reservados.
    </footer>
  </div>


<!-- SCRIPTS -->


<!-- Bootstrap 4 -->
<script src="{{url('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- datatable -->
<script src="{{url('plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{url('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{url('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{url('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{url('plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{url('plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{url('plugins/jszip/jszip.min.js')}}"></script>
<script src="{{url('plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{url('plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{url('plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{url('plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{url('plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>

<!-- AdminLTE App -->
<script src="{{url('dist/js/adminlte.min.js')}}"></script>

<script src="{{url('https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js')}}"></script>
  <script>
    $(document).ready(function() {
      $('.js-example-basic-multiple').select2({theme: "classic"});
    });
  </script>

  <script>
    $(document).ready(function() {
    $('.js-example-basic-single').select2({theme: "classic"});
    });
  </script>

  @yield('scripts')

</body>
</html>

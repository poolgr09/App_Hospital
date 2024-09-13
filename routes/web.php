<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use PHPUnit\TextUI\Configuration\Php;
use PHPUnit\TextUI\XmlConfiguration\CodeCoverage\Report\Php as ReportPhp;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great! 
|
*/

Route::get('/', function () {
    return view('auth/login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/admin/citas/create', [App\Http\Controllers\EventController::class, 'store'])->name('admin.citas.create');


Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.index')->middleware(middleware:'auth');
Route::get('/admin/citas_reservadas/{id}', [App\Http\Controllers\AdminController::class,'citas_reservadas'])->name('admin.citas_reservadas');
Route::delete('/admin/delete_citas/{id}', [App\Http\Controllers\AdminController::class, 'delete_citas'])->name('admin.events.delete_citas');

//Rutas para el triaje
Route::get('/admin/triajes', [App\Http\Controllers\TriajController::class, 'index'])->name('admin.triajes.index')->middleware('auth', 'can:admin.usuarios.index');
Route::get('/admin/triajes/create', [App\Http\Controllers\TriajController::class, 'create'])->name('admin.triajes.create')->middleware('auth', 'can:admin.usuarios.create');
Route::post('/admin/triajes/create', [App\Http\Controllers\TriajController::class, 'store'])->name('admin.triajes.store')->middleware('auth', 'can:admin.usuarios.store');
Route::get('/admin/triajes/{id}', [App\Http\Controllers\TriajController::class, 'show'])->name('admin.triajes.triajesshow')->middleware('auth', 'can:admin.usuarios.show');
Route::get('/admin/triajes/{id}/edit', [App\Http\Controllers\TriajController::class, 'edit'])->name('admin.triajes.edit')->middleware('auth', 'can:admin.usuarios.edit');
Route::put('/admin/triajes/{id}', [App\Http\Controllers\TriajController::class, 'update'])->name('admin.triajes.update')->middleware('auth', 'can:admin.usuarios.update');
Route::get('/admin/triajes/{id}/confirm-delete', [App\Http\Controllers\TriajController::class, 'confirmDelete'])->name('admin.triajes.confirmDelete')->middleware('auth', 'can:admin.usuarios.confirmDelete');
Route::delete('/admin/triajes/{id}', [App\Http\Controllers\TriajController::class, 'destroy'])->name('admin.triajes.destroy')->middleware('auth', 'can:admin.usuarios.destroy');


//Rutas para el usuario
Route::get('/admin/usuarios', [App\Http\Controllers\UsuarioController::class, 'index'])->name('admin.usuarios.index')->middleware('auth', 'can:admin.usuarios.index');
Route::get('/admin/usuarios/create', [App\Http\Controllers\UsuarioController::class, 'create'])->name('admin.usuarios.create')->middleware('auth', 'can:admin.usuarios.create');
Route::post('/admin/usuarios/create', [App\Http\Controllers\UsuarioController::class, 'store'])->name('admin.usuarios.store')->middleware('auth', 'can:admin.usuarios.store');
Route::get('/admin/usuarios/{id}', [App\Http\Controllers\UsuarioController::class, 'show'])->name('admin.usuarios.show')->middleware('auth', 'can:admin.usuarios.show');
Route::get('/admin/usuarios/{id}/edit', [App\Http\Controllers\UsuarioController::class, 'edit'])->name('admin.usuarios.edit')->middleware('auth', 'can:admin.usuarios.edit');
Route::put('/admin/usuarios/{id}', [App\Http\Controllers\UsuarioController::class, 'update'])->name('admin.usuarios.update')->middleware('auth', 'can:admin.usuarios.update');
Route::get('/admin/usuarios/{id}/confirm-delete', [App\Http\Controllers\UsuarioController::class, 'confirmDelete'])->name('admin.usuarios.confirmDelete')->middleware('auth', 'can:admin.usuarios.confirmDelete');
Route::delete('/admin/usuarios/{id}', [App\Http\Controllers\UsuarioController::class, 'destroy'])->name('admin.usuarios.destroy')->middleware('auth', 'can:admin.usuarios.destroy');

//Rutas para la secretaria
Route::get('/admin/secretarias', [App\Http\Controllers\SecretariaController::class, 'index'])->name('admin.secretarias.index')->middleware('auth', 'can:admin.secretarias.index');
Route::get('/admin/secretarias/create', [App\Http\Controllers\SecretariaController::class, 'create'])->name('admin.secretarias.create')->middleware('auth', 'can:admin.secretarias.create');
Route::post('/admin/secretarias/create', [App\Http\Controllers\SecretariaController::class, 'store'])->name('admin.secretarias.store')->middleware('auth', 'can:admin.secretarias.store');
Route::get('/admin/secretarias/{id}', [App\Http\Controllers\SecretariaController::class, 'show'])->name('admin.secretarias.show')->middleware('auth', 'can:admin.secretarias.show');
Route::get('/admin/secretarias/{id}/edit', [App\Http\Controllers\SecretariaController::class, 'edit'])->name('admin.secretarias.edit')->middleware('auth', 'can:admin.secretarias.edit');
Route::put('/admin/secretarias/{id}', [App\Http\Controllers\SecretariaController::class, 'update'])->name('admin.secretarias.update')->middleware('auth', 'can:admin.secretarias.update');
Route::get('/admin/secretarias/{id}/confirm-delete', [App\Http\Controllers\SecretariaController::class, 'confirmDelete'])->name('admin.secretarias.confirmDelete')->middleware('auth', 'can:admin.secretarias.confirmDelete');
Route::delete('/admin/secretarias/{id}', [App\Http\Controllers\SecretariaController::class, 'destroy'])->name('admin.secretarias.destroy')->middleware('auth', 'can:admin.secretarias.destroy');

//Rutas para el pacientes
Route::get('/admin/pacientes', [App\Http\Controllers\PacientesController::class, 'index'])->name('admin.pacientes.index')->middleware('auth','can:admin.pacientes.index');
Route::get('/admin/pacientes/create', [App\Http\Controllers\PacientesController::class, 'create'])->name('admin.pacientes.create')->middleware('auth','can:admin.pacientes.create');
Route::post('/admin/pacientes/create', [App\Http\Controllers\PacientesController::class, 'store'])->name('admin.pacientes.store');
// ->middleware('auth','can:admin.pacientes.store');
Route::get('/admin/pacientes/{id}', [App\Http\Controllers\PacientesController::class, 'show'])->name('admin.pacientes.show')->middleware('auth','can:admin.pacientes.show');
Route::get('/admin/pacientes/{id}/edit', [App\Http\Controllers\PacientesController::class, 'edit'])->name('admin.pacientes.edit')->middleware('auth','can:admin.pacientes.edit');
Route::put('/admin/pacientes/{id}', [App\Http\Controllers\PacientesController::class, 'update'])->name('admin.pacientes.update')->middleware('auth','can:admin.pacientes.update');
Route::get('/admin/pacientes/{id}/confirm-delete', [App\Http\Controllers\PacientesController::class, 'confirmDelete'])->name('admin.pacientes.confirmDelete')->middleware('auth','can:admin.pacientes.confirmDelete');
Route::delete('/admin/pacientes/{id}', [App\Http\Controllers\PacientesController::class, 'destroy'])->name('admin.pacientes.destroy')->middleware('auth','can:admin.pacientes.destroy');
Route::get('create_reg', [App\Http\Controllers\PacientesController::class, 'create_reg'])->name('admin.pacientes.create_reg');

//Rutas para las especialidades
Route::get('/admin/especialidades', [App\Http\Controllers\EspecialidadesController::class, 'index'])->name('admin.especialidades.index')->middleware('auth','can:admin.especialidades.index');
Route::get('/admin/especialidades/create', [App\Http\Controllers\EspecialidadesController::class, 'create'])->name('admin.especialidades.create')->middleware('auth','can:admin.especialidades.create');
Route::post('/admin/especialidades/create', [App\Http\Controllers\EspecialidadesController::class, 'store'])->name('admin.especialidades.store')->middleware('auth','can:admin.especialidades.store');
Route::get('/admin/especialidades/{id}', [App\Http\Controllers\EspecialidadesController::class, 'show'])->name('admin.especialidades.show')->middleware('auth','can:admin.especialidades.show');
Route::get('/admin/especialidades/{id}/edit', [App\Http\Controllers\EspecialidadesController::class, 'edit'])->name('admin.especialidades.edit')->middleware('auth','can:admin.especialidades.edit');
Route::put('/admin/especialidades/{id}', [App\Http\Controllers\EspecialidadesController::class, 'update'])->name('admin.especialidades.update')->middleware('auth','can:admin.especialidades.update');
Route::get('/admin/especialidades/{id}/confirm-delete', [App\Http\Controllers\EspecialidadesController::class, 'confirmDelete'])->name('admin.especialidades.confirmDelete')->middleware('auth','can:admin.especialidades.confirmDelete');
Route::delete('/admin/especialidades/{id}', [App\Http\Controllers\EspecialidadesController::class, 'destroy'])->name('admin.especialidades.destroy')->middleware('auth','can:admin.especialidades.destroy');

//Rutas para el medicos
Route::get('/admin/medicos', [App\Http\Controllers\MedicosController::class, 'index'])->name('admin.medicos.index')->middleware('auth','can:admin.medicos.index');
Route::get('/admin/medicos/create', [App\Http\Controllers\MedicosController::class, 'create'])->name('admin.medicos.create')->middleware('auth','can:admin.medicos.create');
Route::post('/admin/medicos/create', [App\Http\Controllers\MedicosController::class, 'store'])->name('admin.medicos.store')->middleware('auth','can:admin.medicos.store');
Route::get('/admin/medicos/{id}', [App\Http\Controllers\MedicosController::class, 'show'])->name('admin.medicos.show')->middleware('auth','can:admin.medicos.show');
Route::get('/admin/medicos/{id}/edit', [App\Http\Controllers\MedicosController::class, 'edit'])->name('admin.medicos.edit')->middleware('auth','can:admin.medicos.edit');
Route::put('/admin/medicos/{id}', [App\Http\Controllers\MedicosController::class, 'update'])->name('admin.medicos.update')->middleware('auth','can:admin.medicos.update');
Route::get('/admin/medicos/{id}/confirm-delete', [App\Http\Controllers\MedicosController::class, 'confirmDelete'])->name('admin.medicos.confirmDelete')->middleware('auth','can:admin.medicos.confirmDelete');
Route::delete('/admin/medicos/{id}', [App\Http\Controllers\MedicosController::class, 'destroy'])->name('admin.medicos.destroy')->middleware('auth','can:admin.medicos.destroy');
Route::get('/admin/vercitas', [App\Http\Controllers\MedicosController::class, 'vercitas'])->name('admin.vercitas')->middleware('auth','can:admin.vercitas');



//Rutas para los horarios
Route::get('/admin/horarios', [App\Http\Controllers\HorariosController::class, 'index'])->name('admin.horarios.index')->middleware('auth','can:admin.horarios.index');
Route::get('/admin/horarios/create', [App\Http\Controllers\HorariosController::class, 'create'])->name('admin.horarios.create')->middleware('auth','can:admin.horarios.create');
Route::post('/admin/horarios/create', [App\Http\Controllers\HorariosController::class, 'store'])->name('admin.horarios.store')->middleware('auth','can:admin.horarios.store');
Route::get('/admin/horarios/{id}', [App\Http\Controllers\HorariosController::class, 'show'])->name('admin.horarios.show')->middleware('auth','can:admin.horarios.show');
Route::get('/admin/horarios/{id}/edit', [App\Http\Controllers\HorariosController::class, 'edit'])->name('admin.horarios.edit')->middleware('auth','can:admin.horarios.edit');
Route::put('/admin/horarios/{id}', [App\Http\Controllers\HorariosController::class, 'update'])->name('admin.horarios.update')->middleware('auth','can:admin.horarios.update');
Route::get('/admin/horarios/{id}/confirm-delete', [App\Http\Controllers\HorariosController::class, 'confirmDelete'])->name('admin.horarios.confirmDelete')->middleware('auth','can:admin.horarios.confirmDelete');
Route::delete('/admin/horarios/{id}', [App\Http\Controllers\HorariosController::class, 'destroy'])->name('admin.horarios.destroy')->middleware('auth','can:admin.horarios.destroy');


//Rutas para los consultorios
Route::get('/admin/consultorios', [App\Http\Controllers\ConsultorioController::class, 'index'])->name('admin.consultorios.index')->middleware('auth','can:admin.consultorios.index');
Route::get('/admin/consultorios/create', [App\Http\Controllers\ConsultorioController::class, 'create'])->name('admin.consultorios.create')->middleware('auth','can:admin.consultorios.create');
Route::post('/admin/consultorios/create', [App\Http\Controllers\ConsultorioController::class, 'store'])->name('admin.consultorios.store')->middleware('auth','can:admin.consultorios.store');
Route::get('/admin/consultorios/{id}', [App\Http\Controllers\ConsultorioController::class, 'show'])->name('admin.consultorios.show')->middleware('auth','can:admin.consultorios.show');
Route::get('/admin/consultorios/{id}/edit', [App\Http\Controllers\ConsultorioController::class, 'edit'])->name('admin.consultorios.edit')->middleware('auth','can:admin.consultorios.edit');
Route::put('/admin/consultorios/{id}', [App\Http\Controllers\ConsultorioController::class, 'update'])->name('admin.consultorios.update')->middleware('auth','can:admin.consultorios.update');
Route::get('/admin/consultorios/{id}/confirm-delete', [App\Http\Controllers\ConsultorioController::class, 'confirmDelete'])->name('admin.consultorios.confirmDelete')->middleware('auth','can:admin.consultorios.confirmDelete');
Route::delete('/admin/consultorios/{id}', [App\Http\Controllers\ConsultorioController::class, 'destroy'])->name('admin.consultorios.destroy')->middleware('auth','can:admin.consultorios.destroy');

Route::get('asignar', [App\Http\Controllers\ConsultorioController::class, 'asignar'])->name('admin.consultorios.asignar')->middleware('auth','can:admin.consultorios.asignar');
Route::put('guardar', [App\Http\Controllers\ConsultorioController::class, 'guardarAsignacion'])->name('admin.consultorios.guardarAsignacion')->middleware('auth','can:admin.consultorios.guardarAsignacion');
Route::get('reporte', [App\Http\Controllers\ConsultorioController::class, 'reporte'])->name('admin.consultorios.reporte')->middleware('auth','can:admin.consultorios.reporte');

//Rutas para los historiales
Route::get('/admin/createhistorial', [App\Http\Controllers\HistorialController::class, 'create'])->name('admin.createhistorial');
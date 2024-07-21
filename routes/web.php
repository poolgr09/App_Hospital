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
    return view('index');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.index')->middleware(middleware:'auth');

//Rutas para el usuario
Route::get('/admin/usuarios', [App\Http\Controllers\UsuarioController::class, 'index'])->name('admin.usuarios.index')->middleware(middleware:'auth');
Route::get('/admin/usuarios/create', [App\Http\Controllers\UsuarioController::class, 'create'])->name('admin.usuarios.create')->middleware(middleware:'auth');
Route::post('/admin/usuarios/create', [App\Http\Controllers\UsuarioController::class, 'store'])->name('admin.usuarios.store')->middleware(middleware:'auth');
Route::get('/admin/usuarios/{id}', [App\Http\Controllers\UsuarioController::class, 'show'])->name('admin.usuarios.show')->middleware(middleware:'auth');
Route::get('/admin/usuarios/{id}/edit', [App\Http\Controllers\UsuarioController::class, 'edit'])->name('admin.usuarios.edit')->middleware(middleware:'auth');
Route::put('/admin/usuarios/{id}', [App\Http\Controllers\UsuarioController::class, 'update'])->name('admin.usuarios.update')->middleware(middleware:'auth');
Route::get('/admin/usuarios/{id}/confirm-delete', [App\Http\Controllers\UsuarioController::class, 'confirmDelete'])->name('admin.usuarios.confirmDelete')->middleware(middleware:'auth');
Route::delete('/admin/usuarios/{id}', [App\Http\Controllers\UsuarioController::class, 'destroy'])->name('admin.usuarios.destroy')->middleware(middleware:'auth');

//Rutas para la secretaria
Route::get('/admin/secretarias', [App\Http\Controllers\SecretariaController::class, 'index'])->name('admin.secretarias.index')->middleware(middleware:'auth');
Route::get('/admin/secretarias/create', [App\Http\Controllers\SecretariaController::class, 'create'])->name('admin.secretarias.create')->middleware(middleware:'auth');
Route::post('/admin/secretarias/create', [App\Http\Controllers\SecretariaController::class, 'store'])->name('admin.secretarias.store')->middleware(middleware:'auth');
Route::get('/admin/secretarias/{id}', [App\Http\Controllers\SecretariaController::class, 'show'])->name('admin.secretarias.show')->middleware(middleware:'auth');
Route::get('/admin/secretarias/{id}/edit', [App\Http\Controllers\SecretariaController::class, 'edit'])->name('admin.secretarias.edit')->middleware(middleware:'auth');
Route::put('/admin/secretarias/{id}', [App\Http\Controllers\SecretariaController::class, 'update'])->name('admin.secretarias.update')->middleware(middleware:'auth');
Route::get('/admin/secretarias/{id}/confirm-delete', [App\Http\Controllers\SecretariaController::class, 'confirmDelete'])->name('admin.secretarias.confirmDelete')->middleware(middleware:'auth');
Route::delete('/admin/secretarias/{id}', [App\Http\Controllers\SecretariaController::class, 'destroy'])->name('admin.secretarias.destroy')->middleware(middleware:'auth');

//Rutas para el pacientes
Route::get('/admin/pacientes', [App\Http\Controllers\PacientesController::class, 'index'])->name('admin.pacientes.index')->middleware(middleware:'auth');
Route::get('/admin/pacientes/create', [App\Http\Controllers\PacientesController::class, 'create'])->name('admin.pacientes.create')->middleware(middleware:'auth');
Route::post('/admin/pacientes/create', [App\Http\Controllers\PacientesController::class, 'store'])->name('admin.pacientes.store')->middleware(middleware:'auth');
Route::get('/admin/pacientes/{id}', [App\Http\Controllers\PacientesController::class, 'show'])->name('admin.pacientes.show')->middleware(middleware:'auth');
Route::get('/admin/pacientes/{id}/edit', [App\Http\Controllers\PacientesController::class, 'edit'])->name('admin.pacientes.edit')->middleware(middleware:'auth');
Route::put('/admin/pacientes/{id}', [App\Http\Controllers\PacientesController::class, 'update'])->name('admin.pacientes.update')->middleware(middleware:'auth');
Route::get('/admin/pacientes/{id}/confirm-delete', [App\Http\Controllers\PacientesController::class, 'confirmDelete'])->name('admin.pacientes.confirmDelete')->middleware(middleware:'auth');
Route::delete('/admin/pacientes/{id}', [App\Http\Controllers\PacientesController::class, 'destroy'])->name('admin.pacientes.destroy')->middleware(middleware:'auth');

//Rutas para las especialidades
Route::get('/admin/especialidades', [App\Http\Controllers\EspecialidadesController::class, 'index'])->name('admin.especialidades.index')->middleware(middleware:'auth');
Route::get('/admin/especialidades/create', [App\Http\Controllers\EspecialidadesController::class, 'create'])->name('admin.especialidades.create')->middleware(middleware:'auth');
Route::post('/admin/especialidades/create', [App\Http\Controllers\EspecialidadesController::class, 'store'])->name('admin.especialidades.store')->middleware(middleware:'auth');
Route::get('/admin/especialidades/{id}', [App\Http\Controllers\EspecialidadesController::class, 'show'])->name('admin.especialidades.show')->middleware(middleware:'auth');
Route::get('/admin/especialidades/{id}/edit', [App\Http\Controllers\EspecialidadesController::class, 'edit'])->name('admin.especialidades.edit')->middleware(middleware:'auth');
Route::put('/admin/especialidades/{id}', [App\Http\Controllers\EspecialidadesController::class, 'update'])->name('admin.especialidades.update')->middleware(middleware:'auth');
Route::get('/admin/especialidades/{id}/confirm-delete', [App\Http\Controllers\EspecialidadesController::class, 'confirmDelete'])->name('admin.especialidades.confirmDelete')->middleware(middleware:'auth');
Route::delete('/admin/especialidades/{id}', [App\Http\Controllers\EspecialidadesController::class, 'destroy'])->name('admin.especialidades.destroy')->middleware(middleware:'auth');

//Rutas para el medicos
Route::get('/admin/medicos', [App\Http\Controllers\MedicosController::class, 'index'])->name('admin.medicos.index')->middleware(middleware:'auth');
Route::get('/admin/medicos/create', [App\Http\Controllers\MedicosController::class, 'create'])->name('admin.medicos.create')->middleware(middleware:'auth');
Route::post('/admin/medicos/create', [App\Http\Controllers\MedicosController::class, 'store'])->name('admin.medicos.store')->middleware(middleware:'auth');
Route::get('/admin/medicos/{id}', [App\Http\Controllers\MedicosController::class, 'show'])->name('admin.medicos.show')->middleware(middleware:'auth');
Route::get('/admin/medicos/{id}/edit', [App\Http\Controllers\MedicosController::class, 'edit'])->name('admin.medicos.edit')->middleware(middleware:'auth');
Route::put('/admin/medicos/{id}', [App\Http\Controllers\MedicosController::class, 'update'])->name('admin.medicos.update')->middleware(middleware:'auth');
Route::get('/admin/medicos/{id}/confirm-delete', [App\Http\Controllers\MedicosController::class, 'confirmDelete'])->name('admin.medicos.confirmDelete')->middleware(middleware:'auth');
Route::delete('/admin/medicos/{id}', [App\Http\Controllers\MedicosController::class, 'destroy'])->name('admin.medicos.destroy')->middleware(middleware:'auth');


//Rutas para los horarios
Route::get('/admin/horarios', [App\Http\Controllers\HorariosController::class, 'index'])->name('admin.horarios.index')->middleware(middleware:'auth');
Route::get('/admin/horarios/create', [App\Http\Controllers\HorariosController::class, 'create'])->name('admin.horarios.create')->middleware(middleware:'auth');
Route::post('/admin/horarios/create', [App\Http\Controllers\HorariosController::class, 'store'])->name('admin.horarios.store')->middleware(middleware:'auth');
Route::get('/admin/horarios/{id}', [App\Http\Controllers\HorariosController::class, 'show'])->name('admin.horarios.show')->middleware(middleware:'auth');
Route::get('/admin/horarios/{id}/edit', [App\Http\Controllers\HorariosController::class, 'edit'])->name('admin.horarios.edit')->middleware(middleware:'auth');
Route::put('/admin/horarios/{id}', [App\Http\Controllers\HorariosController::class, 'update'])->name('admin.horarios.update')->middleware(middleware:'auth');
Route::get('/admin/horarios/{id}/confirm-delete', [App\Http\Controllers\HorariosController::class, 'confirmDelete'])->name('admin.horarios.confirmDelete')->middleware(middleware:'auth');
Route::delete('/admin/horarios/{id}', [App\Http\Controllers\HorariosController::class, 'destroy'])->name('admin.horarios.destroy')->middleware(middleware:'auth');


//Rutas para los consultorios
Route::get('/admin/consultorios', [App\Http\Controllers\ConsultorioController::class, 'index'])->name('admin.consultorios.index')->middleware(middleware:'auth');
Route::get('/admin/consultorios/create', [App\Http\Controllers\ConsultorioController::class, 'create'])->name('admin.consultorios.create')->middleware(middleware:'auth');
Route::post('/admin/consultorios/create', [App\Http\Controllers\ConsultorioController::class, 'store'])->name('admin.consultorios.store')->middleware(middleware:'auth');
Route::get('/admin/consultorios/{id}', [App\Http\Controllers\ConsultorioController::class, 'show'])->name('admin.consultorios.show')->middleware(middleware:'auth');
Route::get('/admin/consultorios/{id}/edit', [App\Http\Controllers\ConsultorioController::class, 'edit'])->name('admin.consultorios.edit')->middleware(middleware:'auth');
Route::put('/admin/consultorios/{id}', [App\Http\Controllers\ConsultorioController::class, 'update'])->name('admin.consultorios.update')->middleware(middleware:'auth');
Route::get('/admin/consultorios/{id}/confirm-delete', [App\Http\Controllers\ConsultorioController::class, 'confirmDelete'])->name('admin.consultorios.confirmDelete')->middleware(middleware:'auth');
Route::delete('/admin/consultorios/{id}', [App\Http\Controllers\ConsultorioController::class, 'destroy'])->name('admin.consultorios.destroy')->middleware(middleware:'auth');

Route::get('asignar', [App\Http\Controllers\ConsultorioController::class, 'asignar'])->name('admin.consultorios.asignar')->middleware(middleware:'auth');
Route::put('guardar', [App\Http\Controllers\ConsultorioController::class, 'guardarAsignacion'])->name('admin.consultorios.guardarAsignacion')->middleware(middleware:'auth');
Route::get('reporte', [App\Http\Controllers\ConsultorioController::class, 'reporte'])->name('admin.consultorios.reporte')->middleware(middleware:'auth');
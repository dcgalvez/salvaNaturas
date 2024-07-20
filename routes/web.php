<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginControlle;
use App\Http\Controllers\Auth\LoginController;
use Aws\Middleware;
use Illuminate\Support\Facades\Auth;

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

// RUTAS GLOBALES (No necesitan auth) 
Route::get('/', [IndexController::class, 'index'])->name('index');
Route::get('/info', [IndexController::class, 'infoHome'])->name('infoHome');
Route::get('/rutas', [IndexController::class, 'getRoutes'])->name('getRoutes');
Route::get('/noticias', [IndexController::class, 'NoticiasProcedure']);
Route::get('/servicios', [IndexController::class, 'tooServicios'])->name('seccion.servicios');
Route::get('/programas', [IndexController::class, 'tooProgramas'])->name('seccion.programas');
Route::get('/contactanos', [IndexController::class, 'tooContactanos'])->name('seccion.contactanos');

Route::get('/servicios-allContenidos', [IndexController::class, 'getServiciosTodos'])->name('servicios.getContenidosTodos');
Route::get('/servicios-getContenidos', [IndexController::class, 'obtenerContenidos_ServiciosEspecificos'])->name('servicios.getContenidos');
// Route::get('/servicios-getContenidos', [IndexController::class, 'obtenerContenidos_Servicios'])->name('servicios.getContenidos');

Route::get('/programas-allContenidosProgramas', [IndexController::class, 'obtenerContenidos_ProgramasEspecificos'])->name('programas.getContenidosAll');
Route::get('/programas-getContenidos', [IndexController::class, 'obtenerContenidos_ProgramasEspe'])->name('programas.getContenidos');
// Route::get('/programas-getContenidos', [IndexController::class, 'obtenerContenidos_Programas'])->name('programas.getContenidos');


// RUTAS LOGIN (Necesarias para logearse)
Route::view('/login', "admin.admin-login")->name('login');
Route::view('/registro', "admin.admin-registro")->name('registro');

Route::post('/registro-validar',[LoginController::class, 'Admin_Registrar'])->name('admin.registrar');
Route::post('/login-validar',[LoginController::class, 'Admin_LogIn'])->name('admin.login');
Route::get('/logout-validar',[LoginController::class, 'Admin_LogOut'])->name('admin.logout');

// RUTAS ADMIN (Si existe session)
Route::view('/admin-inicio', 'admin.admin-inicio')->middleware('auth')->name('admin.inicio'); 
Route::get('/admin-programas', [AdminController::class, 'getInfoProgramas'])->middleware('auth')->name('admin.Programas');
Route::post('/adminAddProgramas', [AdminController::class, 'saveProgramas'])->middleware('auth')->name('admin.addProgramas');
Route::post('/adminEditProgramas', [AdminController::class, 'editProgramas'])->middleware('auth')->name('admin.editProgramas');
Route::post('/adminDeleteProgramas', [AdminController::class, 'deleteProgramas'])->middleware('auth')->name('admin.deleteProgramas');
Route::post('/guardarInformacion', [AdminController::class, 'saveNuevoContenido'])->middleware('auth')->name('admin.guardarInformacion');
Route::get('/getProgramas_Activos', [AdminController::class, 'SER_getProgramasActivos'])->middleware('auth')->name('admin.programasActivos');
Route::get('/getContenidos', [AdminController::class, 'obtenerContenidos_Programas'])->middleware('auth')->name('admin.programasContenido');

Route::get('/getImagenesS/{url}', [AdminController::class, 'getImagenesServer'])->middleware('auth')->name('admin.imagenesVisual');
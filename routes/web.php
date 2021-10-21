<?php

use App\Http\Controllers\AdministradorController;
use App\Http\Controllers\FacultadController;
use App\Http\Controllers\CarreraController;
use App\Http\Controllers\MateriaController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ApunteController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\TemaController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',[ClienteController::class,'index'])->name('index');
Route::get('/apuntes/{tema}',[ClienteController::class,'apuntes'])->name('apuntes');




Route::prefix('admin')->group(function () {
    Route::get('/login',[AdministradorController::class,'loginView'])->name('admin.login.view')->middleware('guest:admin');
    Route::post('/login',[AdministradorController::class,'login'])->name('admin.login')->middleware('guest:admin');

    Route::middleware(['auth:admin'])->group(function () {

        Route::post('/logout',[AdministradorController::class,'logout'])->name('admin.logout');

        Route::get('/menu',[AdministradorController::class,'menu'])->name('admin.menu');

        Route::get('/usuarios',[UsuarioController::class,'index'])->name('admin.usuarios');
        Route::get('/usuario/create',[UsuarioController::class,'create'])->name('admin.usuario.create');
        Route::post('/usuario/store',[UsuarioController::class,'store'])->name('admin.usuario.store');
        Route::get('/usuario/edit/{usuario}',[UsuarioController::class,'edit'])->name('admin.usuario.edit');
        Route::post('/usuario/update/{usuario}',[UsuarioController::class,'update'])->name('admin.usuario.update');
        Route::post('/usuario/delete/{usuario}',[UsuarioController::class,'destroy'])->name('admin.usuario.delete');

        Route::get('/facultades',[FacultadController::class,'index'])->name('admin.facultades');
        Route::get('/facultad/create',[FacultadController::class,'create'])->name('admin.facultad.create');
        Route::post('/facultad/store',[FacultadController::class,'store'])->name('admin.facultad.store');
        Route::get('/facultad/edit/{facultad}',[FacultadController::class,'edit'])->name('admin.facultad.edit');
        Route::post('/facultad/update/{facultad}',[FacultadController::class,'update'])->name('admin.facultad.update');
        Route::post('/facultad/delete/{facultad}',[FacultadController::class,'destroy'])->name('admin.facultad.delete');

        Route::get('/carreras',[CarreraController::class,'index'])->name('admin.carreras');
        Route::get('/carrera/create',[CarreraController::class,'create'])->name('admin.carrera.create');
        Route::post('/carrera/store',[CarreraController::class,'store'])->name('admin.carrera.store');
        Route::get('/carrera/edit/{carrera}',[CarreraController::class,'edit'])->name('admin.carrera.edit');
        Route::post('/carrera/update/{carrera}',[CarreraController::class,'update'])->name('admin.carrera.update');
        Route::post('/carrera/delete/{carrera}',[CarreraController::class,'destroy'])->name('admin.carrera.delete');

        Route::get('/materias',[MateriaController::class,'index'])->name('admin.materias');
        Route::get('/materia/create',[MateriaController::class,'create'])->name('admin.materia.create');
        Route::post('/materia/store',[MateriaController::class,'store'])->name('admin.materia.store');
        Route::get('/materia/edit/{materia}',[MateriaController::class,'edit'])->name('admin.materia.edit');
        Route::post('/materia/update/{materia}',[MateriaController::class,'update'])->name('admin.materia.update');
        Route::post('/materia/delete/{materia}',[MateriaController::class,'destroy'])->name('admin.materia.delete');


    });
    
});



Route::prefix('usuario')->group(function () {
    Route::get('/login',[UsuarioController::class,'loginView'])->name('usuario.login.view')->middleware('guest:usuario');
    Route::post('/login',[UsuarioController::class,'login'])->name('usuario.login')->middleware('guest:usuario');

    Route::middleware(['auth:usuario'])->group(function () {

        Route::post('/logout',[UsuarioController::class,'logout'])->name('usuario.logout');

        Route::get('/menu',[UsuarioController::class,'menu'])->name('usuario.menu');

        Route::get('/temas',[TemaController::class,'index'])->name('usuario.temas');
        Route::get('/tema/create',[TemaController::class,'create'])->name('usuario.tema.create');
        Route::post('/tema/store',[TemaController::class,'store'])->name('usuario.tema.store');
        Route::get('/tema/edit/{tema}',[TemaController::class,'edit'])->name('usuario.tema.edit');
        Route::post('/tema/update/{tema}',[TemaController::class,'update'])->name('usuario.tema.update');
        Route::post('/tema/delete/{tema}',[TemaController::class,'destroy'])->name('usuario.tema.delete');

        Route::get('/apuntes',[ApunteController::class,'index'])->name('usuario.apuntes');
        Route::get('/apunte/create',[ApunteController::class,'create'])->name('usuario.apunte.create');
        Route::post('/apunte/store',[ApunteController::class,'store'])->name('usuario.apunte.store');
        Route::get('/apunte/edit/{apunte}',[ApunteController::class,'edit'])->name('usuario.apunte.edit');
        Route::post('/apunte/update/{apunte}',[ApunteController::class,'update'])->name('usuario.apunte.update');
        Route::post('/apunte/delete/{apunte}',[ApunteController::class,'destroy'])->name('usuario.apunte.delete');

    });
    
});

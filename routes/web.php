<?php

use App\Http\Controllers\AdministradorController;
use App\Http\Controllers\UsuarioController;
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

Route::get('/',function(){
    return view('welcome');
})->name('index');





Route::prefix('admin')->group(function () {
    Route::get('/login',[AdministradorController::class,'loginView'])->name('admin.login.view')->middleware('guest:admin');
    Route::post('/login',[AdministradorController::class,'login'])->name('admin.login')->middleware('guest:admin');

    Route::middleware(['auth:admin'])->group(function () {
        Route::get('/menu',[AdministradorController::class,'menu'])->name('admin.menu');

        Route::get('/usuarios',[UsuarioController::class,'index'])->name('admin.usuarios');
        Route::get('/usuario/create',[UsuarioController::class,'create'])->name('admin.usuario.create');
        Route::post('/usuario/store',[UsuarioController::class,'store'])->name('admin.usuario.store');
        Route::get('/usuario/edit/{usuario}',[UsuarioController::class,'edit'])->name('admin.usuario.edit');
        Route::post('/usuario/update/{usuario}',[UsuarioController::class,'update'])->name('admin.usuario.update');
        Route::post('/usuario/delete/{usuario}',[UsuarioController::class,'destroy'])->name('admin.usuario.delete');
    });
    
});
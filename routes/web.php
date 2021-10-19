<?php

use App\Http\Controllers\AdministradorController;
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
    return "este es el index";
})->name('index');





Route::prefix('admin')->group(function () {
    Route::get('/login',[AdministradorController::class,'loginView'])->name('admin.login.view')->middleware('guest:admin');
    Route::post('/login',[AdministradorController::class,'login'])->name('admin.login')->middleware('guest:admin');

    Route::middleware(['auth:admin'])->group(function () {
        Route::get('/menu',function(){
            return "inicio sesion";
        })->name('admin.menu');
    });
    
});
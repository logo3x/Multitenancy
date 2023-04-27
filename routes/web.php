<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\TenantController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UsuarioController;

//Spatie
use App\Http\Controllers\RolController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {

    Route::resource('tenants',TenantController::class);
    Route::resource('roles',RolController::class);
    Route::resource('usuarios',UsuarioController::class);
    Route::resource('/home',HomeController::class);

});



Auth::routes();

/* Route::get('/home', [App\Http\Controllers\ClienteController::class, 'index'])->name('home'); */

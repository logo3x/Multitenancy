<?php

declare(strict_types=1);

use App\Http\Controllers\Clientes\Home;
use App\Http\Controllers\Clientes\ClienteController;
use Illuminate\Support\Facades\Route;
use Stancl\Tenancy\Middleware\InitializeTenancyByDomain;
use Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains;

use App\Http\Controllers\Clientes\UsuarioController;
use App\Http\Controllers\Clientes\RolController;

use Stancl\Tenancy\Middleware\CheckTenantForMaintenanceMode;

//Spatie

use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Tenant Routes
|--------------------------------------------------------------------------
|
| Here you can register the tenant routes for your application.
| These routes are loaded by the TenantRouteServiceProvider.
|
| Feel free to customize them however you want. Good luck!
|
*/

Route::middleware([
    'web',
    InitializeTenancyByDomain::class,
    PreventAccessFromCentralDomains::class,
    CheckTenantForMaintenanceMode::class,
])->group(function () {
    Route::get('/', function () {
        return view('clientes.welcome');
    });

    Route::middleware('auth')->group(function(){
        Route::get('/dashboard',function(){
            return view('clientes.dashboard');
        })->name('dashboard');

        Route::resource('roles',RolController::class);
        Route::resource('usuarios',UsuarioController::class);
        Route::resource('/home',Home::class);
        Route::resource('/cliente',ClienteController::class);

    });

    Auth::routes();
    /* Route::get('/home', [App\Http\Controllers\Clientes\HomeControllerClientes::class, 'index'])->name('home'); */

});

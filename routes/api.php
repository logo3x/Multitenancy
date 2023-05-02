<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/cliente/{id_user}', [App\Http\Controllers\ClienteApiController::class,'index']);
/* Route::put('/cliente/{id_user}', [App\Http\Controllers\ClienteApiController::class,'update']);
Route::get('/cliente', [App\Http\Controllers\ClienteApiController::class,'show']); */

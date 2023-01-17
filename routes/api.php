<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::get('provinsi', [App\Http\Controllers\ProvinsiController::class, 'index']);
Route::post('provinsi', [App\Http\Controllers\ProvinsiController::class, 'store']);
Route::get('destinasi', [App\Http\Controllers\DestinasiController::class, 'index']);
Route::post('destinasi', [App\Http\Controllers\DestinasiController::class, 'store']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

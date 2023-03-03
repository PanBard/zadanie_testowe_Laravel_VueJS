<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\KlientController;
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

Route::get('/dane_klientow',[KlientController::class, 'zwroc_dane_klientow']);
Route::post('/wstaw_nowego_klienta',[KlientController::class, 'wstaw_nowego_klienta']);
Route::delete('/usun_klienta/{id}',[KlientController::class, 'usun_klienta']);
Route::put('/zmodyfikuj/{id}',[KlientController::class, 'zmodyfikuj_klienta']);



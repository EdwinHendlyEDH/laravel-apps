<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MusicController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/music', [MusicController::class, 'main']);
Route::get('/music/create', [MusicController::class, 'create']);
Route::post('/music/data', [MusicController::class, 'simpan']);
Route::get('/music/{id}/change', [MusicController::class, 'change']);
Route::put('/music/{id}', [MusicController::class, 'update']);
Route::delete('/music/{id}', [MusicController::class, 'destroy']);

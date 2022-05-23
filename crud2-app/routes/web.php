<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MuridController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthenticationController;

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


Route::get('/murid', [MuridController::class, 'index']);
Route::get('/murid/create', [MuridController::class, 'create']);
Route::post('/murid/storeadd', [MuridController::class, 'storeAdd']);
Route::get('/murid/{id}/change', [MuridController::class, 'change']);
Route::put('/murid/{id}', [MuridController::class, 'storeChange']);
Route::delete('/murid/{id}', [MuridController::class, 'delete']);


Route::get('/registration', [AuthenticationController::class, 'registration']);
Route::post('/registration', [AuthenticationController::class, 'registrationStore']);
Route::get('/login', [AuthenticationController::class, 'login']);
Route::post('/login', [AuthenticationController::class, 'loginStore']);

Route::get('/dashboard', [DashboardController::class, 'index']);
<?php

use App\Http\Controllers\AuthController;
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

$router->get('/', function(){
    return response()->json('Welcome to Laravel API');
});
    
// Route::group([
//     'prefix' => 'auth',
// ], function(){
//     Route::post('login', 'AuthController@login');
//     Route::post('register', 'AuthController@register');
// });

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ArticleController;
use App\Http\Middleware\Bichito;

use App\Http\Controllers\AuthCompleteController;



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

Route::post('loginsito', [AuthController::class,'autenticar']);
Route::post('registrarsito', [AuthController::class, 'registrar']);
Route::resource('users', UserController::class) ->middleware(Bichito::class); 

Route::get('articulos/tema/{theme}', [ArticleController::class, 'getArticleByTheme']);

Route::post('login', [AuthCompleteController::class, 'login']);
Route::post('register', [AuthCompleteController::class, 'register']);

<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/match', [\App\Http\Controllers\ChessMatchControllerApi::class, 'index']);

Route::get('/match/{id}', [\App\Http\Controllers\TurnControllerApi::class, 'index']);

Route::get('/turn/{id}', [\App\Http\Controllers\TurnControllerApi::class, 'show']);

Route::get('/user', [\App\Http\Controllers\UserControllerApi::class, 'index']);

Route::post('/login', [\App\Http\Controllers\AuthController::class, 'login']);

Route::get('/user/{id}', [\App\Http\Controllers\UserControllerApi::class, 'show']);

Route::post('user/update/{id}', [\App\Http\Controllers\UserControllerApi::class, 'update']);

Route::get('/match_total', [\App\Http\Controllers\ChessMatchControllerApi::class, 'total']);

Route::get('/turn_total/{id}', [\App\Http\Controllers\TurnControllerApi::class, 'total']);

Route::get('/user_total', [\App\Http\Controllers\UserControllerApi::class, 'total']);

Route::get('/user_matches/{id}', [\App\Http\Controllers\ChessMatchControllerApi::class, 'by_id']);

Route::post('/user/create', [\App\Http\Controllers\UserControllerApi::class, 'store']);

Route::group(['middleware' => ['auth:sanctum']], function(){
    Route::get('/turn', [\App\Http\Controllers\TurnControllerApi::class, 'index']);
    Route::get('/iam', function (Request $request)
    {
        return $request->user();
    });
    Route::get('/logout', [\App\Http\Controllers\AuthController::class, 'logout']);
});





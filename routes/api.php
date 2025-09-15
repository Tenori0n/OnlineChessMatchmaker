<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/match', [\App\Http\Controllers\ChessMatchControllerApi::class, 'index']);

Route::get('/match/{id}', [\App\Http\Controllers\ChessMatchControllerApi::class, 'show']);

Route::get('/turn', [\App\Http\Controllers\TurnControllerApi::class, 'index']);

Route::get('/turn/{id}', [\App\Http\Controllers\TurnControllerApi::class, 'show']);

Route::get('/user', [\App\Http\Controllers\UserControllerApi::class, 'index']);

Route::get('/user/{id}', [\App\Http\Controllers\UserControllerApi::class, 'show']);

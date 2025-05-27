<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', function () {
    return view('hello', ['title' => 'Hello from 609-22!']);
});

Route::get('/match', [\App\Http\Controllers\ChessMatchController::class, 'index']);

Route::get('/match/{id}', [\App\Http\Controllers\ChessMatchController::class, 'show']);

Route::get('/match/destroy/{id}', [\App\Http\Controllers\ChessMatchController::class, 'show']);

Route::get('/turns', [\App\Http\Controllers\TurnController::class, 'index']);

Route::get('/users', [\App\Http\Controllers\UserController::class, 'index']);

Route::get('/user/create', [\App\Http\Controllers\UserController::class, 'create']);

Route::get('/user/destroy/{id}', [\App\Http\Controllers\UserController::class, 'destroy']);

Route::get('/user/{id}/edit', [\App\Http\Controllers\UserController::class, 'edit']);

Route::post('user/update/{id}', [\App\Http\Controllers\UserController::class, 'update']);

Route::get('/user/{id}', [\App\Http\Controllers\UserController::class, 'show']);

Route::post('/user', [\App\Http\Controllers\UserController::class, 'store']);

Route::get('/login', [\App\Http\Controllers\LoginController::class, 'login']);

Route::get('/logout', [\App\Http\Controllers\LoginController::class, 'logout'])->middleware('auth');

Route::post('/auth', [\App\Http\Controllers\LoginController::class, 'authenticate']);

Route::get('/error', function () { return view('error', ['message' => session('message')]);});

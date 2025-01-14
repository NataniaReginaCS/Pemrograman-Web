<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\PesertaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TiketController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);

Route::middleware('auth:api')->group(function () {
    Route::get('/tikets', [TiketController::class, 'index']);
    Route::post('/tikets/create', [TiketController::class, 'store']);
    Route::post('/tikets/update/{id}', [TiketController::class, 'update']);
    Route::post('/tikets/search', [TiketController::class, 'search']);
    Route::delete('/tikets/delete/{id}', [TiketController::class, 'destroy']);

    Route::get('/peserta', [PesertaController::class, 'index']);
    Route::post('/peserta/create', [PesertaController::class, 'store']);
    Route::post('/peserta/update/{id}', [PesertaController::class, 'update']);
    Route::delete('/peserta/delete/{id}', [PesertaController::class, 'destroy']);

    Route::get('/event', [EventController::class, 'index']);
    Route::post('/event/create', [EventController::class, 'store']);
    Route::post('/event/update/{id}', [EventController::class, 'update']);
    Route::delete('/event/delete/{id}', [EventController::class, 'destroy']);
    Route::post('/events/search', [EventController::class, 'search']);

    Route::get('/', [UserController::class, 'index']);
    Route::post('/update', [UserController::class, 'update']);
    Route::delete('/delete', [UserController::class, 'destroy']);

    Route::post('/logout', [UserController::class, 'logout']);

});

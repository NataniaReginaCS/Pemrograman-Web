<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('halaman1');
});

Route::get('/halaman1', function () {
    return view('halaman1');
});

Route::get('/halaman2', function () {
    return view('halaman2');
});
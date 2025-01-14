<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('Home-11686');
});

Route::get('/Home-11686', function () {
    return view('Home-11686');
});

Route::get('/profile-Regina', function () {
    return view('profile-Regina');
});

Route::get('/profile-Regina', function () {
    return view('profile-Regina', [
        "nama1" => "Natania Regina Clarabella Serafina - 220711686",
        "quotes1" => "Terus mencoba selagi masih ada waktu untuk mencoba.",
        "nama2" => "Nobita Nobi",
        "quotes2" => "Aku ingin menjadi anak kecil selamanya, itu merupakan salah satu pilihan bagus, kamu bisa hidup bebas tanpa beban apapun.",
        "nama3" => "Doraemon",
        "quotes3" => "Jangan menengok ke masa lalu terus, lebih baik belajar dari sekarang untuk masa depanmu."
    ]);
});
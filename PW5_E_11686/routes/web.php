<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('Login');
    });

Route::get('/dashboard', function () {
    return view('Dashboard');
});

Route::get('/gyms/presensi', function () {
    return view('gyms.presensi', [
        'kelas' => [
            [
                'nama' => 'Luffy',
                'email' => 'Luffy@gmail.com',
                'notelp' => "08123456789",
                'gambar' => asset('img/luffy.jpg'),
                'jeniskartu' => 'Gold',
                'metodepembayaran' => 'Hutang Teman',             
            ],
            [
                'nama' => 'Zoro',
                'email' => 'Zoro@gmail.com',
                'notelp' => "08223456789",
                'gambar' => asset('img/zoro.jpg'),
                'jeniskartu' => 'Silver',
                'metodepembayaran' => 'Langsung Bayar',             
            ],
            [
                'nama' => 'Sanji',
                'email' => 'Sanji@gmail.com',
                'notelp' => "08323456789",
                'gambar' => asset('img/sanji.jpg'),
                'jeniskartu' => 'Black',
                'metodepembayaran' => 'Hutang Teman',               
            ],
            [
                'nama' => 'Jimbe',
                'email' => 'Jimbe@gmail.com',
                'notelp' => "08423456789",
                'gambar' => asset('img/jinbei.jpg'),
                'jeniskartu' => 'Black',
                'metodepembayaran' => 'Shoppe pay later',                 
            ],
            [
                'nama' => 'Usop',
                'email' => 'Usop@gmail.com',
                'notelp' => "08623456789",
                'gambar' => asset('img/usopp.jpg'),
                'jeniskartu' => 'Gold',
                'metodepembayaran' => 'Hutang Teman',              
            ],
            [
                'nama' => 'Brock',
                'email' => 'Brock@gmail.com',
                'notelp' => "08133456789",
                'gambar' => asset('img/brock.jpg'),
                'jeniskartu' => 'Silver',
                'metodepembayaran' => 'Shoppe pay later',                
            ]
        ],
        'dashboard'=> [
            "judul" => "Gaming",
            'gambar' => asset('img/gaming.jpg'),
            'npm' => "220711686",
            'instruktur' => "Nicodemus Anggit Krisnuaji",
            "ruang" => "Kelas B",
            'totalmember' => '6',
            "rating" => '5',
            "tanggal" => "07-Oct-2024",
            "hari" => "Monday",

        ]
    ]);
});

Route::get('/gyms/index', function () {
    return view('gyms.index', [
        'kelas' => [
            [
                'no' => 1,
                'gambar' => asset('img/gambar1.png'),
                "nama" => "Body Combat",
                'instruktur' => 'Charli',
                'ruang' => 'Kelas A',
                'rating' => '4'
            ],
            [
                'no' => 2,
                'gambar' => asset('img/gambar2.jpg'),
                'nama' => 'Bungee',
                'instruktur' => 'Ayas',
                'ruang' => 'Kelas B',
                'rating' => '3',
            ],
            [
                'no' => 3,
                'gambar' => asset('img/gambar3.jpg'),
                'nama' => 'Yoga',
                'instruktur' => 'Bobob',
                'ruang' => 'Kelas C',
                'rating' => '4',
            ],
            [
                'no' => 4,
                'gambar' => asset('img/gambar4.jpeg'),
                'nama' => 'Boxing',
                'instruktur' => 'Tio',
                'ruang' => 'Kelas D',
                'rating' => '5',
            ]
        ]
    ]);
});


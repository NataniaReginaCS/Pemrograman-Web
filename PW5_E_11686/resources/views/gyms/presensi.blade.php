@extends('dashboard')

@section('content')

<!-- Main content-->
<style>
    .gambar {
        height: 100px;
        border-radius: 100px;
        border: 2px solid #ddd;
        background-image: none;
        box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
    }

    .gambarKelas {

        border-radius: 10px;
        box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
    }
    
    .card {
        border-radius: 10px;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s;
    }

    .card:hover {
        transform: scale(1.03);
    }

    .rating-icon {
        color: Gold;
    }

    .table {
        border: 1px solid #ddd;
        border-radius: 5px;
        overflow: hidden;
    }

    .table th, .table td {
        vertical-align: middle;
        padding: 15px;
    }

</style>

<div class="content">
    <div class="container-fluid d-flex justify-content-center" style="top: 50px; padding-left: 10px;" >
        <div class="card mb-3" style="top: 50px; width: 90%;">
            <div class="d-flex aligns-item-center">
                <div class="col-md-3" >
                    <img src="{{ $dashboard['gambar'] }}"  class="img-fluid gambarKelas" alt="Gambar Gaming" style="height: 250px; max-height: 250px; margin: 25px; border: 1pt solid black; border-radius: 14px; ">
                </div>
                <div class="col-md-8" >
                    <div class="card-body">
                        <h1 class="card-text" style="font-size: 18px; text-align: right; "><strong>Tanggal : {{date('l')}}, {{date('d')}}-{{date('M')}}-{{date('Y')}}</strong></h1>
                        <h1 class="card-title" style="font-size: 28px; display: flex; align-items: center;">
                            <strong>{{ $dashboard['judul'] }}</strong>
                            <button data-bs-toggle="modal" data-bs-target="#staticBackdropeye" style="margin-left: 10px; border: none; background: none;">
                                <i class="fa-regular fa-eye" style="padding: 5px; color: white; background-color: green; font-size: 20px; border-radius: 10px;"></i>
                            </button>
                        </h1>
                        <p class="card-text" style="font-size: 18px; padding-top: 20px;"><strong>Instruktur : {{ $dashboard['instruktur'] }}</strong></p>
                        <p class="card-text" style="font-size: 18px; padding-top: 5px;"><strong>Ruang : {{ $dashboard['ruang'] }}</strong></p>
                        <p class="card-text" style="font-size: 18px; padding-top: 5px;"><strong>Total Member : {{ $dashboard['totalmember'] }}</strong></p>
                        <p class="card-text" style="font-size: 18px; padding-top: 5px;">
                            <strong>Rating: 
                                @for ($rating = 0; $rating < $dashboard['rating']; $rating++ )
                                    <i class="fas fa-star fa-xs rating-icon"></i>                        
                                @endfor
                            </strong>
                        </p>
                    </div>
                </div>
            </div>
        </div>    
    </div>

    <div class="container-fluid d-flex justify-content-center" style="margin-top: 50px; padding-left: 10px;" >
        <div class="card mb-3" style="top: 50px; width: 70%;">    
            <div class="accordion" id="accordionPanelsStayOpenExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                            Section 1: Informasi Umum
                        </button>
                        </h2>
                        <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show">
                        <div class="accordion-body">
                            <strong>Informasi umum mengenai kelas.</strong> Mata Kuliah Pemrograman Web kelas E setiap hari Senin Sesi 1.
                        </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                            Section 2: Jadwal Kelas
                        </button>
                        </h2>
                        <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse">
                        <div class="accordion-body">
                            <strong>Tanggal kelas hari ini : Senin, 7 Oktober 2024. </strong> 
                        </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
                            Section 3: Informasi Tambahan
                        </button>
                        </h2>
                        <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse">
                        <div class="accordion-body">
                            <strong>UGD Kali ini belajar mengenai Laravel Templating Engine. </strong>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div style="display: flex; justify-content: space-between; align-items: center; margin: 50px; margin-top: 100px;">
        <h1 style="margin-left: 5px;"><strong>Daftar Member</strong></h1>
        <button type="button" class="btn btn-primary" id="liveToastBtn" style="margin-right: 30px;">
            <i class="fa-solid fa-check" style="margin-right: 5px;"></i>
            Presensi
        </button>
    </div>

    <div class="toast-container position-fixed bottom-0 end-0 p-3">
        <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-body" style="background-color: blue; color: white;">
                <i class="fa-solid fa-check" style="margin-right: 5px;"></i>
                Berhasil mempresensi Member!
            </div>
        </div>
    </div>
    <div class="row row-cols-1 row-cols-md-3" style="margin-left: 50px; margin-right: 50px; ">
        @forelse ($kelas as $item)
        <div class="col">
                @if (strtolower($item['jeniskartu']) == "gold")
                    <div class="card text-bg-warning mb-3" style="max-width: 22rem; border: 2pt solid black;">
                @elseif (strtolower($item['jeniskartu']) == "silver")
                    <div class="card text-bg-secondary mb-3" style="max-width: 22rem; border: 2pt solid black;">
                @elseif (strtolower($item['jeniskartu']) == "black")
                    <div class="card text-bg-dark mb-3" style="max-width: 22rem; border: 2pt solid white;">
                @endif

                    <div class="card">
                        <img class="card-img-top" src="{{ $item['gambar'] }}" alt="gambar">
                    </div>
                    <div class="card-body">
                        <h3 class="card-title" style="font-size: 20px; padding-bottom: 10px;"><strong>{{ $item['nama'] }}</strong></h3>
                        <p class="card-text">Email: {{ $item['email'] }}</p>
                        <p class="card-text">No Telp: {{ $item['notelp'] }}</p>
                        <p class="card-text">Jenis Kartu: 
                            @if (strtolower($item['jeniskartu']) == "gold")
                                <span style="color: white; border: 2pt solid black; border-radius: 25px; padding: 3px 8px;">
                            @elseif (strtolower($item['jeniskartu']) == "silver")
                                <span style="border: 2pt solid black; border-radius: 25px; padding: 3px 8px;">
                            @elseif (strtolower($item['jeniskartu']) == "black")
                                <span style="border: 2pt solid white; border-radius: 25px; padding: 3px 8px;">
                            @endif
                                    {{ ucfirst($item['jeniskartu']) }}
                                </span>
                        </p>                        
                        <p class="card-text" >Metode Pembayaran: 
                            @if (strtolower($item['metodepembayaran']) == "hutang teman")
                                <span class="badge text-bg-danger" style="font-weight: normal; font-size: 15px;">
                            @elseif (strtolower($item['metodepembayaran']) == "langsung bayar")
                                <span class="badge text-bg-primary" style="font-weight: normal; font-size: 15px;">
                            @elseif (strtolower($item['metodepembayaran']) == "shoppe pay later")
                                <span class="badge text-bg-warning" style="font-weight: normal; font-size: 15px;">
                            @endif
                            {{ $item['metodepembayaran'] }}
                            </span>
                        </p>
                    </div>
                </div> 
            </div>
            @empty
        @endforelse
    </div>

    <!-- Modal -->
    <div class="modal fade " id="staticBackdropeye" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content bg-light text-dark">
                <div class="modal-header" style="background-color: green;">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Detail Kelas</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h1 class="card-title" style="font-size: 30px; display: flex; align-items: center;">
                        <strong>{{ $dashboard['judul'] }}</strong><h1>
                        <p class="card-text" style="font-size: 18px; padding-top: 20px;"><strong>Instruktur : </strong>{{ $dashboard['instruktur'] }}</p>
                        <p class="card-text" style="font-size: 18px; padding-top: 5px;"><strong>Kode Instruktur : </strong>{{ $dashboard['npm'] }}</p>
                        <p class="card-text" style="font-size: 18px; padding-top: 5px;"><strong>Hari Kelas : </strong>{{date('l')}}</p>
                        <p class="card-text" style="font-size: 18px; padding-top: 5px;"><strong>Tanggal : </strong> {{date('d')}}-{{date('M')}}-{{date('Y')}}</p>
                        <p class="card-text" style="font-size: 18px; padding-top: 5px;"><strong>Ruang : </strong>{{ $dashboard['ruang'] }}</p>
                        <p class="card-text" style="font-size: 18px; padding-top: 5px;">
                            <strong>Rating: 
                                @for ($rating = 0; $rating < $dashboard['rating']; $rating++ )
                                    <i class="fas fa-star fa-xs"></i>                        
                                @endfor
                            </strong>
                        </p>
                </div>
        </div>
    </div>

</div>



@endsection
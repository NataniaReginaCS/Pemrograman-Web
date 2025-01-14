@extends('dashboard')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Tambah Booking</h1>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="#">Bookings</a>
                    </li>
                    <li class="breadcrumb-item active">Create</li>
                </ol>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form class= "needs-validation" novalidate action="{{ route('bookings.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col">
                                            <label for="author" class="form-label">Class</label>
                                            <input class="form-control @error('class') is-invalid @enderror" type="text" name="class" id="class" placeholder="Masukkan Nama Ticket" required>
                                            @error('class')    
                                                <div class="invalid-feedback">
                                                    <i class="fa-solid fa-exclamation"></i>
                                                    Class Tidak boleh kosong
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col">
                                            <label for="pages" class="form-label">Price</label>
                                            <input class="form-control @error('price') is-invalid @enderror" type="text" name="price" id="price" placeholder="Masukkan Price" required>
                                            @error('price')
                                                <div class="invalid-feedback">
                                                    <i class="fa-solid fa-exclamation"></i>
                                                    Price Tidak boleh kosong
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="book_id" class="form-label">Book</label>
                                    <select class="form-control @error('id_book') is-invalid @enderror" id="id_book" name="id_book" required>
                                        <option value="" disabled selected>Pilih buku</option>
                                        @foreach ($books as $item)
                                        <option value="{{ $item->id }}">
                                            {{ $item->title }}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('id_book')
                                        <div class="invalid-feedback">
                                            <i class="fa-solid fa-exclamation"></i>
                                            book Tidak boleh kosong
                                        </div>
                                    @enderror
                                </div>
                            <button type="submit" class="btn btn-primary">SIMPAN</button>
                        </form>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection
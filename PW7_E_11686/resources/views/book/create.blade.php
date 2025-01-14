@extends('dashboard')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Tambah book</h1>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="#">Book</a>
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
                        <form action="{{ route('book.store') }}" novalidate method="POST" enctype="multipart/form-data">
                            @csrf
                                <div class="mb-3">
                                    <label for="images" class="form-label">Image</label>
                                    <input class="form-control" type="file" name="images" id="images">
                                </div>
                                <div class="mb-3">
                                    <label for="title" class="form-label">Title</label>
                                    <input class="form-control @error('title') is-invalid @enderror" type="text" name="title" id="title" placeholder="Masukkan Title">
                                    @error('title')    
                                        <div class="invalid-feedback">
                                            <i class="fa-solid fa-xmark"></i>
                                            The title field is required.
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col">
                                            <label for="author" class="form-label">Author</label>
                                            <input class="form-control @error('author')is-invalid @enderror" type="text" name="author" id="author" placeholder="Masukkan Author">
                                            @error('author')    
                                                <div class="invalid-feedback">
                                                    <i class="fa-solid fa-xmark"></i>
                                                    The author field is required.
                                                </div>
                                            @enderror  
                                        </div>
                                        <div class="col">
                                            <label for="pages" class="form-label">Pages</label>
                                            <input class="form-control @error('pages') is-invalid @enderror" type="text" name="pages" id="pages" placeholder="Masukkan Pages">
                                            @error('pages')
                                                <div class="invalid-feedback">
                                                    <i class="fa-solid fa-xmark"></i>
                                                    The pages field is required.
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
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
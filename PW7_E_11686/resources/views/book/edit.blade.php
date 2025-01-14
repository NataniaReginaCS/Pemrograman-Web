@extends('dashboard')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Edit Book</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Book</a></li>
                    <li class="breadcrumb-item active">Edit</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <form class="needs-validation" novalidate action="{{ route('book.update', $book->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="images" class="form-label">Image</label>
                        <input class="form-control" type="file" name="images" id="images">
                    </div>

                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input class="form-control" type="text" name="title" id="title" placeholder="Masukkan Title" value="{{ $book->title }}" required>
                        <div class="invalid-feedback">The title field is required.</div>
                    </div>

                    <div class="mb-3">
                        <div class="row">
                            <div class="col">
                                <label for="author" class="form-label">Author</label>
                                <input class="form-control" type="text" name="author" id="author" placeholder="Masukkan Author" value="{{ $book->author }}" required>
                                <div class="invalid-feedback">The author field is required.</div>
                            </div>
                            <div class="col">
                                <label for="pages" class="form-label">Pages</label>
                                <input class="form-control" type="text" name="pages" id="pages" placeholder="Masukkan Pages" value="{{ $book->pages }}" required>
                                <div class="invalid-feedback">The pages field is required.</div>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Edit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

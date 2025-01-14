@extends('dashboard')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Edit Booking</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="#">Bookings</a>
                    </li>
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
                <div class="card">
                    <div class="card-body">
                        <form class="needs-validation" novalidate action="{{ route('bookings.update', $booking->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            
                            <div class="mb-3">
                                <div class="row">
                                    <div class="col">
                                        <label for="class" class="form-label">Class</label>
                                        <input class="form-control" type="text" name="class" id="class" placeholder="Masukkan Nama Ticket" value="{{ old('class', $booking->class) }}" required>
                                        <div class="invalid-feedback">
                                            Class tidak boleh kosong
                                        </div>
                                    </div>
                                    <div class="col">
                                        <label for="price" class="form-label">Price</label>
                                        <input class="form-control" type="text" name="price" id="price" placeholder="Masukkan Price" value="{{ old('price', $booking->price) }}" required>
                                        <div class="invalid-feedback">
                                            Price tidak boleh kosong
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="mb-3">
                                <label for="id_book" class="form-label">Select Book</label>
                                <select class="form-control" id="id_book" name="id_book" required>
                                    <option value="" disabled>Select a book</option>
                                    @foreach ($books as $item)
                                        <option value="{{ $item->id }}" {{ $item->id == $booking->id_book ? 'selected' : '' }}>
                                            {{ $item->title }}
                                        </option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">Please select a book.</div>
                            </div>
                            
                            <button type="submit" class="btn btn-primary">Edit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

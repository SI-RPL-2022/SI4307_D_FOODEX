@extends('layouts.main')
@section('title', 'Tambah Menu')
@section('content')
    <section id="menu" class="mt-5">
        <div class="container">
            <div class="col-8 ms-auto me-auto">
                <p class="h3 mb-3">Menu Baru</p>
                <form class="needs-validation" method="POST" action="{{ route('admin.menus.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row g-3">
                        <div class="col-12">
                            <label for="name" class="form-label">Nama Menu</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Nama Menu" value="{{ old('name') }}" name="name" required>
                            @error('name')
                                <span class="text text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-12">
                            <label for="description" class="form-label">Deskripsi</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" id="description" rows="5" placeholder="Deskripsi Menu" name="description" required>{{ old('description') }}</textarea>
                            @error('description')
                                <span class="text text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-lg-6">
                            <label for="calories" class="form-label">Kalori</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fa-solid fa-stroopwafel"></i></span>
                                <input type="number" class="form-control @error('calories') is-invalid @enderror" id="calories" placeholder="Jumlah Kalori" value="{{ old('calories') }}" name="calories" required>
                            </div>
                            @error('calories')
                                <span class="text text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-lg-6">
                            <label for="price" class="form-label">Harga</label>
                            <div class="input-group">
                                <span class="input-group-text">Rp</span>
                                <input type="number" class="form-control @error('price') is-invalid @enderror" id="price" placeholder="Harga Menu" value="{{ old('price') }}" name="price" required>
                            </div>
                            @error('price')
                                <span class="text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <hr class="my-4">

                    <h4 class="mb-3">Foto</h4>

                    <div class="row">
                        <div class="col-12">
                            <input class="form-control" type="file" id="image" name="image" accept=".jpg,.png,.jpeg" required>
                        </div>
                    </div>

                    <hr class="my-4">

                    <button class="w-100 btn btn-themed btn-lg" type="submit">Simpan</button>
                </form>
            </div>
        </div>
    </section>
@endsection

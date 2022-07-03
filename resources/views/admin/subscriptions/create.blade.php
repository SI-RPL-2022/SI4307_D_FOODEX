@extends('layouts.main')
@section('title', 'Tambah Paket')
@section('content')
<section id="menu" class="mt-5">
    <div class="container">
        <div class="col-8 ms-auto me-auto">
            <p class="h3 mb-3">Paket Baru</p>
            <form class="needs-validation" method="POST" action="{{ route('admin.subscriptions.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="row g-3">
                    <div class="col-12">
                        <label for="title" class="form-label">Nama Paket</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="Nama Paket" value="{{ old('title') }}" name="title" required>
                        @error('title')
                            <span class="text text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-lg-12">
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

                <h5 class="mb-3">Senin</h5>

                <div class="row">
                    <div class="col-6">
                        <label for="monday_lunch" class="form-label">Lunch</label>
                        <input type="text" class="form-control @error('monday_lunch') is-invalid @enderror" id="monday_lunch" placeholder="Menu Makan Siang Hari Senin" value="{{ old('monday_lunch') }}" name="monday_lunch" required>
                        @error('monday_lunch')
                            <span class="text text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-6">
                        <label for="monday_dinner" class="form-label">Dinner</label>
                        <input type="text" class="form-control @error('monday_dinner') is-invalid @enderror" id="monday_dinner" placeholder="Menu Makan Malam Hari Senin" value="{{ old('monday_dinner') }}" name="monday_dinner" required>
                        @error('monday_dinner')
                            <span class="text text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <hr class="my-4">

                <h5 class="mb-3">Selasa</h5>

                <div class="row">
                    <div class="col-6">
                        <label for="tuesday_lunch" class="form-label">Lunch</label>
                        <input type="text" class="form-control @error('tuesday_lunch') is-invalid @enderror" id="tuesday_lunch" placeholder="Menu Makan Siang Hari Selasa" value="{{ old('tuesday_lunch') }}" name="tuesday_lunch" required>
                        @error('tuesday_lunch')
                            <span class="text text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-6">
                        <label for="tuesday_dinner" class="form-label">Dinner</label>
                        <input type="text" class="form-control @error('tuesday_dinner') is-invalid @enderror" id="tuesday_dinner" placeholder="Menu Makan Malam Hari Selasa" value="{{ old('tuesday_dinner') }}" name="tuesday_dinner" required>
                        @error('tuesday_dinner')
                            <span class="text text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <hr class="my-4">

                <h5 class="mb-3">Rabu</h5>

                <div class="row">
                    <div class="col-6">
                        <label for="wednesday_lunch" class="form-label">Lunch</label>
                        <input type="text" class="form-control @error('wednesday_lunch') is-invalid @enderror" id="wednesday_lunch" placeholder="Menu Makan Siang Hari Rabu" value="{{ old('wednesday_lunch') }}" name="wednesday_lunch" required>
                        @error('wednesday_lunch')
                            <span class="text text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-6">
                        <label for="wednesday_dinner" class="form-label">Dinner</label>
                        <input type="text" class="form-control @error('wednesday_dinner') is-invalid @enderror" id="wednesday_dinner" placeholder="Menu Makan Malam Hari Rabu" value="{{ old('wednesday_dinner') }}" name="wednesday_dinner" required>
                        @error('wednesday_dinner')
                            <span class="text text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <hr class="my-4">

                <h5 class="mb-3">Kamis</h5>

                <div class="row">
                    <div class="col-6">
                        <label for="thursday_lunch" class="form-label">Lunch</label>
                        <input type="text" class="form-control @error('thursday_lunch') is-invalid @enderror" id="thursday_lunch" placeholder="Menu Makan Siang Hari Kamis" value="{{ old('thursday_lunch') }}" name="thursday_lunch" required>
                        @error('thursday_lunch')
                            <span class="text text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-6">
                        <label for="thursday_dinner" class="form-label">Dinner</label>
                        <input type="text" class="form-control @error('thursday_dinner') is-invalid @enderror" id="thursday_dinner" placeholder="Menu Makan Malam Hari Kamis" value="{{ old('thursday_dinner') }}" name="thursday_dinner" required>
                        @error('thursday_dinner')
                            <span class="text text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <hr class="my-4">

                <h5 class="mb-3">Jumat</h5>

                <div class="row">
                    <div class="col-6">
                        <label for="friday_lunch" class="form-label">Lunch</label>
                        <input type="text" class="form-control @error('friday_lunch') is-invalid @enderror" id="friday_lunch" placeholder="Menu Makan Siang Hari Jumat" value="{{ old('friday_lunch') }}" name="friday_lunch" required>
                        @error('friday_lunch')
                            <span class="text text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-6">
                        <label for="friday_dinner" class="form-label">Dinner</label>
                        <input type="text" class="form-control @error('friday_dinner') is-invalid @enderror" id="friday_dinner" placeholder="Menu Makan Malam Hari Jumat" value="{{ old('friday_dinner') }}" name="friday_dinner" required>
                        @error('friday_dinner')
                            <span class="text text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <hr class="my-4">

                <h5 class="mb-3">Sabtu</h5>

                <div class="row">
                    <div class="col-6">
                        <label for="saturday_lunch" class="form-label">Lunch</label>
                        <input type="text" class="form-control @error('saturday_lunch') is-invalid @enderror" id="saturday_lunch" placeholder="Menu Makan Siang Hari Sabtu" value="{{ old('saturday_lunch') }}" name="saturday_lunch" required>
                        @error('saturday_lunch')
                            <span class="text text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-6">
                        <label for="saturday_dinner" class="form-label">Dinner</label>
                        <input type="text" class="form-control @error('saturday_dinner') is-invalid @enderror" id="saturday_dinner" placeholder="Menu Makan Malam Hari Sabtu" value="{{ old('saturday_dinner') }}" name="saturday_dinner" required>
                        @error('saturday_dinner')
                            <span class="text text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <hr class="my-4">

                <h5 class="mb-3">Minggu</h5>

                <div class="row">
                    <div class="col-6">
                        <label for="sunday_lunch" class="form-label">Lunch</label>
                        <input type="text" class="form-control @error('sunday_lunch') is-invalid @enderror" id="sunday_lunch" placeholder="Menu Makan Siang Hari Minggu" value="{{ old('sunday_lunch') }}" name="sunday_lunch" required>
                        @error('sunday_lunch')
                            <span class="text text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-6">
                        <label for="sunday_dinner" class="form-label">Dinner</label>
                        <input type="text" class="form-control @error('sunday_dinner') is-invalid @enderror" id="sunday_dinner" placeholder="Menu Makan Malam Hari Minggu" value="{{ old('sunday_dinner') }}" name="sunday_dinner" required>
                        @error('sunday_dinner')
                            <span class="text text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <hr class="my-4">

                <button class="w-100 btn btn-themed btn-lg" type="submit">Simpan</button>
            </form>
        </div>
    </div>
</section>
@endsection

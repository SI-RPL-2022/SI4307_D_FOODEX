@extends('layouts.main')
@section('title', 'Checkout')
@section('content')
<section id="menu" class="mt-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <p class="h3 mb-3 text-center" id="title">Keranjang</p>
            </div>
        </div>
        <form action="{{ route('orders.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row mt-3">
                <div class="col-12 col-lg-6">
                    <div class="card container p-3">
                        <h5>Data Diri</h5>
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required>
                            @error('name')
                                <span class="text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Nomor HP</label>
                            <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone') }}" required>
                            @error('phone')
                                <span class="text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">Alamat</label>
                            <textarea class="form-control @error('address') is-invalid @enderror" id="address" name="address" rows="3" required>{{ old('address') }}</textarea>
                            @error('address')
                                <span class="text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-6">
                    <div class="card container p-3">
                        <h5>Daftar Pesanan</h5>
                        <div class="row">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr class="table-dark">
                                            <th scope="col">No</th>
                                            <th scope="col">Nama Produk</th>
                                            <th scope="col">Harga</th>
                                            <th scope="col">Jumlah</th>
                                            <th scope="col">Sub Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($items as $item)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $item->menu->name ?? $item->subscription->title }}</td>
                                            <td>@rupiah($item->menu->price ?? $item->subscription->price)</td>
                                            <td>{{ $item->quantity }}</td>
                                            <td>
                                                @if (isset($item->menu->name))
                                                    @rupiah($item->menu->price * $item->quantity)
                                                @else
                                                    @rupiah($item->subscription->price * $item->quantity)
                                                @endif
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr class="border-0">
                                            <td colspan="6" class="text-end border-0">
                                                <p class="h5">Grand Total: @rupiah($totalPrice)</p>
                                            </td>
                                        </tr>
                                        <tr class="border-0">
                                            <td colspan="6" class="text-end border-0">
                                                <div class="mb-3 justify-content-center text-center">
                                                    <label for="bukti" class="form-label">Upload Bukti Transfer</label>
                                                    <input type="file" name="payment_proof" class="form-control @error('payment_proof') is-invalid @enderror" accept=".jpg,.png,.gif" required>
                                                    @error('payment_proof')
                                                        <span class="text text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </td>
                                        </tr>
                                        <tr class="border-0">
                                            <td colspan="6" class="text-end border-0">
                                                <button type="submit" class="btn btn-themed btn-lg">Pesan</button>
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
@endsection

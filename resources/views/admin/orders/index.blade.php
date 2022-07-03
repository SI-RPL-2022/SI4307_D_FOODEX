@extends('layouts.main')
@section('title', 'Daftar Pesanan')
@section('content')
<section id="menu" class="mt-5">
    <div class="container">
        <div class="row">
            <div class="col-10">
                <p class="h3 mb-3" id="title">Daftar Pesanan</p>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <table class="table" aria-describedby="title">
                    <thead>
                        <tr>
                        <th scope="col">Transaksi</th>
                        <th scope="col">Total</th>
                        <th scope="col">Keterangan</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($orders as $order)
                        <tr class="va-middle">
                            <th scope="row"><span class="fa fa-cart-shopping"></span> Pembelian</th>
                            <td>@rupiah($order->total)</td>
                            <td>
                                @if ($order->status == 0)
                                    <span class="badge bg-warning text-dark">Menunggu Konfirmasi</span>
                                @elseif ($order->status == 1)
                                    <span class="badge bg-danger text-white">Pesanan Ditolak</span>
                                @elseif ($order->status == 2)
                                    <span class="badge bg-success text-white">Pesanan Dikirim</span>
                                @elseif ($order->status == 3)
                                    <span class="badge bg-info text-white">Pesanan Selesai</span>
                                @endif
                            </td>
                            <td>{{ \Carbon\Carbon::parse($order->created_at)->translatedFormat('d F Y') }}</td>
                            <td class="text-center">
                                <a href="{{ route('admin.orders.show', $order->id) }}" class="btn btn-themed">Detail</a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <th scope="row" class="text-center" colspan="5">Belum Ada Pesanan</th>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
@endsection

@extends('layouts.main')
@section('title', 'Detail Pesanan')
@section('content')
<section id="menu" class="mt-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <p class="h3 mb-3 text-center" id="title">Detail Pesanan</p>
            </div>
        </div>
        <div class="row">
            <p class="h5">
                @if ($order->status == 0)
                    Status: Menunggu Konfirmasi
                @elseif ($order->status == 1)
                    Status: Pesanan Ditolak
                @elseif ($order->status == 2)
                    Status: Pesanan Dikirim
                @elseif ($order->status == 3)
                    Status: Pesanan Selesai
                @endif
            </p>
            <div class="col-12 d-inline-flex">
                @if ($order->status == 0)
                    <form action="{{ route('admin.orders.updateStatus', $order->id) }}" method="post">
                        @csrf
                        @method('PATCH')
                        <input type="hidden" name="status" value="1">
                        <button class="btn btn-danger"><span class="fa fa-cancel"></span> Tolak Pesanan</button>
                    </form>
                    <form action="{{ route('admin.orders.updateStatus', $order->id) }}" method="post" class="ms-3">
                        @csrf
                        @method('PATCH')
                        <input type="hidden" name="status" value="2">
                        <button class="btn btn-success"><span class="fa fa-check"></span> Terima Pesanan</button>
                    </form>
                @elseif ($order->status == 2)
                <form action="{{ route('admin.orders.updateStatus', $order->id) }}" method="post">
                    @csrf
                    @method('PATCH')
                    <input type="hidden" name="status" value="3">
                    <button class="btn btn-success"><span class="fa fa-check"></span> Pesanan Diterima</button>
                </form>
                @endif
            </div>
            <div class="col-12 mt-3 mb-3">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="table-dark" width="20%">Nama</th>
                                <td>{{ $order->name }}</td>
                                <th class="table-dark" width="20%">No. HP</th>
                                <td>{{ $order->phone }}</td>
                            </tr>
                            <tr>
                                <th class="table-dark" width="20%">Alamat</th>
                                <td>{{ $order->address }}</td>
                                <th class="table-dark" width="20%">Tanggal</th>
                                <td>{{ \Carbon\Carbon::parse($order->created_at)->translatedFormat('d F Y') }}</td>
                            </tr>
                            <tr>
                                <th class="table-dark" width="20%">Grand Total</th>
                                <td>@rupiah($order->total)</td>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
            <div class="col-12 mb-3">
                <h5>Pesanan</h5>
                <div class="row">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr class="table-dark">
                                    <th>No</th>
                                    <th>Nama Produk</th>
                                    <th>Harga</th>
                                    <th>Jumlah</th>
                                    <th>Sub Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($order->items as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>@rupiah($item->price)</td>
                                    <td>{{ $item->quantity }}</td>
                                    <td>@rupiah($item->quantity * $item->price)</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-12 mb-3">
                <h5>Bukti Pembayaran</h5>
                <img src="{{ asset($order->payment_proof) }}" alt="" srcset="" class="w-100 h-auto">
            </div>
        </div>
    </div>
</section>
@endsection

@extends('layouts.main')
@section('title', 'Keranjang')
@section('content')
<section id="menu" class="mt-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <p class="h3 mb-3 text-center" id="title">Keranjang</p>
            </div>
        </div>
        <div class="row text-center">
            <div class="col-12">
                <table class="table" aria-describedby="title">
                    <thead>
                        <tr>
                        <th scope="col">Nama Menu</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Jumlah</th>
                        <th scope="col">Total</th>
                        <th scope="col" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($carts as $cart)
                        <tr class="va-middle">
                            <td>{{ $cart->menu->name ?? $cart->subscription->title }}</td>
                            <td>@rupiah($cart->menu->price ?? $cart->subscription->price)</td>
                            <td>{{ $cart->quantity }}</td>
                            <td>
                                @if (isset($cart->menu->name))
                                    @rupiah($cart->menu->price * $cart->quantity)
                                @else
                                    @rupiah($cart->subscription->price * $cart->quantity)
                                @endif
                            </td>
                            <td class="text-center">
                                <form action="{{ route('cart.destroy', $cart->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-themed btn-submit"><span class="fa-solid fa-trash-alt"></span></button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <th scope="row" class="text-center" colspan="5">Belum Ada Menu</th>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            @if ($carts->count() >0)
            <div class="row d-flex text-end va-middle align-items-center">
                <div class="col-11">
                    <span class="mb-0">Total Belanja: @rupiah($totalPrice)</span>
                </div>
                <div class="col-1">
                    <a href="{{ route('orders.create') }}" class="btn btn-themed">Checkout</a>
                </div>
            </div>
            @endif
        </div>
    </div>
</section>
@endsection
@section('script')
<script>
    $(".btn-submit").on("click", function(e) {
        e.preventDefault();
        var form = $(this).parents('form');
        console.log(form);
        Swal.fire({
            title: 'Anda yakin ?',
            text:'Menu yang dipilih akan dihapus',
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#cc3f44',
            confirmButtonText: 'Hapus',
            cancelButtonText: 'Batal',
            html: false
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            }
        })
    });
</script>
@endsection

@extends('layouts.main')
@section('title', 'Beranda')
@section('content')
<section id="banner">
    <img class="img-banner" src="{{ asset('assets/images/banner.png') }}" alt="" style="width:100%">
</section>
<section id="menuhariini">
    <p class="h2 text-center mt-5 mb-4">Today’s Menu</p>
    <div class="row">
        @forelse ($menus as $menu)
        <div class="col-12 col-lg-4 mb-3">
            <div class="card card card-menu">
                <img src="{{ asset($menu->image) }}" class="card-img-top" alt="Menu Image">
                <div class="card-body">
                    <h5 class="card-title">{{ $menu->name }}</h5>
                    <p class="card-text card-description mb-0">{{ $menu->description }}</p>
                    <p class="card-text">Kalori : {{ $menu->calories }}</p>
                </div>
                <div class="card-footer d-flex">
                    <div class="card-price">
                        <p class="card-text">@rupiah($menu->price)</p>
                    </div>
                    <div class="card-button ">
                        <button class="btn btn-themed btn-wider btn-add-cart" data-id="{{ $menu->id }}" data-name="{{ $menu->name }}" data-bs-toggle="modal" data-bs-target="#tambahKeranjangModal"><span class="fa-solid fa-cart-plus"></span></button>
                    </div>
                </div>
            </div>
        </div>
        @empty
            <span class="text text-center">Belum Ada Menu</span>
        @endforelse
    </div>
    <div class="row">
        <div class="col-12 d-flex justify-content-center">
            {{ $menus->links() }}
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="tambahKeranjangModal" tabindex="-1" aria-labelledby="tambahKeranjangModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary-lighter text-dark">
                    <h5 class="modal-title" id="tambahKeranjangModalLabel">Tambah ke Keranjang</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('cart.store') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" name="menu_id" id="menu_id">
                        <div class="form-group">
                            <label for="name">Nama Menu</label>
                            <input type="text" name="name" id="name" disabled class="form-control">
                        </div>
                        <div class="form-group mt-3">
                            <label for="quantity">Jumlah</label>
                            <input type="number" class="form-control" id="quantity" min="1" name="quantity" placeholder="0" value="1" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-themed">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
@section('script')
<script>
document.getElementById('tambahKeranjangModal').addEventListener('show.bs.modal', (e) => {
     var menuId = e.relatedTarget.dataset.id;
     var menuName = e.relatedTarget.dataset.name;
     $(".modal-body #name").val( menuName );
     $(".modal-body #menu_id").val( menuId );
});
</script>
@endsection
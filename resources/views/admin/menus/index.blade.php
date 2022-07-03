@extends('layouts.main')
@section('title', 'Menu')
@section('content')
<section id="menu" class="mt-5">
    <div class="container">
        <div class="row">
            <div class="col-10">
                <p class="h3 mb-3" id="title">Menu</p>
            </div>
            <div class="col-2">
                <a href="{{ route('admin.menus.create') }}" class="btn btn-themed"><span class="fa-solid fa-plus"></span> Tambah Menu</a>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <table class="table" aria-describedby="title">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Foto</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Kalori</th>
                        <th scope="col">Harga</th>
                        <th scope="col" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($menus as $menu)
                        <tr class="va-middle">
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td><img src="{{ asset($menu->image) }}" alt="" class="small-image"></td>
                            <td>{{ $menu->name }}</td>
                            <td>{{ $menu->calories }}</td>
                            <td>@rupiah($menu->price)</td>
                            <td class="text-center">
                                <a href="{{ route('admin.menus.edit', $menu->id) }}" class="btn btn-themed"><span class="fa-solid fa-pencil-alt"></span></a>
                                <form action="{{ route('admin.menus.destroy', $menu->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-themed btn-submit"><span class="fa-solid fa-trash-alt"></span></button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <th scope="row" class="text-center" colspan="6">Belum Ada Menu</th>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
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
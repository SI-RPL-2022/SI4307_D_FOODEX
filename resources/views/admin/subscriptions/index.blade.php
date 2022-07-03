@extends('layouts.main')
@section('title', 'Paket')
@section('content')
<section id="menu" class="mt-5">
    <div class="container">
        <div class="row">
            <div class="col-10">
                <p class="h3 mb-3" id="title">Paket</p>
            </div>
            <div class="col-2">
                <a href="{{ route('admin.subscriptions.create') }}" class="btn btn-themed"><span class="fa-solid fa-plus"></span> Tambah Paket</a>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <table class="table" aria-describedby="title">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Harga</th>
                        <th scope="col" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($subscriptions as $subscription)
                        <tr class="va-middle">
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $subscription->title }}</td>
                            <td>@rupiah($subscription->price)</td>
                            <td class="text-center">
                                <a href="{{ route('admin.subscriptions.edit', $subscription->id) }}" class="btn btn-themed"><span class="fa-solid fa-pencil-alt"></span></a>
                                <form action="{{ route('admin.subscriptions.destroy', $subscription->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-themed btn-submit"><span class="fa-solid fa-trash-alt"></span></button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <th scope="row" class="text-center" colspan="6">Belum Ada Paket</th>
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
            text:'Paket yang dipilih akan dihapus',
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

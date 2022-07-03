@extends('layouts.main')
@section('title', 'Artikel')
@section('content')
<section id="menu" class="mt-5">
    <div class="container">
        <div class="row">
            <div class="col-10">
                <p class="h3 mb-3" id="title">Artikel</p>
            </div>
            <div class="col-2">
                <a href="{{ route('admin.articles.create') }}" class="btn btn-themed"><span class="fa-solid fa-plus"></span> Artikel Baru</a>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <table class="table" aria-describedby="title">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Judul</th>
                        <th scope="col">Deskripsi</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($articles as $article)
                        <tr class="va-middle">
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $article->title }}</td>
                            <td>{{ $article->description }}</td>
                            <td>{{ \Carbon\Carbon::parse($article->created_at)->translatedFormat('d M Y') }}</td>
                            <td class="text-center">
                                <a href="{{ route('admin.articles.edit', $article->id) }}" class="btn btn-themed"><span class="fa-solid fa-pencil-alt"></span></a>
                                <form action="{{ route('admin.articles.destroy', $article->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-themed btn-submit"><span class="fa-solid fa-trash-alt"></span></button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <th scope="row" class="text-center" colspan="5">Belum Ada Artikel</th>
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
            text:'Artikel yang dipilih akan dihapus',
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